<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New User Into Database</title>
</head>

<body>
<?php
	$connect = mysqli_connect("localhost", "root", "1234");
	mysqli_select_db($connect, "p3337");
	$insertUsers = "insert into users values('" .
		$_POST["email"] ."', '" .
		$_POST["password"] . "')";
	$results = mysqli_query($connect, $insertUsers); 
	?>
</body>
</html>
