<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 03.03.14
 * Time: 16:33
 */

namespace model;

require_once '/model/NavigationModel.php';

use Lists\EditLinkField;
use Model;

class Navigation extends \AdminModel{
    public function __construct(\Admin\Application $app) {
        parent::__construct($app, new \NavigationModel($app['db']));

        $this->addField(new \Form\EditField($this->app, 'name', 'Название', 50),
            new EditLinkField($this->app, 'name', 'Название', 'navigation'));
        $this->addField(new \Form\EditField($this->app, 'url', 'URL', 50),
            new EditLinkField($this->app, 'url', 'URL', 'navigation'));
    }
} 