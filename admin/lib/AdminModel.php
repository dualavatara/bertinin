<?php
/**
 * User: zhukov
 * Date: 28.02.12
 * Time: 20:53
 */

require_once '../admin/lib/IAdminModel.php';
require_once '../lib/filter.lib.php';

use Admin\Extension\Template\Template;

abstract class AdminModel implements IAdminModel {
	/**
	 * @var Model
	 */
	private $model;
	/**
	 * @var Template[]
	 */
	private $fields = array();

    /**
     * @var Admin\Application
     */
    protected $app;

    /**
     * ID of parent object for chil list
     * @var
     */
    protected $parentId;

    /**
     * @return mixed
     */
    public function getParentId() {
        return $this->parentId;
    }

    /**
     * @return mixed
     */
    public function getParentName() {
        return $this->parentName;
    }

    /**
     * Human readable parent`s name for list title
     * @var
     */
    protected $parentName;

    /**
     * Parent_id of a parent. For navigation to upper list
     * @var
     */
    protected $parentParentId;

    /**
     * @return mixed
     */
    public function getParentParentId() {
        return $this->parentParentId;
    }

	/**
	 * @param Model $model
	 */
	public function __construct(\Admin\Application $app, Model $model) {
		$this->model = $model;
        $this->app = $app;
	}

    /**
     * @param $parentId
     * @param $parentSection
     * @param string $parentName
     */
    public function setParent($parentId, $parentName = '') {
        $this->parentId = $parentId;
        $this->parentName = $parentName;
    }

    /**
     * @param $formfield
     * @param $listfield
     */
    public function addField($formfield,  $listfield) {
        $this->fields[] = array('formfield' => $formfield, 'listfield' => $listfield);
    }

    /**
     * @return \Admin\Extension\Template\Template[]
     */
    public function getFields() { return $this->fields; }

    /**
     * Generate array witl params for use in getUrl function
     */
    public function getUrlParams() {
        $params = $this->parentId ?
            array('parent_id' => $this->parentId)
            : array();
        return $params;
    }
    /**
     * Called before action`s call on controller: do_list, do_edit, do_save etc.
     * @param \Admin\Request $request
     */
    public function onAction(\Admin\Request $request) {
        if ($request['parent_id']) {
            $this->getModel()->get($request['parent_id'])->exec();
            $parentName = $this->getModel()->count() ? $this->getModel()[0]->name : '';
            $this->parentParentId = $this->getModel()->count() ? $this->getModel()[0]->parent_id : '';
            $this->setParent($request['parent_id'], $parentName);
            $this->getModel()->clear();
        }
    }

    /**
     * @param $form
     */
    public function onSave(\Admin\Request $request) {}

	/**
	 * Select all object`s rows from database
	 */
	public function onList(\Admin\Request $request) {
		$this->getModel()->get()->all()->exec();
	}

	/**
	 * Adds new object record into database
	 * @param string $name
	 * @param string $sign
	 * @param float $value
	 */
	public function addFromForm($form) {
		$this->model->clear();
		$this->model[0] = $form;
		unset($this->model->data[0]['id']);
		$this->model->insert()->exec();
	}

	/**
	 * Selects object by id
	 * @param $id
	 * @return mixed    array if found, otherwise false
	 */
	public function getById($id) {
		$this->model->get($id)->exec();
		if ($this->model->count()) return $this->model[0]->all();
		return false;
	}

	/**
	 * Saves single object from form array as array('field' => 'value', ...)
	 * $form['id'] is required
	 * @param array $form
	 */
	public function saveFromForm($form) {
		if (isset($form['id'])) {
			$this->model->clear();
			$this->model[0] = $form;
			$this->model->update()->exec();
		}
	}

	/**
	 * Deletes object by id
	 * @param $id
	 */
	public function delById($id) {
		$this->model->get($id)->delete()->exec();
	}

	/**
	 * @return \Model
	 */
	public function getModel() {
		return $this->model;
	}
}

