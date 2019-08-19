<?php
session_start();
require_once("../configure.php");
require_once '../class.user.php';

$reg_user = new USER();

if($reg_user->is_logged_in()=="")
{
	// header("refresh:5;accueil.php");
 $reg_user->redirect('../connexion.php');
}
$IdUtilisateur=$_SESSION['IdUtilisateur'];
$Email=$_SESSION['Email'];
$sql2 = "SELECT * FROM utilisateur WHERE IdUtilisateur =:IdUtilisateur";
	try {
		$stmt = $DB->prepare($sql2);
		$stmt->execute(array(":IdUtilisateur"=>$IdUtilisateur));
		$results = $stmt->fetchAll();
	} catch (Exception $ex) {
	}
?>


<!DOCTYPE html>
<html lang="fr">

<head>


<meta charset="utf-8" />
<script type="text/javascript">
function myFunction() {
		valide3 = true;
		valide1 = true;
		valide2 = true;
		while(valide3==true){
		if (document.getElementById('nom').value != ""	&& document.getElementById('prenom').value != ""
			&& document.getElementById('pwd').value != "" && document.getElementById('pwd2').value != ""
			&& document.getElementById('nu').value != "" ) {
						if (document.getElementById('nom').value.length < 3	|| document.getElementById('prenom').value.length < 3
								|| document.getElementById('pwd2').value.length < 3 || document.getElementById('pwd').value.length < 3 
								|| document.getElementById('nom').value.length >50	|| document.getElementById('prenom').value.length >50
								|| document.getElementById('pwd2').value.length >50 || document.getElementById('pwd').value.length >50
								|| document.getElementById('nu').value.length < 3 || document.getElementById('nu').value.length >50 ) {
									document.getElementById('tag-id').innerHTML = '<div class="alert alert-danger col-md-12" role="alert" id="msg3" > Vérifiez que le nombre de caractères entre 3 et 50 caractères. </div>';
								valide1=false;
								break;
								
						return false;
							}
							if(document.getElementById('pwd2').value !=document.getElementById('pwd').value){
									
										document.getElementById('tag-id').innerHTML = '<div class="alert alert-danger col-md-12" role="alert" id="msg5" > Attention, le mot de passe de confirmation est différent du mot de passe ! </div>';
								
								valide1=false;
							break;
							return false;
					    }
						}
						else {
					document.getElementById('tag-id').innerHTML = '<div class="alert alert-danger col-md-12" role="alert" id="msg7" > Veuillez remplir les champs vides. </div>';
			
			valide1=false;
			break;a
			return false;
		}
			if (valide1==true) {
			document.getElementById('ins').submit();
							<?php

				if(!empty($_POST)){
					extract($_POST);
					$valid = true;
					$Nom = trim($nom);
					$Prenom = trim($prenom);
					$NomUtilisateur = trim($NomUtilisateur);
					$MotDePasse = trim($Password);
					 $stmt = $reg_user->runQuery("SELECT * FROM utilisateur WHERE NomUtilisateur=:NomUtilisateur");
					 $stmt->execute(array(":NomUtilisateur"=>$NomUtilisateur));
					 $results2 = $stmt->fetchAll();				 
					 foreach ($results2 as $res2) {
						 if($res2['IdUtilisateur']<> $IdUtilisateur){
						$valid = false;
						$msg = "
					 	<div class='alert alert-info col-md-12'>
					 <strong> Désolé ! </strong> Ce Nom d'Utilisateur existe déjà ,  Vous essayez un autre Nom d'Utilisateur .
					 </div>
					 ";
					 }	
					 }	 
					 if($valid == true)
				 {
				  if($reg_user->updateUser($IdUtilisateur,$Nom,$Prenom,$NomUtilisateur,$MotDePasse))
				  {
				   $msg = "
					 <div class='alert alert-success col-md-12'>
					  <strong> Félicitations! </strong> Opération réussie, attendez un moment s'il vous plaît.
					   </div>
					 ";
					 header("refresh:10;http://maghrebeco.com/dashboard/dashboard.php");
				  }
				  else
				  {
				   $msg = "
					 <div class='alert alert-info col-md-12'>
					  <strong> Désolé! </strong> La modification de votre compte n'est pas effectué. 
					   </div>
					 ";
				  }  
				 }
				}
				?>
			return false;
		}
}
}
</script>
<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>MaghrebEco Dashboard</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
        <link rel="shortcut icon" href="../images/a.ico">


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 2500);
    </script>

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="orange" data-image="assets/img/sidebar-5.jpg">

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://maghrebeco.com" target="_blank" class="simple-text">
                    MaghrebEco
                </a>
            </div>

            <ul class="nav">
                <li >
                    <a href="dashboard.php">
                        <i class="pe-7s-graph"></i>
                        <p>Tableau de bord</p>
                    </a>
                </li>
                <li class="active">
                    <a href="moncompte.php">
                        <i class="pe-7s-user"></i>
                        <p>Mon profil</p>
                    </a>
                </li>
                
                
                <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                  <i class="pe-7s-note2"></i>
                                    <p>
                                        
										Articles
										<b class="caret"></b>
									</p>

                              </a>
                              <ul class="dropdown-menu" style="width: 260px;">
                                <li>
                                        <a href="insert-articles.php">
                                            <i class="pe-7s-note2"></i>
                                            <p>Ajout des articles</p>
                                        </a>
                                </li>
                                <li>
                                        <a href="views-articles.php">
                                            <i class="pe-7s-note2"></i>
                                            <p>Mise à jour des articles</p>
                                        </a>
                                </li>
                              </ul>
                    </li>
                <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                  <i class="pe-7s-note2"></i>
                                    <p>
                                        
										Medias
										<b class="caret"></b>
									</p>

                              </a>
                              <ul class="dropdown-menu" style="width: 260px;">
                                <li>
                                        <a href="insert-media.php">
                                            <i class="pe-7s-note2"></i>
                                            <p>Ajout des medias</p>
                                        </a>
                                </li>
                                <li>
                                        <a href="views-media.php">
                                            <i class="pe-7s-note2"></i>
                                            <p >Mise à jour des medias</p>
                                        </a>
                                </li>
                              </ul>
                    </li>

                <li>
                    <a href="maps.html">
                        <i class="pe-7s-map-marker"></i>
                        <p>Maps</p>
                    </a>
                </li>

            </ul>
    	</div>
    </div>

    <div class="main-panel">
		<nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="dashboard.php">Tableau de bord</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md">Tableau de bord</p>
                            </a>
                        </li>
                     
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <?php 
				    	if(isset($_SESSION['Nom']))
						{
					?> 
                    
                        <li>
                            <a href="deconnexion.php"><!--deconnexion.php-->
                                <p>Déconnexion</p>
                            </a>
                        </li>
                        <?php 
				       	}
				    ?>
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
		
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Modifier votre profil</h4>
								
                            </div>
							
                            <div class="content">
							
                                <form class="con-form" method="post" action="" id="ins">
								
	<div id="tag-id"></div>
        <?php if(isset($msg)) echo $msg;  ?>
							     <?php foreach ($results as $res) { ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nom</label>
                                                <input type="text" class="form-control" placeholder="Nom" id="nom" name="nom" required="required"
                                                value="<?php echo $res['Nom']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Prénom</label>
									       <input type="text" class="form-control" placeholder="Prénom" id="prenom" name="prenom" required="required"
									value="<?php echo $res['Prenom']; ?>">
                                        </div>
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nom d'utilisateur<span class="text-danger">*</span></label>
									           <input type="text" class="form-control" placeholder="Nom d'utilisateur" id="nu" name="NomUtilisateur" required="required"
									value="<?php echo $res['NomUtilisateur']; ?>">
                                            </div>
                                        </div>
										
                                    </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mot de passe<span class="text-danger">*</span></label>
										          <input type="password" class="form-control" placeholder="Mot de passe" id="pwd" name="Password" required="required" value="<?php echo $res['MotDePasse']; ?>">
                                            </div>
                                        </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Confirmez le mot de passe<span class="text-danger">*</span></label>
										      <input type="password" class="form-control" placeholder="Confirmez le mot de passe" id="pwd2" name="PasswordConfirmation" required="required">
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-info btn-fill pull-right" type="button" id="btn1" name="MyBtn" onclick="myFunction()" > Modifier  </button>

                                    <div class="clearfix"></div>
                                    
                                    <?php
									}
									?>
                                </form>
                            </div>
                        </div>
                    </div>
                   

                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
               
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://localhost/MaghrebEco">MaghrebEco</a>, All rights reserved.
                </p>
            </div>
        </footer>

    </div>
</div>

<script>
	$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})
</script>
</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

</html>
