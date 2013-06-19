<?php

class UserService {

    public static function emailExists($email) {
        return DAO::scalar('select count(email) from users where email=:email', array(':email' => $email)) > 0;
    }

    public static function usernameExists($username) {
        return DAO::scalar('select count(username) from users where username=:username', array(':username' => $username)) > 0;
    }

    public static function getUsernameById($userId) {
        return DAO::scalar('select username from users where id=:id', array(':id' => $userId));
    }

    public static function signup($model) {
        $dao = DaoFactory::getUserDAO();
        return $dao->insert(array(
                    'username' => $model->username,
                    'email' => $model->email,
                    'password' => $model->password,
                    'status' => UserStatus::ACTIVE
                ));
    }

}

