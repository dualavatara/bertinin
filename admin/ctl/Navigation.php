<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 03.03.14
 * Time: 16:32
 */

namespace ctl;

use Admin\Controller;
use Admin\StdController;

class Navigation extends StdController {
    public function __construct(\Admin\Application $app) {
        parent::__construct($app, new \model\Navigation($app));
    }

}