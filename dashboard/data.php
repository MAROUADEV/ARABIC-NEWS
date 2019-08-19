<?php
//setting header to json
header('Content-Type: application/json');

//database
define('DB_HOST', '127.0.0.1');
define('DB_USERNAME', 'maghsasa_root');
define('DB_PASSWORD', 'Econewsma2018@');
define('DB_NAME', 'maghsasa_db_news');

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}
$mysqli->set_charset("utf8"); 
$tz = (new DateTime('now', new DateTimeZone('Africa/Casablanca')))->format('P');
$mysqli->query("SET time_zone='$tz';");
//query to get data from the table
$query = sprintf("SELECT categories,COUNT(*) as total FROM `articles` GROUP BY categories");

//execute query
$result = $mysqli->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print the data
print json_encode($data);