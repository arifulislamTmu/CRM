<?php session_start();?>
<?php
   $hostName="localhost";
   $userName="root";
   $pass="";
   $db ="crm_database";
 
 $con = mysqli_connect($hostName,$userName,$pass);
 
 mysqli_select_db($con,$db);
 
 ?>