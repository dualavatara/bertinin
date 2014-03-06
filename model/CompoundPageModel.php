<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 06.03.14
 * Time: 11:59
 */

require_once 'model/WebpageModel.php';
require_once 'model/CompoundPhotoModel.php';
require_once 'model/CompoundLeadModel.php';

class CompoundPageModel extends WebpageModel{
    public function __construct(IDatabase $db) {
        parent::__construct('compound_page', $db);
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