<?php
session_start();
require_once 'connectdb.php';

	
	

$id=$_GET["id"];
$sql2 = " SELECT * FROM articles where id_article=:id";
	try {
		$stmt = $DB->prepare($sql2);
		$stmt->bindparam(":id",$id);
		$stmt->execute();
		$results = $stmt->fetchAll();
	} catch (Exception $ex) {
		echo($ex->getMessage());
	}
$sql3 = " SELECT * FROM articles where id_article <> :id and is_active=1 ORDER BY id_article DESC limit 3";
	try {
		$stmt = $DB->prepare($sql3);
		$stmt->bindparam(":id",$id);
		$stmt->execute();
		$results2 = $stmt->fetchAll();
	} catch (Exception $ex) {
		echo($ex->getMessage());
	}
		
	$sql4 = " UPDATE articles SET count =count +1 where id_article = :id ";
	try {
		$stmt = $DB->prepare($sql4);
		$stmt->bindparam(":id",$id);
		$stmt->execute();
	} catch (Exception $ex) {
		echo($ex->getMessage());
	}

$topnews = " SELECT titre FROM articles where MOD(id_article, 2) = 1 and is_active=1 ORDER BY count desc,date asc limit 4 ";
        try {
            $stmt = $DB->prepare($topnews);
            $stmt->execute();
            $resultstopNews2 = $stmt->fetchAll();
        } catch (Exception $ex) {
            echo($ex->getMessage());
        }
?>				

			
<!DOCTYPE html>

<html lang="en" class="no-js">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php foreach ($results as $res) { ?>

        <title>MaghrebEco — <?php echo $res['titre'] ?></title>
    
    <?php } ?>
      
    <meta name="description" content="موقع إخبار متجدد متخصص في الشؤون الاقتصادية محليا وعربيا ودوليا.">
    <meta name="keywords" content="économie, maroc, actualité, scoop, news, analyse, enquête, exclusive,analyse,bourse,عالم السيارات,منوعات,صناعة,سياسة,رياضة,الملفات,بنوك,علوم و تكنلوجيا,ثقافة و فن,عالم السيارات,أسواق عربية,أخبارالشركات">
    
    <link rel="shortcut icon" href="images/a.ico">
    <link rel="stylesheet" href="css/font-awesome.min" type="text/css"/>
    <link href="css/media_query.css" rel="stylesheet" type="text/css"/>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap RTL Theme -->
    <link rel="stylesheet" href="css/bootstrap-rtl.css" type="text/css"/>
    
    
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
	 <script> 
    $(function(){
      $("#includedfooter").load("footer.php"); 
    });
    </script> 
	<script>
    $(document).ready(function(){
        $("#button1").click(function(){
            if($('#div3').css('display') == 'none'){
                  $("#div3").fadeIn(1000);
                 }else{
                   $("#div3").fadeOut(1000);
                 }
        });
    });
    </script>
	
	 <style>
         .small-info .date
         {
             float: right;
             margin-right: 13px;
             margin-top:13px;
             margin-bottom: 3px;
             line-height: 2.5;
             
         }
         .small-info .share-btns
         {
             float: left;
             margin-left: 20px;
             margin-top:13px;
             margin-bottom: 3px;

         }
         
		article {
            font-size: 1.5rem;
            line-height: 1.6;
        }
         article, aside, details, figcaption, figure, footer, header, main, menu, nav, section, summary {
        display: block;
    }
         *, *:after, *:before {
        
        box-sizing: border-box;
    }
         
         
        #tags_details {
            position: relative;
            min-height: 34px;
            border-top: 1px dotted #a5a8ab;
            border-bottom: 1px dotted #a5a8ab;
            margin-bottom: 30px;
            width: 100%;
            margin-right: 1%;
                
            padding-top: 12px;
            padding-right: 0%;
            margin-top: 30px;
        }
         
         #tags_details ul
         {
             list-style-type: none;
             display: inline-block;
         }
         #tags_details ul li
         {
             display: inline-block;
         }
         
         h2.sub-title {
    background: #f7f7f7;
    color: #3f4850;
        font-size: 1.6rem;
    line-height: 22px;
    position: relative;
    padding: 10px 20px 10px 0;
    margin-bottom: 30px;
    display: block;
    overflow: hidden;font-weight:normal;border-right: 6px solid #FFD700;color: #3f4850;
}
         h1, h2, h3, h4, h5 {
        line-height: 1.2;
        margin: 0 0 12px;
    }
         h2 {
    display: block;
    font-size: 24px;
    -webkit-margin-before: 0.83em;
    -webkit-margin-after: 0.83em;
    -webkit-margin-start: 0px;
    -webkit-margin-end: 0px;
    font-weight: bold;
}
         .small-info {
    position: relative;
    border: 1px dotted #a5a8ab;
    margin-bottom: 30px;
}
         article .image {
    float: left;
    width: 54%;
    margin-right: 3%;
    margin-bottom: 20px;
    direction: ltr;
}
         .image .preview {
    background: url(../images/loader.gif) center no-repeat;
    position: relative;
    padding-bottom: 56.25%;
}
         
         .image .preview .active {
    z-index: 1;
    opacity: 1;
}
.image .preview img {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    z-index: 0;
}
         article .details {
    margin-bottom: 30px;
}
         .clearBoth {
    clear: both;
    display: block;
}
         .typing
            {
                
                margin: 0;
            padding: 0;
            }
        .typing{
            padding-right:18px;
        }
        .typing > li {
            list-style: none inside none;
        }
         
        .title
         {
             font-size: 1.8rem;color:#f5bc04;font-weight: bold;
         }

	</style> 
   
    <script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5af6135dc3d29a001129f019&product=inline-share-buttons' async='async'></script>
    
