<?php
/**
 * User: dualavatara
 * Date: 3/9/12
 * Time: 7:48 PM
 */

namespace Ctl;

require_once 'model/ArticleModel.php';
require_once 'model/CompoundPageModel.php';
require_once 'model/GalleryModel.php';

use View\ArticleView;
use View\CompoundView;
use View\GalleryView;
use View\Page4040View;

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

    public function page404() {
        $view = new Page4040View();
        $view->navmodel = $this->navmodel;
        return $view;
    }

    public function aliased($alias) {
        $view = new Page4040View();
        $view->navmodel = $this->navmodel;
        //First searching articles
        $articles = new \ArticleModel($this->disp->di()->PDODatabase());
        if ($articles->getAliased($alias)) {
            $view = new ArticleView();
            $view->article = $articles;
            $view->navmodel = $this->navmodel;
            return $view;
        }

        $compounds = new \CompoundPageModel($this->disp->di()->PDODatabase());
        if ($compounds->getAliased($alias)) {
            $view = new CompoundView();
            $view->compound = $compounds;
            $view->navmodel = $this->navmodel;
            return $view;
        }

        $galleries = new \GalleryModel($this->disp->di()->PDODatabase());
        if ($galleries->getAliased($alias)) {
            $view = new GalleryView();
            $view->gallery = $galleries;
            $view->navmodel = $this->navmodel;
            return $view;
        }

        return $view;
    }
}
