<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 06.03.14
 * Time: 15:09
 */

require_once 'lib/model.lib.php';

class WebpageModel extends Model {

    public function __construct($table, IDatabase $db) {
        parent::__construct($table, $db);

        $this->field(new CharField('title'));
        $this->field(new CharField('description'));
        $this->field(new CharField('keywords'));
        $this->field(new CharField('alias'));
    }

    public function getAliased($alias) {
        $this->get()->filter($this->filterExpr()->eq('alias', $alias))->exec();
        return $this->count();
    }
} 