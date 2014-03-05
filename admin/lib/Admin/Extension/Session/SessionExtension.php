<?php

namespace Admin\Extension\Session;

/**
 * Available options:
 * - [class = \Admin\Extension\Session\NativeSessionStorage] (Class name of session storage)
 */
class SessionExtension implements \Admin\ExtensionInterface {
	
	public function register(\Admin\Application $app) {
        $sessionStorage = new NativeSessionStorage();
        $sessionStorage->start();
		$app->setSession($sessionStorage);
	}
}