<?php
session_start();
require_once 'class.user.php';
$user = new USER();


if(empty($_GET['MotDePasse']) && empty($_GET['Email']))
{
	// header("refresh:5;connexion.php?cnx");
 $user->redirect('connexion.php?cnx');
}

if(isset($_GET['MotDePasse']) && isset($_GET['Email']))
{
	
 $MotDePasse = base64_decode($_GET['MotDePasse']);
 $email = $_GET['Email'];
 $statusY = "Y";
 $statusN = "N";
 
 $stmt = $user->runQuery("SELECT * FROM utilisateur WHERE Email=:email AND MotDePasse=:MotDePasse or NomUtilisateur=:email AND MotDePasse=:MotDePasse LIMIT 1");
 $stmt->execute(array(":email"=>$email,":MotDePasse"=>$MotDePasse));
 $row=$stmt->fetch(PDO::FETCH_ASSOC);
 if($stmt->rowCount() > 0)
 { 
				   $key = base64_encode($row['IdUtilisateur']);
				   
				   $message = "     
					  Bonjour   ,
					  <br /><br />
					  Bienvenue chez MaghrebEco !<br/>
					  Pour activer votre compte, cliquez sur le lien suivant.<br/>
					  <br /><br />
					  <a href='http://maghrebeco.com/verify.php?IdUtilisateur=".$key."&code=".$row['Code']."'>Cliquez ici pour activer :) </a>
					  <br /><br />
					  Merci,";
					  
				   $subject = "Confirmation d'inscription";
					  
				   $user->send_mail($email,$message,$subject); 
				   $msg = "
					 <div class='alert alert-success'>
					  <button class='close' data-dismiss='alert'>&times;</button>
					  <strong> Félicitations! </strong> Nous avons envoyé un courriel à ".$row['Email'].".
									Cliquez sur le lien de confirmation dans l'email pour activer votre compte. 
					   </div>
					 ";
					 header("refresh:10;connexion.php");
				  }
				  else
				  {
				   echo "Désolé, la requête n'a pas pu être exécutée ...";
				  }  
				 }
?>			
<!DOCTYPE html>

<html lang="en" class="no-js">
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
    <style>
        .bt
        {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;

        }
    </style>
</head>
<body>

      
	<header id="head" class="secondary"></header>
<!-- /container -->
	
    <div class="container">
		<div class="row">
            <article class="col-xs-12 maincontent">
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Connectez-vous </h3>
							<p class="text-center text-muted">Vous n'avez pas de compte ? Inscrivez-vous <a href="inscription.php">Ici</a> </p>
							<hr>
					                   <?php if(isset($msg)) { echo $msg; } ?>

							<form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data" id="cnx">
                                
                                <div class="col-12 py-3 top-margin">
                                    <label> Adresse Email <span class="text-danger">*</span></label>
									<input type="text" class="form-control" placeholder="Adresse Email" id="email" name="email" required="required">
                                </div>
                                <div class="col-12 py-3">
                                    <label>Mot de passe <span class="text-danger">*</span></label>
									<input type="password" class="form-control" placeholder="Mot de passe" id="pwd" name="pwd" required="required">
                                </div>
								
								<div class="row">
                                    
                                   <div class="col-lg-7">
                                    <b><a href="Mot-de-passe-oublie.php">Mot de passe oublié?</a></b>                                
									</div>
                                    
                                    <div class="col-lg-5 text-right">
                                    <button type="submit" class="btn btn-warning" name="btn-login" onclick="myFunction()"> Se connecter</button>
									</div>
								</div>
							</form>
						</div>
					</div>

				</div>
				</article>
			<!-- /Article-->

		</div>
	</div>	<!-- /container -->

  	


</body>
</html>