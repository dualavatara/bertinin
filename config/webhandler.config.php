<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 25.02.14
 * Time: 15:11
 */

class WebRequestHandlerConfig {
    static $records = array(
        array('/^\/$/', 'IndexCtl->main', IRequestMatcher::NO_AUTH_REQUIRED)
    );
}