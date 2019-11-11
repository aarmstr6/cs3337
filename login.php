<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login User</title>
</head>
<body>
    <?php
		include("global.php");
	?>
    <?php 
        $connect = mysqli_connect("localhost", "root", $dbPass);
        mysqli_select_db($connect, $db);
        $queryUser = "select * from users where email='" .
        $_POST["email"] .
        "' and password='" .
        $_POST["password"] .
        "'";
        $results = mysqli_query($connect, $queryUser);

        if(mysqli_num_rows($results) == 0)
        {
            header("Location: login.html");
            exit;
        }
        if(mysqli_num_rows($results) > 0)
        {
            session_start();
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['password'] = $_POST['password'];
            header("Location: main.php");
        }
    ?>
</body>
</html>