<?php

class SignupModel extends SubmitModel {

    private $username;
    private $email;
    private $password;
    private $userSvc;

    public function __construct() {
        if (isset($_POST['username'])) {
            $this->username = trim($_POST['username']);
        }
        if (isset($_POST['email'])) {
            $this->email = trim($_POST['email']);
        }
        if (isset($_POST['password'])) {
            $this->password = $_POST['password'];
        }
        $this->userSvc = ServiceFactory::getUserService();
    }

    public function validate() {
        $usernameErr = $this->validateUsername();
        if (!empty($usernameErr)) {
            $this->addError('username', $usernameErr);
        }
        $emailErr = $this->validateEmail();
        if (!empty($emailErr)) {
            $this->addError('email', $emailErr);
        }
        $passwordErr = $this->validatePassword();
        if (!empty($passwordErr)) {
            $this->addError('password', $passwordErr);
        }
    }

    protected function _do() {
        $this->userSvc->signup($this);
    }

    protected function get_username() {
        return $this->username;
    }

    protected function get_email() {
        return $this->email;
    }

    protected function get_password() {
        return $this->password;
    }

    private function validateUsername() {
        $data = $this->get_username();
        if (empty($data)) {
            return 'Username is required.';
        }
        if (strlength($data) > 25) {
            return 'Username contain at most 25 characters.';
        }
        if ($this->userSvc->usernameExists($data)) {
            return 'Username already exists. Please pick another one.';
        }

        return '';
    }

    private function validateEmail() {
        $data = $this->get_email();
        if (empty($data)) {
            return 'Email is required.';
        }
        $isValid = true;
        $atIndex = strrpos($data, "@");
        if (is_bool($atIndex) && !$atIndex) {
            $isValid = false;
        } else {
            $domain = substr($data, $atIndex + 1);
            $local = substr($data, 0, $atIndex);
            $localLen = strlen($local);
            $domainLen = strlen($domain);
            if ($localLen < 1 || $localLen > 64) {
                // local part length exceeded
                $isValid = false;
            } else if ($domainLen < 1 || $domainLen > 255) {
                // domain part length exceeded
                $isValid = false;
            } else if ($local[0] == '.' || $local[$localLen - 1] == '.') {
                // local part starts or ends with '.'
                $isValid = false;
            } else if (preg_match('/\\.\\./', $local)) {
                // local part has two consecutive dots
                $isValid = false;
            } else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain)) {
                // character not valid in domain part
                $isValid = false;
            } else if (preg_match('/\\.\\./', $domain)) {
                // domain part has two consecutive dots
                $isValid = false;
            } else if (!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace("\\\\", "", $local))) {
                // character not valid in local part unless 
                // local part is quoted
                if (!preg_match('/^"(\\\\"|[^"])+"$/', str_replace("\\\\", "", $local))) {
                    $isValid = false;
                }
            } if ($isValid && !(checkdnsrr($domain, "MX") || checkdnsrr($domain, "A"))) {
                // domain not found in DNS
                $isValid = false;
            }
        }
        if (!$isValid) {
            return 'The email provided is not a valid.';
        }
        if ($this->userSvc->emailExists($data)) {
            return 'This email has been registered.';
        }
        return '';
    }

    private function validatePassword() {
        $data = $this->get_password();
        if (empty($data)) {
            return 'Password is required.';
        }
        if (strlength($data) > 25 || strlength($data) < 6) {
            return 'The password length must be between 6 and 25.';
        }
        return '';
    }

}

