<?php

namespace View;

class ContactsView extends BaseView {

    public $content;

    public function show() {
        $this->start();
        ?>
        <div class='content_inner'>
            <div class='container'>
                <div class='message_box'>
                    <h2><?=$this->content['header']?></h2>
                    <ul class='contact_channels'>
                        <li class='message_form'>
                            <i></i>
                            <span><a class="send_message" href="#message_form">Задать вопрос онлайн</a></span>
                        </li>
                        <li class='phone'>
                            <i></i>
                            <span><a href="callto://+74956496782">+7 (495) 649-67-82</a></span>
                        </li>
                        <li class='skype'>
                            <i></i>
                            <span><a href="skype:Willance.Company?call">Willance.Company</a></span>
                        </li>
                        <li class='email'>
                            <i></i>
                            <span><a href="mailto:ask@willance.com">ask@willance.com</a></span>
                        </li>
                        <li class='address'>
                            <i></i>
                            <span>
                                <a href="javascript:if(confirm('https://maps.google.com/?q=Russia, 115184, Moscow, Moskva, pereulok Bol\'shoy Ordynskiy 4 строение 1&hl=ru  \n\nThis file was not retrieved by Teleport Pro, because it is addressed using an unsupported protocol (e.g., gopher).  \n\nDo you want to open it from the server?'))window.location='https://maps.google.com/?q=Russia, 115184, Moscow, Moskva, pereulok Bol\'shoy Ordynskiy 4 строение 1&hl=ru'" tppabs="https://maps.google.com/?q=Russia, 115184, Moscow, Moskva, pereulok Bol'shoy Ordynskiy 4 строение 1&hl=ru" target="_blank">Москва, Большой Ордынский переулок, 4, стр 1, БЦ Ордынский
                                    <strong>Показать на карте</strong>
                                </a>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class='container'>
                <div class='page' id='contacts'>
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
                                    <li class='active'>
                                        <a href='#message_form'>
                                            Задать вопрос
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/requests#factoring_form">Заявка на факторинг</a>
                                    </li>
                                    <li>
                                        <a href="/requests#insurance_form">Заявка на страхование кредитных рисков</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class='page_content span9'>
                            <div class='content'>
                                <div id='message_form'>
                                    <h2>Задать вопрос</h2>
                                    <div class='annotation'>Мы обязательно ответим. </div>
                                    <form accept-charset="UTF-8" action="/ru/contacts#message" class=" new_contact" id="message" method="post" novalidate="novalidate"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /><input name="authenticity_token" type="hidden" value="BLznKYixE6CtlVms2PeU3kW4IdFV1Tj/K4dJ9f+OwYs=" /></div>
                                        <div class='form-inputs'>
                                            <div class="control-group hidden contact_request_type"><input class="hidden" id="contact_request_type" name="contact[request_type]" type="hidden" value="message" /></div>
                                            <div class="control-group string required contact_name"><label class="string required control-label" for="contact_name"><abbr title="требуется">*</abbr> Ваше имя</label><input class="string required" id="contact_name" name="contact[name]" type="text" /></div>
                                            <div class="control-group email required contact_email"><label class="email required control-label" for="contact_email"><abbr title="требуется">*</abbr> Email</label><input class="string email required" id="contact_email" name="contact[email]" type="email" /></div>
                                            <div class="control-group text required contact_message"><label class="text required control-label" for="contact_message"><abbr title="требуется">*</abbr> Сообщение</label><textarea class="text required" id="contact_message" name="contact[message]">
                                                </textarea></div>
                                            <div class="control-group boolean optional contact_subscribe"><input name="contact[subscribe]" type="hidden" value="0" /><label class="boolean optional control-label checkbox" for="contact_subscribe"><input class="boolean optional" id="contact_subscribe" name="contact[subscribe]" type="checkbox" value="1" />Я хочу получать уведомление о новостях компании (не чаще чем 1 раз в 2 недели)</label></div>
                                            <div class="control-group hidden contact_is_human"><input class="hidden" id="contact_is_human" name="contact[is_human]" type="hidden" /></div>
                                        </div>
                                        <div class='form-actions'>
                                            <input class="btn btn-info" data-disable-with="Отправляю..." name="commit" type="submit" value="Задать вопрос" />
                                        </div>
                                    </form>
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