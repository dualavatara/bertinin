<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 04.03.14
 * Time: 17:50
 */

namespace ctl;


use Admin\Controller;
use Admin\StdController;

class Article extends StdController{
    public function __construct(\Admin\Application $app) {
        parent::__construct($app, new \model\Article($app));
    }
}