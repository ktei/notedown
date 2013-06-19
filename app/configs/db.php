<?php

if (is_devenv()) {
    DAO::setDbName('notedown');
    DAO::setHost('localhost');
    DAO::setPssword('admin');
    DAO::setUsername('admin');
} else {

    $services_json = json_decode(getenv("VCAP_SERVICES"), true);
    $mysql_config = $services_json["mysql-5.1"][0]["credentials"];
    $username = $mysql_config["username"];
    $password = $mysql_config["password"];
    $hostname = $mysql_config["hostname"];
    $db = $mysql_config["name"];

    
    DAO::setDbName($db);
    DAO::setHost($hostname);
    DAO::setPssword($password);
    DAO::setUsername($username);
}