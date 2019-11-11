<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge, chrome=1">
    <title>Login User</title>
</head>
<body>
    <?php 
        $connect = mysqli_connect("localhost", "root", "1234");
        mysqli_select_db($connect, "p3337");
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