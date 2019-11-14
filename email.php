<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>List of Emails</title>
</head>
<body>

<?php
    include("main_menu.php");
    include("global.php");
?>

<?php
    $connect = mysqli_connect("localhost", "root", $dbPass);
    mysqli_select_db($connect, $db);
    $selectUsers = "select * from users";
    $results = mysqli_query($connect, $selectUsers); 
?>

<h3> List of users who have applied onto the site </h3>

<table align="center" border="2">
    <tr>
    <th>
        Email
    </th>
    </tr>

<?php
while ($row = mysqli_fetch_assoc($results))
    {
        print "<tr>";
        print "<td>";
        print($row["email"]);
        print "</td>";
        print "</tr>";
    }
?>

</table>
</body>
</html>