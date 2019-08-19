
<?php
session_start();
require_once 'class.user.php';
$user = new USER();

if(empty($_GET['IdUtilisateur']) && empty($_GET['code']))
{
	// header("refresh:5;connexion.php?cnx");
 $user->redirect('connexion.php?cnx');
}

if(isset($_GET['IdUtilisateur']) && isset($_GET['code']))
{
 $IdUtilisateur = base64_decode($_GET['IdUtilisateur']);
 $code = $_GET['code'];
 
 $stmt = $user->runQuery("SELECT * FROM utilisateur WHERE IdUtilisateur=:IdUtilisateur AND Code=:token");
 $stmt->execute(array(":IdUtilisateur"=>$IdUtilisateur,":token"=>$code));
 $rows = $stmt->fetch(PDO::FETCH_ASSOC);
 
 if($stmt->rowCount() == 1)
 {
  if(isset($_POST['btn-reset-pass']))
  {
   $pass = $_POST['mdp'];
   $cpass = $_POST['mdp2'];
   
   if($cpass!==$pass)
   {
    $msg = '<div class="alert alert-danger" role="alert" id="msg5" >Attention, le mot de passe de confirmation est différent du mot de passe !</div>';
   }
   else
   {
    $stmt = $user->runQuery("UPDATE utilisateur SET MotDePasse=:upass WHERE IdUtilisateur=:IdUtilisateur");
    $stmt->execute(array(":upass"=>$cpass,":IdUtilisateur"=>$rows['IdUtilisateur']));
    
    $msg = "<div class='alert alert-success'>
      <button class='close' data-dismiss='alert'>&times;</button>
      Votre mot de passe a été changé avec succès .
      </div>";
    header("refresh:3;connexion.php");
   }
  } 
 }
 else
 {
  exit;
 }
 
 
}

?>



<!DOCTYPE html>
<html lang="en">
<head>

<script type="text/javascript">
function myFunction() {
		valide1 = true;
		valide2 = true;
		if (document.getElementById('mdp2').value != "" && document.getElementById('mdp').value != "") {
		
						if ( document.getElementById('mdp2').value.length < 3 || document.getElementById('mdp').value.length < 3 
								|| document.getElementById('mdp2').value.length >50	|| document.getElementById('mdp').value.length >50) {
								alert("Vérifier que le nombre de caractères entre 3 et 25 caractères.");
								valide1=false;
// 								return valide1;
							}	
		}
		else {
			alert("Veuillez remplir les champs vide.");
			valide1=false;
// 			return valide1;
		}
			
			if (valide1==true) {
			alert("Les champs saisir est valide.");
			return true;
		} else {
			alert("Les champs saisir n'est pas valide.");
			return true;
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

	<!-- container -->
	<div class="container" style="margin-top:5%">

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<!--<h3 class="thin text-center">Connectez-vous</h3>-->
							<p class="text-center text-muted">Pour terminer la ré-initialisation de votre mot de passe, veuillez saisir <b>un nouveau mot de passe</b>.</p>
							<hr>
							<?php if(isset($msg)) { echo $msg; } ?>
							<form class="con-form" method="post" action="" id="rec">
								<div class="row top-margin">
								<div class="col-sm-12">
									<label>Mot de passe <span class="text-danger">*</span></label>
									<input type="password" class="form-control" placeholder="Mot de passe" id="mdp" name="mdp" required>
								</div>
								<div class="col-sm-12">
									<label>Confirmation de mot de passe<span class="text-danger">*</span></label>
									<input type= "password" class="form-control" placeholder="Confirmation de mot de passe" id="mdp2" name="mdp2" required>
								</div>
								</div>
                                <br>
									<div class="row">
									<div class="col-lg-12 text-right">
										<button class="btn btn-info" type="submit" name="btn-reset-pass">Terminer</button>
									</div></div>
									
								
							</form>
						</div>
					</div>

				</div>
				
			</article>
			<!-- /Article -->

		</div>
	</div>	<!-- /container -->
	

</body>
</html>