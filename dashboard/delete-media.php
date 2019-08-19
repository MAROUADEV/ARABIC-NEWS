<?php
	include('conn.php');
	$id=$_GET['id_media'];
	mysqli_query($conn,"delete from media where id_media='$id'");
	header('location:views-media.php');

?>