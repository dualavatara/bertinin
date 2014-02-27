<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 26.02.14
 * Time: 17:01
 */

namespace model;

use Model;

require_once 'model/PhotoModel.php';
require_once 'admin/lib/AdminModel.php';

class Photo extends \AdminModel {
    public function __construct(\Admin\Application $app) {
        parent::__construct($app, new \PhotoModel($app['db']));
    }

} 