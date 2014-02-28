<?php

namespace ctl;

require_once '../model/adminlogs.model.php';

class Logs extends \Admin\Controller {

	private $data = array(
		'menu' => 'sys',
		'section' => 'Logs'
	);


	public function do_list() {
		$model = new \AdminLogsModel($this->app['db']);
		$model->get()->all()->order('ts', true)->exec();

		$this->data['model'] = $model;

		return $this->app['template']->render('Logs\ListTemplate', $this->data);
	}
}