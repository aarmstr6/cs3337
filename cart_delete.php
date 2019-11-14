<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Remove Book From Cart</title>
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
		$deleteBook = "delete from cart where bookId='".
        $_GET["bookId"] . "'"; 
        $result = mysqli_query($connect, $deleteBook);
        header("Location: cart_view.php");
    ?>
    
</body>
</html>
