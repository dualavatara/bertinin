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

class CompoundPage extends \Admin\StdModel{
    public function __construct(\Admin\Application $app) {
        parent::__construct($app, new \CompoundPageModel($app['db']));

        $this->addField(new \Form\EditField($this->app, 'title', 'Заголовок', 'compoundpage', 150),
            new EditLinkField($this->app, 'title', 'Заголовок', 'compoundpage'));

        $this->addField(new \Form\EditField($this->app, 'description', 'Описание', 'compoundpage', 150),
            new PlaintextField($this->app, 'description', 'Описание', 'compoundpage'));

        $this->addField(new \Form\EditField($this->app, 'keywords', 'Ключевые слова', 'compoundpage', 150),
            new PlaintextField($this->app, 'keywords', 'Ключевые слова', 'compoundpage'));

        $this->addField(new \Form\EditField($this->app, 'alias', 'Ссылка', 'article', 150),
            new ValueLinkField($this->app, 'alias', 'Ссылка', 'compoundpage'));

        $this->addField(null,
            new ChildListLinkField($this->app, 'parent_id', 'Фотографии', 'compoundphoto', 'compoundpage'));

        $this->addField(null,
            new ChildListLinkField($this->app, 'parent_id', 'Лиды', 'compoundlead', 'compoundpage'));
    }

} 