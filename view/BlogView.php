<?php

namespace View;

class BlogView extends BaseView {

    public $content;

    public $categories;

    public $catselected=0;

    public $articles;

    public $viewArticleId=0;

    private function composeCategories($activeId){
        $result = '';
        foreach($this->categories as $catItem){
            $result .= '    <li class="'.($activeId == $catItem['id'] ? 'active' : '').'">
                                <a href="/blog?cat='.$catItem['id'].'">'.$catItem[ $this->translate('name') ].'</a>
                            </li>';
        }
        return $result;
    }

    private function breadcrumbs(){

        $catName = '';
        if( $this->categories )
            foreach($this->categories as $catItem){
                if($catItem['id'] == $this->articles[0]['cat']){
                    $catName = \Session::obj()->lang == 'ru' ? $catItem['name'] : $catItem['nameEn'];
                    break;
                }
            }

        if( $this->viewArticleId > 0 ){

            echo '  <div class="span12">
                        <ul class="breadcrumb">
                            <li>
                                <a href="/">'.$this->content['root'].'</a>
                                <span class="divider">/</span>
                            </li>
                            <li>
                                <a href="/blog">'.$this->content['header'].'</a>
                                <span class="divider">/</span>
                            </li>
                            <li>
                                <a href="/blog?cat='.$this->articles[0]['cat'].'">'.$catName.'</a>
                                <span class="divider">/</span>
                            </li>
                            <li class="active">
                                '.$this->articles[0]['title'].'
                            </li>
                        </ul>
                    </div>';
        }
        else{
            if( $this->catselected > 0){
                echo '    <div class="span12">
                            <ul class="breadcrumb">
                                <li>
                                    <a href="/">'.$this->content['root'].'</a>
                                    <span class="divider">/</span>
                                </li>
                                <li >
                                    <a href="/blog">'.$this->content['header'].'</a>
                                    <span class="divider">/</span>
                                </li>
                                <li class="active">
                                    '.$catName.'
                                </li>
                            </ul>
                        </div>';
            }
            else
                echo '    <div class="span12">
                            <ul class="breadcrumb">
                                <li>
                                    <a href="/">'.$this->content['root'].'</a>
                                    <span class="divider">/</span>
                                </li>
                                <li class="active">
                                '.$this->content['header'].'
                                </li>
                            </ul>
                        </div>';
        }

    }

    public function show() {

        $this->start();
        ?>
        <div class='content_inner'>
            <div class='container'>
            <h1><?=$this->content['header']?></h1>
            <div class='page' id='articles'>
            <div class='row'>
                <? $this->breadcrumbs() ?>
            </div>
                <div class='row'>
                <div class='page_sidebar span3'>
                    <div id='sidebar'>
                        <ul class='nav nav-tabs nav-stacked' id='sidebar_nav'>
                            <?
                            if( $this->viewArticleId > 0 ){

                                echo '  <li class="active"><a href="/blog?cat='.$this->articles[0]['cat'].'&a='.$this->articles[0]['id'].'">'.$this->articles[0]['title'].'</a></li>
                                        <li>
                                            <p>
                                            '.$this->articles[0]['author'].'
                                            <br>
                                            '.$this->articles[0]['publishedat'].'
                                            </p>
                                        </li>';

                            }
                            else{

                                echo '  <li>
                                            <h3>'.(\Session::obj()->lang == 'ru' ? 'Категории' : 'Categories').'</h3>
                                        </li>';

                                echo $this->composeCategories($this->catselected);
                            }
                            ?>
                            <li>
                                <form accept-charset="UTF-8" action="" class="new_subscription" data-remote="true" id="subscription_form" method="post" novalidate="novalidate">
                                    <div style="margin:0;padding:0;display:inline">
                                        <input name="utf8" type="hidden" value="&#x2713;" />
                                    </div>
                                    <div class="control-group email optional subscription_email">
                                        <label class="email optional control-label" for="subscription_email">Укажите Ваш email для подписки на наши новости</label>
                                        <input class="string email optional" id="subscription_email" name="subscription[email]" type="email" />
                                    </div>
                                    <div class="control-group hidden subscription_is_human"><input class="hidden" id="subscription_is_human" name="subscription[is_human]" type="hidden" /></div>
                                    <div id='subscription_notice'></div>
                                    <input class="btn btn-info" data-disable-with="Подписываю..." name="commit" type="submit" value="Подписаться" />
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class='page_content span9'>
                    <div class='content'>
                        <div class='addthis_toolbox addthis_default_style'>
                            <a class='addthis_button_print'></a>
                            <a class='addthis_button_email'></a>
                            <a class='addthis_button_compact'>
                            </a>
                        </div>
                        <script>
                            var addthis_config = {
                                "ui_language":"ru"
                            };
                        </script>
                        <script src="/static/js/addthis_widget.js#pubid=ra-514d7fb05b596d5b" type='text/javascript'></script>


                <? if( $this->viewArticleId > 0 ){

                        echo '  <h2>'.$this->articles[0]['title'].'</h2>
                                    <div class="annotation">
                                        '.$this->articles[0]['annotation'].'
                                    </div>';

                        echo Parsedown::instance()->parse($this->articles[0]['content']);
                    }
                    else{

                        echo '    <h2>Блог компании Willance</h2>
                                    <div class="annotation">
                                        <p>Здесь вы найдете массу полезной информации о том, каких результатов можно добиться с помощью инструментов оптимизации дебиторской и кредиторской задолженности тогда, когда диагностикой ваших потребностей и поиском лучшего решения занимается профессиональный <a href="/about_us" title="Кто мы">Брокер</a>.</p>
                                    </div>';

                        if( !empty($this->articles) )
                            foreach( $this->articles as $count=>$adata ){
                                echo '  <section id="article-52affea0fdec7f5ee4000002">
                                    <h3>
                                        <a href="/blog?cat='.$adata['cat'].'&a='.$adata['id'].'">'.$adata['title'].'</a>
                                    </h3>
                                    <p class="details">
                                        '.$adata['author'].', '.$adata['publishedat'].'
                                    </p>
                                    <p>
                                        '.$adata['annotation'].'
                                         <a href="/blog?cat='.$adata['cat'].'&a='.$adata['id'].'">
                                            <span class="more">
                                            Читать дальше &raquo;
                                            </span>
                                        </a>
                                    </p>
                                </section>';
                            }
                    }

                ?>

                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <?
        $this->end();
        return $this->content;
    }
}