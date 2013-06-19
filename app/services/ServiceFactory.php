<?php


class ServiceFactory {
    private static $userSvc;
    
    public static function getUserService() {
        if (!isset(self::$userSvc)) {
            self::$userSvc = new UserService();
        }
        return self::$userSvc;
    }
}


