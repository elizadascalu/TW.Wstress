<?php

require_once('Models/LoginModel.php');
require_once('Views/LoginView.php');

class LoginController{
    public function __construct(){
        $model = new LoginModel();
        $view = new LoginView();

        $model->checkLogin();
        $view->setErrors($model->getErrors());
        $view->generate();
        
    }
}