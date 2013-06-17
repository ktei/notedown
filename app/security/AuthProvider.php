<?php

class AuthProvider {

    public static function getUserId() {
        if (self::isAuthenticated()) {
            $user = $_SESSION['user'];
            return $user['id'];
        }
        return false;
    }

    public static function getUsername() {
        if (self::isAuthenticated()) {
            $user = $_SESSION['user'];
            return $user['username'];
        }
        return false;
    }

    public static function isAuthenticated() {
        return isset($_SESSION['user']);
    }

    public static function authenticate($username, $password) {
        
    }

    public static function logout() {
        session_destroy();
    }

    public static function redirectToLogin() {
        $back = base64_encode($_SERVER['REQUEST_URI']);
        header("Location: /public/login?back=$back");
        exit();
    }

}

