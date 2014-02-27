<?php

require_once __DIR__.'/../../config/config.php';

return array(

	/* Main parameters, all required */
	'baseUrl' => '/admin', 'rootPath' => '.', 'ctlPath' => 'ctl/', 'title' => 'Администрирование',

	'dataPath' => '../' . PATH_DATA,

	/* Extension's options start */
	'db.options' => array(
		//		'host' => DB_HOST,
		//		'port' => DB_PORT,
		'user' => DB_USER, 'pass' => DB_PASS, //		'name' => DB_NAME,
		'dsn' => DB_DSN, 'charset' => DB_CHARSET,
		//'class' => '\Admin\Extension\Database\Database',
	),

	'template.options' => array(
		'path' => 'tpl/'
	),

	'security.options' => array(
		'login_route' => 'login', 'session_key' => 'user', 'class' => 'SecurityUser', 'logout_route' => 'logout',
	), /* End */

	'routes' => array(
		'home' => array('/', 'User', 'list'),
		'closed_index' => array('/', 'Site', 'closed_index'),

		'login' => array('/login', 'Auth', 'login'), 'logout' => array('/logout', 'Auth', 'logout'),

		'static' => array('/s/{key}', 'Data', 'get'),
        'docs' => array('/docs/{key}', 'Data', 'get_file'),

		'user_edit' => array('/user/edit/{id}', 'User', 'edit'),
		'user_delete' => array('/user/delete/{id}', 'User', 'delete'),
		'user_list' => array('/user/list', 'User', 'list'),
		'user_save' => array('/user/save', 'User', 'save'),
		'user_add' => array('/user/add', 'User', 'add'),

        'setting_edit' => array('/setting/edit/{id}', 'Setting', 'edit'),
        'setting_delete' => array('/setting/delete/{id}', 'Setting', 'delete'),
        'setting_list' => array('/setting/list', 'Setting', 'list'),
        'setting_save' => array('/setting/save', 'Setting', 'save'),
        'setting_add' => array('/setting/add', 'Setting', 'add'),

        'photo_edit' => array('/photo/edit/{id}', 'Photo', 'edit'),
        'photo_delete' => array('/photo/delete/{id}', 'Photo', 'delete'),
        'photo_list' => array('/photo/list', 'Photo', 'list'),
        'photo_save' => array('/photo/save', 'Photo', 'save'),
        'photo_add' => array('/photo/add', 'Photo', 'add'),
	),

	'menu' => array(
        'content' => array(
            'title' => 'Фотографии', 'sections' => array(
                'Photo' => array('title' => 'Фотографии', 'route' => 'photo_list', 'params' => array()),
            )
        ),
		'sys' => array(
			'title' => 'Системные', 'sections' => array(
				'User' => array('title' => 'Пользователи', 'route' => 'user_list', 'params' => array()),
				'Settings' => array('title' => 'Настройки сайта', 'route' => 'setting_list', 'params' => array()),
			)
		),
		'logout' => array(
			'title' => 'Выход', 'sections' => array(
				'Auth' => array('title' => '', 'route' => 'logout'),
			),
		)
	),
);
