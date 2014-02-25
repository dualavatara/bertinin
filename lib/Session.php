<?php
/**
 * User: dualavatara
 * Date: 3/11/12
 * Time: 9:03 PM
 */

require_once 'lib/singletone.lib.php';

class Session extends Singletone {
	public function __construct() {
		parent::__construct();
		session_start();

        $_SESSION['LAST_ACTIVITY']  = time();
        if( !isset($_SESSION['CREATED']) )
            $_SESSION['CREATED']    = time();
	}

	public function __get($name) {
		return $_SESSION[$name];
	}

    public function __set($name, $value) {
		$_SESSION[$name] = $value;
	}

	function __isset($name) {
		return isset($_SESSION[$name]);
	}

	function __unset($name) {
		unset($_SESSION[$name]);
	}

    function __destroy(){
        if (isset($_SESSION['CREATED']) && (time() - $_SESSION['CREATED'] > 1800)) {
            // last request was more than 30 minutes ago
            session_unset();     // unset $_SESSION variable for the run-time
            session_destroy();   // destroy session data in storage
        }
    }

    function __regenid(){
        if (time() - $_SESSION['CREATED'] > 1800) {
            // session started more than 30 minutes ago
            session_regenerate_id(true);    // change session ID for the current session an invalidate old session ID
            $_SESSION['CREATED'] = time();  // update creation time
        }
    }
}
