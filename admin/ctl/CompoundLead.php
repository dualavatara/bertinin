<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 06.03.14
 * Time: 13:17
 */

namespace ctl;


use Admin\Controller;
use Admin\StdController;

class CompoundLead extends StdController {
    public function __construct(\Admin\Application $app) {
        parent::__construct($app, new \model\CompoundLead($app));
    }

} 