<?php

// change the following paths if necessary
define('APP_PATH', dirname(__FILE__));
$yii=APP_PATH.'/yii/framework/yii.php';
$config=APP_PATH.'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();
