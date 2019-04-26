<?php
	session_cache_limiter('private_no_expire');
	session_start();
	error_reporting(0);
	include("connection.php");
	if(isset($_SESSION['f_name_of_user']))
	{
		// echo "<center><b style='font-size:30px;background-color:  #DAF7A6;border-radius: 25px;padding: 20px;opacity: 0.9;'>Welcome, ".$_SESSION['f_name_of_user']."</b></center><br><br>";
	}
	else
	{
		header("location:f_login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Details</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="admin_pro.css">

	
</head>
<body>	
	<div class="navbar">
  <a class="active">Library Management System</a>
  <a href="f_profile.php">Home</a>
  
  <a href="f_logout.php" style="float:right">Logout</a>
</div>
	<div class="containe">
	<form action="" method="post" class="form-4">
		<p>
			<label>	Enter the Name of Book : </label>
			<input type="text" name="book_name" placeholder="ENTER BOOK NAME" required><br/><br/>
		</p>
		<p>		
			<label>Number of Copies :</label> 
			<input type="text" name="copies" placeholder="COPIES" required><br/><br/>
		</p>
		<p>	
			<input class='button' type="submit" name="add_book_to_library" value="Add Book to Library">
		</p>
	</form><br/>	
	
	</div>
</body>
</html>

<?php
	if(isset($_POST['add_book_to_library']))
	{
		$book_name =  $_POST['book_name'];
		$number_of_copies = (int)$_POST['copies'];
		if($number_of_copies < 1)
		{
			echo "<center><br/><br/><b style='font-size:1em;background-color:green;border-radius:25px;padding:20px;opacity:0.9;'>Invalid Number of copies.</b><br/></center>";
		}
		else
		{
			$sql1 = "insert into books(book_name,number_of_copies) values('".$book_name."','".$number_of_copies."');";
			
			$result1 = $con->query($sql1);
			$sql2 = "UPDATE books SET lid = '-1' WHERE book_name = '".$book_name."' and number_of_copies = '".$number_of_copies."';";
			$result2 = $con->query($sql2);
			echo "<center><br/><br/><b style='font-size:1em;background-color:green;border-radius:25px;padding:20px;opacity:0.9;'> The book added to library successfully.</b><br/></center>";
		}
	}
?>