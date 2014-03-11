<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 27.02.14
 * Time: 18:32
 */

namespace Lists;

use Form\StdField;

/**
 * Class EditLinkField
 * @package Lists
 */
class EditLinkField extends StdField {
    /**
     * @param $data
     * @param null $content
     */
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
            $this->showLink($value, $this->section . '_edit', $params);
        }
        else echo $value;
    }

} 