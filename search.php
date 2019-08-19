<?php
session_start();
require_once 'class.user.php';

require_once("configure.php");

$che=$_POST['CheTxt'];

/*String myQuery = URLEncoder.encode($che, "utf-8");*/

$categorieReq="";
    if($categories=="Cars world"){$categorieReq="عالم السيارات";}
    if($categories=="Arab Markets"){$categorieReq="أسواق عربية";}
    if($categories=="Company News"){$categorieReq="أخبارالشركات";}
    if($categories=="Banks"){$categorieReq="بنوك";}
    if($categories=="Culture and art"){$categorieReq="ثقافة و فن";}
    if($categories=="Files"){$categorieReq="الملفات";}
    if($categories=="Sports"){$categorieReq="رياضة";}
    if($categories=="Science and technology"){$categorieReq="علوم و تكنلوجيا";}
    if($categories=="Politics"){$categorieReq="سياسة";}
    if($categories=="Varities"){$categorieReq="منوعات";}

$topnews = " SELECT titre FROM articles where MOD(id_article, 2) = 1 ORDER BY count desc,date asc limit 4 ";
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
    <title>MaghrebEco</title>
      
    <meta name="description" content="موقع إخبار متجدد متخصص في الشؤون الاقتصادية محليا وعربيا ودوليا.">
    <meta name="keywords" content="économie, maroc, actualité, scoop, news, analyse, enquête, exclusive,analyse,bourse,عالم السيارات,منوعات,صناعة,سياسة,رياضة,الملفات,بنوك,علوم و تكنلوجيا,ثقافة و فن,عالم السيارات,أسواق عربية,أخبارالشركات">
    
    <link rel="stylesheet" href="css/font-awesome.min" type="text/css"/>
    <link href="css/media_query.css" rel="stylesheet" type="text/css"/>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap RTL Theme -->
    <link rel="stylesheet" href="css/bootstrap-rtl.css" type="text/css"/>
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
   
   <style>
       .fh5co_suceefh5co_height_2
         {
             margin-top: 50px;
             margin-right: 22px;
         }
        #ld
       {
           background-color: #f5bc04;
           color: #fff;
           border-color: #f5bc04;
           margin-left: 12px;
    margin-right: 12px;
       }
       .fh5co_news_img>img {
    height: auto;
    min-width: 100%;
    max-width: 100%;
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
         
         h2.sub-title {
    background: #f7f7f7;
    color: #222;
    font-size: 24px;
    line-height: 22px;
    position: relative;
    padding: 10px 20px 10px 0;
    margin-bottom: 30px;
    display: block;
    overflow: hidden;
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
         .share-btns {
    position: absolute;
    left: 0;
    top: 0;
}.share-btns ul {
    margin: 0;
    padding: 0;
    list-style: none;
    height: 42px;
}
         .share-btns li {
    float: left;
    margin: 0;
    padding: 0;
    width: 42px;
    height: 42px;
    line-height: 42px;
    text-align: center;
    overflow: hidden;
    position: relative;
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
	</style> 
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
                <img src="images/logo.png" alt="img" class="fh5co_logo_width"/>
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
                        <a class="nav-link" href="#">الصور<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#">فيديو<span class="sr-only">(current)</span></a>
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

<div class="container" style="margin-top: 5%;margin-bottom:5%;direction:rtl">

    
    <div class="row">
	<div class="col-md-12">
       
						<div class="panel panel-default">
							 <div class="panel-heading">
								<h2 class="sub-title" 
                            style="font-weight:normal;border-right: 6px solid #FFD700;"> نتيجة البحث عن: 
                                    <?php echo $che ?></h2>
							</div>
						</div>
					</div>
		
    </div>
    
    <div  class="row" id="results"></div>
        <div class="row" id="loader_image"><img src="images/35.gif" alt="" width="24" height="24"> جاري التحميل الرجاءالانتظار...</div>
        <div  class="row" id="loader_message" ></div>
</div>



	<div id="includedfooter"></div>
    
    <script type="text/javascript">
      var limit = 6;
      var offset = 0;

      function displayRecords(lim, off) {
        $.ajax({
          type: "GET",
          async: false,
          url: "get-search.php?categories=<?php echo "".urlencode($che) ?>",
          data: "limit=" + lim + "&offset=" + off,
          cache: false,
          beforeSend: function() {
            $("#loader_message").html("").hide();
            $('#loader_image').show();
          },
          success: function(html) {
            $('#loader_image').hide();
            $("#results").append(html);

            if (html == "") {
                
            } else {
              $("#loader_message").html('<button id="ld" type="button" class="btn btn-outline-warning btn-lg btn-block" >المزيد</button>').show();
            }


          }
        });
      }

      $(document).ready(function() {
        // start to load the first set of data
        displayRecords(limit, offset);

        $('#loader_message').click(function() {

          // if it has no more records no need to fire ajax request
          var d = $('#loader_message').find("button").attr("data-atr");
          if (d != "nodata") {
            offset = limit + offset;
            displayRecords(limit, offset);
          }
        });

      });

    </script>
    
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