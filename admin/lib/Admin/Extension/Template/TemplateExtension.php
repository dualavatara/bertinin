<?php

namespace Admin\Extension\Template;

use Admin\Application;
use Admin\ExtensionInterface;

class TemplateExtension implements ExtensionInterface {
	
	public function register(Application $app) {
        $config = $app->getConfig();
        $template = new TemplateEngine($app, $config['template.options']);

        $app->setTemplateEngine($template);
	}
} 