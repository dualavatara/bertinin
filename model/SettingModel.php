<?php
/**
 * User: dualavatara
 * Date: 3/3/12
 * Time: 10:56 PM
 */

require_once 'lib/model.lib.php';
require_once 'lib/singletone.lib.php';

class Settings extends Singletone {
	/**
	 * @var SettingModel
	 */
	private $model;

	/**
	 * @param \SettingModel $model
	 */
	public function set(SettingModel $model) {
		$this->model = $model;
		$model->get()->all()->exec();
	}

	/**
	 * @return SettingModel
	 */
	public function get() {
		return $this->model;
	}
}
/**
 *
 */
class SettingModel extends Model {
	/**
	 * @param IDatabase $db
	 */
	public function __construct(IDatabase $db) {
		parent::__construct('settings', $db);

		$this->field(new CharField('name'));
		$this->field(new CharField('varname'));
		$this->field(new Charfield('value',Field::STRIP_SLASHES));
	}
}
