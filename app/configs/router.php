<?php

require_once './app/libs/router/AltoRouter.php';
require_once './app/security/AuthProvider.php';
require_once './app/security/Guard.php';

class Router extends AltoRouter {

    public function dispatch() {
        $match = $this->match();
        if (empty($match)) {
            throw new PageNotFoundException('No match found.');
        }
        $parts = array_merge($match['params'], $match['target']);

        if (!array_key_exists('controller', $parts)) {
            throw new PageNotFoundException('No controller found.');
        }
        if (!array_key_exists('action', $parts)) {
            throw new PageNotFoundException('No action found.');
        }
        $controller = strtolower($parts['controller']);
        $action = strtolower($parts['action']);
        $controllerClass = ucwords($controller) . 'Controller';

        if (!class_exists($controllerClass)) {
            throw new PageNotFoundException('No such controller found: ' . $controllerClass);
        }
        if (!method_exists($controllerClass, $action)) {
            throw new PageNotFoundException("No such method found on $controllerClass: $action");
        }

        Guard::allowAnonymous($controller, $action) || AuthProvider::isAuthenticated() ||
                self::ThrowException(new NotAuthenticatedException());

        // Instinate the controller by mapped controller name
        $controllerInstance = new $controllerClass($parts);

        // Assign default page vars
        global $_SMARTY;
        $_SMARTY->assign('controller', $controller);
        $_SMARTY->assign('action', $action);
        $_SMARTY->assign('params', $parts);
        $_SMARTY->assign('page', "$controller/$action");
        $_SMARTY->assign('layout', 'default');

        // Call mapped controller and execute mapped action
        call_user_func(array($controllerInstance, $action), $parts);

        // Render the page to user
        $_SMARTY->display('page.tpl');
    }

    private static function ThrowException($exception) {
        throw $exception;
    }

}
