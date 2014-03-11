<?php

namespace Admin\Extension\Template;

use Admin\Application;

abstract class Template {
	
	/**
	 * @var \Admin\Application
	 */
	protected $app;
    /**
     * @var Template[]
     */
    protected $fields;
    /**
     * @var string
     */
    protected $section;
    private $parent;

	public function __construct(Application $app) {
		$this->app = $app;
	}

    /**
     * @param $fields
     */
    public function setFields($fields) {
        $this->fields = $fields;
    }

	final public function render($data, $content = null) {
		ob_start();
		$this->show($data, $content);
		$content = ob_get_clean();

		if ($this->parent) {
			return $this->app->getTemplateEngine()->render($this->parent, $data, $content);
		}

		return $content;
	}
	
	abstract protected function show($data, $content = null);
	
	final public function insertTemplate($templateClass, $data = array()) {
		echo $this->app->getTemplateEngine()->render($templateClass, $data);
	}
	
    public function showLink($name, $routeName, $params = array(), $attribute='', $noSessionParams = false) {
       if($this->app->getUser()->checkRoute($routeName)){
            if($url = $this->getUrl($routeName, $params, $noSessionParams)){
                echo '<a href="'.$url.'" '.$attribute.'>'.$name.'</a>';
            }
        }
    }

	final public function getUrl($routeName, $params = array()) {
		return $this->app->getUrl($routeName, $params);
	}

	public function toParentLink() {
		if ($_REQUEST['from_route']) {
			echo '<a href="'.$_REQUEST['from_route'].'">[К родителю]</a>';
		}
	}

    protected function setParent($parent) {
		$this->parent = $parent;
	}
}