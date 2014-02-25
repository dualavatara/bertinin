<?php
/**
 * User: zhukov
 * Date: 29.02.12
 * Time: 1:41
 */
namespace Admin;

class StdController extends Controller {
	/**
	 * @var array
	 */
	protected $data;

	/**
	 * @var string
	 */
	protected $objectName;

	/**
	 * @var \AdminModel
	 */
	protected $model;

	/**
	 * @param string $menu 				Menu key from 'menu' config section
	 * @param string $section			Section key from 'menu' config section
	 * @param string $objectName		Object name to use for template and model.
	 * 									Ex. 'User' for admin/tpl/User/... and
	 * 									admin/model/User.php
	 * @param \Admin\Application $app
	 */
	public function __construct($menu, $section, $objectName, \Admin\Application $app) {
		preg_match('/.*\\\\(?<class>[[:alpha:]]+)$/', get_class($this), $m);
		$classname = $m['class'];
		$this->data = $data = array('menu'    => $menu ? $menu : $_SESSION['menu'],
									'section' => $classname);
		$this->objectName = $objectName;

		if ($menu) $_SESSION['menu'] = $menu;

		parent::__construct($app);
		$classname = '\\model\\' . $objectName;
		$this->model = new $classname($this->app['db']);
	}

	public function do_add() {
		$this->data['model'] = $this->model;
		return $this->app['template']->render($this->objectName.'\FormTemplate', $this->data);
	}

	public function do_delete(\Admin\Request $request) {
		$id = $request['id'];

		$fixed = array();
		$m = $this->model->getModel();
		if (method_exists($m, 'fixedIds')) {
			$fixed = $m->fixedIds();
		}
		if (!in_array($id, $fixed)) $this->model->delById($id);

		$url = $this->app->getUrl(strtolower($this->objectName) . '_list');
		return $this->app->redirect($_SESSION['listurl']);
	}

	public function do_edit(\Admin\Request $request) {
		$id = $request['id'];

		if (!$this->model->getById($id)) {
			return $this->app->error404();
		}

		$m = $this->model->getModel();
		$this->data['object'] = $m[0];
		$this->data['model'] = $this->model;

		return $this->app['template']->render($this->objectName.'\FormTemplate', $this->data);
	}

	public function do_list(\Admin\Request $request = null) {
        $this->model->getModel()->fUseInQuery = true;
		$this->model->getFiltered($request);
        //var_dump($this->model);
		$class = $this->model->childParamsClass;
		if ($class) {
			$params = new $class($request);
			$_SESSION['urlparams'] = $params->getRequestParams($request);
		}

		$this->data['model'] = $this->model;
		$_SESSION['listurl'] = $_SERVER['REQUEST_URI'];

        $this->model->getModel()->fUseInQuery = false;
		return $this->app['template']->render($this->objectName.'\ListTemplate', $this->data);
	}

	public function do_save($request) {

		$form = $request['form'];
		//var_dump($request); return;
		if (count($form['routes'])) {
			$routes = array_keys($form['routes']);
			unset($form['routes']);
		} else $routes = array();

		$this->model->onSave($form);

		foreach ($this->model->fields as $field) {
			$field->onSave($form);
		}
		//if there uploaded files with names of model field, store them


		if ($form['id']) $this->model->saveFromForm($form);
		else $this->model->addFromForm($form);

		//$url = $this->app->getUrl(strtolower($this->objectName) . '_list');
		return $this->app->redirect($_SESSION['listurl']);
	}

    public function do_import($request) {

        date_default_timezone_set('Europe/Moscow');

        $cat_json = file_get_contents(__DIR__.'/../import/categories.json');
        if( $cat_json ){
            $cat_data = json_decode($cat_json,true);

            $cat = array();
            foreach( $cat_data as $cat_item ){
                $cat[ $cat_item['_id']['oid'] ] = $cat_item['title'];
            }

            $new_cat = array(   'Факторинг'=>'1',
                                'Страхование кредитных рисков'=>'10',
                                'Интервью'=>'5',
                                'Клиенты о факторинге'=>'8',
                                'Кейсы'=>'7',
                                'Брокеридж'=>'4',
                                'Интересное'=>'6',
                                'Консалтинг'=>'9',
                                'Дебиторка'=>'2');

            $art_json = file_get_contents(__DIR__.'/../import/articles.json');
            if($art_json){
                $art_data = json_decode($art_json,true);

                foreach( $art_data as $art_item ){
                    $this->do_save(new \Admin\Request(array( 'form' => array( 'id'=>'', 'cat'=> $new_cat[ $cat[ $art_item['blog_category_id']['oid'] ]['ru']], 'title'=>$art_item['title'], 'author'=>$art_item['author'], 'annotation'=>$art_item['annotation'], 'content'=>$art_item['body'], 'path'=>$art_item['path'], 'metadesc'=>'', 'publishedat'=>date('Y-m-d H:i:s',intval($art_item['published_at']['date']/1000)), 'created'=>date('Y-m-d H:i:s',intval($art_item['created_at']['date']/1000)) )  )));
                }
            }
        }

        return $this->app->redirect($_SESSION['listurl']);
    }
}
