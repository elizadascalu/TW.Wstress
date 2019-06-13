<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  
	 
  <form method="post" >
  <div class="header">
  	<h2 style="font-family: Ubuntu; text-align: center;">Login</h2>
  </div>
	<?php  
	if (count($this->errors) > 0) : ?>
	<div class="error">
		<?php foreach ($this->errors as $error) : ?>
		<p><?php echo $error ?></p>
		<?php endforeach ?>
	</div>
	<?php  endif ?>

  	<div class="input-group">

  		<input type="text" name="username" placeholder="Username">

  	</div>

  	<div class="input-group">

  		<input type="password" name="password" placeholder="Password">

  	</div>

  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user" style="font-family: Ubuntu;">Login</button>
  	</div>

  	<p style="font-family: Ubuntu;text-align: center; ">
  		Not yet a member? <a href="?p=register">Sign up</a>
  	</p>
  </form>
</body>
</html>