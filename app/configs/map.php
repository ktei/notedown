<?php
global $_ROUTER;
/*
 * Starting from here, add customized routing rules.
 */
$_ROUTER->map('GET', '/', array('controller' => 'public', 'action' => 'index'), 'home');
$_ROUTER->map('GET|POST', '/[a:controller]/[a:action]', array(), 'std');
