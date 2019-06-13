<?php

class LoginModel{
    
    private $errors=array();

    public function __construct(){

    }

    public function checkLogin(){

        if (isset($_POST['login_user'])) {
            $db = mysqli_connect('localhost', 'root', '', 'proiect');

            $username = mysqli_real_escape_string($db, $_POST['username']);
            $password = mysqli_real_escape_string($db, $_POST['password']);

            if (empty($username)) {
                array_push($this->errors, "Username is required");
            }
            if (empty($password)) {
                array_push($this->errors, "Password is required");
            }
          
            if (count($this->errors) == 0) {
                $password = md5($password);
                $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
                $results = mysqli_query($db, $query);
                if (mysqli_num_rows($results) == 1) {
                  $_SESSION['username'] = $username;
                  $_SESSION['success'] = "You are now logged in";
                  header("Refresh:0");
                  die();
                }else {
                    array_push($this->errors, "Wrong username/password combination");
                }
            }
          }
    }

    public function getErrors(){
        return $this->errors;
    }
}