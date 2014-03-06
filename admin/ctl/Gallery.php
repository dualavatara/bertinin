<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 06.03.14
 * Time: 15:29
 */

namespace ctl;


use Admin\Controller;
use Admin\StdController;

class Gallery extends StdController{
    public function __construct(\Admin\Application $app) {
        parent::__construct($app, new \model\Gallery($app));
    }

} 