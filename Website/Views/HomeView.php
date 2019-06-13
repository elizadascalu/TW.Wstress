<?php

class HomeView{
    private $headers;
    private $css;
    private $mapping;
    private $bigImages;
    private $concurenta;

    public function __construct(){

    }

    public function generate(){
        include 'Views/templates/home.php';
    }

    public function displayResults(){
        include 'Views/templates/results.php';
    }

    public function resultHeaders($headers){
        $this->headers = $headers;
    }

    
    public function resultCSS($css){
        $this->css = $css;
    }

    public function resultMapping($mapping){
        $this->mapping = $mapping;
    }

    public function resultImages($images){
        $this->bigImages = $images;
    }

    
    public function resultConcurenta($concurenta){
        $this->concurenta = $concurenta;
    }
}