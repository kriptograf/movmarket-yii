<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'movmarket.biz',
    'language' => 'ru',
    'defaultController' => 'site/index',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'ext.setReturnUrl.ESetReturnUrlFilter',
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool

        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'admin',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
        'admin' => array(),
    ),
    // application components
    'components' => array(
        'clientScript' => array(
            'scriptMap' => array(
                'jquery.js' => false, //Отключаем родной файл jquery
            ),
        //'enableJavaScript'=>false,    // Эта опция отключает любую генерацию javascript'а фреймворком
        ),
        'email' => array(
            'class' => 'application.extensions.email.Email',
            'delivery' => 'php', //Будет использовать PHP функцию рассылки. 
        //Может также быть установлен на "debug", чтобы вместо дамп содержимого электронной почты в окно просмотра
        ),
        'Hierarchy' => array(
            'class' => 'ext.Hierarchy.Hierarchy',
        ),
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            'loginUrl' => array('/login'),
        ),
        'ih' => array(
            'class' => 'CImageHandler',
        ),
        'ckeditor' => array(
            'class' => 'CKEditor',
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'urlSuffix' => '.html',
            'rules' => array(
                'pages/<alias:\w+>' => 'pages/view',
                'admin' => 'admin/default/index',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<parent:\d+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        'db' => array(
            //'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
            'class' => 'CDbConnection',
            'connectionString' => 'mysql:host=localhost;dbname=board',
            'username' => 'mysql',
            'password' => 'mysql',
            'charset' => 'utf8',
            // включаем профайлер
            'enableProfiling'=>true,
            // показываем значения параметров
            'enableParamLogging' => true,
            'emulatePrepare' => true, // необходимо для некоторых версий инсталляций MySQL
        ),
        // uncomment the following to use a MySQL database
        /*
          'db'=>array(
          'connectionString' => 'mysql:host=localhost;dbname=testdrive',
          'emulatePrepare' => true,
          'username' => 'root',
          'password' => '',
          'charset' => 'utf8',
          ),
         */
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
                 array(
                    // направляем результаты профайлинга в ProfileLogRoute (отображается
                    // внизу страницы)
                    'class'=>'CProfileLogRoute',
                    'levels'=>'profile',
                    'enabled'=>true,
                ),
                // uncomment the following to show log messages on web pages
                array(
                    'class' => 'CWebLogRoute',
                    'levels' => 'error, warning',
                ),
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'vitaxa_prog@mail.ru',
        'config' => array(
            // указывают путь к CKFinder
            'filebrowserBrowseUrl' => "/ckeditor/kcfinder/browse.php",
            // указывают путь к кнопке на панели инструментов, чтобы загрузить изображения
            'filebrowserImageBrowseUrl' => "/ckeditor/kcfinder/browse.php?type=images",
            // указать путь для загрузки файлов из вкладки на панели инструментов (Quick Upload)
            'filebrowserUploadUrl' => "/ckeditor/kcfinder/upload.php?type=files",
            // указать путь для загрузки изображений с вкладки на панели инструментов (Quick Upload)
            'filebrowserImageUploadUrl' => "/ckeditor/kcfinder/upload.php?type=images"
        ),
    ),
);
