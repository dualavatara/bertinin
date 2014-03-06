<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 05.03.14
 * Time: 14:45
 */

namespace model;

require_once 'model/ArticlePhotoModel.php';

use Model;

class ArticlePhoto extends Photo {
    public function __construct(\Admin\Application $app) {
        parent::__construct($app, new \ArticlePhotoModel($app['db']), 'articlephoto', 'article');
    }
}