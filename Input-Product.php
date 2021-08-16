<!DOCTYPE html>
<!--    A10-Lee     Assignment 10     11.03.20 BL Original File   -->
<!--    HTML header -->

<html lang = "en">

<head>
    <title> Glizzard | New Product </title>
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
    <u> <h1> Add a Product</h1> </u>

    <?php

    /**************************************************************************
    * Input Validation  
    **************************************************************************/
    
    //set variables that were passed from the form
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            
            $name = trim($_POST["name"]);
            $description = trim($_POST["description"]);
            $supplier = trim($_POST["supplier"]);
            $stock = trim($_POST["stockquantity"]);
            $version = trim($_POST["version"]);
        }
        else {
            $name=$description=$supplier=$stock=$version="";
        }
		
		// initial $error_message to "" - this means there are no errors
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

		
		// set variables that were passed from the form
		$name = $_POST["name"];
        $description = $_POST["description"];
        $price = $_POST["price"];
        $supplier = $_POST["supplier"];
        $stock = $_POST["stockquantity"];

    echo "<br>Running our ACTION HANDLER code - Version $version";
    echo "<br> Name was entered: $name";
    echo "<br> Description was entered: $description";
    echo "<br> Price was entered: $price";
    echo "<br> Supplier was entered: $supplier";
    echo "<br> StockQuantity was entered: $stock";
	
	// Connect to the database and insert the data
        require "connect_db.php";
        $q = "INSERT INTO products (name, description, price, supplier, stockquantity) " . "VALUES('$name','$description',$price, '$supplier', $stock);";
        $r = mysqli_query ($dbc,$q);

        // check query return code
        if ($r )
        {
            echo "Data inserted!";
            echo "<br><a href= 'Display-Users.php'>Display Table</a>";
        }
        else {
            echo "<li> " . mysqli_error ($dbc). "</li>";      
        } 
    }
            
    /**************************************************************************
    * ACTION - This is displays an HTML form  
    **************************************************************************/
    else
        {
            echo "<br>Running our ACTION code";
        
            // when SUBMIT is pressed, the browser loads the ACTION file
            echo "<form action = 'Input-Product.php' method = 'POST'>";
            echo "<fieldset>";
            echo "<br> Name <input type='text' name='name'>";
            echo "<br> Description <input type='text' name='description'>";
            echo "<br> Price <input type='text' name='price'>";
            echo "<br> Supplier <input type='text' name='supplier'>";
            echo "<br> StockQuantity <input type='text' name='stockquantity'>";
            
            echo "<input type='hidden' name='version' value='1.3'>";
            echo "<br> <input type='submit'>";
            echo "</fieldset>";
            echo "</form>";

            echo "<br><a href= 'Display-Products.php'>Display Product Table</a><br> ";
        }

        echo "<br> $error_message";
    
    
    //End of file
    include "footer.php";
	
    ?>

</body>
<footer> 