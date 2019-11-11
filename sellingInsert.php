<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Insert Book Into Database</title>
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
        if($_FILES["pic"])
        {
            $pathName = "pictures/" . $_FILES['pic']['name'];
            move_uploaded_file($_FILES['pic']['tmp_name'], $pathName);
        }
    ?>

    <?php
		$insertBook = "insert into books values(null, '".
            $_POST["email"].
            "', '" .
            $_POST["name"]. 
            "', '" .
            $_POST["description"].
            "', '" .
            $currentTime .
            "', '" .
            $pathName .
            "')";
        $result = mysqli_query($connect, $insertBook);
        header("Location: selling.php");
    ?>
    
    
</body>
</html>
