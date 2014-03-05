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

    public function do_action(Request $request) {
        parent::do_action($request);
        $this->model->onAction($request);
    }


    public function do_add() {
		$this->data['model'] = $this->model;
        $formTemplate = $this->objectName ? $this->objectName.'\FormTemplate' : 'FormModelTemplate';
		return $this->app->getTemplateEngine()->render($formTemplate, $this->data);
	}

	public function do_delete(\Admin\Request $request) {
		$id = $request['id'];

		$fixed = array();
		$m = $this->model->getModel();
		if (method_exists($m, 'fixedIds')) {
			$fixed = $m->fixedIds();
		}
		if (!in_array($id, $fixed)) $this->model->delById($id);

        $url = $this->app->getUrl(strtolower($this->data['section']) . '_list', $this->model->getUrlParams());
        return $this->app->redirect($url);
	}

	public function do_edit(\Admin\Request $request) {
		$id = $request['id'];

		if (!$this->model->getById($id)) {
			return $this->app->error404();
		}

		$this->data['model'] = $this->model;

        $formTemplate = $this->objectName ? $this->objectName.'\FormTemplate' : 'FormModelTemplate';
        return $this->app->getTemplateEngine()->render($formTemplate, $this->data);
	}

	public function do_list(\Admin\Request $request = null) {
        $this->model->getModel()->fUseInQuery = true;
		$this->model->onList($request);

		$this->data['model'] = $this->model;
        $this->model->getModel()->fUseInQuery = false;

        $listTemplate = $this->objectName ? $this->objectName.'\ListTemplate' : 'ListModelTemplate';
        return $this->app->getTemplateEngine()->render($listTemplate, $this->data);
	}

	public function do_save($request) {
		$form = $request['form'];

		$this->model->onSave($request);

		if ($form['id']) $this->model->saveFromForm($form);
		else $this->model->addFromForm($form);

        $url = $this->app->getUrl(strtolower($this->data['section']) . '_list', $this->model->getUrlParams());
        return $this->app->redirect($url);
	}
}
