<?php
/**
 * User: dualavatara
 * Date: 4/1/12
 * Time: 1:18 AM
 */

namespace View;

class IndexView extends BaseView {

	public function show() {
		$this->start();
        ?>
            TEST
        <?
		$this->end();
		return $this->content;
	}
}
