<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 06.03.14
 * Time: 13:11
 */

namespace model;

require_once 'model/CompoundLeadModel.php';

use Admin\Application;
use Admin\StdModel;
use Form\EditField;
use Form\HiddenField;
use Form\RichEditField;
use Lists\EditLinkField;
use Lists\PlaintextField;
use Lists\ValueLinkField;
use Model;

class CompoundLead extends StdModel {
    public function __construct(Application $app) {
        parent::__construct($app, new \CompoundLeadModel($app['db']));

        $this->addField(new HiddenField($this->app, 'parent_id', 'Родитель', 'compoundpage', $_REQUEST['parent_id']),
            null);

        $this->addField(new EditField($app, 'title', 'Подзаголовок', 'compoundlead', 50),
            new EditLinkField($app, 'title', 'Подзаголовок', 'compoundlead'));

        $this->addField(new EditField($app, 'url', 'Ссылка', 'compoundlead', 50),
            new ValueLinkField($app, 'url', 'Ссылка', 'compoundlead'));

        $this->addField(new RichEditField($app, 'note', 'Текст', 'compoundlead', 550),
            new PlaintextField($app, 'note', 'Текст', 'compoundlead'));

        $this->addField(new \Form\EditField($this->app, 'ord', 'Порядок', 'compoundlead', 50),
            new PlaintextField($this->app, 'ord', 'Порядок', 'compoundlead'));
    }

    public function onList(\Admin\Request $request) {
        if ($this->getParentId()) {
            $this->getModel()->get()->filter($this->getModel()->filterExpr()->eq('parent_id', $this->getParentId()))->order('ord', 1)->exec();
        } else $this->getModel()->get()->all()->order('ord', 1)->exec();
    }
}

