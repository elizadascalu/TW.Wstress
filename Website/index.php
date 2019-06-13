<?php

session_start(); 
$request = $_SERVER['REQUEST_URI'];
if($request=='/Website/?p=register')
{
    require __DIR__ . '/Controllers/RegisterController.php';
            $controller = new RegisterController();
            die(1);
}

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    require __DIR__ . '/Controllers/LoginController.php';
    $controller = new LoginController();
}
else{
    switch ($request) { 
        case '/Website/' :
            require __DIR__ . '/Controllers/HomeController.php';
            $controller = new HomeController();
            break;
        case '/Website' :
            require __DIR__ . '/Controllers/HomeController.php';
            $controller = new HomeController();
            break;
        case '/Website/?p=logout':
            session_destroy();
            unset($_SESSION['username']);
            header("Location: /Website");
            die();
            break;
        case '/Website/?p=home':
        require __DIR__ . '/Controllers/HomeController.php';
        $controller = new HomeController();
        break;

        default:
            echo '404';
            break;
    }
}
