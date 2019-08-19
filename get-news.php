<?php


 
require_once("config.php");

$limit = (intval($_GET['limit']) != 0 ) ? $_GET['limit'] : 6;
$offset = (intval($_GET['offset']) != 0 ) ? $_GET['offset'] : 0;

$sql = "SELECT * FROM articles where is_active=1 ORDER BY id_article  DESC LIMIT $limit OFFSET $offset";
            
try {
  $stmt = $DB->prepare($sql);
  $stmt->execute();
  $results = $stmt->fetchAll();
} catch (Exception $ex) {
  echo $ex->getMessage();
}
if (count($results) > 0) {
  foreach ($results as $res) {

	echo '<div class="col-sm-6 col-md-4" style="margin-top: 2%;direction:rtl">
                <a style="text-decoration:none;"href="details-articles.php?id='. $res['id_article'].'" >
                <div class="col-md-12 " data-animate-effect="fadeInLeft">
                	
                        <div class="fh5co_hover_news_img" style="height:100%">
                            <div class="fh5co_news_img" style="height: auto;"><img src="'. $res['fichier'].'" alt="'. $res['titre'].'" title="'. $res['titre'].'" /></div>
                            <div></div>
                        </div>
                    
                       <div class="" ><p style="color:#3f4850;margin-bottom: 1px;margin-top:14px;"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;
					           '.date('Y-m-d',strtotime($res['date'])).'</div> 
                      <div class="" ><p  class="fh5co_good_font_2" style="color:#3f4850;font-weight:bold; line-height:25px;margin-bottom:4rem;">'. $res['titre'].'</p></div>
            </div>
                </a>

        </div>';
	  }
  }

?>