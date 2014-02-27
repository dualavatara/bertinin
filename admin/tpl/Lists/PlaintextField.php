<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 27.02.14
 * Time: 18:30
 */

namespace Lists;

use Form\StdField;

class PlaintextField extends StdField{

    protected function show($data, $content = null) {
        $value = '';
        if ($this->object) {
            $value = $this->object->{$this->name};
        }

        echo $value;
    }
}