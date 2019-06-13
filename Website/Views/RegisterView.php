<?php

class RegisterView{
    private $errors = array();

    public function __construct(){

    }

    public function generate(){
        include 'Views/templates/register.php';
    }

    public function setErrors($err){
        $this->errors = $err;
    }
}