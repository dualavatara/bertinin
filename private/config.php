<?php
define('PATH_DATA', 'static/data');
define('SERVER_URL', 'http://arenda.test.pandra.ru/');
define('MAITENANCE_LOCK', false);

define('DB_NAME', 'arenda');
define('DB_USER', 'test');
define('DB_PASS', 'ZPcqDwUvXhyFx7wZ');
define('DB_CHARSET', 'utf8');
define('DB_DSN', 'mysql:host=localhost;dbname='.DB_NAME);
define('MODEL_ID_FIELD_NAME', 'id');

//defaults
define('DEFAULT_LANG', 'ru');
define('DEFAULT_CURRENCY', 1);

// reporting
error_reporting(E_ALL ^ E_NOTICE);

?>