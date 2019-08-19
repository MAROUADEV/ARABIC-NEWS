<?php

require_once 'connectdb.php';

$sql2 = " SELECT * FROM articles where is_active=1 ORDER BY id_article DESC";
	try {
		$stmt = $DB->prepare($sql2);
		$stmt->execute();
		$results = $stmt->fetchAll();
	} catch (Exception $ex) {
		echo($ex->getMessage());
	}
	
	
	$sql3 = " SELECT * FROM articles where is_active=1 ORDER BY id_article  DESC  LIMIT 1";
	try {
		$stmt = $DB->prepare($sql3);
		$stmt->execute();
		$results2 = $stmt->fetchAll();
	} catch (Exception $ex) {
		echo($ex->getMessage());
	}	
	$position = 0;
	$sql4 = " SELECT * FROM articles where is_active=1 ORDER BY id_article  DESC  LIMIT 5";
	try {
		$stmt = $DB->prepare($sql4);
		$stmt->execute();
		$results3 = $stmt->fetchAll();
	} catch (Exception $ex) {
		echo($ex->getMessage());
	}
	
	
	$positionTrending = 0;
	$sqlTrending = " SELECT * FROM articles where is_active=1 ORDER BY id_article  DESC  LIMIT 15";
	try {
		$stmt = $DB->prepare($sqlTrending);
		$stmt->execute();
		$resultsTrending = $stmt->fetchAll();
	} catch (Exception $ex) {
		echo($ex->getMessage());
	}
	
	
	$positionNews = 0;
	$sqlNews = " SELECT * FROM articles where is_active=1 ORDER BY id_article  DESC  LIMIT 30";
	try {
		$stmt = $DB->prepare($sqlNews);
		$stmt->execute();
		$resultsNews = $stmt->fetchAll();
	} catch (Exception $ex) {
		echo($ex->getMessage());
	}
    $positionVideos = 0;
	$sqlVideos = " SELECT * FROM media where type='فيديو' ORDER BY id_media  DESC  LIMIT 15";
	try {
		$stmt = $DB->prepare($sqlVideos);
		$stmt->execute();
		$resultsVideos = $stmt->fetchAll();
	} catch (Exception $ex) {
		echo($ex->getMessage());
	}
	
	$sqlMostPopular = " SELECT * FROM articles where is_active=1 ORDER BY count desc,date desc limit 6 ";
	try {
		$stmt = $DB->prepare($sqlMostPopular);
		$stmt->execute();
		$resultssqlMostPopular = $stmt->fetchAll();
	} catch (Exception $ex) {
		echo($ex->getMessage());
	}
	
	$sqlNews2 = " SELECT LEFT(contenu , 200) as str,id_article,date,fichier,titre  FROM articles where MOD(id_article, 2) = 1 and is_active=1 ORDER BY count desc,date desc limit 4 ";
	try {
		$stmt = $DB->prepare($sqlNews2);
		$stmt->execute();
		$resultssqlNews2 = $stmt->fetchAll();
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


$sqlr2 = " SELECT LEFT(titre,31) as st FROM `articles` WHERE MOD(id_article,2)=1 and is_active=1 ORDER BY count DESC, date ASC LIMIT 4  ";
	try {
		$stmt = $DB->prepare($sqlr2);
		$stmt->execute();
		$resultSQ2 = $stmt->fetchAll();
	} catch (Exception $ex) {
		echo($ex->getMessage());
	}

$cat="?controls=2&showinfo=0&rel=0&modestbranding=1&autohide=2";
?>	






<!DOCTYPE html>

<html lang="en" class="no-js">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MaghrebEco</title>
    
    <meta name="description" content="موقع إخبار متجدد متخصص في الشؤون الاقتصادية محليا وعربيا ودوليا.">
    <meta name="keywords" content="économie, maroc, actualité, scoop, news, analyse, enquête, exclusive,analyse,bourse,عالم السيارات,منوعات,صناعة,سياسة,رياضة,الملفات,بنوك,علوم و تكنلوجيا,ثقافة و فن,عالم السيارات,أسواق عربية,أخبارالشركات">
    
    <link rel="stylesheet" href="css/font-awesome.min" type="text/css"/>
    <link href="css/media_query.css" rel="stylesheet" type="text/css"/>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap RTL Theme -->
    <link rel="stylesheet" href="css/bootstrap-rtl.css" type="text/css"/>
	
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <link rel="shortcut icon" href="images/a.ico">
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

    <link href="css/ticker.css" rel="stylesheet" type="text/css"/>
	<link href="js/ticker.js" rel="stylesheet" type="text/css"/>

    <style>
           
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
        .search-form
        {
            
            @include 'css/search.css';
        }
    
    </style>
    <script type="text/javascript">
    
        function generateReport() {
   window.location.href = '#news';
 }
    
    </script>
   
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
                        <ul class="typing" >
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
                
				
                
                <!--div class="text-center d-inline-block">
                    <a class="fh5co_display_table form-control"><div class="fh5co_verticle_middle"><i class="fa fa-linkedin"></i></div></a>
                </div-->
                <div class="text-center d-inline-block ">
                    <a class="fh5co_display_table form-control" href="https://plus.google.com/u/4/discover" target="_blank"><div class="fh5co_verticle_middle"><i class="fa fa-google-plus"></i></div></a>
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
                        <input type="text" name="CheTxt" class="form-control col-md-12" placeholder="ابحث في الموقع" />
                    </form>
            </div>
			 
        </div>
		<br>
    </div>
</div>


<div class="container-fluid bg-faded fh5co_padd_mediya padding_786">
    <div class="container padding_786">
        <nav class="navbar navbar-toggleable-md navbar-light">
            <button class="navbar-toggler navbar-toggler-left mt-3" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
            <a class="navbar-brand" href="#"><img src="images/logo.png" alt="img" class="mobile_logo_width"/></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto" style="padding-right: 0;margin-left:13%;margin-top: 12px;">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">الصفحة الرئيسية <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="news.php">آخر الأخبار<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
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
<div class="container-fluid paddding mb-5">
    <div class="row mx-0">
        <div class="col-md-6 col-12 paddding animate-box" data-animate-effect="fadeIn">
		<?php foreach ($results2 as $res) { ?>
            <div class="fh5co_suceefh5co_height"><img src="<?php echo $res['fichier'] ?> " alt="<?php echo $res['titre'] ?> " title="<?php echo $res['titre'] ?> "/>
                <div class="fh5co_suceefh5co_height_position_absolute"></div>
                <div class="fh5co_suceefh5co_height_position_absolute_font">
                    
                    <!--div class="" style="margin-right: 48px;"><a href="details-articles.php?id=<?php echo $res['id_article'] ?>" class="color_fff"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;
					<--?php echo date('Y-m-d',strtotime($res['date'])) ?>
                        </a></div-->
                    <div class="" style="margin-right: 48px;"><a href="details-articles.php?id=<?php echo $res['id_article'] ?>" class="fh5co_good_font"> <?php echo $res['titre'] ?> </a></div>
                    <div class="" style="margin-right: 48px;"><a href="details-articles.php?id=<?php echo $res['id_article'] ?>" class="fh5co" style="font-weight:bold;"><?php echo $res['categories'] ?></a></div>
                    
                </div>
            </div>
			<?php } ?>
        </div>
        <div class="col-md-6">
            <div class="row">
		<?php foreach ($results3 as $res) {
			if($position!=0){
		?>	
                <div class="col-md-6 col-6 paddding animate-box" data-animate-effect="fadeIn">
                    <div class="fh5co_suceefh5co_height_2"><img src="<?php echo $res['fichier'] ?> " alt="<?php echo $res['titre'] ?> " title="<?php echo $res['titre'] ?> "/>
                        <div class="fh5co_suceefh5co_height_position_absolute"></div>
                        <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                            <!--div class=""><a href="details-articles.php?id=<?php echo $res['id_article'] ?>" style="margin-right: 27px;" class="color_fff"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;
							<--?php echo date('Y-m-d',strtotime($res['date'])) ?></a></div-->
                            <div class="" style="margin-right: 27px;"><a href="details-articles.php?id=<?php echo $res['id_article'] ?>" class="fh5co_good_font_2"> <?php echo $res['titre'] ?> </a></div>
							<div class="" style="margin-right: 27px;"><a href="details-articles.php?id=<?php echo $res['id_article'] ?>" class="fh5co" style="font-weight:bold;"><?php echo $res['categories'] ?></a></div>
                        </div>
                    </div>
                </div>
			<?php
			}			
			$position++;
			} ?>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid pt-3">
    <div class="container animate-box" data-animate-effect="fadeIn">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4" style="text-align:right">آخر المستجدات</div>
        </div>
        <div class="owl-carousel owl-theme js" id="slider1">		
		<?php foreach ($resultsTrending as $res) {
			if($positionTrending>5){
		?>
		
            <div class="item px-2">
			<a href="details-articles.php?id=<?php echo $res['id_article'] ?>" >
                <div class="fh5co_latest_trading_img_position_relative">
                    <div class="fh5co_latest_trading_img"><img src="<?php echo $res['fichier'] ?> " alt="" class="fh5co_img_special_relative" /></div>
                    <div class="fh5co_latest_trading_img_position_absolute"></div>
                    <div class="fh5co_latest_trading_img_position_absolute_1">
                        <a href="details-articles.php?id=<?php echo $res['id_article'] ?>" class="text-white"> <?php echo $res['titre'] ?> </a>
                        <div class="fh5co_latest_trading_date_and_name_color" style="color: #f5bc04;font-weight:bold;">  <?php echo $res['categories'] ?>  <!--?php echo date('Y-m-d',strtotime($res['date'])) ?--></div>
                    </div>
                </div>
			</a>
            </div>
			<?php
			}			
			$positionTrending++;
			} ?>			
               
            </div>
    </div>
</div>
<div class="container-fluid pb-4 pt-5" >
    <div class="container animate-box">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4" style="text-align:right">آخر الأخبار</div>
        </div>
        <div class="owl-carousel owl-theme" id="slider2" id="news">
				
		<?php foreach ($resultsNews as $res) {
			if($positionNews>10){
		?>
		
            <div class="item px-2">
			
			<a href="details-articles.php?id=<?php echo $res['id_article'] ?>" >
                <div class="fh5co_hover_news_img">
                    <div class="fh5co_news_img"><img src="<?php echo $res['fichier'] ?>" alt=""/></div>
                    <div>
                        <a href="details-articles.php?id=<?php echo $res['id_article'] ?>" class="d-block fh5co_small_post_heading"><span class=""><?php echo $res['titre'] ?></span></a>
                        <!--div class="c_g"><i class="fa fa-clock-o"></i><--?php echo date('Y-m-d',strtotime($res['date'])) ?></div-->
                    </div>
                </div>
			</a>
            </div>				
			<?php
			}			
			$positionNews++;
			} ?>	
        </div>
    </div>
</div>
<div class="container-fluid fh5co_video_news_bg pb-4">
    <div class="container animate-box" data-animate-effect="fadeIn">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom pt-5 pb-2 mb-4  text-white">Video News</div>
        </div>
        <div>
            <div class="owl-carousel owl-theme" id="slider3">
                <?php foreach ($resultsVideos as $res) {
                    if($positionVideos>5){
                ?>
                <div class="item px-2">
                    <div class="fh5co_hover_news_img">
                        <div class="fh5co_hover_news_img_video_tag_position_relative">
                            <div class="fh5co_news_img">
                                <iframe id="video" width="100%" height="200"
                                        src="<?php echo $res['lien'] ?><?php echo $cat ?>"
                                        frameborder="0" allowfullscreen></iframe>

                            </div>

                            

                        </div>
                        <div class="pt-2">
                            <a href="#" class="d-block fh5co_small_post_heading fh5co_small_post_heading_1">
                            <span class="" ><?php echo $res['titre'] ?></span></a>
                            
                        </div>
                    </div>
                </div>
                <?php
                }			
                $positionVideos++;
                } ?>
                
                            </div>
        </div>
    </div>
    </div>
<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">أخبار</div>
                </div>	
				<?php foreach ($resultssqlNews2 as $res) { 	?>
                <div class="row pb-4">
                    <div class="col-md-5">
					<a href="details-articles.php?id=<?php echo $res['id_article'] ?>" >
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_news_img"><img src="<?php echo $res['fichier'] ?>" alt="<?php echo $res['titre'] ?>" title="<?php echo $res['titre'] ?>"/></div>
                            <div></div>
                        </div>
					</a>
                    </div>
                    <div class="col-md-7 animate-box">
                        <a style="text-decoration:none;" href="details-articles.php?id=<?php echo $res['id_article'] ?>" class="fh5co_magna py-2"> <?php echo $res['titre'] ?>  
						<div class="most_fh5co_treding_font_123"> <!--?php echo date('Y-m-d',strtotime($res['date'])) ?--></div>
                        <div class="fh5co_consectetur"> 
						<?php echo $res['str'] ?> ...
						</div>
                            </a>
                    </div>
                </div>
                
                
				<?php } ?>
               
            </div>
            <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">هاشتاغ</div>
                </div>
                <div class="clearfix"></div>
                <div class="fh5co_tags_all">
                            <a class="fh5co_tagg" href="articles.php?categories=Company News">أخبارالشركات</a>
                            <a class="fh5co_tagg" href="articles.php?categories=Arab Markets">أسواق عربية</a>
                            <a class="fh5co_tagg" href="articles.php?categories=Cars world">عالم السيارات</a>
                            <a class="fh5co_tagg" href="articles.php?categories=Culture and art">ثقافة و فن</a>
                            <a class="fh5co_tagg" href="articles.php?categories=Science and technology">علوم و تكنلوجيا</a>
                            <a class="fh5co_tagg" href="articles.php?categories=Banks">بنوك</a>
                            <a class="fh5co_tagg" href="articles.php?categories=Files">الملفات</a>
                            <a class="fh5co_tagg" href="articles.php?categories=Sports">رياضة</a>
                            <a class="fh5co_tagg" href="articles.php?categories=Politics">سياسة</a>
                            <a class="fh5co_tagg" href="articles.php?categories=Varities">منوعات</a>
                </div>
				
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">الأكثر شعبية</div>
                </div>
				<?php foreach ($resultssqlMostPopular as $res) { 	?>
                <a class="most_fh5co_treding_font_123" href="details-articles.php?id=<?php echo $res['id_article'] ?>" style="text-decoration:none;color:black">

                <div class="row pb-3">

                    <div class="col-5 align-self-center">
                        <img src="<?php echo $res['fichier'] ?>" alt="<?php echo $res['titre'] ?>"  title="<?php echo $res['titre'] ?>" class="fh5co_most_trading" />
                    </div>
                    <div class="col-7 paddding">
                        <div class="most_fh5co_treding_font"><?php echo $res['titre'] ?></div>
                        <!--div class="most_fh5co_treding_font_123"> <--?php echo date('Y-m-d',strtotime($res['date'])) ?></div-->
                    </div>
                </div>
				<?php } ?>
                                            </a>

            </div>
        </div>

    </div>
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