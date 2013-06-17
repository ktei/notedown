<?php
// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV',
              (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV')
                                         : 'production'));

require_once __DIR__ . '/autoload.php';
require_once './app/shared/utilities.php';

/*
 * Setup template engine (Smarty)
 */
require_once './app/libs/smarty/Smarty.class.php';
$_SMARTY = new Smarty();
$_SMARTY->setTemplateDir('./app/views/templates');
$_SMARTY->setCompileDir('./app/views/templates_c');
$_SMARTY->setConfigDir('./app/views/configs');
$_SMARTY->setCacheDir('./app/views/cache');

/*
 * Setup router and routing map
 */
require_once __DIR__ . '/router.php';
$_ROUTER = new Router();
require_once __DIR__ . '/map.php';