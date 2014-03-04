<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 27.02.14
 * Time: 18:17
 */

namespace Form;

use Admin\Extension\Template\Template;

/**
 * Class StdField
 * @package Form
 */
abstract class StdField extends Template {
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $label;

    /**
     * @var
     */
    protected $object;
    /**
     * @var
     */
    protected $section;

    /**
     * @param mixed $object
     */
    public function setObject($object) {
        $this->object = $object;
    }

    /**
     * @param \Admin\Application $app
     * @param $name
     * @param $label
     * @param $section
     */
    public function __construct(\Admin\Application $app, $name, $label, $section) {
        parent::__construct($app);
        $this->name = $name;
        $this->label = $label;
        $this->section = $section;
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