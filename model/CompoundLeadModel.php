<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 06.03.14
 * Time: 13:09
 */
require_once 'lib/model.lib.php';

class CompoundLeadModel extends Model{
    public function __construct(IDatabase $db) {
        parent::__construct('compound_lead', $db);

        $this->field(new CharField('title'));
        $this->field(new CharField('url'));
        $this->field(new CharField('note'));
        $this->field(new IntField('parent_id'));
        $this->field(new IntField('ord'));
    }

} 