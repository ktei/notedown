<?php
/*
 * All the requests are redirected to here. We capture
 * the URI, analyze it by routing map, and then dispatch
 * the request to the mapped action of the mapped controller.
 */
require_once './app/configs/bootstrapper.php';
global $_ROUTER;
try {
    $_ROUTER->dispatch();
} catch (PageNotFoundException $e) {
    redirect('/public/error404');
}