<?php
namespace model;

use Lists\EditLinkField;
use Lists\PlaintextField;

require_once 'model/SettingModel.php';

class Setting extends \Admin\StdModel {
	/**
	 * @param IDatabase $db
	 */
	public function __construct(\Admin\Application $app) {
		parent::__construct($app, new \SettingModel($app['db']));
		$this->noEscape = true;

        $this->addField(new \Form\EditField($this->app, 'name', 'Опция', 'setting', 50),
        new EditLinkField($this->app, 'name', 'Опция', 'setting'));
        $this->addField(new \Form\EditField($this->app, 'varname', 'Переменная', 'setting', 30),
            new PlaintextField($this->app, 'varname', 'Переменная', 'setting'));
        $this->addField(new \Form\EditField($this->app, 'value', 'Значение', 'setting', 30),
            new PlaintextField($this->app, 'value', 'Значение', 'setting'));
	}
}
