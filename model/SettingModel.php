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
	const PHONE		= 1;
	const PHONE_2		= 2;
	const FAX			= 3;
	const SKYPE			= 4;
	const ADDRESS		= 7;
	const EMAIL			= 9;
	const DESCRIPTION	= 10;
	const TITLE			= 11;
	const PER_PAGE		= 12;
	const SEOTEXT		= 13;
	const KEYWORDS		= 14;
	const CLOSED		= 15;
	const ERR404		= 16;
	/**
	 * @param IDatabase $db
	 */
	public function __construct(IDatabase $db) {
		parent::__construct('settings', $db);

		$this->field(new CharField('name'));
		$this->field(new CharField('varname'));
		$this->field(new Charfield('value',Field::STRIP_SLASHES));
	}

	/**
	 * @param $id
	 * @return null
	 */
	public function atId($id) {
		foreach($this as $w) if ($w->id == $id) return $w;
		return null;
	}

	public function setAtId($id,  $value) {
		$found = false;
		foreach($this->data as &$row) if ($row['id'] == $id) {
			$found = true;
			$row['value'] = $value;
		}

		if(!$found) {
			$this->data[] = array('value' => $value);
		}
		return null;
	}
}
