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
            <div style="width: 150px;float: left;">
                <?php
                $images = $this->article->getPhotos($this->article[0]->id);
                foreach($images as $img) {
                    echo '<a href="' . $img->img . '" data-lightbox="articleimage'.$this->article[0]->id.'" target="_blank"><img src="' . $img->imgtn . '" style="max-width: 150px;" alt="' . $img->alt . '"></a>';
                }
                ?>
            </div>
            <div style="margin-left: 180px;margin-right: 20px;">
                <?php echo $this->article[0]->note;?>
            </div>
        </article>

        <?
        $this->end();
        return parent::show($this->content);
    }
} 