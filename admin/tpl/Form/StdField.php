<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 27.02.14
 * Time: 18:17
 */

namespace Form;

use Admin\Extension\Template\Template;

abstract class StdField extends Template {
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $label;

    protected $object;

    /**
     * @param mixed $object
     */
    public function setObject($object) {
        $this->object = $object;
    }

    public function __construct(\Admin\Application $app, $name, $label) {
        parent::__construct($app);
        $this->name = $name;
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function getLabel() {
        return $this->label;
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

} 