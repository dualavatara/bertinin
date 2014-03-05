<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 04.03.14
 * Time: 11:35
 */

namespace Lists;

use Form\StdField;

class ChildListLinkField extends StdField{
    protected $parent_section;

    public function __construct(\Admin\Application $app, $name, $label, $section, $parent_section) {
        parent::__construct($app, $name, $label, $section);
        $this->parent_section = $parent_section;
    }

    protected function show($data, $content = null) {
           $value = '';
           $id = 0;
           if ($this->object) {
               $value = $this->object->{$this->name};
               $id = $this->object->id;
           }
           if($this->app->getUser()->checkRoute($this->section . '_list'))
               $this->showLink('список', $this->section . '_list', array('parent_id' => $id, 'parent_section' => $this->parent_section));
           else echo $value;
    }
}