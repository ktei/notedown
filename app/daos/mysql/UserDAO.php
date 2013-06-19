<?php

class UserDAO extends DAO {

    public function __construct() {
        parent::__construct('users');
        $this->addAutoIncPK('id');
        $this->addRequired('username');
        $this->addRequired('email');
        $this->addRequired('password');
        $this->addRequiredInt('status');
    }

}

