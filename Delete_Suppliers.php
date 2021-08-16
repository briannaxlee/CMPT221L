<!DOCTYPE html>
<!--    A10-Lee     Assignment 10     11.03.20 BL Original File   -->
<!--    HTML header -->

<html lang = "en">

<head>
    <title> Glizzard | Delete Supplier </title>
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
<body> 
<?php include "navigation.php";?>
    <hr> 
    <u> <h1> Delete a Supplier </h1> </u>
<?php
 echo "<br> The request method is " . $_SERVER['REQUEST_METHOD']; 
 
if ( $_SERVER['REQUEST_METHOD'] == "POST")
{
    action_handler();
}
else
{
    action();
}
 

 function action()
 {
   echo "<br>Running our ACTION code";
 
   echo "<form action = 'Delete_Suppliers.php' method = 'POST'>";
   echo "<br> SupplierID to deactivate <input type = 'input' name = 'delete'>";
   echo "<br> <input type = 'submit'>";
   echo "</form>";
 }	 
 
/**************************************************************************
 * ACTION-HANDLER - This is processes the form  
 **************************************************************************/
 function action_handler() 
 { 
   // set variables that were passed from the form
   $delete = $_POST["delete"];
   
 
   echo "<br>Running our ACTION HANDLER code"; 
 
   // connect to the database and insert data
   require "connect_db.php";
   $q = "UPDATE Glizzard_Suppliers SET active='N' WHERE supplierID= $delete;"; 
   $r = mysqli_query ($dbc, $q);
 
   // check query return code
   if ($r )
   {
       echo "Status Changed!";
	   echo"<br></br>";
	    echo '<br><a href="Display-Suppliers.php"><h3>Show Updated Table!</h3></a></br>';
   }
   else
   {
       echo "<li>" . mysqli_error($dbc) . "</li>";
   }
 }

 include "footer.php";
// End of file 
 ?>