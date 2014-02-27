<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 26.02.14
 * Time: 17:58
 */

namespace Photo;

use Admin\Extension\Template\Template;

class ListTemplate extends Template {
    public function __construct(\Admin\Application $app) {
        parent::__construct($app);
        $this->setParent('Layout');
    }

    protected function show($data, $content = null) {
        $this->showLink('[Добавить]','photo_add');
    }

} 