<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 26.02.14
 * Time: 16:30
 */
require_once 'lib/model.lib.php';

class PhotoModel extends Model {
    public function __construct(IDatabase $db) {
        parent::__construct('photo', $db);

        $this->field(new IntField('parent_id'));
        $this->field(new IntField('ord'));
        $this->field(new CharField('img'));
        $this->field(new CharField('imgtn'));
        $this->field(new CharField('alt'));
    }

} 