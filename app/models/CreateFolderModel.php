<?php

class CreateFolderModel extends SubmitModel {

    private $userId;
    private $name;

    public function __construct($userId) {
        $this->userId = $userId;
        if (isset($_POST['name'])) {
            $this->name = trim($_POST['name']);
        }
    }

    public function validate() {
        $nameErr = $this->validateName();
        if (!empty($nameErr)) {
            $this->addError('name', $nameErr);
        }
    }

    protected function _do() {
        $svc = ServiceFactory::getFolderService();
        return $svc->createFolder($this);
    }

    protected function get_userId() {
        return $this->userId;
    }

    protected function get_name() {
        return $this->name;
    }

    protected function set_name($name) {
        $this->name = $name;
    }

    private function validateName() {
        $data = $this->get_name();
        if (empty($data)) {
            return 'Name is required.';
        }
        if (strlength($data) > 100) {
            return 'Name can contain at most 100 characters.';
        }
        $svc = ServiceFactory::getFolderService();
        if ($svc->nameExists($this->get_name())) {
            return 'This name already exists.';
        }
        return '';
    }

}

