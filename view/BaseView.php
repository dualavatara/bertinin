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
    public $title;
    public $description;
    public $keywords;
    public $ogurl;
    public $ogimage;

    /**
     * @var
     */
    public $content;

    /**
     * @var \NavigationModel
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
                <?php if ($this->title) echo $this->title;
                else echo \Settings::obj()->value('title'); ?>
            </title>

            <meta name="Description" content="<?php if ($this->description) echo $this->description;
            else echo \Settings::obj()->value('description'); ?>">
            <meta name="Keywords" content="<?php if ($this->keywords) echo $this->keywords;
            else echo \Settings::obj()->value('keywords'); ?>">

            <meta property="og:title" content="<?php if ($this->title) echo $this->title;
            else echo \Settings::obj()->value('title'); ?>" />
            <meta property="og:type" content="website" />
            <meta property="og:url" content="<?php if ($this->url) echo $this->url;
            else echo \Settings::obj()->value('ogurl'); ?>" />
            <meta property="og:image" content="<?php if ($this->image) echo $this->image;
            else echo \Settings::obj()->value('ogimage'); ?>" />
            <meta property="og:description" content="<?php if ($this->description) echo $this->description;
                  else echo \Settings::obj()->value('description'); ?>" />

            <link href="/static/css/styles.css" rel="stylesheet" type="text/css">
            <script src="/static/js/jquery-2.1.0.js" language="JavaScript"></script>
            <script src="/static/js/jquery-ui-1.10.4.custom.js" language="JavaScript"></script>

            <script src="/admin/static/lightbox/js/lightbox-2.6.min.js"></script>
            <link href="/admin/static/lightbox/css/lightbox.css" rel="stylesheet" />

            <link id="page_favicon" href="/favicon.ico" rel="icon" type="image/x-icon" />
            <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />

        </head>
        <body>
        <aside>
            <div id="logo"><a href="/"><img src="/static/img/logo.png"></a></div>
            <nav class="parent">
                <script language="JavaScript">
                    $(document).ready(function () {
                            $("nav.parent>div>a").hover(
                                function () { //enter hover
                                    $(this).animate({color: "#000000", fontSize: "16pt"}, 100);
                                },
                                function () {
                                    $(this).animate({color: "#666666", fontSize: "12pt"}, 100);
                                }
                            )

                            $("nav.child>div>a").hover(
                                function () { //enter hover
                                    $(this).animate({color: "#000000", fontSize: "12pt"}, 100);
                                },
                                function () {
                                    $(this).animate({color: "#444444", fontSize: "10pt"}, 100);
                                }
                            )
                        }
                    );
                </script>
                <?php
                foreach ($this->navmodel as $object) {
                    $ruri = $_SERVER['DOCUMENT_URI'];

                    ?>
                    <div>

                        <a href="<?php echo $object->url ?>" target="<?php echo $object->target; ?>">
                            <?php if ($ruri == $object->url) echo '•'; ?>
                            <?php echo $object->name; ?>
                        </a>
                        <?php

                        $children = $this->navmodel->getChildren($object->id);
                        if (!empty($children)) {
                            echo '<nav class="child">';
                            foreach($children as $child) {
                            ?>
                            <div>

                                <a href="<?php echo $child->url ?>" target="<?php echo $child->target; ?>">
                                    <?php if ($ruri == $child->url) echo '•'; ?>
                                    <?php echo $child->name; ?>
                                </a>
                            </div>
                            <?php
                            }
                            echo '</nav>';
                        }
                        ?>
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
