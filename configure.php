<?php


// display all error except deprecated and notice  
error_reporting( E_ALL & ~E_DEPRECATED & ~E_NOTICE );
// turn on output buffering 
ob_start();

define('DB_DRIVER', 'mysql');
define("DB_HOST", "localhost");
define("DB_USER", "maghsasa_root");
define("DB_PASSWORD", "Econewsma2018@");
define("DB_DATABASE", "maghsasa_db_news");


// basic options for PDO 
$dboptions = array(
    PDO::ATTR_PERSISTENT => FALSE,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

//connect with the server
try {
    $DB = new PDO(DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_DATABASE, DB_USER, DB_PASSWORD, $dboptions);
     $tz = (new DateTime('now', new DateTimeZone('Africa/Casablanca')))->format('P');
     $DB->exec("SET time_zone='$tz';");
} catch (Exception $ex) {
    echo($ex->getMessage());
    die;
}

?>