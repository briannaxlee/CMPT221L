<!DOCTYPE html>
<!--    A10-Lee     Assignment 10     11.03.20 BL Original File   -->
<!--    HTML header -->

<html lang = "en">

<head>
    <title> Glizzard | Suppliers </title>
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
    <u> <h1> List of Suppliers </h1> </u>
<?php
	/************************************************************************************
 	* Add CSS styles - for "striped" altenating rows
	*************************************************************************************/
	echo "<style>";
	echo "tr:nth-child(even) {background-color: white;}";
	echo "</style>";

	/************************************************************************************
 	* ACTION - This displays User table
	*************************************************************************************/

	// This connects to site_db and sets $adb to use with mysql functions
	require "connect_db.php";

        //set $sorttype to passed input from form
        if (isset($_POST['sort']))
        {
            $sort_type = $_POST['sort'];
        }
        else
        {
            $sort_type = "SupplierID";
        }

	// query our table
	$where_clause = 'WHERE active="Y"'; 
    $q = "SELECT * FROM Glizzard_Suppliers WHERE active='y' ORDER BY $sort_type";    # we put query in q
    $r = mysqli_query ($dbc, $q);   # this runs query, using $dbc

    // start a table and create a header
    echo "<table border =1 >";
    echo "<tr>";
        echo "<th style = 'padding-left: 5px'> Supplier ID </th>";
        echo "<th style = 'padding-left: 5px'> Supplier Name </th>";
    echo "<th style = 'padding-left: 5px'> Supplier Email </th>";
    echo "<th style = 'padding-left: 5px'> Supplier Phone Number </th>";
    echo "<th style = 'padding-left: 5px'> Active </th>";
    echo "<th style = 'padding-left: 5px'> Delete </th>";
    echo "</tr>";

    // display each row
    if ($r ) {
        while ($row = mysqli_fetch_array ($r, MYSQLI_NUM))
        {
            echo "<tr> <td> $row[0] </td> <td> $row[1] </td> <td> " . "$row[2] </td> <td> $row[3] </td> <td> $row[4] </td> <td> <a href='Delete_Suppliers.php" . $row[5] . "'> DELETE</a> </td> ";
            echo "</tr>";
        }
    }
    // finish and close the table
    echo "<table>";

    // submit button to re-run the same file
    echo "<form action = 'Display-Suppliers.php' method = 'POST'>";
    echo "<br> <input type = 'submit' value = 'SUBMIT'>";
    echo "<input type = 'radio' name = 'sort' value = 'supplierID'> Supplier ID";
    echo "<input type = 'radio' name = 'sort' value = 'supplierName'> Supplier Name";
    echo "<input type = 'radio' name = 'sort' value = 'supplierEmail'> Supplier Email";
	echo "<input type = 'radio' name = 'sort' value = 'supplierPhoneNumber'> Supplier Phone Number";
	echo "<input type = 'radio' name = 'where_clause' value = ''> Show All";
	echo "<input type = 'radio' name = '$where_clause' value = 'WHERE active = 'y'> Show Active";
	echo "<input type = 'radio' name = '$where_clause' value = 'WHERE active = 'n'> Show Inactive";
    echo "</form>";
	
	echo "<br>";
	echo "<br>";
	echo "<form action = 'Input-Supplier.php'>";
	echo "<input type = 'submit' value = 'Add New Supplier'>";
	echo "</form>";
	
    echo'<br>';
    echo'<br>';
    echo'<br>';

    include("footer.php")
?>
</body>
</html>