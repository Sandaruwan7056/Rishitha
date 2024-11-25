<?php
   // Database connection credentials
   $server = 'localhost';
   $username = 'root';
   $password = '';
   $database = 'roshe_kasu';

   // Create connection
   $con = mysqli_connect($server, $username, $password, $database);

   // Check connection
   if (!$con) {
       die("Connection failed: " . mysqli_connect_error());
   }
?>
