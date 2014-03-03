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

		$view = $this->disp->di()->IndexView();
        $view->navmodel = $this->navmodel;
		return $view;
	}

	public function setLang() {
        \Session::obj()->lang = strtolower( ltrim($_SERVER['REQUEST_URI'],'/') );
        return $this->disp->redirect($this->disp->getReferer());
	}
}
