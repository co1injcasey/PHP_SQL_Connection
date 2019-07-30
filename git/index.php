<?php

$servername = "localhost";  // THE NAME OF YOUR LOCALSERVER, USUALLY LOCALHOST
$username= "admin";        // CHANGE THIS TO YOUR DB USERNAME
$password = "password!";   // CHANGE THIS TO YOUR DB PSWD FOR THE USERNAME ABOVE
$dbname = "databaseName";   // CHANGE THIS TO THE NAME OF THE DATABASE

$conn = new mysqli($servername, $username, $password , $dbname );

if(isset($_POST['username'])){


$stmt = $conn->prepare('INSERT INTO `databaseName`(`username`,`password`, `ip`)
VALUES (?, ?, ?);');
$stmt->bind_param('sss' ,$pusername, $ppassword, $ip);

	$pusername=$_POST['username'];
	$ppassword=$_POST['password'];
    $ip=$_SERVER['REMOTE_ADDR'];
$stmt->execute();

//$result = $stmt->get_result();
$stmt->close();



	header('Location: home.html');


}


	?>

<!--
 THIS FORM NOT ONLY CREATES A PHP CONNECTION TO SUBMIT USERNAME & PASSWORD TO A
 DATABASE, IT ALSO GRABS THE USERS IP ADDR AND ADDS THAT TO THE DB AS WELL
 HELPFUL TO TRACK WHERE YOUR CUSTOMERS ARE LOCATED AROUND THE GLOBE
--> 

<html lang="en" >
<head>
  <meta charset="utf-8" />
    <meta name="author" content="Script Tutorials" />
    <title>Colin Casey</title>
    <link rel="stylesheet" href="style3.css" type="text/css" />
	<!-- Favicons -->
    <link rel="icon" sizes="16x16" type="image/png" href="cc.jpg">
    <link rel="apple-touch-icon" href="cc.jpg">
    <link rel="apple-touch-icon" sizes="72x72" href="cc.jpg">
    <link rel="apple-touch-icon" sizes="114x114" href="cc.jpg">
</head>


<body>
<div class="form-actions">
<div class="stars">

<br><br><br><br>

   <h1 align="center" style="color:white">Colin Casey Productions </h1>
<br><br><br><br>


<h4 align="center" style="color:white"><b>You must be a registered user to access the site</b></h4>


<form action="index.php" method="post"><br>
<p align="center" style="color:white"><b>To Begin, Enter your Username and Password<br></b></p>
  <br><br><br><br><br>
        <table width="100" height="232" border="5" align="center" style="color:white">
          <tr>
            <td><b><em>Username:</em></b></td>
          </tr>
  <td><input class="text" placeholder="Enter Username Here" name="username" id="username"></td>
  <tr>
    <td><b><em><center>Password:</center></em></b></td>
    </tr>
    <td><center><input type="password" class="text" placeholder="Enter Password Here" name="password" id="password"></td></center>
      <td><center><input type="hidden" class="text"  name="ip" id="ip"></td></center>

        </table>

        <center><button type="submit">Login</button></td>
		 <td height="86"><button type="button"><a href="register.php">Register</button></td></center>
	   <br><br>
		<center><TD colspan=4 align=center><font size=-1 style="color:white"> Copyright 2018-Colin James Casey Production</TD></center>

</div>
</div>
</form>
</body>
</html>
