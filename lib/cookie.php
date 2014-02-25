<?php
require_once 'lib/singletone.lib.php';

class cookie extends Singletone {
    public function __construct() {
        parent::__construct();
    }

    function __get($name) {
        return $_COOKIE[$name];
    }

    function __set($name, $value) {
        $_COOKIE[$name] = $value;
    }

    function __isset($name) {
        return isset($_COOKIE[$name]);
    }

    function __unset($name) {
        unset($_COOKIE[$name]);
    }
}
?>