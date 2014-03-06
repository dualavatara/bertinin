<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 06.03.14
 * Time: 12:27
 */

namespace model;

require_once 'model/CompoundPhotoModel.php';

class CompoundPhoto extends Photo{
    public function __construct(\Admin\Application $app) {
        parent::__construct($app, new \CompoundPhotoModel($app['db']), 'compoundphoto', 'compoundpage');
    }

} 