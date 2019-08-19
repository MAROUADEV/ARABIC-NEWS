<?php
	include('conn.php');
	$id=$_GET['id_article'];
	mysqli_query($conn,"delete from articles where id_article='$id'");
	header('location:views-articles.php');

?>