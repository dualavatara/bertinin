<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 06.03.14
 * Time: 12:25
 */

require_once 'model/PhotoModel.php';

class CompoundPhotoModel extends PhotoModel{
    public function __construct(IDatabase $db) {
        parent::__construct($db);
        $this->table = 'compound_photo';
    }
} 