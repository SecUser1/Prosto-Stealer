<?php
error_reporting(0);
require("mysql.php");

if ($_COOKIE["pwd"] === md5($panel_password)){
?>

<html>
 <head>
  <meta charset="utf-8">
  <title>Loader</title>
  <link href="bootstrap.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="w3.css">
  <link href="bar.css" rel="stylesheet" id="bootstrap-css">
 </head>
 <body class="w3-light-gray">
 
<div class="w3-sidebar w3-light-gray w3-bar-block w3-collapse w3-card w3-animate-left" style="width:200px;" id="mySidebar">
  <h4 class="w3-bar-item w3-red">Panel v1.1</h4>
  <a class="w3-bar-item w3-button" href="index.php">Logs</a>
  <a class="w3-bar-item w3-button" href="loader.php">Loader</a>
  <a class="w3-bar-item w3-button" href="stat.php">Statistic</a>
  <a class="w3-bar-item w3-button" href="features.php">Features</a>
</div>

<div class="main">
    
<div class="w3-panel w3-card-4 w3-red w3-display-container">
  <h2 style="color: white;">Features!</h2>
  <h4 style="color: white;">Stealer:</h5>
  <h5 style="color: white;">Steal data from all chromium browsers</h5>
  <h5 style="color: white;">data: CC, Passwords, Cookies, Autofill</h5>
  <h5 style="color: white;">Unlimited loader (any exe count)</h5>
  <h5 style="color: white;">All firewalls bypass (don't work for loader)</h5>
  <h5 style="color: white;">Telegram session steal (files)</h5>
  <h5 style="color: white;">Jabber stealer (psi, psi+, pidgin)</h5>
  <h5 style="color: white;">Steam important files stealer</h5>
  <h5 style="color: white;">Filezilla passwords stealer</h5>
  <h5 style="color: white;">All crypto wallets stealer</h5>
  <h5 style="color: white;">Battle net database stealer</h5>
  <h5 style="color: white;">Encrypted traffic between C2 and panel</h5>
  <h4 style="color: white;">Panel:</h5>
  <h5 style="color: white;">Logs download, download all, clean statistic</h5>
  <h5 style="color: white;">Remove one log or all logs</h5>
  <h5 style="color: white;">Logs filter by country on current page</h5>
  <h5 style="color: white;">Loader (add|remove link)</h5>
  <h5 style="color: white;">Statistic page</h5>
  
</div>
	
</div>
  
 </body>
</html>
<?php
}else{
	header("location: login.php");
}
?>