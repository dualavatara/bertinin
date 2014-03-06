<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 06.03.14
 * Time: 13:31
 */

namespace View;


class CompoundView extends BaseView {
    /**
     * @var \CompoundPageModel
     */
    public $compound;

    public function show($content = null) {
        $this->start();
        $this->title = $this->compound[0]->title;
        $this->description = $this->compound[0]->description;
        $this->keywords = $this->compound[0]->keywords;
        $this->ogurl = 'http://bertinin.ru' . $this->compound[0]->alias;


        ?>
        <div id="compound" style="">
            <?php
            $images = $this->compound->getPhotos($this->compound[0]->id);
            foreach ($images as $img) {
                echo '<a href="' . $img->img . '" data-lightbox="compoundimage' . $this->compound[0]->id . '" target="_blank" id="compounda"><img src="' . $img->imgtn . '" alt="' . $img->alt . '"></a>';
            }
            ?>
        </div>
        <?php
        $leads = $this->compound->getLeads($this->compound[0]->id);
        foreach ($leads as $lead) {
            ?>
            <a id="compound" href="<?php echo $lead->url; ?>">
                <article>
                    <h2><?php echo $lead->title; ?></h2>
                    <div><?php echo $lead->note; ?></div>
                </article>
            </a>
        <?
        };
        $this->end();
        return parent::show($this->content);
    }
} 