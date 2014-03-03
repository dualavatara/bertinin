<?php
/**
 * User: dualavatara
 * Date: 4/1/12
 * Time: 1:18 AM
 */

namespace View;

class IndexView extends BaseView {

	public function show($content = null) {
		$this->start();
        ?>
            TEST
        <?
		$this->end();
		return parent::show($this->content);
	}
}
