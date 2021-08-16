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
        if (isset($_POST['sort'])){
            $sort_type = $_POST['sort'];
        }
        else{
            $sort_type = "id";
        }

    $table= "myusers";
    $q = "SELECT * FROM myusers WHERE active='Y';" ;		#We put query in $q		
    $r = mysqli_query ($dbc, $q);	#This runs query, using $dbc

    #Prints Table Using HTML
    echo "<table border=1>";
    echo "<tr>";
        echo "<th>ID </th>";
        echo "<th>Username </th>";
    echo "<th>Date of Birth </th>";
    echo "<th>Date of Hire </th>";
    echo "<th>User Address </th>";
    echo "<th>Password </th>";
    echo "<th>Password Change </th>";
    echo "<th>Email </th>";
    echo "<th>Name </th>";
    echo "<th>DELETE </th>";
    echo "</tr>";

    //loop through each row of returned data
    if ($r ) {
        while ($row = mysqli_fetch_array( $r, MYSQLI_NUM))
        {
            echo "<tr> <td> $row[0] </td> <td> $row[1] </td><td> $row[2] </td><td> $row[3] </td><td> $row[4] </td>" . "
                                <td> $row[5] </td><td> $row[6] </td><td> $row[7] </td><td> $row[8] </td> <td> <a href='12Deactivaterow.php?id=" . $row[9] . "'> DELETE</a> </td> </tr>";
        }
	}
	
	echo "</table>";

    // submit button to re-run the same file
    echo "<form action = 'Our_Users.php' method = 'POST'>";
    echo "<br> <input type = 'submit' value = 'SUBMIT'>";
	echo "<input type = 'radio' name = 'sort' value = 'id'> User ID";
	echo "<input type = 'radio' name = 'sort' value = 'username'> Username";
	echo "<input type = 'radio' name = 'sort' value = 'dob'> Date of Birth";
	echo "<input type = 'radio' name = 'sort' value = 'dateofhire'> Date of Hire";
	echo "<input type = 'radio' name = 'sort' value = 'useraddress'> User Address";
    echo "<input type = 'radio' name = 'sort' value = 'password'> Password";
    echo "<input type = 'radio' name = 'sort' value = 'pwchange'> Password Change";
	echo "<input type = 'radio' name = 'sort' value = 'email'> Email";
	echo "<input type = 'radio' name = 'sort' value = 'name'> Name";
    echo "</form>";

	?>
	
	<?php
	echo "<br> The request method is " . $_SERVER['REQUEST_METHOD'];
	
	/**************************************************************************
	 *	Input Validation
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
		}
		else {
			$username = $dob = $dateofhire = $useraddress = $password = $pwchange = $email = $name = "";
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

		// Check query return code
		if ($r ) {
			echo "Data inserted!";
		}
		else {
			echo "<li>" . mysqli_error( $dbc ) . "</li>";
		}
	}
	else {
		echo "<br>Running our ACTION code"; 
	
	//When SUBMIT is pressed, browser loads the ACTION file
	echo "<form action='A11-Kuras.php' method='POST'>";
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
	
	echo "<br> $error_message";
	}

	include "08-footer.php";
	?>
</body>
</html>