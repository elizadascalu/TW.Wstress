<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="">
	<meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>HTML</title>
        <link rel="stylesheet" type="text/css" href="css/Wstress.css">
        <link rel="stylesheet" type="text/css" href="css/result.css">
        <link rel="stylesheet" type="text/css" href="css/base.css">
        <link rel="stylesheet" type="text/css" href="css/mapping.css">
        

</head>
<body>

<nav class="header">
      <ul>
            <li>
                <a class="home" href="?p=home">New Stress-Test </a>
            </li>
            
            <li>
                <a class="home" href="?p=logout"> Log Out </a>
            </li>
      </ul>
    </nav>

<h4 style="color:purple;">Images that can pe compressed:</h4> <br><br>

    <ul> 
<?php foreach($this->bigImages as $img):?>
    <li>
        <?=$img?>
    </li>
<?php endforeach;?>
</ul>
<br><br><br>

<h4 style="color:purple;">Pages of the site mapping:</h4><br><br>

<?php
 echo $this->mapping;
?>
<ul>
<?php foreach($this->mapping as $link):?>
    <li>
        <?=$link?>
    </li>
<?php endforeach;?>
</ul>
<br><br><br>

<h4 style="color:purple;">Performance stats:</h4><br><br>

<?php

 var_dump($this->concurenta);
?>
<br><br><br>

<h4 style="color:purple;">CSS validator</h4>
<p>Number of errors:</p>

<?php
 echo $this->css[0]; 
 echo $this->css[1];?>
 <br><br>


 <h4 style="color:purple;">Headers:</h4><br><br>
 
 <?php
 echo $this->headers;
 ?>

</body>
</html>