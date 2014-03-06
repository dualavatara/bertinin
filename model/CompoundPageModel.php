<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 06.03.14
 * Time: 11:59
 */

require_once 'model/CompoundPhotoModel.php';
require_once 'model/CompoundLeadModel.php';

class CompoundPageModel extends Model{
    public function __construct(IDatabase $db) {
        parent::__construct('compound_page', $db);

        $this->field(new CharField('title'));
        $this->field(new CharField('description'));
        $this->field(new CharField('keywords'));
        $this->field(new CharField('alias'));
    }

    public function getAliased($alias) {
        $this->get()->filter($this->filterExpr()->eq('alias', $alias))->exec();
        return $this->count();
    }

    public function getPhotos($id) {
        $m = new CompoundPhotoModel($this->db);
        $m->get()->filter($m->filterExpr()->eq('parent_id', $id))->order('ord', 1)->exec();
        return $m;
    }

    public function getLeads($id) {
        $m = new CompoundLeadModel($this->db);
        $m->get()->filter($m->filterExpr()->eq('parent_id', $id))->order('ord', 1)->exec();
        return $m;
    }
}