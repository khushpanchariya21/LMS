

<!DOCTYPE html>
<html lang="en">
<head>
	
  <title>student login page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
  
	<style type="text/css">
		input[type="text"]::placeholder	
		{
			text-align: center;
		}
		input[type="password"]::placeholder
		{
			text-align: center;
		}
		  .bg1{
  background-color: rgba(255,255,255,0.8);
  position: absolute;
  
}
	</style>
</head>
<body>
	<div class="navbar">
  <a >Library Management System</a>
  <a class="active" href="index.html">Home</a>
  <a href="f_login.php">Admin</a>
 
  <a href="index.html" style="float:right">Login</a>
</div>
<?php
session_start();
error_reporting(0);
include("connection.php");
if(isset($_SESSION['s_name_of_user']))
{
	header("location:s_profile.php");
}
if(isset($_SESSION['f_name_of_user']))
{
	header("location:f_profile.php");
}
?>

<div class="container ">
  <div class="row ">
    <div class="col-sm-6 ">
      <div class="container-fluid">
      <form action="" method="POST" class="form-4">
	<h1>Student Login : </h1>
	 <p>
         <label for="login">Username or email</label>
		 <input type="text" name="s_username" placeholder="Username" id="s_username" required><br/><br/>
		</p>
		<p>
			<label for="password">Password</label>
			<input type="password" name="s_password" placeholder="Password" id="s_password" required><br/><br/>
		</p>
		<p>

		<input type="checkbox" name="check1" id="check1" onclick="showpword1()"> Show Password<br/><br/>
		<input type="submit" name="s_submit" value="Login">
	</p>
	</form>

		<?php

			if(isset($_POST['s_submit']))
			{
				$s_uname = $_POST['s_username'];
				$s_uname = trim($s_uname," ");
				$s_pword = $_POST['s_password'];

				$sql = "select * from login where username='".$s_uname."' and password='".$s_pword."' and type='s';";

				$result = $con->query($sql);

				if($result->num_rows == 1)
				{
					$row = $result->fetch_assoc();
					$_SESSION['s_name_of_user'] = $s_uname;
					$_SESSION['s_password_of_user'] = $s_pword;
					$_SESSION['s_rollnumber_of_user'] = $row['lid'];
					header("location:s_profile.php");
				}
				else
				{
					echo "Login Failed";
				}
			}

		?>
	</div>
</div>
  <div class="col-sm-6 ">
      <div class="container-fluid">
  
      <form action="" method="POST" class="form-4">

	<h1>Sign Up : </h1>
	<p>
		<label for="signup">Username or email</label>
	
		 <input type="text" name="signup_username" id="signup_username" placeholder="Username" required><br/><br/>
		</p>
		<p>
		<label for="password">Password</label>

		 <input type="password" name="signup_password" id="signup_password" placeholder="Password" required><br/><br/>
		</p>
		<p>
		<input type="checkbox" name="check2" id="check2" onclick="showpword2()"> Show Password<br/>
		<h4>Select which branch you belong to : </h4>
		<select name="s_branch">
			<option value="CSE">CSE</option>
			<option value="ECE">ECE</option>
			<option value="EEE">EEE</option>
			<option value="MECH">MECH</option>
		</select><br/><br/>
	</p>
	<p>

		<input type="submit" name="signup_submit" value="Sign Up">
	</p>
	</form>


		<?php

			if(isset($_POST['signup_submit']))
			{
				$signup_uname = $_POST['signup_username'];
				$signup_pword = $_POST['signup_password'];

				$branch = $_POST['s_branch'];

				$sql = "insert into login(username,password,type,branch) values('".$signup_uname."','".$signup_pword."','s','".$branch."');";

				$result = $con->query($sql);

				if($result === true)
				{
					echo "Account Created Successfully";
				}
				else
				{
					echo "Sign Up Failed";
				}
			}

		?>
</div>
</div>
</div>
</div>

	<script type="text/javascript">
		function showpword1()
		{
			var x = document.getElementById('s_password');
			if(x.type == "password")
			{
				x.type = "text";
			}
			else
			{
				x.type = "password";
			}
		}
		function showpword2()
		{
			var x = document.getElementById('signup_password');
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
</body>
</html>
