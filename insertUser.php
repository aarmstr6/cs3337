<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New User Into Database</title>
</head>

<body>
	<?php
		include("global.php");
	?>
	<?php
		$connect = mysqli_connect("localhost", "root", $dbPass);
		mysqli_select_db($connect, $db);
		$insertUsers = "insert into users values('" .
			$_POST["email"] ."', '" .
			$_POST["password"] . "')";
		$results = mysqli_query($connect, $insertUsers); 
		header("Location: login.html");
	?>
</body>
</html>
