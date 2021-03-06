<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 04.03.14
 * Time: 17:42
 */

require_once 'model/WebpageModel.php';
require_once 'model/ArticlePhotoModel.php';

class ArticleModel extends WebpageModel {
    public function __construct(IDatabase $db) {
        parent::__construct('article', $db);

        $this->field(new CharField('note'));
    }

    public function getPhotos($id) {
        $m = new ArticlePhotoModel($this->db);
        $m->get()->filter($m->filterExpr()->eq('parent_id', $id))->order('ord', 1)->exec();
        return $m;
    }
} 