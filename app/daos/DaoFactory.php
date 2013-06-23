<?php

class DaoFactory {

    private static $userDAO;
    private static $folderDAO;

    public static function getUserDAO() {
        if (!isset(self::$userDAO)) {
            self::$userDAO = new UserDAO();
        }
        return self::$userDAO;
    }
    
    public static function getFolderDAO() {
        if (!isset(self::$folderDAO)) {
            self::$folderDAO = new FolderDAO();
        }
        return self::$folderDAO;
    }

}

