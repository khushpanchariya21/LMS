<?php
	session_start();
	error_reporting(0);
	include("connection.php");
	if(isset($_SESSION['s_name_of_user']))
	{
		echo "Welcome, ".$_SESSION['s_name_of_user']."<br><br>";
	}
	else
	{
		header("location:s_login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Return Book</title>
</head>
<body>	
	<?php
			$temp = $_GET['bookid'];

			$number = -1;

			$sql = "UPDATE books SET lid = '".$number."' WHERE bookid='".$temp."';";
			
			$result = $con->query($sql);

			header("location:s_borrowed_books.php");
	?>
	<a href="s_logout.php">Logout</a>
</body>
</html>