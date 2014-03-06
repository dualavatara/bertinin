<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 26.02.14
 * Time: 17:01
 */

namespace model;

use Form\HiddenField;
use Form\ImageField;
use Lists\EditLinkField;
use Lists\ImageLinkField;
use Lists\PlaintextField;
use Lists\ValueLinkField;

require_once 'model/PhotoModel.php';

class Photo extends \Admin\StdModel {
    public function __construct(\Admin\Application $app, $model = null, $section = 'photo', $parentSection = 'navigation') {
        $nmodel = $model ? $model : new \PhotoModel($app['db']);
        parent::__construct($app, $nmodel);

        $this->addField(new HiddenField($this->app, 'parent_id', 'Родитель', $parentSection, $_REQUEST['parent_id']),
            null);
        $this->addField(new \Form\EditField($this->app, 'alt', 'Всплывающий текст', $section, 50),
            new EditLinkField($this->app, 'alt', 'Всплывающий текст', $section));
        $this->addField(new ImageField($this->app, 'imgtn', 'Предпросмотр', $section),
            new ImageLinkField($this->app, 'imgtn', 'Предпросмотр', $section));
        $this->addField(new ImageField($this->app, 'img', 'Изображение', $section),
            new ValueLinkField($this->app, 'img', 'Изображение', $section));
        $this->addField(new \Form\EditField($this->app, 'ord', 'Порядок', $section, 50),
            new PlaintextField($this->app, 'ord', 'Порядок', $section));
    }

    public function onList(\Admin\Request $request) {
        if ($this->getParentId()) {
            $this->getModel()->get()->filter($this->getModel()->filterExpr()->eq('parent_id', $this->getParentId()))->order('ord', 1)->exec();
        } else $this->getModel()->get()->all()->order('ord', 1)->exec();
    }

    public function onSave(\Admin\Request $request) {
        $form = $request['form'];
        foreach ($_FILES as $key => $fparam) {
            foreach ($form as $fkey => $fvalue) {
                if ($fkey == $key) {
                    $is = new \ImageStorage(getcwd() . '/../');
                    $imgkey = $is->storeImage($key);
                    if ($imgkey) $form[$fkey] = $imgkey;
                }
            }
        }
        return $form;
    }
} 