<?php include('server.php')?> 


<?php
	if (!isset($_SESSION['username']) && $_SESSION['accesslevel'] !='admin') {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../index.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: ../index.php");
	}

?>
	
<!DOCTYPE html>
<html>

<head>
	<title>SignUp</title>
	<link rel="stylesheet" type="text/css" href="/market/css/logreg.css">
	

	
	
</head>
<?php include('../../header.php') ?>

<body>
<div class="reglog_wrapper">
	<div class="header">
		<h2>Register</h2>
	</div>

<form class="pure-form pure-form-aligned" method="post" action="register.php">
    <fieldset>
	<?php include('errors.php'); ?>
        <div class="pure-control-group">
            <label for="aligned-name">Staff Username</label>
            <input name="username" type="text" id="aligned-name" placeholder="username" />
            
        </div>
        <div class="pure-control-group">
            <label for="aligned-password">Password</label>
            <input name="password_1" type="password" id="aligned-password" placeholder="password" />
        </div>
		<div class="pure-control-group">
            <label for="aligned-password">Password</label>
            <input name="password_2" type="password" id="aligned-password" placeholder="confirm the password" />
        </div>
		
		        <div class="pure-control-group">
            <label for="aligned-email">Email Address</label>
            <input name="email" type="email" id="aligned-email" placeholder="Email Address" />
        </div>
 
 		<div class="pure-control-group">
		<label for="aligned-name">Acess Level</label>
		<select class="pure-control-group" name="accesstype" id="pt">
  <option value="doa">DOA</option>
  <option value="keels">Keels</option>
</select>
 
 
 
 
        <div class="pure-controls">

            <button name="reg_user" type="submit" class="pure-button pure-button-primary">Submit</button>
        </div>
		<p>
			Already an user ? <a href="login.php">Sign in</a>
		</p>
    </fieldset>
</form>

	</div>
</body>

</html>