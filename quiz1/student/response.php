<?php
session_start();
$from_time1 = date('Y-m-d H:i:s');
if (!isset($_SESSION["end_time"])) {
	echo "0";
	exit;
}
$to_time1 = $_SESSION["end_time"];
$timefirst = strtotime($from_time1);
$timesecond = strtotime($to_time1);
$diff = $timesecond - $timefirst;
if ($diff != 0) {
	echo gmdate("H:i:s", $diff);
} 
else if ($diff == 0) 
{
	session_unset();
	session_destroy();
	echo "0";

	exit;
}
