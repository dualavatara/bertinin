<?php
/**
 * User: dualavatara
 * Date: 3/9/12
 * Time: 8:26 PM
 */

namespace View;

class TemplateView extends BaseView {

    public $mainCont;

	public $settings;

	/**
	 * @var NavigationModel
	 */
	public $navigation;

	public function setMainContent($content) {
        $this->mainCont = $content;
    }

    public $bodyClass='';

	public function show() {
		$this->start();
		?>
	<!DOCTYPE html>
	<!--suppress HtmlUnknownTarget, HtmlUnknownTarget -->
	<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
        <head>
            <script src="/assets/jquery.js"></script>
            <script type="text/javascript" async="" src="http://mc.yandex.ru/metrika/watch.js"></script>
            <script type="text/javascript" async="" src="http://stats.g.doubleclick.net/dc.js"></script>
            <script type="text/javascript">var NREUMQ=NREUMQ||[];NREUMQ.push(["mark","firstbyte",new Date().getTime()]);</script>
            <meta charset="utf-8">
            <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
            <meta content="ru" http-equiv="content-language">
            <meta content="width=device-width, initial-scale=1.0" name="viewport">
            <title>Willance</title>
            <meta content="Willance - профессиональный факторинговый брокер" name="description">
            <link href="/assets/application-30d72cb3c5ad63a123fb93f487033297.css" media="screen" rel="stylesheet">
            <link href="/assets/main.css" media="screen" rel="stylesheet">
            <link href="/assets/print-443b7a6632371c3aedaed061a6fec9cf.css" media="print" rel="stylesheet">
            <meta content="authenticity_token" name="csrf-param" />
            <meta content="w7MW7nfiZWqJ5MXx4qSnUl2s5vELKohEH/F8uU3ajHw=" name="csrf-token" />

            <link href="/assets/favicon-045d0989510ebb8d0699c7ab6b9db5f8.ico" rel="shortcut icon" type="image/vnd.microsoft.icon">
            <script>
                var _gaq = _gaq || [];
                _gaq.push(['_setAccount', "UA-15814544-1"]);
                _gaq.push(['_trackPageview']);

                (function() {
                    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
                    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
                })();
            </script>
        </head>
	<body class="<?=$this->bodyClass?>">

    <script type="text/javascript">
        function viewResendPassForm(){
            $('#title').text('Восстановление пароля');
            $('#link').hide();
            $('#pwd').hide();
            $('#checkbox').hide();
            $('#btn').val('Восстановить');

        }
        function hideNresetForm(){
            $('#loginform').hide();
            $('#loginbg').hide();

            $('#title').text('Авторизация');
            $('#link').show();
            $('#pwd').show();
            $('#checkbox').show();
            $('#btn').val('Войти');
        }
        function viewRegisterForm(){

        }
    </script>
    <div id="loginbg" class="loginbg hide">
        <div id="loginform" class="loginform hide">
            <div class="closeBtn" onclick="hideNresetForm()"></div>
            <div class="content">
                <script type="text/javascript">
                    function submitForm(){

                        var caption = $('#btn').val();

                        if( caption == 'Войти' ){
                            if( $('#login').val() == '' ){
                                $('#login').attr('placeholder','Введите логин');
                                return;
                            }
                            if( $('#pwd').val() == '' ){
                                $('#pwd').attr('placeholder','Введите пароль');
                                return;
                            }
                            $('#authform').submit();
                        }
                        else if( caption == 'Восстановить' ){
                            if( $('#login').val() == '' ){
                                $('#login').attr('placeholder','Введите логин');
                                return;
                            }

                            $('#authform').submit();
                        }
                    }
                </script>
                <div id="title" class="title">Авторизация</div><div id="link" class="reset"><a href="#" onclick="viewResendPassForm()">Восстановить пароль</a></div>
                <div class="clr"></div>
                <form id="authform" class="check btop" method="post" action="">
                    <input id="login" type="text" name="login" placeholder="E-mail" />
                    <input id="pwd" type="password" name="pwd" placeholder="Пароль" />
                    <div id="btnContainer" class="login-button">
                        <input id="btn" type="button" value="Войти" onclick="submitForm()"/>
                    </div>
                    <div class="clr"></div>
                </form>
            </div>
            <div class="bottom">
                Нужен аккаунт?  <a href="/registration">Зарегистрироваться</a>
            </div>
        </div>
    </div>

    <div id="topbar">
        <?php $this->header(); ?>
    </div>

    <div id="mainbar" style="height: 61px;">
        <div id="mainbar_inner" class="affix-top">
            <div class="container">
                <div class="navbar" id="main_navbar">
                    <div class="navbar-inner">
                        <a class="brand" href="/"><img alt="Willance" src="/assets/logo-31b64f2367c3bef00a53fa45d0f6a750.png">
                        </a><a class="btn btn-navbar btn-collapse">
                            <span></span>
                        </a>
                        <div class="nav-collapse collapse" id="main_nav_menu">
                            <?php $this->mainMenu(); ?>
                            <a class="enter" href="#" onclick="$('#loginbg').show();$('#loginform').show();">Вход</a>
                            <div id="topbar_collapse">
                                <ul class="nav top_nav pull-right">
                                    <li id="contacts"><a href="/ru/contacts">Контактная информация</a></li>
                                    <li id="blog"><a href="/ru/blog">Блог</a></li>
                                    <li id="career"><a href="/ru/career">Карьера</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="errmsg" style="display: block; float: left; background-color: red; color: black; font-weight: bold; width:100%; text-align: center; z-index:999; position: relative">
    <?
    if( $_GET['message'] != '' ){
        echo $_GET['message'].'&nbsp;<a href="#" onclick="$(\'#errmsg\').hide();" style="text-decoration:underline; font-weight:normal; color:black">Закрыть</a>';
    }
    ?>
    </div>

    <div id="content">
        <?php echo $this->mainCont?>
    </div>
    <?php $this->footer()?>
	</body>
	</html>
	<?
		$this->end();
		return $this->content;
	}

