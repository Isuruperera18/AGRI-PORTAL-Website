<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>
	<title>SignUp</title>
	<link rel="stylesheet" type="text/css" href="/market/css/logreg.css">
	

	
	
</head>
<?php include('../header.php') ?>

<body>
<div class="reglog_wrapper">
	<div class="header">
		<h2>Register</h2>
	</div>

<form class="pure-form pure-form-aligned" method="post" action="register.php">
    <fieldset>
	<?php include('errors.php'); ?>
        <div class="pure-control-group">
            <label for="aligned-name">Username</label>
            <input name="username" type="text" id="aligned-name" placeholder="Username" />
            
        </div>
        <div class="pure-control-group">
            <label for="aligned-password">Password</label>
            <input name="password_1" type="password" id="aligned-password" placeholder="Password" />
        </div>
		<div class="pure-control-group">
            <label for="aligned-password">Password</label>
            <input name="password_2" type="password" id="aligned-password" placeholder="Confirm Password" />
        </div>
        <div class="pure-control-group">
            <label for="aligned-email">Email Address</label>
            <input name="email" type="email" id="aligned-email" placeholder="Email Address" />
        </div>
        <div class="pure-controls">
            <label for="aligned-cb" class="pure-checkbox">
                <input type="checkbox" id="aligned-cb" /> I&#x27;ve read the terms and conditions</label>
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