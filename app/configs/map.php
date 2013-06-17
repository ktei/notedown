<?php
global $_ROUTER;
/*
 * Starting from here, add customized routing rules.
 */
$_ROUTER->map('GET', '/', array('controller' => 'public', 'action' => 'index'), 'home');
$_ROUTER->map('GET|POST', '/[a:controller]/[a:action]', array(), 'std');
$_ROUTER->map('GET|POST', '/[a:controller]/[a:action]/[i:id]', array(), 'std_with_id');
$_ROUTER->map('GET|POST', '/[a:controller]', array('action' => 'index'), 'controller_default');
