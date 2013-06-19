<?php

class DaoFactory {

    private static $userDAO;

    public static function getUserDAO() {
        if (!isset(self::$userDAO)) {
            self::$userDAO = new UserDAO();
        }
        return self::$userDAO;
    }

}

