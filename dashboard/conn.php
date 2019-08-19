<?php
 
//MySQLi Procedural
$conn = mysqli_connect("localhost","maghsasa_root","Econewsma2018@","maghsasa_db_news");

$conn ->set_charset("utf8");
$tz = (new DateTime('now', new DateTimeZone('Africa/Casablanca')))->format('P');
$conn->query("SET time_zone='$tz';");

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

?>