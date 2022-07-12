<?php
    $server="localhost";
    $user_bd="root";
    $password="";
    $databasename="comet-hellow";
    $connect=mysqli_connect($server,$user_bd,$password,$databasename) 
    or die ("<h1><center>Error 404</center></h1><h3>Error, Connection Failed</h3>");
    mysqli_query($connect,"SET NAMES 'utf8'")
?>