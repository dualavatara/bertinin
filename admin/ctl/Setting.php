<?php
namespace ctl;

use Admin\StdController;

class Setting extends StdController {
	public function __construct(\Admin\Application $app) {
		parent::__construct($app, new \model\Setting($app));
	}

}