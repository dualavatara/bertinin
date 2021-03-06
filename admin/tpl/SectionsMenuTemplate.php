<?php

use Admin\Extension\Template\Template;
use Admin\StdModel;

class SectionsMenuTemplate extends Template {

	public function show($data, $content = null) {
		$config = $this->app->getConfig();

		$section  = $data['section'];
		if (!isset($data['section'])) {
			throw new Exception('"Menu" or/and "Section" parameter in template is not defined.');
		}

		$sectionTitle = '';
		$sections = array();
        $routename = $this->app->getRouteName();
		$menuItem = $config->getMenuItem($routename)[1];

		if ($menuItem) foreach ($menuItem['sections'] as $name => $sectionItem) {
            if($this->app->getUser()->checkRoute($sectionItem['route'])) {
                $title = $sectionItem['title'];
                if (isset($section) && ($section == $name)) {
                    $sectionTitle = $title;
                    $title = '<span class="menuSelected">' . $title . '</span>';
                }
                $link = $this->getUrl($sectionItem['route'], $sectionItem['params'], true);
                $sections[] = sprintf('<a href="%s">%s</a>', $link, $title);
            }
		}

		print '<div class="breadcrumb">' . $menuItem['title'] . ($sectionTitle ? ' // ' . $sectionTitle : '');
        if ($data['model'] instanceof StdModel && $data['model']->getParentName()) print '//' . $data['model']->getParentName();
        print '</div>';
		
		print '<div class="menubar">' . implode(' :: ', $sections) . '</div>';
	}
}