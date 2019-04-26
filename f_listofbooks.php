
<!DOCTYPE html>
<html>
<head>
	<title>List of books in the library</title>
	
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
	
			$sql = "select * from books;";
			
			$result = $con->query($sql);

			if ($result->num_rows > 0) 
			{

				?>
		    	<h2 style="font-size: 2em;text-align: center; color: black;"><?php
				echo "<center>List of all the Books available in the library : </center>";
				?></h2>
     			<?php
				echo "<center><table style = ' width: 1000px;' border='1' class='table'><thead class='thead-dark'><tr><th>Book Name</th><th>Status</th><th>Remove this book from library</th></tr></thead>";
		    	while($row = $result->fetch_assoc()) 
		    	{
		    		if($row['lid'] == -1)
		    		{
		    		  echo "<tr><td>".$row['book_name']."</td><td>"."<center>Not Issued by any student"."</center></td><td ><center><a class='btn btn-success' href = 'f_removebook.php?bookid=".$row['bookid']."'>remove book</a></center></td></tr>";
		    		}
		    		else
		    		{
		    			echo "<tr><td>".$row['book_name']."</td><td>This book is currently taken by some student</td><td><center>cannot remove</center></td></tr>";
		    		}
		    	}
		    	echo "</table></center>";
			} 
			else 
			{
		    	echo "No student is available who has issued a book from the library";
			}
	?>
</div>
</body>
</html>