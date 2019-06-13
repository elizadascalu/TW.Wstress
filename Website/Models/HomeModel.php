<?php

class HomeModel{
    public $string;
    public $resource;
    
    public function __construct(){
        
    }

    public function setURL($string){
        $this->string = $string;
    }

    public function headers_check(){
        $c = curl_init ();
        curl_setopt ($c, CURLOPT_URL, 'https://api.hackertarget.com/httpheaders/?q='.$this->string);              // stabilim URL-ul serviciului
        curl_setopt ($c, CURLOPT_RETURNTRANSFER, true);  // rezultatul cererii va fi disponibil ca șir de caractere
        curl_setopt ($c, CURLOPT_SSL_VERIFYPEER, false); // nu verificam certificatul digital
        $res = curl_exec ($c);                           // executam cererea GET
        curl_close ($c);
        
        $response = htmlentities ($res);
        return $response;    
      }

      public function cssValidator($type){
      
        $url = $this->string;
        $url = str_replace("https://", "", $url); 
        $url = str_replace("http://", "", $url); 
        $url = str_replace("www.", "", $url); 
        $url = rtrim ($url , '/');
  
        $homepage = file_get_contents('https://jigsaw.w3.org/css-validator/validator?uri=https%3A%2F%2F'.$url.'%2F&profile=css3svg&usermedium=all&warning=1&vextwarning=&lang=en&fbclid=IwAR0_Z019tLQe936b0s6LiiIzIb5zP3v2O7PJCPMyAiTChSXrNeok46RtRS4/');

        $errAndWar = array();

        if(strpos($homepage,"Congratulations")===false) {
            $homepage = strstr($homepage,"Sorry");
                if(strpos($homepage,"errors")!==false)  
                    $homepage = strstr($homepage,"errors");
            
                    array_push($errAndWar,substr($homepage, 0, strpos($homepage, "Top")));
                    $homepage = strstr($homepage,"Warnings");
                    array_push($errAndWar,substr($homepage, 0, strpos($homepage, "Valid CSS")));
      }
      else {
        $homepage = strstr($homepage,"hotlist");
        $homepage = strstr($homepage,"Warnings"); 
        array_push($errAndWar,substr($homepage, 0, strpos($homepage, "Top")));
      }
      return $errAndWar;
          
    }
//     public function concurenta(){
      
//       $vector = array();
//       $concurency = exec("C:\xampp\apache\bin\ab.exe -n 50 -c 10 " . $this->model->string,$tags); // cate 10 teste de concureta de 50 de ori
//       return $tags;

//  }

    public function concurenta(){
          
      $vector = array();

      $concurency = shell_exec("ab -n 50 -c 10 " . $this->model->string); // cate 10 teste de concureta de 50 de ori
      $mark = 0;
      $string = json_encode($concurency);
      
      $tags = explode('\n',$string);
      $return_string = array();
      foreach($tags as $key) {    
        $string = array();
        $myArray = str_split($key);

        foreach($myArray as $character){
            if($character != '"' and $character != "/" )  array_push($string,$character) ;
        }
        array_push($return_string,$string);
        }
      return $return_string;
    }

    public function mapping(){

        $poz = 0;
        $links = file_get_contents('https://api.hackertarget.com/pagelinks/?q='.$this->string);
   
        $tags = explode("\n" ,$links);
             
        $stack = array();
        foreach($tags as $key) {    
          $poz = $poz + 1;
          if($poz > 1 and (strpos($key,"https://") !==false or strpos($key,"http://") !==false ) )
            
       { array_push($stack,$key);
        
        $response = htmlentities ($key);
       }
         
        }
       return $stack;
      }
      public function bigImages(){
        // scoate warningurile
         error_reporting(E_ERROR | E_PARSE);
         $doc = new DOMDocument();
         // load remote HTML file
         $doc->loadHTMLFile( $this->string );
         
         // create DOMXPath
         $xpath = new DOMXPath( $doc );
         // fetch all IMG elements that have a src attribute
         $nodes = $xpath->query( '//img[@src]' );
         
         // loop trough found IMG elements and echo their src attribute values
         $images=array();
         for( $i = 0; $i < $nodes->length; $i++ ) {
         
          if( strcmp(substr($nodes->item( $i )->getAttribute( 'src' ) . PHP_EOL, -4),"jpg ") == -5632 )  //
           array_push($images,($nodes->item( $i )->getAttribute( 'src' ) . PHP_EOL."<br>")); 
           array_push($images,$nodes->item( $i )->getAttribute( 'src' ) . PHP_EOL."<br>");

         }
         return $images;
    }

    public function response_time(){
      $ch = curl_init($this->model->string); 
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
      if(curl_exec($ch))
      {
      $info = curl_getinfo($ch);
      echo 'A durat ' . $info['total_time'] . ' secunde sa tranferam un request la ' . $info['url'];
      }
  
    }
}