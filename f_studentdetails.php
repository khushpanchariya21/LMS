
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
  <a  href="f_profile.php">Home</a>
  
  <a href="f_logout.php" style="float:right">Logout</a>
</div>
	<?php
	session_start();
	error_reporting(0);
	include("connection.php");
	if(isset($_SESSION['f_name_of_user']))
	{
		
		// echo "<center>Welcome, ".$_SESSION['f_name_of_user']."</center><br><br>";
		 
	}
	else
	{
		header("location:f_login.php");
	}
?>
<div class="container">

	<?php
			?>
	    	<h2 style="font-size: 2em;text-align: center;"><?php
			echo "List of books borrowed by students : <br/><br/>";
			 ?></h2>
     		<?php

			$sql = "select * from books inner join login on books.lid = login.lid;";
			
			$result = $con->query($sql);

			if ($result->num_rows > 0) 
			{
		 		echo "<table border='1'><tr><th>Username</th><th>Book Id</th><th>Book Name</th><th>Branch</th></tr>";
		    	while($row = $result->fetch_assoc()) 
		    	{
		    		echo "<tr><td>".$row['username']."</td><td>".$row['bookid']."</td><td>".$row['book_name']."</td><td>".$row['branch']."</td></tr>";
		    	}
		    	echo "</table>";
			} 
			else 
			{
		    	echo "No student is available who has issued a book from the library<br/><br/>";
			}
	?>
	</div>
</body>
</html>