<?php
session_start();
require_once 'class.user.php';
$user = new USER();


if($user->is_logged_in()!="")
{
	// header("refresh:5;accuiel.php");
 $user->redirect('../dashboard/dashboard.php');
}


if(isset($_POST['btn-submit']))
{
 $email = $_POST['Email'];
 $NomUtilisateur="";
 $Email2="";
 $stmt = $user->runQuery("SELECT IdUtilisateur,Email,NomUtilisateur FROM utilisateur WHERE Email=:Email or NomUtilisateur=:Email LIMIT 1");
 $stmt->execute(array(":Email"=>$email));
 $row = $stmt->fetch(PDO::FETCH_ASSOC); 
 if($stmt->rowCount() == 1)
 {
  $Email2 = ($row['Email']);
  $NomUtilisateur = ($row['NomUtilisateur']);
  $IdUtilisateur = base64_encode($row['IdUtilisateur']);
  $code = md5(uniqid(rand()));
  
  $stmt = $user->runQuery("UPDATE utilisateur SET Code=:Code WHERE Email=:email");
  $stmt->execute(array(":Code"=>$code,"email"=>$Email2));
  
  $message= "
       Bonjour $NomUtilisateur,
       <br /><br />
       Pour réinitialiser votre mot de passe,
       <br /><br />
       Cliquez sur le lien suivant. 
       <br /><br />
       <a href='http://maghrebeco.com/reinitialisation-du-mot-de-passe.php?IdUtilisateur=$IdUtilisateur&code=$code'>Cliquez ici </a>
       <br /><br />
       Merci :)
       ";
  $subject = "Réinitialiser le mot de passe";
  
  $user->send_mail($Email2,$message,$subject);
  
  $msg = "<div class='alert alert-success'>
     <button class='close' data-dismiss='alert'>&times;</button>
     Nous avons envoyé un e-mail à $Email2.
                    Cliquez sur le lien de réinitialisation du mot de passe dans l'email pour générer un nouveau mot de passe. 
      </div>";
 }
 else
 {
  $msg = "<div class='alert alert-danger'>
     <button class='close' data-dismiss='alert'>&times;</button>
     <strong> Désolé! </strong> Ce compte est introuvable. 
       </div>";
 }
}
?>



<!DOCTYPE html>
<html lang="fr">
<head>

	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MaghrebEco </title>
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
	


	<!-- container -->
	<div class="container">

        
		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				
				<br>
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
						<br>
							<!--<h3 class="thin text-center">Connectez-vous</h3>-->
							<p class="text-center text-muted">Veuillez saisir l'adresse e-mail ou le nom d'utilisateur associée à votre compte . Un code de vérification vous sera adressé. Lorsque vous le recevrez, vous pourrez choisir un nouveau mot de passe</p>
							<hr>
							 <?php
                                   if(isset($msg))
                                   {
                                    echo $msg;
                                   }
                                   else
                                   {	
                                   }
                                   ?>
							<form class="con-form" method="post" action="" id="rec">
								<div class="row top-margin">
								<div class="col-sm-12">
									<label>Nom utilisateur / Email <span class="text-danger">*</span></label>
									<input type="text" class="form-control" placeholder="Nom utilisateur / Email" id="email" name="Email">
								</div></div>
                                <br>
									<div class="row">
									<div class="col-lg-12 text-right">
										<button class="btn btn-action" type="submit" name="btn-submit">Envoyer</button>
									</div></div>
									
									
							</form>
						</div>
					</div>

				</div>
				
			</article>
			<!-- /Article -->

		</div>
	</div>	<!-- /container -->
	

	<div id="includedfooter"></div>






	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>
</html>