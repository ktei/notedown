<?php

class LoginModel extends SubmitModel {

    private $username;
    private $password;

    public function __construct() {
        if (isset($_POST['username'])) {
            $this->username = trim($_POST['username']);
        }
        if (isset($_POST['password'])) {
            $this->password = $_POST['password'];
        }
    }

    public function validate() {
        $usernameErr = $this->validateUsername();
        if (!empty($usernameErr)) {
            $this->addError('username', $usernameErr);
        }
        $passwordErr = $this->validatePassword();
        if (!empty($passwordErr)) {
            $this->addError('password', $passwordErr);
        }
    }

    protected function _do() {
        if (!AuthProvider::authenticate($this->username, $this->password)) {
            $this->addError('login', 'Invalid combination of username/email and password');
            return false;
        }
    }

    protected function get_username() {
        return $this->username;
    }

    protected function get_password() {
        return $this->password;
    }

    private function validateUsername() {
        $data = $this->get_username();
        if (empty($data)) {
            return 'username or email is required.';
        }
        return '';
    }

    private function validatePassword() {
        $data = $this->get_password();
        if (empty($data)) {
            return 'Password is required.';
        }
        return '';
    }

}

