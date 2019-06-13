<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	
  <form method="post" >
		
  <div class="header">
  	<h2 style="font-family: Ubuntu; text-align: center;">Register</h2>
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
				<input type="text" placeholder="Username"  name="username" >
  	</div>
  	<div class="input-group">
			
  	  <input type="email" placeholder="Email"  name="email" >
  	</div>
  	<div class="input-group"> 

  	  <input type="password"  placeholder="Password"  name="password_1">
  	</div>
  	<div class="input-group"> 
  	  <input type="password"  placeholder="Repeat password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user"   onclick="check()">Register</button>
  	</div>
  	<p  style="font-family: Ubuntu;text-align: center;" >
  		Already a member? <a href="?p=login">Log in</a>
  	</p>
	</form>
	
	<script> 
          
    function checkPassword(form) { 
        password1 = form.password_1.value; 
        password2 = form.password_2.value; 
        if (password1 == '') 
            alert ("Please enter Password"); 
              
        else if (password2 == '') 
            alert ("Please enter confirm password"); 
              
        else if (password1 != password2) { 
            alert ("\nPassword did not match: Please try again...") 
            return false; 
        } 
        
    } 
</script> 
</body>
</html>