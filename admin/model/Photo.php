<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 26.02.14
 * Time: 17:01
 */

namespace model;

use Form\HiddenField;
use Lists\EditLinkField;
use Lists\PlaintextField;

require_once 'model/PhotoModel.php';
require_once 'admin/lib/AdminModel.php';

class Photo extends \AdminModel {
    public function __construct(\Admin\Application $app) {
        parent::__construct($app, new \PhotoModel($app['db']));

        $this->addField(new HiddenField($this->app, 'parent_id', 'Родитель', 'navigation', $_REQUEST['parent_id']),
            new PlaintextField($this->app, 'parent_id', 'Родитель', 'photo'));
        $this->addField(new \Form\EditField($this->app, 'img', 'Изображение', 'photo', 50),
            new EditLinkField($this->app, 'img', 'Изображение', 'photo'));
        $this->addField(new \Form\EditField($this->app, 'imgtn', 'Предпросмотр', 'photo', 50),
            new EditLinkField($this->app, 'imgtn', 'Предпросмотр', 'photo'));
        $this->addField(new \Form\EditField($this->app, 'alt', 'Всплывающий текст', 'photo', 50),
            new PlaintextField($this->app, 'alt', 'Всплывающий текст', 'photo'));
    }

} 