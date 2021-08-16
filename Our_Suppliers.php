<!DOCTYPE html>
<!--    A10-Lee     Assignment 10     11.03.20 BL Original File   -->
<!--    HTML header -->

<html lang = "en">

<head>
    <title> Glizzard | Home Page </title>
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
    $q = "SELECT * FROM Glizzard_Suppliers ORDER BY $sort_type";    # we put query in q
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
            echo "<tr> <td> $row[0] </td> <td> $row[1] </td> <td> " . "$row[2] </td> <td> $row[3] </td> <td> $row[4] </td>  <td> <a href='12DeactivateRow.php" . $row[5] . "'> DELETE</a> </td> ";
            echo "</tr>";
        }
    }
    // finish and close the table
    echo "<table>";

    // submit button to re-run the same file
    echo "<form action = 'Our_Suppliers.php' method = 'POST'>";
    echo "<br> <input type = 'submit' value = 'SUBMIT'>";
    echo "<input type = 'radio' name = 'sort' value = 'supplierID'> Supplier ID";
    echo "<input type = 'radio' name = 'sort' value = 'supplierName'> Supplier Name";
    echo "<input type = 'radio' name = 'sort' value = 'supplierEmail'> Supplier Email";
    echo "<input type = 'radio' name = 'sort' value = 'supplierPhoneNumber'> Supplier Phone Number";
    echo "</form>";

    ?>

    <br> <br>

    <?php
        echo "<br> The request method is " . $_SERVER['REQUEST_METHOD']; 

        /**************************************************************************
        * Input Validation
        **************************************************************************/

        // set variables that were passed from the form
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

        /*****************************************************************************************
        * ACTION-HANDLER - This is processes the form
        *****************************************************************************************/
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
        }
        }

        /******************************************************************************************
         * ACTION - This is displays an HTML form
        *******************************************************************************************/

        else
        {
            echo "<br>Running our ACTION code";
        
            // when SUBMIT is pressed, the browser loads the ACTION file
            echo "<form action = 'Our_Suppliers.php' method = 'POST'>";
            echo "<fieldset>";
            echo "<br> Supplier Name <input type = 'text' name='supplierName'>";
            echo "<br> Supplier Email <input type = 'text' name='supplierEmail'>";
            echo "<br> Supplier Phone Number <input type = 'text' name='supplierPhoneNumber'>";
        
            echo "<input type='hidden' name='version' value='1.2'>";
            echo "<br> <input type='submit'>";
            echo "</fieldset>";
            echo "</form>";
        }

        echo "<br> $error_message";
        define("FILE_AUTHOR","Brianna Lee");
    ?>

    <footer> <small> <?php include "footer2.php";?> </small> </footer>
</body>
</html>