</head>
<body>
<div class="container-fluid fh5co_header_bg" >
    <div class="container">
        <div class="row">
            <div class="col-12 fh5co_mediya_center">
			
                <div class="d-inline-block fh5co_trading_posotion_relative"><a href="news.php"><p class="treding_btn">آخر المستجدات
                    </p></a>
                    <div class="fh5co_treding_position_absolute"></div>
                    
                </div>
                <label id="lab" >
                        <ul class="typing">
                        <?php foreach ($resultstopNews2 as $res) { ?>
                        <li>
                            <?php echo $res['titre'] ?>
                            
                        </li>
                         <?php } ?>
                        </ul>

                    </label>
                   

            </div>
        </div>
    </div>
    
</div>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3 fh5co_padding_menu">
                <a href="index.php">
                <img src="images/logo.png" alt="img" class="fh5co_logo_width"/>
				</a>
            </div>
            
            <div class="col-12 col-md-5 align-self-center fh5co_mediya_right" style="text-align:left;">
                
				
                
                <div class="text-center d-inline-block">
                    <a class="fh5co_display_table form-control"><div class="fh5co_verticle_middle"><i class="fa fa-linkedin"></i></div></a>
                </div>
                <div class="text-center d-inline-block ">
                    <a class="fh5co_display_table form-control"><div class="fh5co_verticle_middle"><i class="fa fa-google-plus"></i></div></a>
                </div>
                <div class="text-center d-inline-block">
                    <a href="https://twitter.com/maghrebeco1" target="_blank" class="fh5co_display_table form-control"><div class="fh5co_verticle_middle"><i class="fa fa-twitter"></i></div></a>
                </div>
                <div class="text-center d-inline-block">
                    <a href="https://www.facebook.com/MaghrebEco-583506365352031/" target="_blank" class="fh5co_display_table form-control"><div class="fh5co_verticle_middle"><i class="fa fa-facebook"></i></div></a>
                </div>
                <div class="text-center d-inline-block">
                   <a class="fh5co_display_table form-control" id="button1"><div class="fh5co_verticle_middle"><i class="fa fa-search"></i></div></a>
				 </div>

               <div class="clearfix"></div>
            </div>
			<div class="col-12 col-md-4 align-self-center fh5co_mediya_right" style="text-align:left;display:none" id="div3" >
				 
                    <form action="search.php" method="post" >
                        <input type="text" name="CheTxt" class="form-control col-md-12" placeholder="ابحث في الموقع"/>
                    </form>
            </div>
			 
        </div>
		<br>
    </div>
</div>
<div class="container-fluid bg-faded fh5co_padd_mediya padding_786">
    <div class="container padding_786">
        <nav class="navbar navbar-toggleable-md navbar-light ">
            <button class="navbar-toggler navbar-toggler-left mt-3" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
            <a class="navbar-brand" href="#"><img src="images/logo.png" alt="img" class="mobile_logo_width"/></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto" style="padding-right: 0;margin-left:13%">
                    <li class="nav-item ">
                        <a class="nav-link" href="index.php">الصفحة الرئيسية <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="news.php">آخر الأخبار<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton3" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">الأقسام<span class="sr-only">(current)</span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink_1">
                            <a class="dropdown-item" href="articles.php?categories=Company News">أخبارالشركات</a>
                            <a class="dropdown-item" href="articles.php?categories=Arab Markets">أسواق عربية</a>
                            <a class="dropdown-item" href="articles.php?categories=Cars world">عالم السيارات</a>
                            <a class="dropdown-item" href="articles.php?categories=Culture and art">ثقافة و فن</a>
                            <a class="dropdown-item" href="articles.php?categories=Science and technology">علوم و تكنلوجيا</a>
                            <a class="dropdown-item" href="articles.php?categories=Banks">بنوك</a>
                            <a class="dropdown-item" href="articles.php?categories=Files">الملفات</a>
                            <a class="dropdown-item" href="articles.php?categories=Sports">رياضة</a>
                            <a class="dropdown-item" href="articles.php?categories=Politics">سياسة</a>
                            <a class="dropdown-item" href="articles.php?categories=Industry">صناعة</a>
                            <a class="dropdown-item" href="articles.php?categories=Varities">منوعات</a>
                        </div>
                    </li>
                   <li class="nav-item ">
                        <a class="nav-link" href="albums.php">الصور<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="videos.php">فيديو<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="about.php">عن الموقع<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="contact.php">تواصل معنا<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
	<!-- container -->
