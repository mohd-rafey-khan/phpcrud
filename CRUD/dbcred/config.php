<?php
    // attempt to connect mysql database
    $sql_try = mysqli_connect('localhost','root','','crud');
    if($sql_try === false){
        die("ERROR: Sorry not connect. " . mysqli_connect_error());
    }
?>