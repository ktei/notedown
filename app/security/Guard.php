<?php

class Guard {

    private static $anoymousList = array(
        'public' => 'all'
    );

    public static function allowAnonymous($class, $action) {
        if (!empty(self::$anoymousList[$class])) {
            if (self::$anoymousList[$class] == 'all') {
                return true;
            }

            return in_array($action, self::$anoymousList[$class]);
        }
        return false;
    }

}
