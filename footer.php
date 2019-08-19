<?php

require_once 'connectdb.php';

	$MostPopular = " SELECT * FROM articles ORDER BY count desc,date desc limit 4 ";
	try {
		$stmt = $DB->prepare($MostPopular);
		$stmt->execute();
		$resultsMostPopular = $stmt->fetchAll();
	} catch (Exception $ex) {
		echo($ex->getMessage());
	}

    $Popular = " SELECT * FROM articles ORDER BY count desc,date asc limit 9 ";
	try {
		$stmt = $DB->prepare($Popular);
		$stmt->execute();
		$resultsPopular = $stmt->fetchAll();
	} catch (Exception $ex) {
		echo($ex->getMessage());
	}
	

?>	
<div class="container-fluid fh5co_footer_bg pb-3">
    <div class="container animate-box">
        <div class="row">
            <div class="col-12 spdp_right py-5"><img src="images/logo.png" alt="img" class="footer_logo"/></div>
            <div class="clearfix"></div>
            <div class="col-12 col-md-4 col-lg-3">
                <div class="footer_main_title py-3">عن الموقع</div>
                <div class="footer_sub_about pb-3"> موقع إخبار متجدد متخصص في الشؤون الاقتصادية  محليا وعربيا ودوليا.
                </div>
                <div class="footer_mediya_icon">
                    <!--div class="text-center d-inline-block"><a class="fh5co_display_table_footer">
                        <div class="fh5co_verticle_middle"><i class="fa fa-linkedin"></i></div>
                    </a></div-->
                    <div class="text-center d-inline-block"><a href="https://plus.google.com/u/4/discover" target="_blank" class="fh5co_display_table_footer">
                        <div class="fh5co_verticle_middle"><i class="fa fa-google-plus"></i></div>
                    </a></div>
                    <div class="text-center d-inline-block"><a href="https://twitter.com/maghrebeco1" target="_blank"  class="fh5co_display_table_footer">
                        <div class="fh5co_verticle_middle"><i class="fa fa-twitter"></i></div>
                    </a></div>
                    <div class="text-center d-inline-block"><a href="https://www.facebook.com/MaghrebEco-583506365352031/" target="_blank"  class="fh5co_display_table_footer">
                        <div class="fh5co_verticle_middle"><i class="fa fa-facebook"></i></div>
                    </a></div>
                </div>
            </div>
            <div class="col-12 col-md-3 col-lg-2">
                <div class="footer_main_title py-3">الأقسام</div>
                <ul class="footer_menu">
                    <li><a href="articles.php?categories=Company News" class=""><i class="fa fa-angle-right"></i>&nbsp;&nbsp; أخبارالشركات</a></li>
                    <li><a href="articles.php?categories=Arab Markets" class=""><i class="fa fa-angle-right"></i>&nbsp;&nbsp; أسواق عربية</a></li>
                    <li><a href="articles.php?categories=Cars world" class=""><i class="fa fa-angle-right"></i>&nbsp;&nbsp; عالم السيارات</a></li>
                    <li><a href="articles.php?categories=Culture and art" class=""><i class="fa fa-angle-right"></i>&nbsp;&nbsp; ثقافة و فن</a></li>
                    <li><a href="articles.php?categories=Science and technology" class=""><i class="fa fa-angle-right"></i>&nbsp;&nbsp; علوم و تكنلوجيا</a></li>
                    <li><a href="articles.php?categories=Banks" class=""><i class="fa fa-angle-right"></i>&nbsp;&nbsp; بنوك</a></li>
                    <li><a href="articles.php?categories=Files" class=""><i class="fa fa-angle-right"></i>&nbsp;&nbsp; الملفات</a></li>
                    <li><a href="articles.php?categories=Sports" class=""><i class="fa fa-angle-right"></i>&nbsp;&nbsp; رياضة</a></li>
                    <li><a href="articles.php?categories=Politics" class=""><i class="fa fa-angle-right"></i>&nbsp;&nbsp; سياسة</a></li>
                    <li><a href="articles.php?categories=Varities" class=""><i class="fa fa-angle-right"></i>&nbsp;&nbsp; منوعات</a></li>
					
                </ul>
            </div>
            
            
                <div class="col-12 col-md-5 col-lg-3 position_footer_relative">
                    <div class="footer_main_title py-3"> العناوين الاكثر مشاهدة</div>
                    <?php foreach ($resultsMostPopular as $res) { 	?>
                    
                    <div class="footer_makes_sub_font"><?php echo date('Y-m-d',strtotime($res['date'])) ?></div>
                    <a href="details-articles.php?id=<?php echo $res['id_article'] ?>" class="footer_post pb-4"> <?php echo $res['titre'] ?></a>

                    <div class="footer_position_absolute"><img src="images/footer_sub_tipik.png" alt="img" class="width_footer_sub_img"/></div>
                    <?php } ?>
                </div>
            
            <div class="col-12 col-md-12 col-lg-4 ">
                <div class="footer_main_title py-3"> آخر المستجدات</div>
                <?php foreach ($resultsPopular as $res) { 	?>
                <a href="details-articles.php?id=<?php echo $res['id_article'] ?>" class="footer_img_post_6"><img src="<?php echo $res['fichier'] ?>" alt="<?php echo $res['titre'] ?>"/></a>
                <?php } ?>
            </div>
        </div>

    </div>
</div>
<div class="container-fluid fh5co_footer_right_reserved">
    <div class="container">
        <div class="row  ">
            <div class="col-12 col-md-6 py-4 Reserved" style="direction: ltr;"> © 2018 <a href="maghrebeco.com" >MaghrebEco</a>, All rights reserved.  </div>
            <div class="col-12 col-md-6 spdp_right py-4">
                <a href="index.php" class="footer_last_part_menu">الصفحة الرئيسية</a>
                <a href="about.php" class="footer_last_part_menu">عن الموقع</a>
                <a href="contact.php" class="footer_last_part_menu">تواصل معنا</a>
                <a href="news.php" class="footer_last_part_menu">آخر الأخبار</a></div>
        </div>
    </div>
</div>
<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="fa fa-arrow-up"></i></a>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<!--<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
        integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>
<!-- Waypoints -->
<script src="js/jquery.waypoints.min.js"></script>
<!-- Main -->
<script src="js/main.js"></script>



	    <style>
            .col-md-6{
                position: relative;
                width: 100%;
                min-height: 1px;
                padding-left: 15px;
                padding-right: 10px;
            }
	       a:hover
            {
                text-decoration: none;
            }
			.ml3 {
		  font-weight: 900;
		  font-size: 1.1em;
		}
    
        .search-form
        {
            
            @include 'css/search.css';
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
	

	
	<script>
	
	// Wrap every letter in a span
$('.ml3').each(function(){
  $(this).html($(this).text().replace(/([^\x00-\x80]|\w)/g, "<span class='letter'>$&</span>"));
});

anime.timeline({loop: true})
  .add({
    targets: '.ml3 .letter',
    opacity: [0,1],
    easing: "easeInOutQuad",
    duration: 1,
    delay: function(el, i) {
      return 50 * (i+1)
    }
  }).add({
    targets: '.ml3',
    opacity: 0,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 1000
  });
  
    </script>
	