<!DOCTYPE html>
<!--	Changelog
		9/10/20 AK Original File-->
<!--			HTML Header		-->
<html lang = "en">
<head>
<title> Glizzard | Changelog </title>
<meta charset = "utf-8">

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
        th {padding-left: 150px;}
    </style>

</head>
<!--		Body of Webpage	-->
<body>
<?php include "navigation.php";?>
    <hr> 
    <u> <h1> Changelog </h1> </u>


<main>
	<dl>
		<dd> <a href="/v1_Homepage.html">Website Version 0.0(9/17/20): Home page created</a></dd>
		<dd> <a href="/v2_Homepage.html">Website Version 0.1(10/28/20): Added Admin Options</a></dd>
        <dd> <a href="/v3_Homepage.php">Website Version 0.2(11/18/20): Changed Admin page and added option to delete and add users </a></dd>
        <dd> <a href="/Glizzard-Home.php">Website Version 0.3(12/6/20): Added login page, fixed products tab in nav, changed format of tables </a></dd>  
	</dl>

</main>

<footer> <small> <?php include "footer.php";?> </small> </footer>

</body>
</html>