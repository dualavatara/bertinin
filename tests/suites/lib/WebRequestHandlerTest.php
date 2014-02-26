<?php
/**
 * Created by PhpStorm.
 * User: dualavatara
 * Date: 26.02.14
 * Time: 15:15
 */

require_once 'lib/dicontainer.lib.php';

class WebRequestHandlerTest extends PHPUnit_Framework_TestCase {

    public function test__construct() {
        WebRequestHandlerConfig::$records = array(
                array('/^\/$/', 'IndexCtl->main', IRequestMatcher::NO_AUTH_REQUIRED)
            );
        $handler = new WebRequestHandler(DIContainer::obj()->Dispatcher(), WebRequestHandlerConfig::$records);

        $matchers = $handler->getMatchers();
        $this->assertEquals(1, count($matchers));
        $this->assertAttributeEquals('/^\/$/', 'key', $matchers[0]);
        $this->assertAttributeEquals('IndexCtl', 'class', $matchers[0]);
        $this->assertAttributeEquals('main', 'method', $matchers[0]);
        $this->assertAttributeEquals(IRequestMatcher::NO_AUTH_REQUIRED, 'authorisationRequired', $matchers[0]);
    }
}
 