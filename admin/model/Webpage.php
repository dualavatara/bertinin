<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 06.03.14
 * Time: 15:19
 */

namespace model;


use Admin\Application;
use Admin\StdModel;
use Form\EditField;
use Lists\EditLinkField;
use Lists\PlaintextField;
use Lists\ValueLinkField;
use Model;

class Webpage extends StdModel {
    public function __construct(Application $app, Model $model, $section) {
        parent::__construct($app, $model, $section);

        $this->addField(new EditField($this->app, 'title', 'Заголовок', $section, 150),
            new EditLinkField($this->app, 'title', 'Заголовок', $section));

        $this->addField(new EditField($this->app, 'description', 'Описание', $section, 150),
            new PlaintextField($this->app, 'description', 'Описание', $section));

        $this->addField(new EditField($this->app, 'keywords', 'Ключевые слова', $section, 150),
            new PlaintextField($this->app, 'keywords', 'Ключевые слова', $section));

        $this->addField(new EditField($this->app, 'alias', 'Ссылка', 'article', 150),
            new ValueLinkField($this->app, 'alias', 'Ссылка', $section));

    }

} 