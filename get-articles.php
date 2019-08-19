<?php



mb_internal_encoding( 'UTF-8' );
mb_http_output( 'UTF-8' );

$categories=$_GET["categories"];
$categorieReq="";
if($categories=="Cars world"){$categorieReq="عالم السيارات";}
if($categories=="Arab Markets"){$categorieReq="أسواق عربية";}
if($categories=="Company News"){$categorieReq="أخبار الشركات";}
if($categories=="Banks"){$categorieReq="بنوك";}
if($categories=="Culture and art"){$categorieReq="ثقافة و فن";}
if($categories=="Files"){$categorieReq="الملفات";}
if($categories=="Sports"){$categorieReq="رياضة";}
if($categories=="Science and technology"){$categorieReq="علوم و تكنلوجيا";}
if($categories=="Politics"){$categorieReq="سياسة";}
if($categories=="Industry"){$categorieReq="صناعة";}
if($categories=="Varities"){$categorieReq="منوعات";}
 
require_once("config.php");
include "config2.php";
$limit = (intval($_GET['limit']) != 0 ) ? $_GET['limit'] : 6;
$offset = (intval($_GET['offset']) != 0 ) ? $_GET['offset'] : 0;

$query = "select * from articles  where is_active=1  and  categories like '%$categorieReq%' LIMIT $limit OFFSET $offset";
            $result = mysqli_query($con,$query);
			
  while($row = mysqli_fetch_array($result)){
                $id = $row['id_article'];
                $title = $row['titre'];
                $content = $row['contenu'];
                $fichier = $row['fichier'];
				$cate=$row['categories'];
				$date=$row['date'];
           
            ?>
				 
<div class="col-sm-6 col-md-4" style="margin-top: 2%;direction:rtl">
                <a style="text-decoration:none;"href="details-articles.php?id=<?php echo $id; ?>" >
                <div class="col-md-12" data-animate-effect="fadeInLeft">
                	
                        <div class="fh5co_hover_news_img" style="height:100%">
                            <div class="fh5co_news_img" style="height: 100%"><img src="<?php echo $fichier; ?>" height="199px" alt="<?php echo $titre; ?>" title="<?php echo $titre; ?>" /></div>
                            <div></div>
                        </div>
                    
                       <div class="" ><p style="color:#3f4850;margin-bottom: 8px;margin-top:14px;"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;
					         <?php echo date('Y-m-d',strtotime($date)); ?></div> 
                      <div class="" ><p  class="fh5co_good_font_2" style="color:#3f4850;font-weight:bold; line-height: 25px;margin-bottom:4rem;font-size: 17px;"><?php echo $title; ?></p></div>
            </div>
                </a>

        </div>

            <?php
            }
            ?>