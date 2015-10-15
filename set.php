<?php
$sitename = "localhost";
$link = mysql_connect("wm82.wedos.net", "a91708_steam", "PeJKWnWR");
$db_selected = mysql_select_db('d91708_steam', $link);
mysql_query("SET NAMES utf8");

function fetchinfo($rowname,$tablename,$finder,$findervalue) {
	if($finder == "1") $result = mysql_query("SELECT $rowname FROM $tablename");
	else $result = mysql_query("SELECT $rowname FROM $tablename WHERE `$finder`='$findervalue'");
	$row = mysql_fetch_assoc($result);
	return $row[$rowname];
}
?>