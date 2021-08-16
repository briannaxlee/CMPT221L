<!DOCTYPE html>
<!--    Lee-A3.html   Home Page  09.16.20 BL Original File   -->
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
    <div>
        <u> <h1> About Us </h1> </u>
        <p>
            Welcome to Glizzard! We're a Game Store that sells games ranging from retro games to modern games. <br> <br>
            Our website is an inventory for what our store carries and is ready to sell to our customers. Customers can pre-order and order games that they desire
            for all consoles, ranging from video game consoles and portable consoles. <br><br>
            We ship products both internationally and domestically. 
        </p>
    </div>
    <div>
        <u> <h1> Popular Products </h1> </u>
        <table>
            <tr>
                <th> <img src = "acnh.jpg" alt = "Animal Crossing: New Horizons" width="200px" height="300px"> </th>
                <th> <img src = "gtav.jpg" alt = "Grand Theft Auto V" width="200px" height="300px"> </th>
                <th> <img src = "fallguys.jpg" alt = "Fall Guys" width="200px" height="300px"> </th>
            </tr>
        </table>
    </div>
    <footer> <small> <?php include "footer.php";?> </small> </footer>
 </body>
</html>