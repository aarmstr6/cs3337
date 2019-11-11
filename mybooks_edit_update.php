<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update Book Information in the Database</title>
</head>

<body>
	<?php
		$connect = mysqli_connect("localhost", "root", "1234");
        mysqli_select_db($connect, "p3337");
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
