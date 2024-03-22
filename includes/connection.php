<?php 
    $connection = mysqli_connect("localhost","root","") or die("Can't connect to database");
    $db = mysqli_select_db($connection,"bbms");
?>