<?php


$servername = "localhost";  // THE NAME OF YOUR LOCALSERVER, USUALLY LOCALHOST
$username= "admin";        // CHANGE THIS TO YOUR DB USERNAME
$password = "password!";   // CHANGE THIS TO YOUR DB PSWD FOR THE USERNAME ABOVE
$dbname = "databaseName";   // CHANGE THIS TO THE NAME OF THE DATABASE

$conn = new mysqli($servername, $username, $password , $dbname );

if(isset($_POST['firstname'])){


$stmt = $conn->prepare('INSERT INTO `databaseName`(`firstname`,`lastname`,`username`,`password`, `ip`)
VALUES (?, ?, ?, ?, ?);');
$stmt->bind_param('sssss', $pfirstname, $plastname, $pusername, $ppassword, $ip);
	$pfirstname=$_POST['firstname'];
	$plastname=$_POST['lastname'];
	$pusername=$_POST['username'];
	$ppassword=$_POST['password'];
             $ip=$_SERVER['REMOTE_ADDR'];
$stmt->execute();
// THIS IS INSERTING ALL THE FIELDS FROM THE REGISTER PAGE INTO YOUR DATABASE


//$result = $stmt->get_result();
$stmt->close();


// NOW THIS INSERTS USERNAME AND PASSWORD INTO ANOTHER DATABASE YOU WANT
$stmt = $conn->prepare('INSERT INTO your_users_db (`username`,`password`, `ip`)
VALUES (?, ?, ?);');
$stmt->bind_param('sss', $pusername, $ppassword, $ip);

	$pusername=$_POST['username'];
	$ppassword=$_POST['password'];
    $ip=$_SERVER['REMOTE_ADDR'];

$stmt->execute();
//$result = $stmt->get_result();
$stmt->close();

	header('Location: home.html');
// ONCE SUCCESSFULLY REGISTERED IT TAKES THE USER TO THE HOMEPAGE

}

	?>

<!-- THE FOLLOWING CODE IS TO CREATE A REGISTER PAGE FOR USERS TO REGISTER FOR A SITE.
THE PAGE WILL THEN SUBMIT THE FILLED OUT FIELDS TO A DATABASE
THIS IS A SIMPLE CONSTRUCTION TO SHOW THE CONNECTIONS OF PHP FOR USERS TO CREATE
CONNECTIONS TO DATABASES. IT IS NOT MEANT TO SHOW OFF HTML/CSS/JAVASCRIPT. THAT'S
WHY ITS A SIMPLE FORM
-->


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>CJC - Programmer, Engineer, Author</title>

    <!-- Favicons -->
    <link rel="icon" sizes="16x16" type="image/png" href="cc.jpg">
    <link rel="apple-touch-icon" href="cc.jpg">
    <link rel="apple-touch-icon" sizes="72x72" href="cc.jpg">
    <link rel="apple-touch-icon" sizes="114x114" href="cc.jpg">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Exo:400,600,700" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="css/glyphs/fa/font-awesome.min.css" type="text/css">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="css/vendor/animate.css" type="text/css">
    <link rel="stylesheet" href="css/vendor/lity.min.css" type="text/css">
    <link rel="stylesheet" href="css/vendor/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/vendor/owl.theme.default.min.css" type="text/css">

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" type="text/css">
  </head>

  <body class="t-login">

    <!-- BEGIN PRELOADER -->
    <div class="preloader">
      <div class="sk-cube-grid">
        <div class="sk-cube sk-cube1"></div>
        <div class="sk-cube sk-cube2"></div>
        <div class="sk-cube sk-cube3"></div>
        <div class="sk-cube sk-cube4"></div>
        <div class="sk-cube sk-cube5"></div>
        <div class="sk-cube sk-cube6"></div>
        <div class="sk-cube sk-cube7"></div>
        <div class="sk-cube sk-cube8"></div>
        <div class="sk-cube sk-cube9"></div>
      </div>
    </div>
    <!-- END PRELOADER  -->

    <!-- BEGIN HEADER AND NAVIGATION -->
    <header id="header">
      <!-- BEGIN NAVIGATION -->
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="external navbar-brand" href="index.html">
              <img src="cc.jpg" alt="Website Logo">
            </a>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right" id="nav">

              <li><a class="external -register" href="register.php">Sign Up</a></li>
              <li><a class="external -login" href="signin.php">Login</a></li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- END NAVIGATION -->

    </header>
    <!-- END HEADER AND NAVIGATION -->

    <!-- BEGIN MAIN CONTENT -->
    <main id="main">
        <!-- BEGIN LOGIN SECTION -->
        <section id="login" class="login s-section-alt">
          <div class="container">
            <div class="login__container">
              <div class="login__header s-back-grad">
                <h3><i class="fa fa-user"></i>Register</h3>
                <p>Don't have an account? Register to Start</p>
              </div>
              <form class="login__form" action="register.php" method="post">
                <div class="form-group">
                  <input class="form-control" required="" name="firstname" placeholder="First Name" type="text">
                </div>
                <div class="form-group">
                  <input class="form-control" name="lastname" placeholder="Last Name" >
                </div>
                <div class="form-group">
                  <input class="form-control" required="" name="username" placeholder="Username*" type="password">
                </div>
                <div class="form-group">
                  <input class="form-control" required="" name="password" placeholder="Password*" type="password">
					<input type="hidden" class="text"  name="ip" id="ip">
                </div>
                <div class="text-center">
                  <button type="submit" name="button" class="c-btn c-btn--action -big">Create my account</button>
                </div>
              </form>
              <p>Already have an account? <a href="index.php">Log in</a></p>
            </div>
          </div>
        </section>
        <!-- END LOGIN SECTION -->
    </main>
    <!-- BEGIN MAIN CONTENT -->

    <!-- BEGIN FOOTER -->
    <footer class="footer">
      <div class="container">
        <ul class="c-social-icons footer__social">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="https://twitter.com/ccasey62"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="https://www.linkedin.com/in/co1injcasey/"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
          </ul>
        <p class="footer__copyright">
          &copy;2018 Colin J. Casey | All Rights Reserved.
        </p>
      </div>
    </footer>
    <!-- END FOOTER -->

    <!-- JS FILES -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDu_MyOFVseomNQCFo8e56_Bp0IOcf-yuU"></script>
    <script type="text/javascript" src="js/plugins.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>

  </body>

</html>
