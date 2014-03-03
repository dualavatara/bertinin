<?php
/**
 * User: dualavatara
 * Date: 4/1/12
 * Time: 1:47 AM
 */

namespace View;

class BaseView implements IView {
	public $content;

	public function start() {
		ob_start();
	}

	public function end() {
		$this->content = ob_get_clean();
	}

	public function show($content = null) {
        $this->start();
?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <title></title>
            <link href="/static/css/styles.css" rel="stylesheet" type="text/css">
            <script src="/static/js/jquery-2.1.0.js" language="JavaScript"></script>
            <script src="/static/js/jquery-ui-1.10.4.custom.js" language="JavaScript"></script>
        </head>
        <body>
        <aside>
            <img src="/static/img/logo.png">
            <nav>
                <script language="JavaScript">
                    $(document).ready(function () {
                            $("nav div").hover(
                                function () { //enter hover
                                    $(this).children("a").animate({color: "#000000", fontSize: "16pt"}, 100);
                                    $(this).next().children("a").animate({color: "#444444", fontSize: "13pt"}, 100);
                                    $(this).next().next().children("a").animate({color: "#666666", fontSize: "12pt"}, 100);
                                    $(this).prev().children("a").animate({color: "#444444", fontSize: "13pt"}, 100);
                                    $(this).prev().prev().children("a").animate({color: "#666666", fontSize: "12pt"}, 100);
                                },
                                function () {}
                            )
                            $("nav").hover(function(){},
                                function () { //exit hover
                                    $(this).find("a").animate({ color: "#666666", fontSize: "12pt"}, 100);
                                }
                            )
                        }
                    );
                </script>
                <div>
                    <a href="#">О студии</a>
                </div>
                <div>
                    <a href="#">О студии</a>
                </div>
                <div>
                    <a href="#">О студии</a>
                </div>
                <div>
                    <a href="#">О студии</a>
                </div>
                <div>
                    <a href="#">О студии</a>
                </div>
                <div>
                    <a href="#">О студии</a>
                </div>
                <div>
                    <a href="#">О студии</a>
                </div>
            </nav>
        </aside>
        <header>
            <div id="phone">+7 903 628 40 24</div>
            <div id="email">
                <a href="mailto:info@bertinin.ru">info@bertinin.ru</a>
            </div>
        </header>
        <main><?php echo $this->content; ?></main>
        <footer>
            <img id="img" src="/static/img/footer.png">
            <div id="copyright">
                ©2014 Константин Бертинин
            </div>

        </footer>
        </body>
        </html>
<?php
        $this->end();
		return $this->content;
	}

}
