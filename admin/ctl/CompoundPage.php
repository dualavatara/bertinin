<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 06.03.14
 * Time: 12:04
 */

namespace ctl;


use Admin\StdController;

class CompoundPage extends StdController{
    public function __construct(\Admin\Application $app) {
        parent::__construct($app, new \model\CompoundPage($app));
    }

} 