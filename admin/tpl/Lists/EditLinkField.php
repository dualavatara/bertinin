<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 27.02.14
 * Time: 18:32
 */

namespace Lists;

use Admin\Extension\Template\Template;
use Form\StdField;

class EditLinkField extends StdField {
    protected $section;

    public function __construct(\Admin\Application $app, $name, $label, $section) {
        parent::__construct($app, $name, $label);
        $this->section = $section;
    }

    protected function show($data, $content = null) {
        $value = '';
        $id = 0;
        if ($this->object) {
            $value = $this->object->{$this->name};
            $id = $this->object->id;
        }
        if($this->app['user']->checkRoute($this->section . '_edit'))
            $this->showLink($value, $this->section . '_edit', array('id' => $id));
        else echo $value;
    }

} 