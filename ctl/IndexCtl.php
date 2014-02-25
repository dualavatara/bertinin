<?php
/**
 * User: dualavatara
 * Date: 3/9/12
 * Time: 7:48 PM
 */

namespace Ctl;

class IndexCtl extends BaseCtl {

	public function main() {

        if( isset($_SERVER['REQUEST_URI']) && in_array(ltrim($_SERVER['REQUEST_URI'],'/'),array('ru','en')) )
            echo $this->setLang();

		$tpl = $this->disp->di()->TemplateCtl($this->disp)->main();
		$view = $this->disp->di()->IndexView($tpl);
        $tpl->bodyClass = 'home index';
		$tpl->setMainContent($view->show());
		return $tpl;
	}

	public function setLang() {
        \Session::obj()->lang = strtolower( ltrim($_SERVER['REQUEST_URI'],'/') );
        return $this->disp->redirect($this->disp->getReferer());
	}

	static public function link($method, $params) {
		switch($method) {
			case 'main' : return '/';
			case 'setLang' : return '/lang' . '?' . http_build_query($params);
			default: throw new \NotFoundException();
		}
	}

}
