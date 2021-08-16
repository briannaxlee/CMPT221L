<!DOCTYPE html>
<html>
<body>


<?php

/**********************************************************
 *   Module 11A - Display a table with and use a FORM     *
 *   11.02.20 BL Original Program                         *
 *********************************************************/

        echo "Class Exercise 13 - Lee <br>";
        define("FILE_AUTHOR", "Brianna Lee");
        // this connects to the site_db and sets $dbc to use the mysql function
        require "connect_db.php";
        session_start();

/**********************************************************
 *   ACTION - This displays an HTML form                  *
 *********************************************************/
    set_error_handler("handleError");

    function handleError($errno, $errstr, $error_file, $error_line)
    {
        echo "<b> Error: </b> [$errno] $errstr - $error_file:$error_line";
        echo "<br />";
        echo "Terminating PHP Script";
    }

    
/**********************************************************
 *   ACTION - This displays an HTML form                  *
 *********************************************************/

    $_SESSION["login_status"] = "";   
    $user_status = "";
    if ($_SESSION["login_status"]== "")
    {
        $user_status = "The current status is logged out.";
        echo $user_status;
        echo "<br>";
    }
    else
    {
        $user_status = "The current status is logged in.";
        echo $user_status;
        echo "<br>";
    }

    echo "<br><a href= '13B-Lee.php'>Login/Logout</a><br> ";



    /******************************************************************************************
     *   Include the code to display the footer, which uses FILE_AUTHOR                       *
     *****************************************************************************************/
    include "footer.php";
?>