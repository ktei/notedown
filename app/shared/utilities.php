<?php

function is_devenv() {
    return APPLICATION_ENV == 'development';
}

function redirect($dest) {
    $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    header("Location: http://$host$uri$dest");
    exit;
}
