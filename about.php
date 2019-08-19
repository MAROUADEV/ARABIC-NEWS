<?php

require_once 'connectdb.php';
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
	
	 <style>
		.fh5co_suceefh5co_height_2
         {
             margin-top: 50px;
             margin-right: 22px;
         }
	</style> 
   
   
   <style>
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
       
       div .text-white , div .fh5co_latest_trading_date_and_name_color
       {
           font-size: 20px;
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
    <script>
    $(document).ready(function(){
        $("#button").click(function(){
            if($('#div3').css('display') == 'none'){
                  $("#div3").fadeIn(1000);
                 }else{
                   $("#div3").fadeOut(1000);
                 }
        });
    });
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
                        <input type="text" name="CheTxt" class="form-control col-md-12" placeholder="ابحث في الموقع" />
                    </form>
            </div>
			 
        </div>
		<br>
    </div>
</div>
<div class="container-fluid bg-faded fh5co_padd_mediya padding_786">
    <div class="container padding_786">
        <nav class="navbar navbar-toggleable-md navbar-light ">
            <button style="left: 1rem;" class="navbar-toggler navbar-toggler-right mt-3" type="button" data-toggle="collapse"
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
                    <li class="nav-item active">
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
        <div class="col-md-6 animate-box" data-animate-effect="fadeIn" style="font-size: 17px;
    padding-top: 100px;padding-right: 50px;">
            <p>"مغرب ايكو" جريدة اقتصادية مغربية إلكترونية تعنى بأخبار الاقتصاد في المغرب والعالم، من خلال مجموعة من الأخبار المنوعة والآنية الخاصة بالمال والأعمال، من أجل تعزيز صحافة الاقتصاد والمال بالمغرب بأسلوب جديد يواكب تطورات صحافي الإنترنت.</p>
            <p>في "مغرب إيكو" نحاول قدر الاستطاعة تلبية تعطش قرائنا من عمال ورجال أعمال ومهتمين.. للمعلومة، وذلك من خلال اطلالة على أهم الأخبار الاقتصادية والمالية وأخبار البورصة والأسواق العربية والعالمية لذلك من أهمية خاصة في ظل تنامي السوق الحرة والمعاملات الاقتصادية الدولية ووعيا منا بقوة المعلومة التي تعد أولى خطوات الاستثمار.</p>
            <p>كما لن نغفل في الجريدة أخبار السياسة التي لها ارتباط وثيق بالاقتصاد خاصة اقتصاد السوق الاجتماعي، وأخبار الرياضة والمنوعات إضافة إلى اخبار التكنولوجيا الحديثة والاتصال وكل جديد في هذا العالم المتغير.</p>
            <p>"مغرب ايكو" جاءت لتعزز المشهد الاعلامي المغربي على مستوى صحافة الانترنت، واضعين خبرة سنوات من العمل في الصحافة الالكترونية وفريق شاب وطموح رهن إشارة قرائنا الأعزاء لنقدم لهم أخبار تهمهم وتدخل في صلب اهتماماتهم اليومية.</p>
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