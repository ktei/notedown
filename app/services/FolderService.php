<?php

class FolderService {
    
    public function nameExists($name) {
        return DAO::scalar('select count(name) from folders where name=:name',
                array('name' => $name)) > 0;
    }

    public function createFolder($model) {
        $dao = DaoFactory::getFolderDAO();
        return $dao->insert(array(
                    'user_id' => $model->userId,
                    'name' => $model->name
                ));
    }
    
    public function getFolders($userId) {
        
    }
}

