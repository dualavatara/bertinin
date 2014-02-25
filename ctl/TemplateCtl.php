<?php
/**
 * User: dualavatara
 * Date: 4/2/12
 * Time: 1:29 AM
 */
namespace Ctl;

class TemplateCtl extends BaseCtl {
	const HEAD_BANNERS_NUM = 4;

	public function main() {

        parent::authorize();

		$view = $this->disp->di()->TemplateView();

		$view->settings = $this->disp->di()->SettingModel();
		$view->settings->get()->all()->exec();

		$view->navigation = $this->disp->di()->NavigationModel();
		$view->navigation->get()->filter($view->navigation->filterExpr()->more('id', 0))->exec();

		return $view;
	}

	static public function link($method, $params) {
	}
}
