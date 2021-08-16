<!-- filename: admin
    this file is linked onto our homepage with tabs for admins to access
    V1.0 10.18.20 AK Original Program-->

<!DOCTYPE html>
<html lang = "en">

<head>
    <title> Glizzard | Admin </title>
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
        <u> <h1> Admin Options </h1> </u>
        <table style='width: 100%;' border = 0>
        <th> <a href= '/SD2 Project Documentation.pdf'> T5 Team Document </a> </th>
        <th> <a href= '/phpinfo.php'> PHP Status </a> </th>
        <th> <a href= '/Glizzard-Tables.php'> List of Users, Suppliers, and Products </a> </th>		
    </table>
    </div>
    <footer> <small> <?php include "footer.php";?> </small> </footer>
 </body>
</html>


 