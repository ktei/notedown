<?php

abstract class Controller {

    protected function isPost() {
        return ($_SERVER['REQUEST_METHOD'] === 'POST');
    }

    protected function isAjax() {
        return (isset($_SERVER['HTTP_X_REQUESTED_WITH'])
                && !empty($_SERVER['HTTP_X_REQUESTED_WITH'])
                && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
    }
    
    protected function assign($name, $value) {
        global $_SMARTY;
        $_SMARTY->assign($name, $value);
    }
    
    protected function json($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
    }

}

