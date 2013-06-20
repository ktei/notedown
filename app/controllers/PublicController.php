<?php

class PublicController extends Controller {

    public function index() {
        if (AuthProvider::isAuthenticated()) {
            redirect('/folder');
        }
        return;
    }

    public function signup() {
        $model = new SignupModel();
        if ($this->isPost()) {
            try {
                if ($model->submit()) {
                    AuthProvider::authenticate($model->email, $model->password);
                    redirect('/');
                }
            } catch (Exception $e) {
                throw $e;
            }
        }

        $this->assign('model', $model);
    }

    public function login() {
        $model = new LoginModel();
        if ($this->isPost()) {
            try {
                if ($model->submit()) {
                    redirect('/');
                }
            } catch (Exception $e) {
                throw $e;
            }
        }
        $this->assign('model', $model);
    }

    public function error404() {
        return;
    }

}
