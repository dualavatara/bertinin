<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 26.02.14
 * Time: 16:58
 */

namespace ctl;

require_once 'admin/lib/StdController.php';

class Photo extends \Admin\StdController {
    public function __construct(\Admin\Application $app) {
        parent::__construct($app, new \model\Photo($app));
    }
} 