<?php

require_once __DIR__.'/../../config/config.php';

return array(

	/* Main parameters, all required */
	'baseUrl' => '/admin', 'rootPath' => '.', 'ctlPath' => 'ctl/', 'title' => 'Администрирование',

	'dataPath' => '../' . PATH_DATA,

    'logactions' => array('delete', 'save'),

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

        'logs_list' => array('/logs/list', 'Logs', 'list'),

        'photo_edit' => array('/photo/edit/{id}', 'Photo', 'edit'),
        'photo_delete' => array('/photo/delete/{id}', 'Photo', 'delete'),
        'photo_list' => array('/photo/list', 'Photo', 'list'),
        'photo_save' => array('/photo/save', 'Photo', 'save'),
        'photo_add' => array('/photo/add', 'Photo', 'add'),

        'navigation_edit' => array('/navigation/edit/{id}', 'Navigation', 'edit'),
        'navigation_delete' => array('/navigation/delete/{id}', 'Navigation', 'delete'),
        'navigation_list' => array('/navigation/list', 'Navigation', 'list'),
        'navigation_save' => array('/navigation/save', 'Navigation', 'save'),
        'navigation_add' => array('/navigation/add', 'Navigation', 'add'),

        'article_edit' => array('/article/edit/{id}', 'Article', 'edit'),
        'article_delete' => array('/article/delete/{id}', 'Article', 'delete'),
        'article_list' => array('/article/list', 'Article', 'list'),
        'article_save' => array('/article/save', 'Article', 'save'),
        'article_add' => array('/article/add', 'Article', 'add'),

        'articlephoto_edit' => array('/articlephoto/edit/{id}', 'ArticlePhoto', 'edit'),
        'articlephoto_delete' => array('/articlephoto/delete/{id}', 'ArticlePhoto', 'delete'),
        'articlephoto_list' => array('/articlephoto/list', 'ArticlePhoto', 'list'),
        'articlephoto_save' => array('/articlephoto/save', 'ArticlePhoto', 'save'),
        'articlephoto_add' => array('/articlephoto/add', 'ArticlePhoto', 'add'),
	),

	'menu' => array(
        'children' => array(
            'title' => 'Подчиненные', 'sections' => array(
                'Photo' => array('title' => 'Фотографии', 'route' => 'photo_list', 'params' => array()),
                'ArticlePhoto' => array('title' => 'Фотографии к статьям', 'route' => 'articlephoto_list', 'params' => array()),
            )
        ),
        'content' => array(
            'title' => 'Контент', 'sections' => array(
                'Navigation' => array('title' => 'Разделы', 'route' => 'navigation_list', 'params' => array()),
                'Article' => array('title' => 'Статьи', 'route' => 'article_list', 'params' => array()),
            )
        ),
		'sys' => array(
			'title' => 'Системные', 'sections' => array(
				'User' => array('title' => 'Пользователи', 'route' => 'user_list', 'params' => array()),
				'Setting' => array('title' => 'Настройки сайта', 'route' => 'setting_list', 'params' => array()),
				'Logs' => array('title' => 'Логи', 'route' => 'logs_list', 'params' => array()),
			)
		),


		'logout' => array(
			'title' => 'Выход', 'sections' => array(
				'Auth' => array('title' => '', 'route' => 'logout'),
			),
		)
	),
);
