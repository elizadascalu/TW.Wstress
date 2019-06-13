<?php 


require_once('Models/RegisterModel.php');
require_once('Views/RegisterView.php');

class RegisterController{
    public function __construct(){
        $model = new RegisterModel();

        $view = new RegisterView();
        $model->checkRegister();

        $view->setErrors($model->getErrors());
        $view->generate();
        
    }
}
?>