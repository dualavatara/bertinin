<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 06.03.14
 * Time: 15:35
 */

namespace ctl;

use Admin\StdController;

class GalleryPhoto extends StdController{
    public function __construct(\Admin\Application $app) {
        parent::__construct($app, new \model\GalleryPhoto($app));
    }

} 