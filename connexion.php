<?php
session_start();
require_once 'class.user.php';
$user_login = new USER();
/*if($user_login->is_Admin()!="")
{
	// header("refresh:5;nouveaucours.php");
 $user_login->redirect('nouveaucours.php');
}
if($user_login->is_logged_in()!="")
{
	// header("refresh:5;accueil.php");
 $user_login->redirect('accueil.php');
}*/
?>


<!DOCTYPE html>

<html lang="en" class="no-js">
<head>
    
<script type="text/javascript">
function myFunction() {
		valide1 = true;
		valide2 = true;
		if (document.getElementById('email').value != "" && document.getElementById('pwd').value != "") {
		document.getElementById('msg7').style.display  = 'none';
						if ( document.getElementById('email').value.length < 3 || document.getElementById('pwd').value.length < 3 
								|| document.getElementById('email').value.length >50	|| document.getElementById('pwd').value.length >50) {
								document.getElementById('tag-id').innerHTML = '<div class="alert alert-danger" role="alert" id="msg3" > Vérifier que le nombre de caractères entre 3 et 50 caractères. </div>';
								
								valide1=false;
			return false;
							}

		}
		else {
									document.getElementById('tag-id').innerHTML = '<div class="alert alert-danger" role="alert" id="msg7" > Veuillez remplir les champs vides.</div>';
			
			valide1=false;
// 			return valide1;
			return false;
		}
			
			if (valide1==true) {
			document.getElementById('cnx').submit();
			<?php
			
				if(!empty($_POST)){
					extract($_POST);
					$Email = (trim($email));
					$MotDePasse = trim($pwd);
					if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
						if($user_login->login1($Email,$MotDePasse))
							 {
							  $user_login->redirect('http://maghrebeco.com/dashboard/dashboard.php');
							 }
						
					}else{
						if($user_login->login2($Email,$MotDePasse))
							 {
							  $user_login->redirect('http://maghrebeco.com/dashboard/dashboard.php');
							 }
						
					}
				}	
?>
			return false;
		} else {
			document.getElementById('tag-id').innerHTML = '<div class="alert alert-danger" role="alert" id="msg7" > Connexion impossible. </div>';
			
			return false;
		}
	}
</script>



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
	 <br>
	 <br>
	<!-- container -->
	<div class="container">
		<div class="row">
            <article class="col-xs-12 maincontent">
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Connectez-vous </h3>
							<p class="text-center text-muted">Vous n'avez pas de compte ? Inscrivez-vous <a href="inscription.php">Ici</a> </p>
							<hr>
							<div class="text-center">
                                        <?php if(isset($msg)) echo $msg;  ?>
                                           <?php 
                      if(isset($_GET['cnx']))
                      {
                       ?>
                                <div class='alert alert-info'>
                        <button class='close' data-dismiss='alert'>&times;</button>
                        <strong>Bienvenue !</strong> Pour pouvoir ajouter des articles, des photos et des videos avec aisance vous devez vous <a href='inscription.php'>inscrire </a> ou vous <a href='connexion.php'>connecter</a> si vous avez un compte. </div>

                                <?php
                      }
                      ?>

                             <?php 
                      if(isset($_GET['inactive']))
                      {
                       ?>
                                <div class='alert alert-info'>
                        <button class='close' data-dismiss='alert'>&times;</button>
                        <strong>Désolé!</strong> Ce compte n'est pas activé Accédez à votre Boîte de réception et activez-le ou <a href='mailconf.php?Email=<?php echo $_SESSION['Email'] ?>&MotDePasse=<?php echo base64_encode($_SESSION['MotDePasse'])?>'> cliquez ici</a> pour renvoyer l'email de confirmation. 
                       </div>
                                <?php
                      }
                      ?>
                            <?php
                            if(isset($_GET['error']))
                      {
                       ?>
                                <div class='alert alert-info '>
                        <button class='close' data-dismiss='alert'>&times;</button>
                        <strong>Mot de passe incorrect</strong> 
                       </div >
                       <?php
                      }
                      ?>
                            <?php
                            if(isset($_GET['error2']))
                      {
                       ?>
                                <div class='alert alert-danger'>
                        <button class='close' data-dismiss='alert'>&times;</button>
                        <strong>Nom d ' utilisateur inconnu!</strong> 
                       </div >
                       <?php
                      }
                      ?>
                            <?php
                            if(isset($_GET['error3']))
                      {
                       ?>
                                <div class='alert alert-danger'>
                        <button class='close' data-dismiss='alert'>&times;</button>
                        <strong>Ce compte n'existe pas!</strong> Entrez une adresse e-mail différente ou créez un autre compte.
                       </div >
                       <?php
                      }
                      ?>
                                    </div>
							<form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data" id="cnx">
                                
                                <div class="col-12 py-3 top-margin">
                                    <label> Adresse Email <span class="text-danger">*</span></label>
									<input type="text" class="form-control" placeholder="Adresse Email" id="email" name="email" required="required">
                                </div>
                                <div class="col-12 py-3 ">
                                    <label>Mot de passe <span class="text-danger">*</span></label>
									<input type="password" class="form-control" placeholder="Mot de passe" id="pwd" name="pwd" required="required">
                                </div>
								<br>
								<div class="row">
                                    
                                   <div class="col-sm-7">
                                    <b><a href="Mot-de-passe-oublie.php">Mot de passe oublié?</a></b>                                
									</div>
                                    
                                    <div class="col-sm-5 text-right">
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
		