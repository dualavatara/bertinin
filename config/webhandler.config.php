<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 25.02.14
 * Time: 15:11
 */

class WebRequestHandlerConfig {
    static $records = array(
        //array('/^\/$/', 'IndexCtl->main', IRequestMatcher::NO_AUTH_REQUIRED),
        array('/^\/404notfound$/', 'IndexCtl->page404', IRequestMatcher::NO_AUTH_REQUIRED),

        //aliased urls must be last field
        array('/^(?<alias>.*)$/', 'IndexCtl->aliased', IRequestMatcher::NO_AUTH_REQUIRED),
    );
}