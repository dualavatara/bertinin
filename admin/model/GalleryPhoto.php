<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 06.03.14
 * Time: 15:34
 */

namespace model;

require_once 'model/GalleryPhotoModel.php';

class GalleryPhoto extends Photo{
    public function __construct(\Admin\Application $app) {
        parent::__construct($app, new \GalleryPhotoModel($app['db']), 'galleryphoto', 'gallery');
    }
} 