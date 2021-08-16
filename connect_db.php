<!-- filename: connect_db
    this file connects to our database using default MIKE@LOCALHOST
    important: this file has a password so it must not be visibile to users
    V1.0 10.18.20 AK Original Program-->

<?php
    $dbc=mysqli_connect( '127.0.0.1','mike','easysteps','site_db')
    OR die
        (mysqli_connect_error());
?>