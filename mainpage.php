
<?php
/*
session_start();
setcookie('username');
if(empty($_SESSION['username']))
header('Location:login.php');*/

?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script>
    function preventBack(){
      
      window.history.forward()
    };
    window.onunload=function(){null};
  </script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="mainpage.php">RideWithUs</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="mainpage.php">Home</a></li>
      <li ><a href="login.php">Customer</a></li>
      <li ><a href="AboutUs.php">About Us</a></li>
      <li><a href="loginfirst.php">Purchase</a></li>
      <li ><button type="login"><a href="login.php">Login</a></li></button>
      <li ><button type="signup"><a href="create.php">Signup</a></li></button>
     
      
     
    </ul>
  </div>
</nav>

<style>
body {
      background-image: url('bgjpg.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      color: beige;
     
}
div.gallery {
  border: 1px solid #ccc;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}

* {
  box-sizing: border-box;
}

.responsive {
  padding: 0 6px;
  float: left;
  width: 24.99999%;
}

@media only screen and (max-width: 700px) {
  .responsive {
    width: 49.99999%;
    margin: 6px 0;
  }
}

@media only screen and (max-width: 500px) {
  .responsive {
    width: 100%;
  }
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

h4{
  margin-bottom: 5%;
}
</style>


<h1 align="center">Our Stock for this month:</h1>

<MARQUEE><h4 align="center" >Click on the picture to know more about the bike.</h4></MARQUEE>

<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="https://www.heromotocorp.com/en-in/xpulse200/">
      <img src="xpulse.png" alt="XPulse200" width="600" height="400">
    </a>
    <div class="desc">Hero Xpulse 200 @ NRs. 3.85 lakhs</div>
  </div>
</div>


<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="https://www.bajajauto.com/bikes/pulsar/pulsar-ns200">
      <img src="NS200.jpeg" alt="NS200" width="600" height="400">
    </a>
    <div class="desc">Bajaj Pulsar NS200 @NRs. 3.67 lakhs</div>
  </div>
</div>

<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="https://www.tvsmotor.com/tvs-apache/Apache-RTR-200-4V">
      <img src="rtr.jpeg" alt="TVS Apache RTR 200 4V R.E 2.0" width="600" height="400">
    </a>
    <div class="desc">TVS Apache RTR 200 4V R.E 2.0</div>
  </div>
</div>

<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="https://www.yamaha-motor-india.com/yamaha-fzs-fi.html">
      <img src="fzs.jpg" alt="FZS FI" width="600" height="400">
    </a>
    <div class="desc">Yamaha FZS FI V 3.0 </div>
  </div>
</div>

<div class="clearfix"></div>

<div>
  <h1 align="center"> Need to Purchase??<a href="create.php"><u>Become Our Customer</u></a></h1></div>
  
  
</body>
</html>