	public function header() {
        ?>
        <div id="topbar_inner">
            <div class="container">
                <div class="navbar" id="top_navbar">
                    <div class="navbar-inner">
                        <ul class="nav pull-right">
                            <li class="locale">
                                <a href="/en">EN</a> | <a href="/ru">RU</a>
                            </li>
                        </ul>
                        <?=$this->topMenu()?>
                    </div>
                </div>
            </div>
        </div>
        <?
        /*
		?>
	<div id="top">
		<?php $this->headerTop(); ?>
	</div>
	<div id="image">
		<?php $this->headerImage(); ?>
	</div>
	<div id="menu" style="overflow:visible;">
		<?php $this->headerMenu(); ?>
	</div>
	<div id="banners">
		<?php $this->banners(); ?>
	</div>
	<?php
        */
	}

    public function topMenu(){
        $parent = $this->navigation->byId(\NavigationModel::ID_TOPMENU);
        if ($parent) {
            ?>
            <ul class="nav top_nav pull-right">
                <?
                $children = $this->navigation->byParentId($parent->id);
                foreach ($children as $child) {
                    if ( $child->nameEn != '' ){
                        $li_class = '';
                        $a_class = '';
                        if( $_SERVER['REQUEST_URI'] == $child->link ){
                            $li_class= 'class="selected active"';
                            $a_class = 'class="selected"';
                        }

                        $method = $this->translate('name');

                        echo '<li '.$li_class.' id="'.ltrim ($child->link,'/').'"><a '.$a_class.' href="'.$child->link.'">'.$child->$method.'</a></li>';
                    }
                }
                ?>
            </ul>
        <?
        }
    }

    public function mainMenu(){

        $parent = $this->navigation->byId(\NavigationModel::ID_MENU);
        if ($parent) {
            ?>
            <ul class="nav pull-right" style="margin-right: 5px;">
            <?
            $children = $this->navigation->byParentId($parent->id);
            foreach ($children as $child) {
                $li_class = '';
                $a_class = '';
                if( $_SERVER['REQUEST_URI'] == $child->link ){
                    $li_class= 'class="selected active"';
                    $a_class = 'class="selected"';
                }

                $method = $this->translate('name');

                echo '<li '.$li_class.' id="'.ltrim ($child->link,'/').'"><a '.$a_class.' href="'.$child->link.'">'.$child->$method.'</a></li>';
            }
            ?>
            </ul>
            <?
        }
    }

