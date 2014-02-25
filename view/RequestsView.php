<?php

namespace View;

class RequestsView extends BaseView {

    public $content;

public function show() {
        $this->start();
        ?>
    <script type="text/javascript">
    function email_check(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if( !regex.test(email) ){
            $('#lgn').val('Введите валидный e-mail');
            $('#lgn').css('background-color','lightcoral');
        }
        else{
            $('#lgn').css('background-color','white');
        }
    }
    </script>
    <div class='content_inner'>
        <div class='container'>
            <h1><?=$this->content['header']?></h1>
            <div class='page' id='requests'>
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
                    <div class="loginform">
                        <div class="content">
                            <form class="check" method="post" action="">
                                <input id="name" type="text" name="name" placeholder="ФИО" value=""/>
                                <input id="cname" type="text" name="cname" placeholder="Название компании" value=""/>
                                <input id="lgn" type="text" name="login" placeholder="E-mail" onchange="email_check($('#lgn').val()); return false;" value=""/>
                                <input id="pwd" type="password" name="pwd" placeholder="Пароль" value=""/>
                                <input id="pwd2" type="password" name="pwd2" placeholder="Введите пароль еще раз" value=""/>
                                <div class="checkbox" style="padding-bottom: 4px;">
                                    <input id="subscribe" name="subscribe" type="checkbox" value="" />
                                    <label for="subscribe">Я хочу получать уведомление о новостях компании<br />(не чаще чем 1 раз в 2 недели).</label>
                                </div>
                                <p class='muted' style="float: left;">Отправляя заявку, я даю согласие на обработку моих персональных данных с использованием автоматизации и без применения таковой в соответствии с нормами Федерального закона номер 152-ФЗ от 27.07.2006 года.</p>
                                <div id="btnContainer" class="login-button"><input id="btn" type="submit" value="Зарегистироваться" /></div>
                                <div class="clr"></div>
                            </form>
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
