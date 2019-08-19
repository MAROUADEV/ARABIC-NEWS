<?php

error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
define('DB_DRIVER', 'mysql');
define('DB_PREFIX', 'em_');
define("DB_HOST", "localhost");
define("DB_USER", "maghsasa_root");
define("DB_PASSWORD", "Econewsma2018@");
define("DB_DATABASE", "maghsasa_db_news");

try {
  $DB = new PDO(DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_DATABASE, DB_USER, DB_PASSWORD, $dboptions);
   $DB->exec("SET CHARACTER SET utf8");
    $tz = (new DateTime('now', new DateTimeZone('Africa/Casablanca')))->format('P');
    $DB->exec("SET time_zone='$tz';");
} catch (Exception $ex) {
  echo $ex->getMessage();
  die;
}
?>