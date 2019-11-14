<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
</head>
<body>
    <?php
        include("main_menu.php");
        include("global.php");
    ?>
    <?php
       $connect = mysqli_connect("localhost", "root", $dbPass);
       mysqli_select_db($connect, $db);
       $selectCart = "select cart.bookId, books.email, books.name, picpath from books 
                        inner join cart on books.name = cart.name
                        and cart.email = '" . $email . "'";
       $results = mysqli_query($connect, $selectCart);

       $selectItems = "select count(bookId) from cart where email='" . $email . "'";
       $countItems = mysqli_query($connect, $selectItems);
       $count = mysqli_fetch_assoc($countItems);

    //    $selectBooks = "select * from books where email='" . $email . "'";
    //    $bookResults = mysqli_query($connect, $selectBooks);
    ?>

    <br>

    <?php
        print "<h1 align='center'>Items in cart: ";
        print $count["count(bookId)"];
        print "</h1>";
    ?>
    <table align="center" border="2" width="700">
            <tr>
                <th>
                    Seller Email
                </th>

                <th>
                    Book Name
                </th>
  
                <th>
                    Book Picture
                </th>
                <th>
                    Remove
                </th>
            </tr>

            <?php
                while($row = mysqli_fetch_assoc($results))
                {

                    print "<tr>";
                    print "<td>";
                    print($row["email"]);
                    print "</td>";
 
                    print "<td>";
                    print($row["name"]);
                    print "</td>";
                    
                    print "<td>";
                    print "<a target='_blank' href='" . $row["picpath"] . "'>";
                    print "<img src='" . $row["picpath"] . "' width=60\>"; 
                    print "</a>";
                    print "</td>";

                    print "<td>";
                    print "<a href='cart_delete.php?bookId=" . $row["bookId"] . "'>";
                    print "<img src='delete.png' width=60\>"; 
                    print "</a>";
                    print "</td>";

                    print "</tr>";

                }
            ?>
           
        </table>    
</body>
</html>