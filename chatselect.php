
<?php
session_start();
include('database.php');
function formatDate($date)
{
return date('g:i a',strtotime($date));
}
$sql1="SELECT * FROM chatmsg";
$result1=mysqli_query($db,$sql1);
while($row=mysqli_fetch_assoc($result1))
{
echo"<div class='right'>";
echo "<div class='tleft'>&nbsp<strong>".$row['name']."</strong>:".$row['msgg']."</div>";
echo '<div class="time"><span style="font-size:70% ;text-align:right;">'.formatDate($row['time']).'</span></div><br>';
echo "</div>";
}
?>
