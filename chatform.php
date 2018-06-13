<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Aldrich|Cabin+Sketch|Forum|Volkhov" rel="stylesheet">
        <title>Register</title>
        <link rel="stylesheet" href="css/chatcss.css">
        <link rel="stylesheet" href="css/chatformcss.css">
      </head>
    <title></title>
    <style media="screen">
      .scroll1
      {
          overflow-x: scroll;
          padding:2px;

      }
      .right
      {
border-radius:12px;
width:auto ;
height:auto ;
margin :20px;
padding:2px;
background-color:rgb(230, 242, 255);
box-shadow: 2px 2px 4px #000000;
color:#333300;
text-shadow:#fff;
      }
      .time{
    text-align: right;

      }
      .tleft
      {
          text-align:left;
          font-size:1.1em;
      }
      h1{

      }
    </style>
  </head>
  <body>
    <header id="home-section">
      <div class="dark-overlay">

<?php
session_start();
if(!$_SESSION["login_user"])
{
	header("location:login.php?notlogedin=you are not Administrator!");
}
else {
?>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <div class="container">
    <a href="index.html" class="navbar-brand"><img src="chaticon2.png" alt="" height="40px" width="48px"><?php echo " "?><strong>ChatApp</strong></a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse" type="button" name="button">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse" >
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
          <a href="logout.php" class="nav-link"><strong id="col">Logout</strong></a>
      </li>

    </ul>

  </div>
  </div>
</nav>


<div class="container">
  <div class="pad">
    <center>
      <br>
      <img src="img/chaticon2.png" alt="" height="100px" width="108px" padding="5px">
      <br>
      <h1> Welcome <strong><?php echo $_SESSION["login_user"]; ?></strong></h1>
    </center>
<div class="card bg-primary text-center card-form ">
  <div class="card-body">
<form id="form-data">
  <div class="form-group">
    <div type="" class="form-control form-control-lg scroll1" id="msg"  style="height:400px">

    </div>
  </div>

  <div class="form-group">
    <textarea type="text" class="form-control form-control-lg" id="msg1" placeholder="Message" style="height:50px" >
    </textarea>
  </div>
  <input type="submit" value="submit" class="btn btn-outline-light btn-block">
</form>
 </div>
 </div>
   </div>
</div>
<center>

</center>
</div>
</header>
<script>
// document.getElementById("msg").disabled = true;
var element = document.getElementById("msg");
element.scrollTop = element.scrollHeight;

function updateScroll(){
    var element = document.getElementById("msg");
    element.scrollTop = element.scrollHeight;
}

var scrolled = false;
function updateScroll(){
    if(!scrolled){
        var element = document.getElementById("msg");
        element.scrollTop = element.scrollHeight;
    }
}

$("msg").on('scroll', function(){
    scrolled=true;
});
//once a second
// setInterval(updateScroll,500);

document.getElementById('form-data').addEventListener('submit',chatdata);
function chatdata(e)
{
e.preventDefault();
var txt=document.getElementById("msg1").value;
var params="msg="+txt;
console.log(txt);
var xhr=new XMLHttpRequest();
xhr.open('POST','chatinsert.php',true)
xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
xhr.onload=function()
{
console.log(this.responseText);
// document.getElementById('msg').innerHTML=this.responseText;
// var txt=document.getElementById("msg1").value;
// document.getElementById('msg').innerHTML=txt;
}
xhr.send(params);
document.getElementById("form-data").reset();
}
</script>

<!--mysql data reading-->
<script type="text/javascript">
function dis()
{
  var xht=new XMLHttpRequest();
  xht.open("GET",'chatselect.php',true)
  xht.onload=function()
  {
    // console.log(this.responseText);
    document.getElementById('msg').innerHTML=this.responseText;
  }
  xht.send()
  updateScroll();
}
dis();
setInterval(function(){
  dis();
},1000)
</script>
<?php
}
?>
</body>
</html>
