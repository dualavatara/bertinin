<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 04.03.14
 * Time: 18:14
 */

namespace View;


class ArticleView extends BaseView {
    public $article;

    public function show($content = null) {
        $this->start();
        $this->title = $this->article[0]->title;
        $this->description = $this->article[0]->description;
        $this->keywords = $this->article[0]->keywords;
        $this->ogurl = 'http://bertinin.ru' . $this->article[0]->alias;

        ?>
        <article>
            <h1><?php echo $this->article[0]->title;?></h1>
            <p><?php echo $this->article[0]->note;?></p>
        </article>

        <?
        $this->end();
        return parent::show($this->content);
    }
} 