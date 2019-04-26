<?php
session_start();
error_reporting(0);
include("connection.php");
if(isset($_SESSION['f_name_of_user']))
{
	header("location:f_profile.php");
}
if(isset($_SESSION['s_name_of_user']))
{
	header("location:s_profile.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Manager Login Page</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
	<style type="text/css">
		input[type="text"]::placeholder	
		{
			text-align: center;
		}
		input[type="password"]::placeholder
		{
			text-align: center;
		}
	</style>
</head>
<body>
	<div class="navbar">
  <a class="active">Library Management System</a>
  <a class="active" href="index.html">Home</a>
  <a href="s_login.php">Student</a>
 
  <a href="f_login.html" style="float:right">Login</a>
</div>

<div class="container-fluid">
  <form action="" method="POST" class="form-4">
    <h1>Admin Login</h1>

    <p>
        <label for="login">Username or email</label>
        <input type="text" name="f_username" placeholder="Username or email" id="f_username"required>
    </p>
    <p>
        <label for="password">Password</label>
        <input type="password" name="f_password" placeholder="Password" id="f_password"required> 
    </p>

    <p>
      <input type="checkbox" name="check3" id="check3" onclick="showpword3()"> Show Password<br/><br/>
        <input type="submit" name="f_submit" value="Login">
    </p>       
  </form>
  <script type="text/javascript">
    function showpword3()
    {
      var x = document.getElementById('f_password');
      if(x.type == "password")
      {
        x.type = "text";
      }
      else
      {
        x.type = "password";
      }
    }
  </script>
</div>
</body>
</html>

<?php

if(isset($_POST['f_submit']))
{
	$f_uname = $_POST['f_username'];
	$f_uname = trim($f_uname," ");
	$f_pword = $_POST['f_password'];
	 
	$sql = "select * from login where username='".$f_uname."' and password='".$f_pword."' and type='m' and branch='manager'";

	$result = $con->query($sql);

	if($result->num_rows == 1)
	{
		$row = $result->fetch_assoc();
		$_SESSION['f_name_of_user'] = $f_uname;
		$_SESSION['f_password_of_user'] = $f_pword;
		$_SESSION['f_sr_of_user'] = $row['sr'];
		header("location:f_profile.php");
	}
	else
	{
		echo "Login Failed";
	}
}

?>