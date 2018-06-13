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
  </head>

  <body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
      <div class="container">
        <a href="index.html" class="navbar-brand"><img src="img/chaticon2.png" alt="" height="40px" width="48px"><?php echo " "?><strong>ChatApp</strong></a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse" type="button" name="button">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse" >
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              <a href="register.php" class="nav-link"><strong id="col">Home</strong></a>
          </li>
          <li class="nav-item">
              <a href="login.php" class="nav-link"><strong id="col">Login</strong></a>
          </li>
          <li class="nav-item">
              <a href="#creat-head-section" class="nav-link"><strong id="col">About Us</strong></a>
          </li>

        </ul>

      </div>
      </div>

    </nav>

    <header id="home-section">
      <div class="dark-overlay">
        <center>
        <div class="container pad">
          <br>
          <img src="chaticon2.png" alt="" height="100px" width="108px" padding="5px">
         <h2 class="dispaly-4">Register Here To<strong>Chat</strong></h2>



        <div class="alert-warning" id="res">

        </div>

        <div class="alert-success" id="res1">

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
                        <h3>Sign Up Today</h3>
                        <p>please fill out this form to register</p>
                        <form id="form-data">
                          <div class="form-group">
                            <input type="text" class="form-control form-control-lg" id="user" placeholder="Username">

                          </div>
                          <div class="form-group">
                            <input type="email" class="form-control form-control-lg" id="email" placeholder="Email">

                          </div>
                          <div class="form-group">
                            <input type="password" class="form-control form-control-lg" id="pass1" placeholder="Password">

                          </div>
                          <div class="form-group">
                            <input type="password" class="form-control form-control-lg" id="pass2" placeholder="Confirm Password">

                          </div>
                          <input type="submit" value="submit" class="btn btn-outline-light btn-block">

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

    <script type="text/javascript">
      document.getElementById('form-data').addEventListener('submit',formdata);
      function formdata(e)
      {
        e.preventDefault();
        var user=document.getElementById('user').value;
        var email=document.getElementById('email').value;
        var pass1=document.getElementById('pass1').value;
        var pass2=document.getElementById('pass2').value;
        console.log(user);
        console.log(email);
        if(pass1!='' && pass2!=''&& user!=''&& email!='')
        {
        if(pass1===pass2 )
        {
           if( pass1.length>=6 )
           {
        var params="user="+user+"&email="+email+"&pass1="+pass1+"&pass2="+pass2;
         console.log(params);
        var xhr=new XMLHttpRequest();
        xhr.open('POST','reg-data.php',true)
        xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
        xhr.onload=function()
        {
          console.log(this.responseText);
          var n=this.responseText;
          var t=n.length;
          console.log(t);
          if(t==88)
          {
          document.getElementById('res').style.visibility='visible';
          document.getElementById('res1').style.visibility='hidden';
          document.getElementById('res').innerHTML=this.responseText;
        }
        else {
        document.getElementById('res1').style.visibility='visible';
        document.getElementById('res').style.visibility='hidden';
        document.getElementById('res1').innerHTML=this.responseText;
        document.getElementById("form-data").reset();
        }
      }
xhr.send(params);
    }
    else {
        document.getElementById('res').innerHTML= "<h5><strong>WARNING:</strong>Please Enter Strong Password</h5>";
    }
  }

      else {
        document.getElementById('res').innerHTML= "<h5><strong>WARNING:</strong>Password Not Mached</h5>";
      }
    }

    else {
      document.getElementById('res').innerHTML= "<h5><strong>WARNING:</strong> Please Fill the Form </h5>";
    }
      }

    </script>

  </body>
</html>
