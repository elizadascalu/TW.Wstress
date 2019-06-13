<?php
require_once('Models/HomeModel.php');
require_once('Views/HomeView.php');
class HomeController{
    public function __construct(){
        $model = new HomeModel();
        $view = new HomeView();
        if (isset( $_POST["url"])) {
            $model->setURL($_POST["url"]);
        
            $headers = $model->headers_check();
            $view->resultHeaders($headers);

             $cssValidator =  $model->cssValidator('errors');
             $view->resultCSS($cssValidator);

            $mapping = $model->mapping();
            $view->resultMapping($mapping);

            $bigImages = $model->bigImages();
            $view->resultImages($bigImages);

            $concurenta = $model->concurenta();
            $view->resultConcurenta($concurenta);

            $view->displayResults();


        }
        else{
            $view->generate();
        }
    }
}