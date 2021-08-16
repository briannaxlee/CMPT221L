<!DOCTYPE html>
<!--    A10-Lee     Assignment 10     11.03.20 BL Original File   -->
<!--    HTML header -->

<html lang = "en">

<head>
    <title> Glizzard | Available Products </title>
    <meta charset="utf-8"> 
    <style>
        title {color: white;}
        body {background-color: powderblue;}
        nav {padding-left: 15px; padding-top: 10px; padding-bottom: 10px;
        border-collapse: collapse; width: 115px; border: 1.75px solid black;}
        h1 {color: white; font-style: italic; text-shadow: 2px 2px black;}
        p {font-size: 20px;}
        u {color: white}
        hr {height: 7px; background-color: white;}
        .title {font-size: 40px; color: white; text-shadow: 2px 2px black;}
        th {padding-left: 100px;}
        
    </style>
 </head>
<!--    Body of the Page    -->
 <body>
        <?php include "navigation.php";?>
        <hr>
        <u> <h1> List of Available Products </h1> </u>
    <?php
        // this connects to the site_db and sets $dbc to use the mysql function
        require "connect_db.php";
        define("FILE_AUTHOR","Brianna Lee");

        //set $sorttype to passed input from form

    // query our table
    $q = "SELECT * FROM products";    # we put query in q
    $r = mysqli_query ($dbc, $q);   # this runs query, using $dbc

    // start a table and create a header
    echo "<table border =1 >";
    echo "<th style = 'padding-left: 5px'> Product ID </th>";
    echo "<th style = 'padding-left: 5px'> Product Name </th>";
    echo "<th style = 'padding-left: 5px'> Product Description </th>";
    echo "<th style = 'padding-left: 5px'> Product Price </th>";
    echo "<th style = 'padding-left: 5px'> Product Supplier </th>";
    echo "<th style = 'padding-left: 5px'> Product Stock Quantity </th>";
    // display each row
    if ($r ) {
        while ($row = mysqli_fetch_array ($r, MYSQLI_NUM))
        {
            echo "<tr> <td> $row[0] </td> <td> $row[1] </td> <td> " . "$row[2] </td> <td> $row[3] </td> <td> $row[4] </td> <td> $row[5] </td> ";
            echo "</tr>";
        }
    }
    // finish and close the table
    echo "<table>";
    ?>

    <footer> <small> <?php include "footer.php";?> </small> </footer>
</body>
</html>