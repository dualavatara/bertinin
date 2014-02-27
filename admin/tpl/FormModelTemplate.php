<?php

use Admin\Extension\Template\ModelTemplate;

class FormModelTemplate extends ModelTemplate {
    protected function show($data, $content = null) {
        parent::show($data, $content);
        $form = new \Form\StdFormTemplate($this->app, $this->model->getModel()->count(), strtolower($data['section']), $this->model->getModel());
        $form->setFields($this->model->getFields());
        $form->show($data, $content);
    }
}