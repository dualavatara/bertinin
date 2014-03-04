<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 03.03.14
 * Time: 16:33
 */

namespace model;

require_once '/model/NavigationModel.php';

use Form\SelectField;
use Lists\ChildrenField;
use Lists\EditLinkField;
use Lists\PlaintextField;
use Lists\ValueLinkField;
use Model;

class Navigation extends \AdminModel{
    public function __construct(\Admin\Application $app) {
        parent::__construct($app, new \NavigationModel($app['db']));

        $this->addField(new \Form\EditField($this->app, 'name', 'Название', 'navigation', 50),
            new EditLinkField($this->app, 'name', 'Название', 'navigation'));

        $this->addField(new \Form\EditField($this->app, 'url', 'URL', 'navigation', 50),
            new ValueLinkField($this->app, 'url', 'URL', 'navigation'));

        $this->addField(new SelectField($this->app, 'target', 'Тип перехода', 'navigation', array(
                '_self' => '_self',
                '_blank' => '_blank'
            )),
            new PlaintextField($this->app, 'target', 'Тип перехода', 'navigation'));

        $this->addField(new \Form\EditField($this->app, 'ord', 'Порядок', 'navigation', 5),
            new PlaintextField($this->app, 'ord', 'Порядок', 'navigation'));

        $this->addField(null, new ChildrenField($this->app, 'parent_id', 'Порядок', 'navigation'));
    }

    public function onList($request) {
        $this->getModel()->get()->all()->order('ord', 1)->exec();
    }


} 