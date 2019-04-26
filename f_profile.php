<!DOCTYPE html>
<html>
<head>
	<title>Faculty Profile Page</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="f_pro.css">

</head>
<body>	
<div class="navbar">
  <a >Library Management System</a>
  <a class="active" href="index.html">Home</a>
  
  <a href="f_logout.php" style="float:right">Logout</a>
</div>
<img src="book.jpg">
<?php
  session_start();
  error_reporting(0);
 
  
  if(isset($_SESSION['f_name_of_user']))
  {
    ?>
    <h2 style="font-size: 2em;text-align: center;"><?php
    echo "Welcome, ".$_SESSION['f_name_of_user']."<br><br>";
     ?></h2>
     <?php
  }
  else
  {
    header("location:f_login.php");
  }
?>

	<form action="f_studentdetails.php" method="post">
		<input type="submit" name="show_student_details" value="Borrowed Book details">
	</form>
	<form action="f_listofbooks.php" method="post">
		<input type="submit" name="show_list_of_books" value="Total Books">
	</form>
	<form action="f_addbook.php" method="post">
		<input type="submit" name="add_new_book_to_the_library" value=" + Add New Book ">
	</form>
	
</body>
</html>