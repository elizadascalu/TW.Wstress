<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="">
	<meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>HTML - Wstress</title>
        <link rel="stylesheet" type="text/css" href="css/Wstress.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        
</head>
<body>

<div class="content">
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
	<!-- notification message -->
	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3 style="font-family: Ubuntu;  color:white">
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
		<?php endif ?>

		<?php  if (isset($_SESSION['username'])) : ?>
    	<p style="font-family: Ubuntu;  color:white">Welcome <strong><?php echo $_SESSION['username']; ?></strong> !</p>
		<?php endif ?>
      
      <h1 class="titlu">WSTRESS TOOL</h1>
<form method='post'>
      <label class="url" style="font-family: Ubuntu;  color:white" >Enter a URL </label> <br> <br>
        <input class="link" id="url" type="url" name ="url" placeholder="https://example.com" pattern="https://.*" size="30" required/>
      <button class="submit" type="submit" id="sentButton"> Run Test  </button>
    

      </form>
      </div>
    <!-- logged in user information -->
    
</div>
		
</body>
</html>