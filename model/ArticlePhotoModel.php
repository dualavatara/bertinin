<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 26.02.14
 * Time: 16:30
 */
require_once 'lib/model.lib.php';
require_once 'model/PhotoModel.php';

class ArticlePhotoModel extends PhotoModel {
    public function __construct(IDatabase $db) {
        parent::__construct($db);
        $this->table = 'article_photo';
    }
}