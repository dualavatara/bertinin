<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 06.03.14
 * Time: 15:15
 */

namespace model;

require_once 'model/GalleryModel.php';

use Admin\Application;
use Lists\ChildListLinkField;
use Model;

class Gallery extends Webpage{
    public function __construct(Application $app) {
        parent::__construct($app, new \GalleryModel($app['db']), 'gallery');

        $this->addField(null,
            new ChildListLinkField($this->app, 'parent_id', 'Фотографии', 'galleryphoto', 'gallery'));
    }
} 