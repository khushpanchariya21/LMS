
<!DOCTYPE html>
<html>
<head>
	<title>Borrow a book from library</title>
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
	if(isset($_SESSION['s_name_of_user']))
	{
		// echo "Welcome, ".$_SESSION['s_name_of_user']."<br><br>";
	}
	else
	{
		header("location:s_login.php");
	}
?>

	<?php
	
			$sql = "select * from books;";
			
			$result = $con->query($sql);

			if ($result->num_rows > 0) 
			{
				?>
    			<h2 style="font-size: 2em;text-align: center;color: black;"><?php
				echo "List of all the Books available in the library.";
				 ?></h2>
     			<?php

				echo "<table ><tr><th>Book Name</th><th>Status</th><th>Issue book</th></tr>";
		    	while($row = $result->fetch_assoc()) 
		    	{
		    		if($row['lid'] == -1)
		    		{
		    		  echo "<tr><td>".$row['book_name']."</td><td width='300'><center>"."Available"."</center></td><td width='200'><center><a class='btn btn-success';
		    		   href = 's_issuebook.php?bookid=".$row['bookid']."'>issue this book</a></center></td></tr>";
		    		}
		    		else
		    		{
		    			echo "<tr><td>".$row['book_name']."</td><td><center>Not Available</center></td><td style='color:red;'><center>Cannot Issue</center></td></tr>";
		    		}
		    	}
		    	echo "</table>";
			} 
			else 
			{
		    	echo "No books are there in the library.<br/><br/>";
			}
	?>
	<a href="s_logout.php">Logout</a>
</body>
</html>