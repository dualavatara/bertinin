<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 26.02.14
 * Time: 17:01
 */

namespace model;

use Lists\EditLinkField;
use Lists\PlaintextField;

require_once 'model/PhotoModel.php';
require_once 'admin/lib/AdminModel.php';

class Photo extends \AdminModel {
    public function __construct(\Admin\Application $app) {
        parent::__construct($app, new \PhotoModel($app['db']));

        $this->addField(new \Form\EditField($this->app, 'parent_id', 'Родитель', 50),
            new EditLinkField($this->app, 'parent_id', 'Родитель', 'photo'));
        $this->addField(new \Form\EditField($this->app, 'img', 'Изображение', 50),
            new EditLinkField($this->app, 'img', 'Изображение', 'photo'));
        $this->addField(new \Form\EditField($this->app, 'imgtn', 'Предпросмотр', 50),
            new EditLinkField($this->app, 'imgtn', 'Предпросмотр', 'photo'));
        $this->addField(new \Form\EditField($this->app, 'alt', 'Всплывающий текст', 50),
            new EditLinkField($this->app, 'alt', 'Всплывающий текст', 'photo'));
    }

} 