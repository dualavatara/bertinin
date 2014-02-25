<?php

namespace View;

class TemplateLkView extends BaseView {

    public $mainCont;
    public $showBankSection = false;

    public function setMainContent($content) {
        $this->mainCont = $content;
    }

    public function show() {
    $this->start();
    ?>
        <!doctype html>
        <html class="no-js" lang="en">
        <head>
            <meta charset="utf-8" />
            <script src="/assets/jquery.js"></script>
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <title>WILLANCE</title>
            <link rel="stylesheet" href="/assets/style.css" />
        </head>
        <body>
        <header>
            <div class = "logo"><a href="/"><img src="/img/logo.png" alt = ""></a></div>
            <div class = "logout"><a href="/lk/logout">Выход</a></div>
            <div class = "profile"><?=$this->content['login']?>
                <div class = "sub">
                    <ul>
                        <li><a href="/lk/changepass">Смена пароля</a></li>
                        <li><a href="/lk/pdatum">Личные данные</a></li>
                        <li><a href="/lk/logout">Выход</a></li>
                    </ul>
                </div>
            </div>
        </header>
        <div class="container">
            <div class="inner">
                <div class="column left-column">
                    <ul class = "menu">
                        <li class = "menu-item-1"><a href="/lk">Главная</a></li>
                        <li class = "menu-item-2"><a href="/lk/pform">Анкета</a></li>
                        <li class = "menu-item-4"><a href="/lk/contractors">Контрагенты</a></li>
                        <li class = "menu-item-3"><a href="/lk/documents">Документы</a></li>
                        <?= ($this->showBankSection ? '<li class = "menu-item-5"><a href="/lk/banks">Банки</a></li>' : '' )?>
                        <li class = "menu-item-6"><a href="/">Хочу на сайт</a></li>
                    </ul>
                </div>
                <div class="column right-column">
                    <div class= "content">
                        <?php echo $this->mainCont?>
                    </div>
                    <footer>
                        <div class = "footermenu">
                            <ul>
                                <li><a href="/solutions">Наши решения</a></li>
                                <li><a href="/advantages">Почему Willance</a></li>
                                <li><a href="/about_us">Отзывы клиентов</a></li>
                                <li><a href="/blog">Блог</a></li>
                            </ul>
                        </div>
                        <div class = "copy">© 2009 - 2013 Willance</div>
                        <div class = "dev"><a href="http://pandra.ru" target="_blank"><span>Разработано в </span><img src="/img/razrab.png"></a></div>
                    </footer>
                </div>
            </div>
        </div>
        </body>
        </html>
    <?
    $this->end();
    return $this->content;
    }
}