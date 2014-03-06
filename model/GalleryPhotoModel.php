<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 06.03.14
 * Time: 15:33
 */

require_once 'model/PhotoModel.php';

class GalleryPhotoModel extends PhotoModel {
    public function __construct(IDatabase $db) {
        parent::__construct($db);
        $this->table = 'gallery_photo';
    }

} 