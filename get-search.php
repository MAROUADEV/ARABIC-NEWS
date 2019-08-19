<?php


mb_internal_encoding( 'UTF-8' );
mb_http_output( 'UTF-8' );

$categories=$_GET["categories"];

require_once("config.php");

$limit = (intval($_GET['limit']) != 0 ) ? $_GET['limit'] : 6;
$offset = (intval($_GET['offset']) != 0 ) ? $_GET['offset'] : 0;

include "config2.php";

$query = "select * from articles  where is_active=1  and  contenu like '%$categories%' or categories like '%$categories%' or titre like '%$categories%'  LIMIT $limit OFFSET $offset";
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
                            <div class="fh5co_news_img" style="height: auto;"><img src="<?php echo $fichier; ?>" alt="'. $res['titre'].'" title="<?php echo $titre; ?>" /></div>
                            <div></div>
                        </div>
                    
                       <div class="" ><p style="color:#3f4850;margin-bottom: 8px;margin-top:14px;"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;
					         <?php echo date('Y-m-d',strtotime($date)); ?></div> 
                      <div class="" ><p  class="fh5co_good_font_2" style="color:#3f4850;font-weight:bold; line-height: 25px;margin-bottom:4rem;"><?php echo $title; ?></p></div>
            </div>
                </a>

        </div>

            <?php
            }
            ?>