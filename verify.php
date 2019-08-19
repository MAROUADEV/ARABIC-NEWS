<?php
session_start();
require_once 'class.user.php';
$user = new USER();
/*if($user->is_Admin()!="")
{
	// header("refresh:5;nouveaucours.php");
	$user->redirect('nouveaucours.php');
}
*/
if(empty($_GET['IdUtilisateur']) && empty($_GET['code']))
{
	// header("refresh:5;connexion.php?cnx");
	$user->redirect('connexion.php?cnx');
}

if(isset($_GET['IdUtilisateur']) && isset($_GET['code']))
{
 $IdUtilisateur = base64_decode($_GET['IdUtilisateur']);
 $code = $_GET['code'];
 
 $statusY = "Y";
 $statusN = "N";
 
 $stmt = $user->runQuery("SELECT * FROM utilisateur WHERE IdUtilisateur=:IdUtilisateur AND Code=:code LIMIT 1");
 $stmt->execute(array(":IdUtilisateur"=>$IdUtilisateur,":code"=>$code));
 $row=$stmt->fetch(PDO::FETCH_ASSOC);
 if($stmt->rowCount() > 0)
 {
						$_SESSION['userSession'] = $row['IdUtilisateur'];
						$_SESSION['IdUtilisateur'] = $row['IdUtilisateur'];
						$_SESSION['Nom'] = $row['Nom'];
						$_SESSION['Prenom'] = $row['Prenom'];
						$_SESSION['Email'] = $row['Email'];
						$_SESSION['NomUtilisateur'] = $row['NomUtilisateur'];
						$_SESSION['MotDePasse'] = $row['MotDePasse'];
  if($row['Status']==$statusN)
  {
   $stmt = $user->runQuery("UPDATE utilisateur SET Status=:status WHERE IdUtilisateur=:IdUtilisateur");
   $stmt->bindparam(":status",$statusY);
   $stmt->bindparam(":IdUtilisateur",$IdUtilisateur);
   $stmt->execute(); 
   
   $msg = "
             <div class='alert alert-success'>
       <button class='close' data-dismiss='alert'>&times;</button>
       <strong> Félicitations  !</strong>  Votre compte est activé attendez un moment s'il vous plaît.</a>
          </div>
          "; 
		  if (!filter_var($_SESSION['Email'], FILTER_VALIDATE_EMAIL)) {
						if($user->login1($_SESSION['Email'],$_SESSION['MotDePasse']))
							 {
								 header("refresh:5;http://maghrebeco.com/dashboard/dashboard.php");
							 }
						
					}else{
						if($user->login2($_SESSION['Email'],$_SESSION['MotDePasse']))
							 {
								 header("refresh:5;http://maghrebeco.com/dashboard/dashboard.php");
							 }
						
					}
			
  }
  else
  {
   $msg = "
             <div class='alert alert-info'>
       <button class='close' data-dismiss='alert'>&times;</button>
       <strong>Désolé !</strong>  Votre compte est déjà activé
          </div>
          ";
  }
 }
 else
 {
  $msg = "
         <div class='alert alert-info'>
      <button class='close' data-dismiss='alert'>&times;</button>
      <strong>Désolé !</strong>  Aucun compte trouvé : <a href='inscription.php'>Inscrivez-vous ici</a>
      </div>
      ";
 } 
}

?>
<!DOCTYPE html>

<html lang="en" class="no-js">
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MaghrebEco</title>
     <link rel="shortcut icon" href="images/a.ico">

    <link href="css/media_query.css" rel="stylesheet" type="text/css"/>
    <link href="css3/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap RTL Theme -->
    
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="css/animate.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet" type="text/css"/>
    <link href="css/owl.theme.default.css" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap CSS -->
    <link href="css/style_1.css" rel="stylesheet" type="text/css"/>
    <!-- Modernizr JS -->
    <script src="js/modernizr-3.5.0.min.js"></script>
    
    <link rel="stylesheet" href="css/fa.min.css" type="text/css"/>
    	<script src="js/jquery.js"></script>

</head>
<body>

	<header id="head" class="secondary"></header>
	
 <div class="container" style="margin-top:15%;">
		<div class="row">
            <article class="col-xs-12 maincontent">
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							
					                   <?php if(isset($msg)) { echo $msg; } ?>

							
						</div>
					</div>

				</div>
				</article>
			<!-- /Article-->

		</div>
	</div>	<!-- /container -->


</body>
</html>