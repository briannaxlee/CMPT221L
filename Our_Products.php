<!DOCTYPE html>
<!--    A10-Lee     Assignment 10     11.03.20 BL Original File   -->
<!--    HTML header -->

<html lang = "en">

<head>
    <title> Glizzard | Products </title>
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
    echo "<th style = 'padding-left: 5px'> Active </th>";
    echo "<th style = 'padding-left: 5px'> Delete </th>";

    // display each row
    if ($r ) {
        while ($row = mysqli_fetch_array ($r, MYSQLI_NUM))
        {
            echo "<tr> <td> $row[0] </td> <td> $row[1] </td> <td> " . "$row[2] </td> <td> $row[3] </td> <td> $row[4] </td> <td> $row[5] </td>  <td> $row[6] </td><td> <a href='12Deactivaterow.php?id=" . $row[7] . "'> DELETE</a> </td> ";
            echo "</tr>";
        }
    }
    // finish and close the table
    echo "<table>";

    echo "<br> Glizzard Games- Our Products"; 

    
    $error_message="";


    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        
        $name = trim($_POST["name"]);
        $description = trim($_POST["description"]);
        $supplier = trim($_POST["supplier"]);
        $stock = trim($_POST["stockquantity"]);
    }
    else {
        $name=$description=$supplier=$stock="";
    }
    
            $error_message="";
            if ($_SERVER['REQUEST_METHOD'] == "GET"){
                $error_message="Fill in the form and hit SUBMIT";
            }
            else if ($name=="") {$error_message= "Please enter the name.";}
            else if ($description=="") {$error_message= "Please enter the description";}
            else if (strlen($name)<4) {$error_message = "The name must be at least 4 chars.";}
            else if ($price>9999.99) {$error_message = "The price is too high.";}
            else if (strlen($supplier)<4) {$error_message = "The supplier be at least 4 chars.";}


    if ($_SERVER['REQUEST_METHOD'] == "POST" AND $error_message == "") {

    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $supplier = $_POST["supplier"];
    $stock = $_POST["stockquantity"];

    
    echo "<br> Name was entered: $name";
    echo "<br> Description was entered: $description";
    echo "<br> Price was entered: $price";
    echo "<br> Supplier was entered: $supplier";
    echo "<br> StockQuantity was entered: $stock";

    require "connect_db.php";
    $q = "INSERT INTO products (name, description, price, supplier, stockquantity) " . "VALUES('$name','$description',$price, '$supplier', $stock);";
    $r = mysqli_query ($dbc,$q);
    
        if($r ) {
            echo "Data inserted!";
        }
        else{
            echo "<li>" . mysqli_error($dbc) . "</li>";
        }
    }
    else {

        echo "<form action='Our Products.php' method='POST'>";
        echo "<fieldset>";
        echo "<br> Name <input type='text' name='name'>";
        echo "<br> Description <input type='text' name='description'>";
        echo "<br> Price <input type='text' name='price'>";
        echo "<br> Supplier <input type='text' name='supplier'>";
        echo "<br> StockQuantity <input type='text' name='stockquantity'>";

        
        echo "<input type='hidden' name='version' value='1.2'>";
        echo "<br> <input type='submit'>";
        echo "</fieldset>";
        echo "</form>";
    
        echo "<br> $error_message";
    }

    echo "<br>";
    include "footer2.php";
    // End of file 
    ?>
</body>
</html>