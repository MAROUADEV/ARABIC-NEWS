<?php
	include('conn.php');
	
	$id=$_GET['id_article'];
		
    $dt=mysqli_query($conn,"select date from articles where id_article='$id'");
    $res=mysqli_fetch_array($dt);
    
    
    date_default_timezone_set('Africa/Casablanca');
    $dt_comp= date("h:i:s");

    $get_dt=date('h:i:s',strtotime($res['date']));
    
    if($dt_comp > $get_dt)
    {
        mysqli_query($conn,"update articles set is_active=1 where id_article='$id'");
        header('location:views-articles.php');
    }
    else
    {
        header('location:views-articles.php');
    }


?>