<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 05.03.14
 * Time: 14:44
 */

namespace ctl;

use Admin\StdController;

class ArticlePhoto extends StdController{
    public function __construct(\Admin\Application $app) {
        parent::__construct($app, new \model\ArticlePhoto($app));
    }

} 