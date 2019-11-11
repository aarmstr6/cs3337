<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Shopping Cart</title>
</head>

<style>
    .div_css{

        text-align: center;
    }
    .div_css_btn{

        font-size: 20px;
    }
</style>

<body>
    <?php
        include("main_menu.php");
        include("global.php");
    ?>

    <?php
        $connect = mysqli_connect("localhost", "root", $dbPass);
        mysqli_select_db($connect, $db);
        $selectBooks = "select * from books where bookId='".
        $_GET["bookId"] . "'";
        $results = mysqli_query($connect, $selectBooks); 
        $row = mysqli_fetch_assoc($results);
    ?>

    <?php
        if(isset($_POST["btn"]))
        {
            $updateCart = "insert into cart values(null, " . $row["bookId"] . 
                            ", '" . $email . 
                            "', '" . $row["name"] . "')";

            $cartResults = mysqli_query($connect, $updateCart);
            header("Location: cart_view.php");
        }
        if(isset($_POST["cancel"]))
        {
            header("Location: shopping.php");
        }
    ?>

    <h1 align="center">Add Item To Cart?</h1>

    <form method="post">
        <table align="center" border="2" width="700">
            <tr>
                <th>
                    Seller Email
                </th>
                <th>
                    Book Name
                </th>
                <th>
                    Post Date
                </th>
                <th>
                    Book Picture
                </th>
            </tr>

        <?php
            print "<tr>";
            print "<td>";
            print($row["email"]);
            print "</td>";
            print "<td>";
            print($row["name"]);
            print "</td>";
            print "<td>";
            print($row["postdate"]);
            print "</td>";
            
            print "<td>";
            print "<a target='_blank' href='" . $row["picpath"] . "'>";
            print "<img src='" . $row["picpath"] . "' width=60\>"; 
            print "</a>";
            print "</td>";
            print "</tr>";
        ?>
        </table>

        <div class="div_css">
            <button class="div_css_btn" name="btn" type="submit">Add To Cart</button>   
            <button class="div_css_btn" name="cancel">Cancel</button>         
        </div>
    </form>

</body>
</html>