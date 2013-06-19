<?php

function autoloadExceptions($className) {
    $filename = "./app/exceptions/" . $className . ".php";
    if (is_readable($filename)) {
        require_once $filename;
    }
}
spl_autoload_register('autoloadExceptions');

function autoloadControllers($className) {
    $filename = "./app/controllers/" . $className . ".php";
    if (is_readable($filename)) {
        require_once $filename;
    }
}
spl_autoload_register('autoloadControllers');

function autoloadModels($className) {
    $filename = "./app/models/" . $className . ".php";
    if (is_readable($filename)) {
        require_once $filename;
    }
}
spl_autoload_register('autoloadModels');

function autoloadMySqlDAOs($className) {
    $filename = "./app/daos/mysql/" . $className . ".php";
    if (is_readable($filename)) {
        require_once $filename;
    }
}
spl_autoload_register('autoloadMySqlDAOs');

function autoloadDAOs($className) {
    $filename = "./app/daos/" . $className . ".php";
    if (is_readable($filename)) {
        require_once $filename;
    }
}
spl_autoload_register('autoloadDAOs');

function autoloadServices($className) {
    $filename = "./app/services/" . $className . ".php";
    if (is_readable($filename)) {
        require_once $filename;
    }
}
spl_autoload_register('autoloadServices');
