<?php
	include('conn.php');
	
	$id=$_GET['id_article'];
	
	$titre=$_POST['titre'];
	$contenu=$_POST['contenu'];
    $lien=$_POST['fichier'];
    $categories=$_POST['categories'];
				list($width, $height) = getimagesize($lien); 
				$arr = array('h' => $height, 'w' => $width );
				if($width>=300 && $height>=200){
					
					try {
							mysqli_query($conn,"update articles set titre='$titre', contenu='$contenu',fichier='$lien',categories='$categories' where id_article='$id'");
							header('location:views-articles.php?res=1');
							
							} catch (Exception $ex) {
							echo($ex->getMessage());
							}
				}else{
					header('location:views-articles.php?res=2');
					
				}				
?>