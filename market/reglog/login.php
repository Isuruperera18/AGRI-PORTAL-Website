<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="/market/css/logreg.css">
</head>
<?php include('../header.php') ?>
<body>
<div class="log_wrapper">
	<div class="header">
		<h2>Login</h2>
	</div>

<form class="pure-form pure-form-aligned" method="post" action="login.php">

		<?php include('errors.php'); ?>

		<fieldset>
        <div class="pure-control-group">
            <label for="aligned-name">NIC</label>
            <input type="text" name="username" id="aligned-name" placeholder="හැඳුනුම්පත් අංකය" />
        </div>
        <div class="pure-control-group">
            <label for="aligned-password">Password</label>
            <input type="password" name="password" id="aligned-password" placeholder="රහස් පදය" />
        </div>
        <div class="pure-controls">
            <label for="aligned-cb" class="pure-checkbox">
            <button type="submit" name="login_user" class="pure-button pure-button-primary">Submit</button>
        </div>
    </fieldset>
	</form>
</div>

</body>

</html>