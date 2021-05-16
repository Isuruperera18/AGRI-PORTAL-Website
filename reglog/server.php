<?php
session_start();

// variable declaration
$username = "";
$email = "";
$errors = array();
$_SESSION['success'] = "";
$_SESSION['accesslevel'] = "";

// connect to database
include "../db.php";

// REGISTER USER
if (isset($_POST['reg_user']))
{
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);

    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    $sql_u = "SELECT * FROM auth WHERE username='$username'";


    $res_u = mysqli_query($db, $sql_u);


    if (mysqli_num_rows($res_u) > 0)
    {
        array_push($errors, "NIC is already taken");
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
        $query = "INSERT INTO auth (username, password) 
					  VALUES('$username', '$password')";
        mysqli_query($db, $query);

        if ($username == 'admin')
        {
            $_SESSION['accesslevel'] = 'admin';

        }else {
			
			$_SESSION['accesslevel'] = 'farmer';
		}

        $_SESSION['username'] = $username;
		
        $_SESSION['success'] = "You are now logged in";
        header('location: ../index.php');
    }
}

// ...
// LOGIN USER
if (isset($_POST['login_user']))
{
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username))
    {
        array_push($errors, "Username is required");
    }
    if (empty($password))
    {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0)
    {
        $password = hash('sha256', $password);
        $query = "SELECT * FROM auth WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results) == 1)
        {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";

            if ($username == 'admin')
            {
                $_SESSION['accesslevel'] = 'admin';

            }else {
				$_SESSION['accesslevel'] = 'farmer';
			}

            $sql_access = "SELECT * FROM auth WHERE username='$username' and access='doa'";

            $res_access = mysqli_query($db, $sql_access);

            if (mysqli_num_rows($res_access) > 0)
            {
                $_SESSION['accesslevel'] = 'doa';

            }
			
			
			$sql_access = "SELECT * FROM auth WHERE username='$username' and access='keels'";

            $res_access = mysqli_query($db, $sql_access);

            if (mysqli_num_rows($res_access) > 0)
            {
                $_SESSION['accesslevel'] = 'keels';

            }
			
			
			

            header('location: ../index.php');
        }
        else
        {
            array_push($errors, "Wrong username/password combination");
        }
    }
}

