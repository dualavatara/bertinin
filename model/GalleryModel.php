<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 06.03.14
 * Time: 15:12
 */

require_once 'model/WebpageModel.php';

class GalleryModel extends WebpageModel {
    public function __construct(IDatabase $db) {
        parent::__construct('gallery', $db);

        $this->field(new FlagsField('flags'));
    }

    public function getPhotos($id) {
        $m = new CompoundPhotoModel($this->db);
        $m->get()->filter($m->filterExpr()->eq('parent_id', $id))->order('ord', 1)->exec();
        return $m;
    }
} 