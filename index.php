<?php
define('ENVIRONMENT', 'development');

switch(ENVIRONMENT)
{
    case 'development':
        $config = 'development.php';
        defined('YII_DEBUG') or define('YII_DEBUG', true);
        defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);
        break;

    case 'testing':
    case 'production':
        $config = 'main.php';
        break;
    default:
        exit('The application environment is not set correctly.');
}
$yii = dirname(__FILE__).'/../yii/framework/yii.php';
$config = dirname(__FILE__).'/protected/config/'.$config;
require_once($yii);
Yii::createWebApplication($config)->run();
