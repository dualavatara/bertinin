<?php
/**
 * User: dualavatara
 * Date: 4/1/12
 * Time: 1:47 AM
 */

namespace View;

/**
 * Class BaseView
 * @package View
 */
class BaseView implements IView {
    /**
     * @var
     */
    public $content;

    /**
     * @var NavigationModel
     */
    public $navmodel;

    /**
     *
     */
    public function start() {
        ob_start();
    }

    /**
     *
     */
    public function end() {
        $this->content = ob_get_clean();
    }

    /**
     * @param null $content
     * @return mixed
     */
    public function show($content = null) {
        $this->start();
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <title>
                <?php echo \Settings::obj()->value('title'); ?>
            </title>
            <link href="/static/css/styles.css" rel="stylesheet" type="text/css">
            <script src="/static/js/jquery-2.1.0.js" language="JavaScript"></script>
            <script src="/static/js/jquery-ui-1.10.4.custom.js" language="JavaScript"></script>
        </head>
        <body>
        <aside>
            <a href="/"><img src="/static/img/logo.png"></a>
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
                                function () {
                                }
                            )
                            $("nav").hover(function () {
                                },
                                function () { //exit hover
                                    $(this).find("a").animate({ color: "#666666", fontSize: "12pt"}, 100);
                                }
                            )
                        }
                    );
                </script>
                <?php
                foreach ($this->navmodel as $object) {
                    ?>
                    <div>
                        <a href="<?php echo $object->url ?>" target="<?php echo $object->target; ?>">
                            <?php echo $object->name; ?>
                        </a>
                    </div>
                <?php
                }
                ?>
            </nav>
        </aside>
        <div id="mainarea">
            <header>
                <div id="phone"><?php echo \Settings::obj()->value('phone'); ?></div>
                <div id="email">
                    <a href="mailto:<?php echo \Settings::obj()->value('email'); ?>"><?php echo \Settings::obj()->value('email'); ?></a>
                </div>
            </header>
            <main><?php echo $this->content; ?></main>
            <footer>
                <img id="img" src="/static/img/footer.png">

                <div id="copyright">
                    ©2014 Константин Бертинин
                </div>

            </footer>
        </div>
        </body>
        </html>
        <?php
        $this->end();
        return $this->content;
    }

}
