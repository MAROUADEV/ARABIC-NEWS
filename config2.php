<?php

$host = "localhost"; /* Host name */
$user = "maghsasa_root"; /* User */
$password = "Econewsma2018@"; /* Password */
$dbname = "maghsasa_db_news"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
mysqli_set_charset($con,"utf8");
$tz = (new DateTime('now', new DateTimeZone('Africa/Casablanca')))->format('P');
$con->query("SET time_zone='$tz';");

// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}