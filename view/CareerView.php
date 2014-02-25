<?php

namespace View;

class CareerView extends BaseView {

    public $content;

    public function show() {
        $this->start();
        ?>
        <div class='content_inner'>
            <div class='container'>
                <div class='message_box'>
                    <a href="#jobs"><h2>Карьера в <span>Willance</span></h2>
                        <p>
                            Когда вы в последний раз получали удовольствие от работы?
                            Мы ищем людей, готовых присоединиться к нашей команде. Нам нужны ваша креативность, энергия и желание помогать клиентам решать задачи их бизнеса.
                            <span>
                            Посмотреть открытые вакансии &raquo;
                            </span>
                        </p>
                    </a>
                </div>
            </div>
            <div class='container'>
                <div class='page' id='jobs'>
                    <div class='row'>
                        <div class='span12'>
                            <ul class='breadcrumb'>
                                <li>
                                    <a href="/"><?=$this->content['root']?></a>
                                    <span class='divider'>/</span>
                                </li>
                                <li class='active'>
                                <?=$this->content['header']?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='page_sidebar span3'>
                            <div id='sidebar'>
                                <ul class='nav nav-tabs nav-stacked' id='sidebar_nav'>
                                    <li>
                                        <a href="/contacts#message_form">Есть вопрос? Напишите нам!</a>
                                    </li>
                                    <li><form accept-charset="UTF-8" action="/subscriptions" class="new_subscription" data-remote="true" id="subscription_form" method="post" novalidate="novalidate"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /></div><div class="control-group email optional subscription_email"><label class="email optional control-label" for="subscription_email">Укажите Ваш email для подписки на наши новости</label><input class="string email optional" id="subscription_email" name="subscription[email]" type="email" /></div>
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
                                <h2>Открытые вакансии</h2>
                                <div class='annotation'>
                                    <p>В настоящее время в компании нет открытых вакансий, однако, если вам интересна работа у нас, присылайте свое резюме на ask@willance.com. Возможно, мы сможем предложить вам что-то в будущем.</p>
                                </div>
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