<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update Book Information in the Database</title>
</head>

<body>
    <?php
		include("global.php");
	?>
	<?php
		$connect = mysqli_connect("localhost", "root", $dbPass);
        mysqli_select_db($connect, $db);
    ?>
    <?php
        date_default_timezone_set("America/Los_Angeles");
        $currentTime = date("Y-m-d H:i:s");
    ?>
    <?php
        session_start();
    ?>

    <?php
		$updateBook = "update books set email = '".
            $_POST["email"].
            "', name = '" .
            $_POST["name"]. 
            "', description = '" .
            $_POST["description"].
            "', postdate = '" .
            $currentTime .
            "', picpath = '" .
            $pathName .
            "' where bookId='".
            $_SESSION["bookId"] . "'";
        $result = mysqli_query($connect, $updateBook);
        header("Location: mybooks.php");
    ?>
    
</body>
</html>
