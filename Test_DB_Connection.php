<!--------------------------------------------------------------
    Filename: Test_DB_Connection.php  
    This file tests the connectiion to the site_db database 
     
	 
	Note: MAC's may require the 127.0.0.1 instead of LOCALHOST 
	 
  V1.0  10/080/2020 AT Original program  
---------------------------------------------------------------->
<?php
  Echo "<b> This PHP file attempts to  connect to the site_db database</b>";
  Echo "<br><br> If this does not work:";
  Echo "<ol>";
  Echo "<li> You must have MYSQL running."; 
  Echo "<li> Did you create the user MIKE@localhost in site_db?";
  Echo "</ol><br><b>";
  
  $dbc=mysqli_connect('127.0.0.1','mike','easysteps','site_db')
  OR die
      ( mysqli_connect_error());
		
  Echo "The connection was successful.";
  
?>           
