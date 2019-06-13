<?php

class LoginView{
    private $errors = array();

    public function __construct(){

    }

    public function generate(){
        include 'Views/templates/login.php';
    }

    public function setErrors($err){
        $this->errors = $err;
    }
}