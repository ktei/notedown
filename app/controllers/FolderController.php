<?php

class FolderController extends Controller {

    public function index() {
        $svc = ServiceFactory::getFolderService();
        $this->assign('folders', $svc->getFolders(AuthProvider::getUserId()));
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
    
    public function delete($params) {
        $folderId = $params['id'];
        $svc = ServiceFactory::getFolderService();
        $svc->deleteFolder($folderId);
        redirect('/folder');
    }

}

