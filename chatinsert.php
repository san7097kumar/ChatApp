<?php
session_start();
if(isset($_POST['msg']))
{
include('database.php');
 $name=$_SESSION['login_user'];
  $msg=$_POST['msg'];
  $msg1=mysqli_real_escape_string($db,$msg);
  $sql="";
  $res1="";
  $sql="insert into chatmsg(name,msgg)values('$name','$msg1')";
  if(!mysqli_query($db,$sql))
  {
    echo "not inserted";
  }
  else {
  echo "<h4><strong>SUCCESS</strong>:Inserted</h4>";
  $res1=mysqli_query($db,"select id from chatmsg");
       $count=mysqli_num_rows($res1);

     if($count>=50)
     {

       $res2=mysqli_query($db,"DELETE  FROM chatmsg");
     }

  }
}
else {
echo "something is wrong";
}
