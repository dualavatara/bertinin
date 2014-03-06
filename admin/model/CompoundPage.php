<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 06.03.14
 * Time: 12:05
 */

namespace model;

require_once 'model/CompoundPageModel.php';

use Lists\ChildListLinkField;
use Lists\EditLinkField;
use Lists\PlaintextField;
use Lists\ValueLinkField;
use Model;

class CompoundPage extends Webpage{
    public function __construct(\Admin\Application $app) {
        parent::__construct($app, new \CompoundPageModel($app['db']), 'compoundpage');

        $this->addField(null,
            new ChildListLinkField($this->app, 'parent_id', 'Фотографии', 'compoundphoto', 'compoundpage'));

        $this->addField(null,
            new ChildListLinkField($this->app, 'parent_id', 'Лиды', 'compoundlead', 'compoundpage'));
    }

} 