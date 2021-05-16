<?php


// variable declaration
$username = "";
$email = "";
$errors = array();


// connect to database

	session_start(); 

	if (!isset($_SESSION['username']) && $_SESSION['accesslevel'] !='admin') {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../index.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: ../index.php");
	}

include "../../db.php";

// REGISTER USER
if (isset($_POST['reg_user']))
{
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $access = mysqli_real_escape_string($db, $_POST['accesstype']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    $sql_u = "SELECT * FROM auth WHERE username='$username'";
    $sql_e = "SELECT * FROM auth WHERE email='$email'";

    $res_u = mysqli_query($db, $sql_u);
    $res_e = mysqli_query($db, $sql_e);

    if (mysqli_num_rows($res_u) > 0)
    {
        array_push($errors, "NIC is already taken");
    }

    if (mysqli_num_rows($res_e) > 0)
    {
        array_push($errors, "Email is aleady taken");
    }

    // form validation: ensure that the form is correctly filled
    if (empty($username))
    {
        array_push($errors, "Username is required");
    }

    if (empty($password_1))
    {
        array_push($errors, "Password is required");
    }

    if ($password_1 != $password_2)
    {
        array_push($errors, "The two passwords do not match");
    }

    // register user if there are no errors in the form
    if (count($errors) == 0)
    {
        $password = hash('sha256', $password_1); //encrypt the password before saving in the database
        $query = "INSERT INTO auth (username, email, password, access) 
					  VALUES('$username', '$email', '$password', '$access')";
        mysqli_query($db, $query);


		
        $_SESSION['success'] = "You are now logged in";
        header('location: ../../index.php');
    }
}

// ...


