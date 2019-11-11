<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search</title>
</head>
<body>
    <?php
        include("main_menu.php");
    ?>
    <form action="search_results.php" method="post">
        <h1 align="center">
            Book Search
        </h1>
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
    
</body>
</html>