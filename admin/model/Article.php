<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 04.03.14
 * Time: 17:51
 */

namespace model;

require_once 'model/ArticleModel.php';

use Form\RichEditField;
use Lists\ChildListLinkField;
use Lists\EditLinkField;
use Lists\PlaintextField;
use Lists\ValueLinkField;
use Model;

class Article extends \Admin\StdModel{
    public function __construct(\Admin\Application $app) {
        parent::__construct($app, new \ArticleModel($app['db']));

        $this->addField(new \Form\EditField($this->app, 'title', 'Заголовок', 'article', 150),
            new EditLinkField($this->app, 'title', 'Заголовок', 'article'));

        $this->addField(new \Form\EditField($this->app, 'description', 'Описание', 'article', 150),
            new PlaintextField($this->app, 'description', 'Описание', 'article'));

        $this->addField(new \Form\EditField($this->app, 'keywords', 'Ключевые слова', 'article', 150),
            new PlaintextField($this->app, 'keywords', 'Ключевые слова', 'article'));

        $this->addField(new RichEditField($this->app, 'note', 'Текст статьи', 'article', '750pt'),
            null);

        $this->addField(new \Form\EditField($this->app, 'alias', 'Ссылка', 'article', 150),
            new ValueLinkField($this->app, 'alias', 'Ссылка', 'article'));

        $this->addField(null,
            new ChildListLinkField($this->app, 'parent_id', 'Фотографии', 'articlephoto', 'article'));
    }

} 