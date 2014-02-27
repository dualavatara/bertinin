<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 27.02.14
 * Time: 17:14
 */

use Admin\Extension\Template\ModelTemplate;

class ListModelTemplate extends ModelTemplate {
    protected function show($data, $content = null) {
        parent::show($data, $content);
        $form = new \Lists\StdListTemplate($this->app, $this->model->getModel(), strtolower($data['section']));
        $form->setFields($this->model->getFields());
        $form->show($data, $content);
    }
} 