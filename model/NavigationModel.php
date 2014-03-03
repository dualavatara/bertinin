<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 03.03.14
 * Time: 16:25
 */

class NavigationModel extends Model {
    public function __construct(IDatabase $db) {
        parent::__construct("navigation", $db);

        $this->field(new IntField('ord'));
        $this->field(new IntField('parent_id'));
        $this->field(new CharField('name'));
        $this->field(new CharField('url'));
        $this->field(new CharField('target'));
        $this->field(new FlagsField('flags'));
    }
}