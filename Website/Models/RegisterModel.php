<?php

class RegisterModel{
    
    private $errors=array();

    public function __construct(){


    }
     public function checkRegister()
     {
         $this->errors=array();
         // connect to the database
$db = mysqli_connect('localhost', 'root', '', 'proiect');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $this->errors array
  if (empty($username)) { array_push($this->errors, "Username is required"); }
  if (empty($email)) { array_push($this->errors, "Email is required"); }
  if (empty($password_1)) { array_push($this->errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($this->errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($this->errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($this->errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($this->errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in"; 
      header("Location: ?p=home");
      die();
  }
}
     }

    public function getErrors(){
        return $this->errors;
    }
}