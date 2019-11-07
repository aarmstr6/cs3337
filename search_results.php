<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search Results</title>
</head>
<body>
    <?php
        include("main_menu.php");
    ?>
    <?php
        $connect = mysqli_connect("localhost", "root", "1234");
        mysqli_select_db($connect, "p3337");
        $selectBooks = "select * from books where bookId=1";
        // $results = mysqli_query($connect, $selectBooks); 

        $selectCount = "select count(*) from books where name like '%" . $_POST["search"]. "%'";
        $countResults= mysqli_query($connect, $selectCount);
        $rowCount = mysqli_fetch_assoc($countResults);
        $searchVal = $_POST["search"];

        $selectSearch = "select * from books where name like '%" . $_POST["search"] . "%'";
        $searchResults = mysqli_query($connect, $selectSearch);
    ?>

    <?php
        if($rowCount == 0)
        {
            print "<h1 align='center'>No results found";
            print "</h1>";
        }
        else
        {
           print "<h1 align='center'>Found " . $rowCount["count(*)"]. " result(s)";
           print "</h1>";

           print "<table align='center' border='2' width='700'>
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
                </tr>";
        

           while ($searchRow = mysqli_fetch_assoc($searchResults))
           {
                print "<tr>";
                print "<td>";
                print($searchRow["email"]);
                print "</td>";
                print "<td>";
                print($searchRow["name"]);
                print "</td>";
                print "<td>";
                print($searchRow["postdate"]);
                print "</td>";
                
                print "<td>";
                print "<a target='_blank' href='" . $searchRow["picpath"] . "'>";
                print "<img src='" . $searchRow["picpath"] . "' width=60\>"; 
                print "</a>";
                print "</td>";
                print "</tr>";
            }
            print "</table>";
        }

    ?>
    
</body>
</html>