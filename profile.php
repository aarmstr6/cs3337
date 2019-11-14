<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Profile</title>
</head>

<body>
   <?php
      include("main_menu.php");
      include("global.php");
   ?>

   <?php
      $connect = mysqli_connect("localhost", "root", $dbPass);
      mysqli_select_db($connect, $db);
      $selectBooks = "select * from books where email='" . $email . "'";
      $results = mysqli_query($connect, $selectBooks);
   ?>

   <h1 aligh="center">
      Profile Page
   </h1>

   <h3>
      Email: <?php print $_SESSION["email"]; ?> <br>
      Password: <?php print $_SESSION["password"]; ?> <br>	
      Books Sellings: <br>
   </h3>

   <?php
      while ($row = mysqli_fetch_assoc($results)) 
      {
         print "- ";
         print ($row["name"]);
         print "<br>";
      } 
   ?>


   <p align="center">
      <img src="books1.jpg" width=800 />
   </p>

</body>
</html>
