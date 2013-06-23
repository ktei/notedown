<?php


class ServiceFactory {
    private static $userSvc;
    private static $folderSvc;
    
    public static function getUserService() {
        if (!isset(self::$userSvc)) {
            self::$userSvc = new UserService();
        }
        return self::$userSvc;
    }
    
    public static function getFolderService() {
        if (!isset(self::$folderSvc)) {
            self::$folderSvc = new FolderService();
        }
        return self::$folderSvc;
    }
}


