<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 05.03.14
 * Time: 14:45
 */

namespace model;

require_once 'model/ArticlePhotoModel.php';

use Form\HiddenField;
use Form\ImageField;
use Lists\EditLinkField;
use Lists\ImageLinkField;
use Lists\ValueLinkField;
use Model;

class ArticlePhoto extends \AdminModel {
    public function __construct(\Admin\Application $app) {
        parent::__construct($app, new \ArticlePhotoModel($app['db']));

        $this->addField(new \Form\EditField($this->app, 'alt', 'Всплывающий текст', 'articlephoto', 50),
            new EditLinkField($this->app, 'alt', 'Всплывающий текст', 'articlephoto'));
        $this->addField(new HiddenField($this->app, 'parent_id', 'Родитель', 'navigation', $_REQUEST['parent_id']),
            null);
        $this->addField(new ImageField($this->app, 'imgtn', 'Предпросмотр', 'articlephoto'),
            new ImageLinkField($this->app, 'imgtn', 'Предпросмотр', 'articlephoto'));
        $this->addField(new ImageField($this->app, 'img', 'Изображение', 'articlephoto'),
            new ValueLinkField($this->app, 'img', 'Изображение', 'articlephoto'));

    }

    public function onList(\Admin\Request $request) {
        if ($this->getParentId()) {
            $this->getModel()->get()->filter($this->getModel()->filterExpr()->eq('parent_id', $this->getParentId()))->exec();
        } else $this->getModel()->get()->filter($this->getModel()->filterExpr()->eq('parent_id', 0))->exec();
    }

    public function onSave(\Admin\Request $request) {
        $form = $request['form'];
        foreach ($_FILES as $key => $fparam) {
            foreach ($form as $fkey => $fvalue) {
                if ($fkey == $key) {
                    $is = new \ImageStorage(getcwd() . '/../');
                    $imgkey = $is->storeImage($key);
                    if ($imgkey) $form[$fkey] = $imgkey;
                    $form[$fkey] = $imgkey;
                }
            }
        }
        return $form;
    }

}