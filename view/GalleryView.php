<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 06.03.14
 * Time: 16:07
 */

namespace View;


/**
 * Class GalleryView
 * @package View
 */
class GalleryView extends BaseView {
    /**
     * @var \GalleryModel
     */
    public $gallery;

    public function show($content = null) {
        $this->start();
        $this->title = $this->gallery[0]->title;
        $this->description = $this->gallery[0]->description;
        $this->keywords = $this->gallery[0]->keywords;
        $this->ogurl = 'http://bertinin.ru' . $this->gallery[0]->alias;


        ?>
        <div id="gallery" style="">
            <?php
            $images = $this->gallery->getPhotos($this->gallery[0]->id);
            foreach ($images as $img) {
                echo '<a href="' . $img->img . '" data-lightbox="compoundimage' . $this->gallery[0]->id . '" target="_blank" id="gallerya"><img src="' . $img->imgtn . '" alt="' . $img->alt . '"></a>';
            }
            ?>
        </div>
        <?php

        $this->end();
        return parent::show($this->content);
    }
} 