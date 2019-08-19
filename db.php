<?php
define('HOSTNAME','localhost');
define('DB_USERNAME','maghsasa_root');
define('DB_PASSWORD','Econewsma2018@');
define('DB_NAME', 'maghsasa_db_news');

//global $con;
$con = mysqli_connect(HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME) or die ("error");
$con ->set_charset("utf8");
$tz = (new DateTime('now', new DateTimeZone('Africa/Casablanca')))->format('P');
$con->query("SET time_zone='$tz';");
// Check connection
if(mysqli_connect_errno($con))	echo "Failed to connect MySQL: " .mysqli_connect_error();
?>
