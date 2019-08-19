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

if(isset($_POST['submit'])) 
{


    $to = "maghrebeco.contact@gmail.com";
	$subject=$_POST['subject'];
	$message='<br />Nom  :'.$_POST['fullname'].' <br />Email : '.$_POST['email'] .'<br /> Message : '.$_POST['message'].'<br />'; 
	
    $headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From:'.$_POST['fullname'].' <mail-noreply@maghrebeco.com>' . "\r\n";
	

     if(mail($to,$subject,$message,$headers)){
		 $message ='<div class="alert alert-success col-md-12">
					  <strong> تم إرسال الرسالة بنجاح 😊 </strong>
					   </div>';
	 }else{
		 $message ='<div class="alert alert-danger"> هناك مشكلة في تسليم الرسالة ☹️</div>';
	 }
    


    

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
        /*window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 2500);*/
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
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 2500);
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
                    <li class="nav-item ">
                        <a class="nav-link" href="about.php">عن الموقع<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="contact.php">تواصل معنا<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>


<div class="container-fluid mb-4">
    <div class="container">
        <div class="col-12 text-center contact_margin_svnit ">
            <div class="text-center fh5co_heading py-2">تواصل معنا</div>
        </div>
        <div class="row">
            <div class=" col-md-6">
                <div class="content">
                <form class="row" id="fh5co_contact_form" method="post" style="direction:RTL;">
                    <?php if(!empty($message)) echo $message; ?>
                    <div class="col-12 py-3">
                        <input type="text" name="fullname" class="form-control fh5co_contact_text_box" placeholder="الاسم الكامل" required style="direction:RTL;" autofocus />
                    </div>
                    <div class="col-6 py-3">
                        <input type="email" name="email" class="form-control fh5co_contact_text_box" placeholder="البريد الإلكتروني" required style="direction:RTL;" />
                    </div>
                    <div class="col-6 py-3">
                        <input type="text" name="subject" class="form-control fh5co_contact_text_box" placeholder="الموضوع" required style="direction:RTL;" />
                    </div>
                    <div class="col-12 py-3">
                        <textarea class="form-control fh5co_contacts_message" name="message" placeholder="الرسالة" required style="direction:RTL;" ></textarea>
                    </div>
                    <div class="col-12 py-3 text-center"> 
                    <input type="submit" class="btn contact_btn" name="submit" value="أرسل" /></div>
                </form>
            </div></div>
            <div class="col-12 col-md-6 align-self-center">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3168.639290621062!2d-122.08624618469247!3d37.421999879825215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sbe!4v1514861541665" class="map_sss" allowfullscreen></iframe>
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

<script type="text/javascript">
var sc_project=11753534; 
var sc_invisible=0; 
var sc_security="20242398"; 
var scJsHost = (("https:" == document.location.protocol) ? "https://secure." : "http://www.");
document.write("<sc"+"ript type='text/javascript' src='" + scJsHost+ "statcounter.com/counter/counter.js'></"+"script>");
</script>
<noscript><div class="statcounter"><a title="website statistics" href="http://statcounter.com/" target="_blank"><img class="statcounter" src="//c.statcounter.com/11753534/0/20242398/0/" alt="website statistics"></a></div></noscript>


</body>
</html>
