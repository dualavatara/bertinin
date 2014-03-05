<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 04.03.14
 * Time: 17:42
 */

require_once 'model/ArticlePhotoModel.php';

class ArticleModel extends Model {
    public function __construct(IDatabase $db) {
        parent::__construct('article', $db);

        $this->field(new CharField('title'));
        $this->field(new CharField('description'));
        $this->field(new CharField('keywords'));
        $this->field(new CharField('note'));
        $this->field(new CharField('alias'));
    }

    public function getAliased($alias) {
        $this->get()->filter($this->filterExpr()->eq('alias', $alias))->exec();
        return $this->count();
    }

    public function getPhotos($id) {
        $m = new ArticlePhotoModel($this->db);
        $m->get()->filter($m->filterExpr()->eq('parent_id', $id))->order('ord', 1)->exec();
        return $m;
    }
} 