<?php
/**
 * User: dualavatara
 * Date: 3/12/12
 * Time: 1:05 AM
 */

namespace Ctl;

require_once 'lib/exception.lib.php';
require_once 'model/NavigationModel.php';

abstract class BaseCtl {
    protected $navmodel;
	/**
	 * @var \IDispatcher
	 */
	protected $disp;

	function __construct(\IDispatcher $disp) {
		$this->disp = $disp;
        $this->navmodel = new \NavigationModel($this->disp->di()->PDODatabase());
        $this->navmodel->get()->filter($this->navmodel->filterExpr()->eq('parent_id', 0))->order('ord', 1)->exec();
        $this->navmodel->loadChildren();
	}
}
