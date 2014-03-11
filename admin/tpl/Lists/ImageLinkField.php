<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 05.03.14
 * Time: 16:02
 */

namespace Lists;


use Form\StdField;

class ImageLinkField extends StdField{
    protected function show($data, $content = null) {
        $params = $data['model']->getUrlParams();

        $value = '';
        $id = 0;
        if ($this->object) {
            $value = $this->object->{$this->name};
            $id = $this->object->id;
        }
        if($this->app->getUser()->checkRoute($this->section . '_edit')) {
            $params['id'] = $id;
            $value = '<img src="' . $value . '" style="max-width: 200px">';
            $this->showLink($value, $this->section . '_edit', $params);
        }
        else echo $value;
    }

} 