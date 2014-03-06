<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 06.03.14
 * Time: 11:59
 */

class CompoundPageModel extends Model{
    public function __construct(IDatabase $db) {
        parent::__construct('compound_page', $db);

        $this->field(new CharField('title'));
        $this->field(new CharField('description'));
        $this->field(new CharField('keywords'));
        $this->field(new CharField('alias'));
    }
}