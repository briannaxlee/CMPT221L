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
        echo "<form action = '13B-Lee.php' method = 'POST'>";
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

    echo "<br><a href= '13A-Lee.php'>Return to Previous Page</a><br> ";
?>
