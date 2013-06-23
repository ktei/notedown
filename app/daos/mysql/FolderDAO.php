<?php

class FolderDAO extends DAO {

    public function __construct() {
        parent::__construct('folders');
        $this->addAutoIncPK('id');
        $this->addRequiredInt('user_id');
        $this->addRequired('name');
        $this->addRequiredInt('note_count');
        $this->addRequiredDate('created_date');
    }

}

