<?php
// session_start();

// session_destroy();
// header('Location: index.php');
// exit;	


// <?php
session_start();
require_once '../class.user.php';
$user = new USER();

if(!$user->is_logged_in())
{
 $user->redirect('../connexion.php');
}

if($user->is_logged_in()!="")
{
 $user->logout(); 
 $user->redirect('../connexion.php');
}
?>