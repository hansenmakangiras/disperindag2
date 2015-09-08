<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'Disperindag',

    // preloading 'log' component
    'preload'=>array('log','session'),
    //'onBeginRequest' => array('ModuleUrlManager','collectRules'),

    // autoloading model and component classes
    'import'=>array(
        'application.models.*',
        'application.components.*',

    ),
    'modules'=>array(
        // uncomment the following to enable the Gii tool

        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'disperindag',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters'=>array('127.0.0.1','::1'),
        ),

    ),

    // application components
    'components'=>array(
        'metadata'=>array('class'=>'Metadata'),
        'mobileDetect' => array(
            'class' => 'ext.EMobileDetect.MobileDetect'
        ),

        'user'=>array(
            // enable cookie-based authentication
	        'class' => 'application.components.DWebUser',
            'allowAutoLogin'=>true,
            //'loginUrl' => array('site/login'),
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager'=>array(
            'urlFormat'=>'path',
            'showScriptName' =>false,
            'rules'=>array(
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ),
        ),
        // 'assetManager' => array(
        //     'class' => 'CAssetManager',
        //     'basepath' => realpath(__DIR__ . '/../../assets'),
        //     'baseUrl' => '/assets',
        // ),
        // 'widgetFactory' =>array(
        //     'widgets' => array(
        //         'CLinkPager'=>array(
        //             'pageSize' => 10,
        //         ),
        //     ),
        // ),
        'cache' => array(
            //'class' => 'CFileCache',
            'class' => 'system.caching.CApcCache',
            'keyPrefix' => 'd!5p3r!nd@g',
        ),
        'sessionCache' => array(
            'class' => 'CApcCache',
        ),
        // Handling Session
        'session' => array(
            //'class' => 'CDbHttpSession',
            'class' => 'CHttpSession',
            //'autoStart' => false,
            'sessionName' => 'DISPSESSID',
//            'connectionID' => 'db',
//            'sessionTableName' => 'sys_session',
//            'autoCreateSessionTable' => false,
//            'useTransparentSessionID' => true,
            //'useTransparentSessionID' => ($_POST['DISPSESSID']) ? true : false,
            'cookieMode' => 'only',
            //'savePath' => dirname(__DIR__).'\runtime\session',
            'timeout' => Yii::app()->params['sessionTimeout'],
            'gCProbability' => 100,
        ),

        // database settings are configured in database.php
        'db'=>require(dirname(__FILE__).'/database.php'),

        'errorHandler'=>array(
            // use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
        'clientScript' => array(
            'class' => 'application.components.DClientScript',
            'coreScriptPosition' => 2, // == POS_END
            //set compression and combined only to FALSE when in development stage
            // 'combineOnly' => FALSE,
            //'enableCompression' => FALSE,
            'scriptMap' => array(
                'jquery.js' => FALSE,
                'jquery.min.js' => FALSE,
                'jquery-ui.js' => FALSE,
                'jquery-ui.min.js' => FALSE,
                'jquery.ba-bbq.js' => FALSE,
            ),
            'packages' => array(
                'front-js' => array(
                    'basePath' => 'webroot.themes.front.assets',
                    'js' => array(
                        // 'js/jquery-2.0.3.min.js',
                        // 'js/jquery-ui.js',
                        'plugin/bootstrap-3.3.1/js/bootstrap.min.js',
                        'plugin/modernizr/modernizr.js',
                        'plugin/owlcarousel/owl-carousel/owl.carousel.js',
                        'js/custom.js',
                    ),
                ),
                'front-css' => array(
                    'basePath' => 'webroot.themes.front.assets',
                    'css' => array(
                        'css/jquery-ui.css',
                        'plugin/bootstrap-3.3.1/css/bootstrap.min.css',
                        'plugin/owlcarousel/owl-carousel/owl.carousel.css',
                        'plugin/owlcarousel/owl-carousel/owl.theme.css',
                    ),
                ),
            ),
        ),
        // 'log'=>array(
        // 	'class'=>'CLogRouter',
        // 	'routes'=>array(
        // 		array(
        // 			'class'=>'CFileLogRoute',
        // 			'levels'=>'error, warning',
        // 		),
        // 		// uncomment the following to show log messages on web pages
        //
        // 		// array(
        // 		// 	'class'=>'CWebLogRoute',
        // 		// ),
        //
        // 	),
        // ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
                    //'ipFilters'=>array('127.0.0.1','192.168.1.250'),
                ),

            ),
        ),


    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params'=>array(
        // this is used in contact page
        'adminEmail'=>'webmaster@example.com',
        'cacheDuration' => 2592000,
        'sessionTimeout' => 3600 * 12,
        'itemPerPage' => 10,
        'themeBasePath' => 'themes'
    ),
    'behaviors' => array(
        'runEnd' => array(
            'class' => 'application.components.WebApplicationEndBehavior',
        ),
    ),
);
