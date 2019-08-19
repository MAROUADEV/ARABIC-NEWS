<?php
session_start();
require_once '../connectdb.php';

require_once("../configure.php");
require_once '../class.user.php';

$reg_user = new USER();

if($reg_user->is_logged_in()=="")
{
	// header("refresh:5;accueil.php");
 $reg_user->redirect('../connexion.php');
}

if(!empty($_POST)){
extract($_POST);
if (isset($_POST['titre']) && isset($_POST['type'])) {
					$titre = trim($titre);
					$type =trim($type);
					$lien = trim($lien);
					$categories = trim($categories);
$sql2 = " INSERT INTO `media` (`id_media`, `titre`, `type`,`lien`,`categories`) VALUES (NULL, '".$titre."', '".$type."','".$lien."','".$categories."')";
	try {
		$stmt = $DB->prepare($sql2);
		$stmt->execute();
		$msg = "
					 <div class='alert alert-success col-md-12'>
					  <strong>  اضيف بنجاح ☺️ </strong>
					   </div>
					 ";
		} catch (Exception $ex) {
		echo($ex->getMessage());
}}}

?>	


<!DOCTYPE html>

<html lang="en" class="no-js">
<head>
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
        function isRTL(str) {
                  var letters = [];
                  allRTL = new RegExp(
                    "^[\u0590-\u05fe\u0600-۾܀-ݎݐ-ݾހ-\u07be߀-\u07fe\u0800-\u083e\u0840-\u085e\u08a0-\u08fe\u0900-ॾ]|\ud802[\udf60-\udf7e]+$"
                  );
                  var cursor = 1;
                  for (var i = 0; i <= cursor; i++) {
                    letters[i] = str.substring(i - 1, i);
                    if(/\s/.test(letters[i])) {
                      cursor++;
                    }
                    if (allRTL.test(letters[i])) {
                      return true;
                    }
                  }
                  return false;
                }
                var dir = $("input[type=text]");
                dir.keyup(function(e) {
                  if (isRTL(dir.val())) {
                    $(this).css("direction", "rtl");
                  } else {
                    $(this).css("direction", "ltr");
                  }
                });
        
           
    </script>
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
                <li>
                    <a href="moncompte.php"><!--moncompte.php-->
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
                                <li class="active">
                                        <a href="insert-media.php">
                                            <i class="pe-7s-note2"></i>
                                            <p>Ajout des medias</p>
                                        </a>
                                </li>
                                <li >
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


<div class="content" >
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title" style="float:right">نشر صور و فيديوهات</h4>
                            </div>
                            <div class="content">
                                
                                <div class="row">
                                            <div class="col-md-12 pull-right">
                                        

                                        </div>
                                    </div>
                                <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data" style="direction:RTL;" onkeyup="rtl(this);">
							         <?php if(isset($msg)) echo $msg;  ?>
                                    <div class="row">
                                            <div class="col-md-12 pull-right">
                                                <label for="titre" style="float:right">العنوان</label>
                                                <input type="text"  name="titre" id="titre" placeholder="العنوان" class="form-control" autofocus style="direction:RTL;" >

                                        </div>
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-md-12 pull-right" >
                                            <label for="lien" style="float:right">الرابط</label>
                                            <input type="text" id="lien" name="lien" placeholder="الرابط" class="form-control" style="direction:RTL;" >

                                        </div>
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 pull-right">
                                                <label for="categories" style="float:right">القسم</label>
                                                    <select id="categories" name="categories" class="form-control" style="direction:RTL;" >
                                                        <option>أخبار الشركات</option>
                                                        <option>أسواق عربية</option>
                                                        <option>عالم السيارات</option>
                                                        <option>ثقافة و فن</option>
                                                        <option>علوم و تكنلوجيا</option>
                                                        <option>بنوك</option>
                                                        <option>الملفات</option>
                                                        <option>رياضة</option>
                                                        <option>سياسة</option>
                                                        <option>منوعات</option>
                                                    </select>
                                        </div>
                                        
                                    </div>

                                    <div class="row ">
                                        <div class="col-md-12 pull-right">
                                                <label for="type" style="float:right">النوع</label>
                                                <select id="type" name="type" class="form-control" style="direction:RTL;" >
                                                    <option>صورة</option>
                                                    <option>فيديو</option>
                                                </select>
                                        </div>
                                    </div><br>
                                    <button type="submit" class="btn btn-info btn-fill pull-right"  >إضافة</button>

                                    <div class="clearfix"></div>

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
