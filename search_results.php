<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Results</title>
</head>
<body>
    <?php
        include("main_menu.php");
        include("global.php");
    ?>
    <?php
        $connect = mysqli_connect("localhost", "root", $dbPass);
        mysqli_select_db($connect, $db);

        $selectCount = "select count(*) from books where name like '%" . $_POST["search"]. "%'";
        $countResults= mysqli_query($connect, $selectCount);
        $rowCount = mysqli_fetch_assoc($countResults);
        $searchVal = $_POST["search"];

        $selectSearch = "select * from books where name like '%" . $_POST["search"] . "%'";
        $searchResults = mysqli_query($connect, $selectSearch);
    ?>
    <form action="search_results.php" method="post">
        <h2 align="center">
            Book Search
        </h2>
        <table align="center">
            <tr>
                <td>
                    Book Title
                </td>
                <td>
                    <input type="text" name="search">
                    <input type="submit" value="Search">
                </td>
            </tr>
        </table>
    </form>

    <?php
        if($rowCount['count(*)'] == 0)
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