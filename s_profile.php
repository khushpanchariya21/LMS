<!DOCTYPE html>
<html>
<head>

	<title>Student Profile Page</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>	
	<div class="navbar">
  <a class="active">Library Management System</a>
  <a class="active" href="index.html">Home</a>

  <a href="s_logout.php" style="float:right">Logout</a>
</div>
	<?php
		session_start();
		error_reporting(0);
		include("connection.php");
		?>
    	<h2 style="font-size: 2em;text-align: center;color: black;"><?php
		echo "Welcome, ".$_SESSION['s_name_of_user']."<br/><br/>";
		 ?></h2>
     	<?php
	?>
	<form action="s_borrowed_books.php" method="post">
		<input type="submit" name="list_of_books_borrowed" value="List of Books Borrowed"><br><br>
	</form>
	<form action="s_borrow_a_book.php" method="post">
		<input type="submit" name="list_of_books_in_library_to_borrow" value="List of Books in Library to Borrow"><br><br>
	</form>
	<img src="read.gif" style="float:right">

</body>
</html>