<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 06.03.14
 * Time: 12:43
 */

namespace ctl;


use Admin\StdController;

class CompoundPhoto extends StdController{
    public function __construct(\Admin\Application $app) {
        parent::__construct($app, new \model\CompoundPhoto($app));
    }

} 