<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/protected/vendor/yii/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/front.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);

$app = Yii::createWebApplication($config);

// Yii::app()->onBeginRequest = function($event){
// 	return ob_start("ob_gzhandler");
// };

// yii::app()->onEndRequest = function($event){

// };
// return ob_end_flush();
$app->runEnd('front');

// Yii::createWebApplication($config)->runEnd('front');
