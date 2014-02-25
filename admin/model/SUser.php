<?php
namespace model;

require_once '../model/SUserModel.php';
require_once '../admin/lib/AdminModel.php';

class SUser extends \AdminModel {
    /**
     * @param \IDatabase $db
     */
    public function __construct(\IDatabase $db) {

        parent::__construct(new \SUserModel($db));

        //$this->fields['id'] = new \DefaultAdminField('id','Id', true, true, true);
        $this->fields['login'] = new \DefaultAdminField('login','Логин', true, true);
        $this->fields['password'] = new \DefaultAdminField('password','Пароль', true, true);
        $this->fields['name'] = new \DefaultAdminField('name','Имя', true, true, true);
        $this->fields['company_name'] = new \DefaultAdminField('company_name','Название компании', true, true, true);
        $this->fields['mid'] = new \DefaultAdminField('mid','Менеджер', true, true, true);
        $this->fields['type'] = new \DefaultAdminField('type','Тип', true, true, true);
    }
}