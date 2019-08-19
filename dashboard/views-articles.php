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

$msg=$_GET['res'];
if($msg==1){
	$msg= " <div class='alert alert-success col-md-12'>
		 <strong> تعديل بنجاح ☺️   </strong>
		   </div>";
										
}else if($msg==2){
	$msg= " <div class='alert alert-info col-md-12'>
		  <strong> حجم الصورة أقل من 300/200 </strong>
		   </div>";
}


?>		


<!DOCTYPE html>

<html  lang="en" class="no-js">
<head>
    <meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>MaghrebEco Dashboard</title>
        <link rel="shortcut icon" href="../images/a.ico">

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
    <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet"/>

        <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    
    
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <script>
        function rtl(element)
        {   
            if(element.setSelectionRange){
                element.setSelectionRange(0,0);
            }
        }
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 2500);
        
        
    </script>
    
    <style>
        
    .modal-backdrop.in {
    filter: alpha(opacity=50);
    opacity: -1.5;
}
        
 
        
        th {
            text-align: right;
        }


    </style>
    
    
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
                    <a href="moncompte.php">
                        <i class="pe-7s-user"></i>
                        <p>Mon profil</p>
                    </a>
                </li>
                <li class="dropdown ">
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
                                <li class="active">
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


<div class="content" dir="rtl" style="background-color:#f0f0f0">
            <div class="container-fluid">
			<?php if(isset($msg)) echo $msg;  ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="padding: 3%;">
		<div style="height:50px;"></div>
		<table id="example"  class="table table-striped table-bordered table-hover">
			<thead>
				<th style="width:30% ;" >العنوان</th>
				<th style="width:50%" >المحتوى</th>
				<th style="width:20%" ></th>
			</thead>
			<tbody>
			<?php
				include('conn.php');
				
				$query=mysqli_query($conn,"select * from `articles`");
				while($row=mysqli_fetch_array($query)){
					?>
					<tr>
						<td><?php echo $row['titre']; ?></td>
						<td><?php echo $row['contenu']; ?></td>
						<td>
							<a href="#edit<?php echo $row['id_article']; ?>" data-toggle="modal" class="btn btn-warning"><span class="fa fa-pencil-square-o" aria-hidden="true"></span> </a>  
							<a href="#del<?php echo $row['id_article']; ?>" data-toggle="modal" class="btn btn-danger"><span class="fa fa-times" aria-hidden="true"></span> </a>
                            <?php if ($row['is_active'] == 0) { ?>
                                <a href="#publish<?php echo $row['id_article']; ?>" data-toggle="modal" class="btn btn-success"><span class="fa fa-share" aria-hidden="true"></span> </a>
                            <?php } ?>

                            
							<?php include('button.php'); ?>
						</td>
					</tr>
					<?php
				}
			
			?>
			</tbody>
		</table>
	</div>
	<?php include('add_modal.php'); ?>
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
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>
    <script>
 $(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        responsive: true,
        language: {
            
            "url": "assets/arabic.json"
    },pageLength: 5
  
       
    } );
    
    table.buttons().container()
        .appendTo( '#example_wrapper .col-sm-6:eq(0)' );
} );
</script>

</html>
