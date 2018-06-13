<?php
$user="root";
$password="";
$db="newdb1";
$db=new mysqli('localhost',$user,$password,$db) or die("unable to connect");
if(mysqli_select_db($db,"newdb1"))
{
  // echo "data base is connected";
}
 ?>
