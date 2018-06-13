<?php
if(isset($_POST['user']))
{
include('database.php');
  $user=mysqli_real_escape_string($db,$_POST['user']);
  $email=mysqli_real_escape_string($db,$_POST['email']);
  $pass1=mysqli_real_escape_string($db,$_POST['pass1']);
  $pass2=mysqli_real_escape_string($db,$_POST['pass2']);
  $sql="";
  $res=mysqli_query($db,"select * from chat where username='$user'");
  $count=mysqli_num_rows($res);
  if($count>0)
  {
    echo "<h5><strong>WARNING</strong>: This User Name is Already Exist Please Choose Another</h5>";
  }
  else {
  $sql="insert into chat(username,email,password)values('$user','$email','$pass1')";
  if(!mysqli_query($db,$sql))
  {
    echo "Registaration Failed";
  }
  else {
  echo "<h4><strong>SUCCESS</strong>:Succesfully Register</h4>";
  }
}
}
else {
 echo "value wrong";
}
