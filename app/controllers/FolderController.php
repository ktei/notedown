<?php

class FolderController extends Controller {

    public function index() {
        
    }

    public function create() {
        $model = new CreateFolderModel(AuthProvider::getUserId());
        if ($this->isPost()) {
            try {
                if ($model->submit()) {
                    redirect('/folder');
                }
            } catch (Exception $e) {
                throw $e;
            }
        }

        $this->assign('model', $model);
    }

}

