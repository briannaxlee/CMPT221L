<!DOCTYPE html>
<!--    A10-Lee     Assignment 10     11.03.20 BL Original File   -->
<!--    HTML header -->

<html lang = "en">

<head>
    <title> Glizzard | Login Page </title>
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
    <u> <h1> Login Page </h1> </u>
<?php
    /**************************************************************************
    * Input Validation
    **************************************************************************/

    // set variables that were passed from the form
    if ( $_SERVER['REQUEST_METHOD'] == "POST")
    {
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);
        $version = trim($_POST["version"]);
    }
    else
    {
        $username = $password = $version = "";
    }
        $error_message = "";
        if ( $_SERVER['REQUEST_METHOD'] == "GET")
        {
            $error_message = "Fill in the form and hit SUBMIT";
        }
        else if ($username=="") {$error_message ="Please enter the name.";}
        else if (strlen($username)<4) {$error_message ="The name must be at least 4 characters.";}
    /*****************************************************************************************
    * ACTION-HANDLER - This is processes the form
    *****************************************************************************************/
    if ( $_SERVER['REQUEST_METHOD'] == "POST" AND $error_message == "")
    {
        echo "<br>Running our ACTION HANDLER code - Version $version";
        echo "<br> Username was entered: $username";
        echo "<br> Password was entered: $password";
    }
        // connect to the database and insert data
    require "connect_db.php";
    $q = "SELECT * FROM  usertable WHERE user = ''$username' AND BINARY password = '''$password');";
    $r = mysqli_query ($dbc, $q);
    
    $_SESSION["login_status"] = "";   
    // if the query ran and we retrived ONE record, get the password in table
    if ($r)
    {
        if (mysqli_num_rows($r) == 1)
        {
            echo "Successfully logged in!";
            $_SESSION["login_status"] = "User $username logged in.";
            echo "<br>" . $_SESSION["login_status"];
        }
        else
        {
            echo "<br> The username and password are not valid.";
        }
    }

    /******************************************************************************************
     * ACTION - This is displays an HTML form
    *******************************************************************************************/
    else
    {
        echo "<br>Running our ACTION code";
    
        // when SUBMIT is pressed, the browser loads the ACTION file
        echo "<form action = 'Glizzard-Login.php' method = 'POST'>";
        echo "<fieldset>";
        echo "<br> Username <input type = 'text' name='username'>";
        echo "<br> Password <input type = 'text' name='password'>";
    
        echo "<input type='hidden' name='version' value='1.2'>";
        echo "<br> <input type='submit'>";
        echo "</fieldset>";
        echo "</form>";
    }

    echo "<br> $error_message";
    define("FILE_AUTHOR","Brianna Lee");

    echo "<br><a href= 'Glizzard-Home.php'>Return to Home Page</a><br> ";

 include "footer.php";
 // End of file 
  ?>

