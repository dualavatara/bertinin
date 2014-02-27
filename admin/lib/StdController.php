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

	public function __construct(\Admin\Application $app, \AdminModel $model, $objectName = '' ) {
		preg_match('/.*\\\\(?<class>[[:alpha:]]+)$/', get_class($this), $m);
		$classname = $m['class'];
		$this->data = $data = array('section' => $classname);
		$this->objectName = $objectName;

		parent::__construct($app);
        $this->model = $model;

	}

	public function do_add() {
		$this->data['model'] = $this->model;
        $formTemplate = $this->objectName ? $this->objectName.'\FormTemplate' : 'FormModelTemplate';
		return $this->app['template']->render($formTemplate, $this->data);
	}

	public function do_delete(\Admin\Request $request) {
		$id = $request['id'];

		$fixed = array();
		$m = $this->model->getModel();
		if (method_exists($m, 'fixedIds')) {
			$fixed = $m->fixedIds();
		}
		if (!in_array($id, $fixed)) $this->model->delById($id);

        $url = $this->app->getUrl(strtolower($this->data['section']) . '_list');
        return $this->app->redirect($url);
	}

	public function do_edit(\Admin\Request $request) {
		$id = $request['id'];

		if (!$this->model->getById($id)) {
			return $this->app->error404();
		}

		$this->data['model'] = $this->model;

        $formTemplate = $this->objectName ? $this->objectName.'\FormTemplate' : 'FormModelTemplate';
        return $this->app['template']->render($formTemplate, $this->data);
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
        $this->model->getModel()->fUseInQuery = false;

        $listTemplate = $this->objectName ? $this->objectName.'\ListTemplate' : 'ListModelTemplate';
        return $this->app['template']->render($listTemplate, $this->data);
	}

	public function do_save($request) {

		$form = $request['form'];
		//var_dump($request); return;
		if (count($form['routes'])) {
			$routes = array_keys($form['routes']);
			unset($form['routes']);
		} else $routes = array();

		$this->model->onSave($form);

//		foreach ($this->model->getFields() as $field) {
//			$field->onSave($form);
//		}
		//if there uploaded files with names of model field, store them

		if ($form['id']) $this->model->saveFromForm($form);
		else $this->model->addFromForm($form);

        $url = $this->app->getUrl(strtolower($this->data['section']) . '_list');
        return $this->app->redirect($url);
	}
}
