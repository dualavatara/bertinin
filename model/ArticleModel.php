<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 04.03.14
 * Time: 17:42
 */

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

} 