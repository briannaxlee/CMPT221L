<!DOCTYPE html>
<!--    A10-Lee     Assignment 10     11.03.20 BL Original File   -->
<!--    HTML header -->

<html lang = "en">

<head>
    <title> Glizzard | New Supplier </title>
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
    <u> <h1> Add a Supplier</h1> </u>

    <?php

    /**************************************************************************
    * Input Validation  
    **************************************************************************/
    
    //set variable that were passed from the form
    if ( $_SERVER['REQUEST_METHOD'] == "POST")
        {
            $supplierName = trim($_POST["supplierName"]);
            $supplierEmail = trim($_POST["supplierEmail"]);
            $supplierPhoneNumber = trim($_POST["supplierPhoneNumber"]);
            $version = trim($_POST["version"]);
        }
        else
        {
            $supplierName = $supplierEmail = $supplierPhoneNumber = $version = "";
        }
            $error_message = "";
            if ( $_SERVER['REQUEST_METHOD'] == "GET")
            {
                $error_message = "Fill in the form and hit SUBMIT";
            }
            else if ($supplierName=="") {$error_message ="Please enter the supplier name.";}
            else if (strlen($supplierName)<4) {$error_message ="The supplier name must be at least 4 characters.";}



    /**************************************************************************
    * Call the function based on value of REQUEST_METHOD  
    **************************************************************************/

    if ( $_SERVER['REQUEST_METHOD'] == "POST" AND $error_message == "")
        {
            echo "<br>Running our ACTION HANDLER code - Version $version";
            echo "<br> Supplier Name was entered: $supplierName";
            echo "<br> Supplier Email was entered: $supplierEmail";
            echo "<br> Supplier Phone Number was entered: $supplierPhoneNumber";

            // connect to the database and insert data
        require "connect_db.php";
        $q = "INSERT INTO Glizzard_Suppliers (supplierName, supplierEmail, supplierPhoneNumber) " . "VALUES('$supplierName', '$supplierEmail', '$supplierPhoneNumber');";
        $r = mysqli_query ($dbc, $q);

        // check query return code
        if ($r )
        {
            echo "Data inserted!";
            echo "<br><a href= 'Display-Suppliers.php'>Display Table</a>";
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
            echo "<form action = 'Input-Supplier.php' method = 'POST'>";
            echo "<fieldset>";
            echo "<br> Supplier Name <input type = 'text' name='supplierName'>";
            echo "<br> Supplier Email <input type = 'text' name='supplierEmail'>";
            echo "<br> Supplier Phone Number <input type = 'text' name='supplierPhoneNumber'>";
        
            echo "<input type='hidden' name='version' value='1.2'>";
            echo "<br> <input type='submit'>";
            echo "</fieldset>";
            echo "</form>";

            echo "<br><a href= 'Glizzard-Suppliers.php'>Display Suppliers Table</a><br> ";
        }

        echo "<br> $error_message";
    
    
    //End of file
    include "footer.php";
	
    ?>

</body>
<footer> 