<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 03.03.14
 * Time: 18:35
 */

namespace View;


class Page4040View extends BaseView {
    public function show($content = null) {
        $this->start();
        ?>
        <div>
            <h1>Страница не найдена</h1>
            <p>Возможно страница была удалена или никогда не существовала.</p>
        </div>
<?php
        $this->end();
        return parent::show($this->content);
    }
}