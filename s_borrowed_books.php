<!DOCTYPE html>
<html>
<head>
	<title>Student Profile Page</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="s_borrow.css">
</head>
<body>	
<div class="navbar">
  <a class="active">Library Management System</a>
  <a  href="s_profile.php">Home</a>
  

  <a href="s_logout.php" style="float:right">Logout</a>
</div>
	<?php
		session_start();
		error_reporting(0);
		include("connection.php");
		
		// echo "Welcome, ".$_SESSION['s_name_of_user']."<br/><br/>";
		?>
		<div class="container"><?php
		echo "<center>List of books borrowed : <br/><br/></center>";

		$sql = "select * from books inner join login on books.lid = login.lid and login.lid='".$_SESSION['s_rollnumber_of_user']."';";
			
			$result = $con->query($sql);

			if ($result->num_rows > 0) 
			{
		 		echo "<center><table border='1'><tr><th>Book Id</th><th>Book Name</th><th>Return to Library</th></tr>";
		    	while($row = $result->fetch_assoc()) 
		    	{
		    		echo "<tr><td>".$row['bookid']."</td><td>".$row['book_name']."</td><td><center><a class='btn btn-danger'; href = 's_returnbook.php?bookid=".$row['bookid']."'>return this book</a></center></td></tr>";
		    	}
		    	echo "</table></center>";
			} 
			else 
			{
		    	echo "No you have not issued any book yet.<br/><br/>";
			}
		?></h2>
     	<?php
	?>

</body>
</html>