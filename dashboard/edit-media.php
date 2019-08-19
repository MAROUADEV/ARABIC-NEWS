<?php
	include('conn.php');
	
	$id=$_GET['id_media'];
	
	$titre=$_POST['titre'];
	$type=$_POST['type'];
    $lien=$_POST['lien'];
    $categories=$_POST['categories'];
	



	mysqli_query($conn,"update media set titre='$titre', type='$type',lien='$lien',categories='$categories' where id_media='$id'");
	header('location:views-media.php');

?>