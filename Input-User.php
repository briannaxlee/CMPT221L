<!DOCTYPE html>
<!--    A10-Lee     Assignment 10     11.03.20 BL Original File   -->
<!--    HTML header -->

<html lang = "en">

<head>
    <title> Glizzard | New User </title>
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
    <u> <h1> Add a User</h1> </u>

    <?php

    /**************************************************************************
    * Input Validation  
    **************************************************************************/
    
    //set variables that were passed from the form
		if ( $_SERVER['REQUEST_METHOD'] == "POST"){
			
			$username	= trim($_POST["username"]);
			$dob		= trim($_POST["dob"]);
			$dateofhire	= trim($_POST["dateofhire"]);
			$useraddress= trim($_POST["useraddress"]);
			$password	= trim($_POST["password"]);
			$pwchange	= trim($_POST["pwchange"]);
			$email		= trim($_POST["email"]);
            $name		= trim($_POST["name"]);
            $version = trim($_POST["version"]);
		}
		else {
			$username = $dob = $dateofhire = $useraddress = $password = $pwchange = $email = $name = $version = "";
		}
		
		// initial $error_message to "" - this means there are no errors
			$error_message="";
			if ( $_SERVER['REQUEST_METHOD'] == "GET"){
				$error_message = "Fill in the form and hit SUBMIT";
			}
			else if ($username=="")			{$error_message = "Please enter a username.";}
			else if (strlen($username)<4)	{$error_message = "Username must be at last 4 letters.";}
			else if ($dob=="")				{$error_message = "Please enter a Date of Birth.";}
			else if ($dateofhire=="")		{$error_message = "Please enter the Date of Hire.";}
			else if ($useraddress=="")		{$error_message = "Please enter an address.";}
			else if ($password=="")			{$error_message = "Please enter a password.";}
			else if (strlen($password)<5)	{$error_message = "Password must be at least 5 characters.";}
			else if ($pwchange=="")			{$error_message = "Please indicate when you plan to change your password.";}
			else if ($name=="")				{$error_message = "Please enter your name.";}
			

	if ( $_SERVER['REQUEST_METHOD'] == "POST" AND $error_message == ""){
		
		
		// set variables that were passed from the form
		$username		= $_POST["username"];
		$dob			= $_POST["dob"];
		$dateofhire		= $_POST["dateofhire"];
		$useraddress	= $_POST["useraddress"];
		$password		= $_POST["password"];
		$pwchange		= $_POST["pwchange"];
		$email			= $_POST["email"];
		$name			= $_POST["name"];
		
	echo "<br>Running our ACTION HANDLER code - Version $version";
	echo "<br> Username was entered: $username";
	echo "<br> Date of Birth was entered: $dob";
	echo "<br> Date of Hire was entered: $dateofhire";
	echo "<br> User's Address was entered: $useraddress";
	echo "<br> User's Password was entered: $password";
	echo "<br> User's Email was entered: $pwchange";
	echo "<br> Name was entered: $name";
	
	// Connect to the database and insert the data
		require "connect_db.php";
		$q = "INSERT INTO myusers (username, dob, dateofhire, useraddress, password, pwchange, email, name)" . "VALUES('$username', '$dob', '$dateofhire', '$useraddress', '$password', '$pwchange', '$email', '$name');";
		$r = mysqli_query($dbc,$q);

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
            echo "<form action = 'Input-User.php' method = 'POST'>";
            echo "<fieldset>";
            echo "<br> Username			<input type='text' name='username'>";
            echo "<br> Date of Birth		<input type='date' name='dob'>";
            echo "<br> Date of Hire		<input type='date' name='dateofhire'>";
            echo "<br> User Address		<input type='text' name='useraddress'>";
            echo "<br> Password			<input type='password' name='password'>";
            echo "<br> Password Change	<input type='date' name='pwchange'>";
            echo "<br> Email				<input type='email' name='email'>";
            echo "<br> Name				<input type='text' name='name'>";
            
            echo "<input type='hidden' name='version' value='1.3'>";
            echo "<br> <input type='submit'>";
            echo "</fieldset>";
            echo "</form>";

            echo "<br><a href= 'Display-Users.php'>Display Users Table</a><br> ";
        }

        echo "<br> $error_message";
    
    
    //End of file
    include "footer.php";
	
    ?>

</body>
<footer> 