<div class="container" style="margin-top: 5%;margin-bottom:5%">
        <div class="row" >
        <?php foreach ($results as $res) { ?>
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h2 class="sub-title" > الصفحة الرئيسية / <?php echo $res['categories'] ?></h2>
							</div>
							<div class="small-info">
                                <div class="date" ><?php echo $res['date'] ?></div>
                                <div class="share-btns">
                                    <p class="sharethis-inline-share-buttons"></p>
                                    
                                </div>
                            <div class="clearBoth"></div>
                            </div>
						</div>
					</div>
                    
                    
                    
                    <div class="col-md-6">
						<div class="image">
							<div class="preview" id="PreviewArea">
								<img src="<?php echo $res['fichier'] ?>" alt="<?php echo $res['fictitrehier'] ?>" title="<?php echo $res['titre'] ?>" class="active"/>
							</div>
						</div>
						<br>
					</div>
					
					
					<div class="col-md-6">
						<div class="title" ><?php echo $res['titre'] ?></div><br>
						<div class="details" style="font-size: 18px;">
							<p style=" margin: 0 0 12px; ">
   
								<?php echo $res['contenu'] ?>
							</p>
                            
						</div>
						<div class="clearBoth"></div>  
                    </div>
					
                    <div id="tags_details">
                        <ul>
						<?php 
							
							
							
							$categories="";
							$categorieReq="";
								if($res['categories']=="عالم السيارات"){$categorieReq="Cars world";}
								if($res['categories']=="أسواق عربية"){$categorieReq="Arab Markets";}
								if($res['categories']=="أخبارالشركات"){$categorieReq="Company News";}
								if($res['categories']=="بنوك"){$categorieReq="Banks";}
								if($res['categories']=="ثقافة و فن"){$categorieReq="Culture and art";}
								if($res['categories']=="الملفات"){$categorieReq="Files";}
								if($res['categories']=="رياضة"){$categorieReq="Sports";}
								if($res['categories']=="علوم و تكنلوجيا"){$categorieReq="Science and technology";}
								if($res['categories']=="سياسة"){$categorieReq="Politics";}
								if($res['categories']=="صناعة"){$categorieReq="Industry";}
								if($res['categories']=="منوعات"){$categorieReq="Varities";}
														
							
							
							?>
                            <li><a class="fh5co_tagg" href="articles.php?categories=
							<?php 
							echo ($categorieReq); 							
							?>">
							<?php echo $res['categories'] ?></a></li>
                            <li><a class="fh5co_tagg" href="details-articles.php?id=<?php echo $res['id_article'] ?>"><?php echo $res['titre'] ?></a></li>
                        </ul>
                        <div class="clearBoth"></div></div>
                        <?php
					}
					?>
    
    

                
            </div>

		
		
		
		
		<div class="row">
		<br><br>
		<div class="col-md-12">
						
                        <div class="panel panel-default">
							<div class="panel-heading">
								<h2 class="sub-title" 
                            style="font-weight:normal;border-right: 6px solid #FFD700;">اقتراحات أخرى</h2>
							</div>
							
						</div>
            </div>

        <?php foreach ($results2 as $res) { ?>
		  <div class="col-sm-6 col-md-4" style="direction:rtl">
                <a style="text-decoration:none;"href="details-articles.php?id=<?php echo $res['id_article'] ?>" >
                <div class="col-md-12 col-sm-12" data-animate-effect="fadeInLeft">
                	
                        <div class="fh5co_hover_news_img" style="height:100%">
                            <div class="fh5co_news_img" style="height: auto; position: relative; width: 100%;"><img src="<?php echo $res['fichier'] ?>" alt="<?php echo $res['titre'] ?>" title="<?php echo $res['titre'] ?>" /></div>
                            <div></div>
                        </div>
                    
                       <div class="" ><p style="color:#3f4850;margin-bottom: 8px;margin-top:14px;"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;
					         <?php echo date('Y-m-d',strtotime($date)); ?></div> 
                      <div class="" ><p  class="fh5co_good_font_2" style="color:#3f4850;font-weight:bold; line-height: 25px;margin-bottom:2rem;font-size: 17px;"><?php echo $res['titre'] ?></p></div>
            </div>
                </a>

        </div>
		   <?php } ?>
		
		</div>
		<!-- /container -->
	</div>

	<div id="includedfooter"></div>
   


<script src="js/inewsticker.js"></script>

            <script>
                $(document).ready(function() {
                $('.typing').inewsticker({
                speed           : 100,
                effect          : 'typing',
                font_size       : 14,
                color           : '#fff',
                font_family     : 'Poppins',
                delay_after : 1000,


            });
        });	
</script>


</body>
</html>