	public function footer() {
        //$this->settings->getPhone1()
		?>
        <div id="footer">
            <div class="container">
                <div class="row">
                    <div class="span9">
                        <div class="row contact">
                            <div class="span12">
                                <span class="phone">+7 (495) 649-67-82</span>
                                |
                                <span class="contact_us"><a href="/contacts#message_form">Связаться онлайн</a></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="span12">
                                <ul class="footer_nav">
                                    <li id="sitemap">
                                        <a href="/sitemap">Карта сайта</a>
                                    </li>
                                    <li id="terms">
                                        <a href="/terms">Cоглашение</a>
                                    </li>
                                    <li id="privacy">
                                        <a href="/privacy">Политика конфиденциальности</a>
                                    </li>
                                    <li id="requests">
                                        <a href="/requests">Оставить заявку</a>
                                    </li>
                                </ul>
                                <p class="copyright">
                                    <span class="nowrap">
                                    © 2009 - 2013 Willance
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="span3">
                        <ul class="social">
                            <li class="facebook">
                                <a href="http://www.facebook.com/WillanceCompany" target="_blank" title="Читайте нас на Facebook">Читайте нас на Facebook</a>
                            </li>
                            <li class="twitter">
                                <a href="https://twitter.com/WillanceCompany" target="_blank" title="Следите за нами на Twitter">Следите за нами на Twitter</a>
                            </li>
                            <li class="linkedin">
                                <a href="http://www.linkedin.com/company/wilford-chance" target="_blank" title="Найдите нас на Linkedin">Найдите нас на Linkedin</a>
                            </li>
                        </ul>
                        <ul class="like">
                            <li><div class="fb-like-box fb_iframe_widget" data-header="false" data-href="http://www.facebook.com/WillanceCompany" data-show-faces="false" data-stream="false" data-width="292" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=&amp;header=false&amp;href=http%3A%2F%2Fwww.facebook.com%2FWillanceCompany&amp;locale=ru_RU&amp;sdk=joey&amp;show_faces=false&amp;stream=false&amp;width=292"><span style="vertical-align: bottom; width: 292px; height: 70px;"><iframe name="f3f687ccf4" width="292px" height="1000px" frameborder="0" allowtransparency="true" scrolling="no" title="fb:like_box Facebook Social Plugin" src="http://www.facebook.com/plugins/like_box.php?app_id=&amp;channel=http%3A%2F%2Fstatic.ak.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D28%23cb%3Df33ee7bd6%26domain%3Dhttp://vps-1019820.srv.pa.infobox.ru/%26origin%3Dhttp%253A%252F%252Fvps-1019820.srv.pa.infobox.ru%252Ff34404e0ec%26relation%3Dparent.parent&amp;header=false&amp;href=http%3A%2F%2Fwww.facebook.com%2FWillanceCompany&amp;locale=ru_RU&amp;sdk=joey&amp;show_faces=false&amp;stream=false&amp;width=292" style="border: none; visibility: visible; width: 292px; height: 70px;" class=""></iframe></span></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <noindex>
            <div id="fb-root"></div>
            <script>
                (function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = "//connect.facebook.net/ru_RU/all.js#xfbml=1";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
            </script>

            <!-- Yandex.Metrika counter -->
            <script>
                (function (d, w, c) {
                    (w[c] = w[c] || []).push(function() {
                        try {
                            w.yaCounter22310366 = new Ya.Metrika({id: "22310366",
                                webvisor:true,
                                clickmap:true,
                                trackLinks:true,
                                accurateTrackBounce:true});
                        } catch(e) { }
                    });

                    var n = d.getElementsByTagName("script")[0],
                        s = d.createElement("script"),
                        f = function () { n.parentNode.insertBefore(s, n); };
                    s.type = "text/javascript";
                    s.async = true;
                    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

                    if (w.opera == "[object Opera]") {
                        d.addEventListener("DOMContentLoaded", f, false);
                    } else { f(); }
                })(document, window, "yandex_metrika_callbacks");
            </script>
            <noscript>
                <div>
                    <img alt='' src='//mc.yandex.ru/watch/22310366' style='position:absolute; left:-9999px;'>
                </div>
            </noscript>
            <!-- /Yandex.Metrika counter -->
        </noindex>
        <script type="text/javascript">if (typeof NREUMQ !== "undefined") { if (!NREUMQ.f) { NREUMQ.f=function() {
                NREUMQ.push(["load",new Date().getTime()]);
                var e=document.createElement("script");
                e.type="text/javascript";
                e.src=(("http:"===document.location.protocol)?"http:":"https:") + "//" +
                    "js-agent.newrelic.com/nr-100.js";
                document.body.appendChild(e);
                if(NREUMQ.a)NREUMQ.a();
            };
                NREUMQ.a=window.onload;window.onload=NREUMQ.f;
            };
                NREUMQ.push(["nrfj","beacon-3.newrelic.com","82b5a12da0","1667821","IlpbEBcKXApcSkxQCgxQGg0LAVUe",13,44,new Date().getTime(),"","","","",""]);}</script>
	<?php
	}

	public function banners() {
		$i = 0;
		/** @noinspection PhpUndefinedVariableInspection */
		foreach ($this->bannersHead as $banner) {
			$i++;
			$target = '';
			if ($banner->flags->check(\BannerModel::FLAG_NEWWINDOW)) $target = ' target="_blank"';
			?>
		<div class="bannercol">
			<a href="<?php echo $banner->link; ?>" <?php echo $target; ?>><img
				src="<?php echo \Ctl\StaticCtl::link('get', array('key' => $banner->image)); ?>"
				class="image"></a>
		</div>
		<?php
		}
		;
	}

	public function headerImage() {
		?>
	<div id="logo"><a href="/"><img src="/static/img/logo.png" width="290" height="131"></a></div>
	<img src="/static/img/0.png" width="966" height="1">
	<?php
	}

	public function headerMenu() {
		?>
	<script type="text/javascript">
		$(function () {
			$('.menuitem,.submenuitem').each(function () {
				$(this).mouseout(function () {
					$(this).removeClass('selected');
				})
			});
			$('.menuitem,.submenuitem').mouseover(function () {
				$(this).addClass('selected');
			});
		});
		function showSubmenu(id) {
			parent = $('#menu' + id);
			submenu = $('#submenu' + id);
			var eo = parent.offset();
			eo.top += parent.innerHeight();
			//eo["min-width"] = $(this).width()+$(this).outerHeight();
			eo.visibility = 'visible';
			submenu.css(eo);
			parent.addClass('selected');
		}
		function hideSubmenu(id) {
			parent = $('#menu' + id);
			submenu = $('#submenu' + id);
			submenu.css('visibility', 'hidden');
			parent.removeClass('selected');
		}
	</script>

	<?php
		$parent = $this->navigation->byId(\NavigationModel::ID_MENU);
		if ($parent) {
			$children = $this->navigation->byParentId($parent->id);

			foreach ($children as $child) {
				$blank = $child->flags->check(\NavigationModel::FLAG_BLANK) ? ' target="_blank"': '';
				?>
			<a
			   style="text-decoration: none;"
			   href="<?php echo $child->link; ?>"
				<?php echo $blank; ?>
			   onmouseover="showSubmenu('<?php echo $child->id; ?>');"
				onmouseout="hideSubmenu('<?php echo $child->id; ?>');"
				>
				<div class="menuitem" id="menu<?php echo $child->id; ?>"><?php echo $child->name; ?></div>
			</a>
				<div id="submenu<?php echo $child->id; ?>"
					 style="position: absolute; padding: 1em 0em; background-color: #ffcf00; visibility: hidden;z-index: 99999;
					 box-shadow: 3px 3px 10px rgba(0,0,0,0.5);
    -moz-box-shadow: 3px 3px 3px rgba(0,0,0,0.5);
    -webkit-box-shadow: 3px 3px 3px rgba(0,0,0,0.5);"
					 onmouseover="showSubmenu('<?php echo $child->id; ?>');"
					 onmouseout="hideSubmenu('<?php echo $child->id; ?>');"
					>
				<?php
				$subs = $this->navigation->byParentId($child->id);
				foreach($subs as $sub) {
					$blank = $sub->flags->check(\NavigationModel::FLAG_BLANK) ? ' target="_blank"': '';
					?>
					<a style="text-decoration: none;" href="<?php echo $sub->link; ?>" <?php echo $blank; ?>>
						<div class="submenuitem"><?php echo $sub->name; ?></div>
					</a>
					<?php
				} ?>
				</div>
				<?php
			};
		}; ?>
	<?php
	}

	public function headerTop() {
		$curCur = \Session::obj()->currency;
		?>
	<div id="headerfolds">
		<div>
			<div class="hfold selected">RU</div>
		</div>
		<div style="width: 2em;">
		&nbsp;
	</div>
		<div>
			<?php
			foreach ($this->currencies as $currency) {
				if ($curCur['id'] != $currency->id) {
					?>
					<div class="hfold">
						<i><a class="hiddenlink"
							  href="<?php echo \Ctl\IndexCtl::link('setCurrency', array('value' => $currency->id));?>"><?php echo $currency->name; ?></a></i>
					</div>
					<?php
				} else {
					?>
					<div class="hfold selected"><i><?php echo $currency->name; ?></i></div>
					<?php
				}
			}; ?>
		</div>
	</div>
	<div id="headerphone">
		<div style="height: 5em;float:left;width: 7em;">
			<div class="label grey">В РОССИИ:</div>
			<div class="label grey">В ЧЕРНОГОРИИ:</div>
		</div>
		<div style="height: 5em;width: 17em;float:left;">
			<div class="title black"><?php echo $this->settings->getPhone1(); ?></div>
			<div class="title black"><?php echo $this->settings->getPhone2(); ?></div>
		</div>
	</div>
	<div id="headerlogin">
		<?php
		if ($this->settings->getEmail()) {
			?>
			<div class="record">
				<div class="iconcol"><a href="mailto:<?php echo $this->settings->getEmail(); ?>"><img
					src="/static/img/icons/email.png"></a></div>
				<div class="middle">
					<?php
					if ($this->settings->getEmail()) {
						?>
						<a href="mailto:<?php echo $this->settings->getEmail(); ?>"> <?php echo $this->settings->getEmail(); ?></a>
						<?php
					};
					?>
				</div>
			</div>
			<?php
		}
		?>
	</div>
	<?
	}
}
