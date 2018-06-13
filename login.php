<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Aldrich|Cabin+Sketch|Forum|Volkhov" rel="stylesheet">
    <link rel="stylesheet" href="css/chatcss.css">
  </head>

  <body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
      <div class="container">
        <a href="index.html" class="navbar-brand"><img src="img/chaticon2.png" alt="" height="40px" width="48px"><?php echo " "?><strong>Chat App</strong></a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse" type="button" name="button">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse" >
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              <a href="register.php" class="nav-link"><strong id="col">Home</strong></a>
          </li>
          <li class="nav-item">
              <a href="register.php" class="nav-link"><strong id="col">Register</strong></a>
          </li>
          <li class="nav-item">
              <a href="" class="nav-link"><strong id="col">About Us</strong></a>
          </li>

        </ul>

      </div>
      </div>

    </nav>

    <header id="home-section">
      <div class="dark-overlay">
        <center>
        <div class="cen pad">
          <br>
          <img src="chaticon2.png" alt="" height="100px" width="108px" padding="5px">
         <h2 class="dispaly-4">Login Here To<strong>Chat</strong></h2>
         <div class="alert-danger container">
           <h3><?php echo @$_GET["notlogedin"];?></h3>
           <h3><?php echo @$_GET["invalid"];?></h3>
           <h3><?php echo @$_GET["logout"];?></h3>
         </div>
        </div>
        </center>
        <div class="home-inner">
          <div class="container">
            <div class="row">
              <div class="col-lg-0">
              </div>
                  <div class="col-lg-12">
                    <div class="card bg-primary text-center card-form">
                      <div class="card-body">
                        <h3>Sign In Today</h3>
                        <p>please fill out this form to login</p>
                        <form action="" method="post">
                          <div class="form-group">
                            <input type="text" class="form-control form-control-lg" name="name" placeholder="Username">

                          </div>

                          <div class="form-group">
                            <input type="password" class="form-control form-control-lg" name="pass1" placeholder="Password">

                          </div>

                          <input type="submit" value="submit" name="submit" class="btn btn-outline-light btn-block">

                        </form>


                      </div>

                    </div>
                  </div>
                </div>

              </div>

            </div>
            <br><br>
            <center>
</center>
          </div>

        </div>

      </div>

    </header>
    <?php
    session_start();
    if(isset($_POST['submit']))
    {
include('database.php');
    $username=mysqli_real_escape_string($db,$_POST["name"]);
    $password=mysqli_real_escape_string($db,$_POST["pass1"]);
    $count="";
    $res=mysqli_query($db,"select * from chat where username='$username' and password='$password'");
    $count=mysqli_num_rows($res);
    if($count==1)
    {
    	$_SESSION['login_user']=$username;
    	header("location:chatform.php?success=Login Sucessful");
    }
    else
    {
    	header("location:login.php?invalid=Yours Username or Password are incorrect Please try again");
    }
    }
    ?>
  </body>
</html>
