<!-- Delete -->
    <div class="modal fade" id="del<?php echo $row['id_article']; ?>" tabindex="-1" role="dialog" 
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">  هل أنت متأكد من أنك تريد حذف هذا مقال ؟</h4></center>
                </div>
                <div class="modal-body">
				<?php
					$del=mysqli_query($conn,"select * from articles where id_article='".$row['id_article']."'");
					$drow=mysqli_fetch_array($del);
				?>
				<div class="container-fluid">
					<h5><center> <strong><?php echo $drow['titre']; ?></strong></center></h5> 
                </div> 
				</div>
                <div class="modal-footer">
                    <a href="delete.php?id_article=<?php echo $row['id_article']; ?>" class="btn btn-danger"><span class="fa fa-trash" aria-hidden="true"></span> حذف</a>
                    
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-times" aria-hidden="true"></span> إلغاء</button>

                </div>
				
            </div>
        </div>
    </div>
<!-- /.modal -->

<!-- Edit -->
    <div class="modal fade" id="edit<?php echo $row['id_article']; ?>" tabindex="-1" role="dialog" 
         aria-labelledby="myModalLabel" aria-hidden="true" style="direction:rtl">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel"> تغيير مقال</h4></center>
                </div>
                <div class="modal-body">
				<?php
					$edit=mysqli_query($conn,"select * from articles where id_article='".$row['id_article']."'");
					$erow=mysqli_fetch_array($edit);
				?>
				<div class="container-fluid">
				<form method="POST" action="edit.php?id_article=<?php echo $erow['id_article']; ?>">
					<div class="row">
                                        
                            <div class="col-md-12 pull-right" >
                                <label for="titre" style="float:right">العنوان</label>
						          <input type="text" name="titre" class="form-control" style="min-width: 100%;" placeholder="العنوان"  value="<?php echo $erow['titre']; ?>">
                            </div>
                                        
                    </div>

					<div style="height:10px;"></div>
                    
                    <div class="row">
                                        
                            <div class="col-md-12 pull-right" >
                                <label for="contenu" style="float:right">المحتوى</label>
						        <textarea type="text" name="contenu" placeholder="المحتوى" class="form-control" style="min-width: 100%;"  value="" rows="9">
                                <?php echo $erow['contenu']; ?>
                                </textarea>
                                        </div>
                                        
                    </div>

                    <div style="height:10px;"></div>
                    
                    <div class="row">
                                        
                            <div class="col-md-12 pull-right" >
                                <label for="fichier" style="float:right">الرابط</label>
                                <input type="text" name="fichier" class="form-control" placeholder="الرابط" style="min-width: 100%;" value="<?php echo $erow['fichier']; ?>">
                            </div>
                                        
                    </div>
                    
                    <div style="height:10px;"></div>
                    
                    <div class="row">
                            <div class="col-md-12 pull-right">
                                <label for="categories" style="float:right">القسم</label>
                                <input type="text" name="categories" class="form-control" style="min-width: 100%;"  placeholder="القسم" value="<?php echo $erow['categories']; ?>">
                            </div>
                                        
                    </div>

                    
					<div style="height:10px;"></div>
					
                
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning"><span class="fa fa-check" aria-hidden="true"></span> حفظ</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-times" aria-hidden="true"></span> إلغاء</button>
                    
                </div>
				</form>
            </div>
        </div></div></div></div>

<!-- /.modal -->

<!-- Publish -->
    <div class="modal fade" id="publish<?php echo $row['id_article']; ?>" tabindex="-1" role="dialog" 
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">  هل تريد حقا أن تنشر هذا مقال ؟</h4></center>
                </div>
                <div class="modal-body">
				<?php
					$del=mysqli_query($conn,"select * from articles where id_article='".$row['id_article']."'");
					$drow=mysqli_fetch_array($del);
				?>
				<div class="container-fluid">
					<h5><center> <strong><?php echo $drow['titre']; ?></strong></center></h5> 
                </div> 
				</div>
                <div class="modal-footer">
                    <a href="publish.php?id_article=<?php echo $row['id_article']; ?>" class="btn btn-success"><span class="fa fa-share" aria-hidden="true"></span> نشر</a>
                    
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-times" aria-hidden="true"></span> إلغاء</button>

                </div>
				
            </div>
        </div>
    </div>
<!-- /.modal -->


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

</script>