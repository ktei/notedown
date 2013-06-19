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
        $user = null;
        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $user = DAO::first('select id, username, password, email, status from users where email=:email', array(':email' => $username));
        } else {
            $user = DAO::first('select id, username, password, email, status from users where username=:username', array(':username' => $username));
        }
        
        if ($user && $user['password'] == $password) {
            $_SESSION['user'] = array(
                'id' => $user['id'],
                'username' => $user['username'],
                'email' => $user['email'],
            );
            return true;
        }
        return false;
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

