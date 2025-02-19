<!DOCTYPE html>
<html>
<head>
<?php include('includes.php');
$_GET['x'] = 'News';
include('metaContent.php');
?>
<style type="text/css">
.row-blog{
    padding-top: 1.5% !important;
    padding-bottom: 1.5% !important;
    margin:auto;
    background-color: #ffffff;
    background-image: url('assets/images/background/home-stories-bg.jpg');
    background-size: cover;
    }
</style>
</head>
<body>
<?php 
include('menu.php');
?>
<div class="row row-blog" style="margin:0px">
<div class="" style="margin-left:5% !important;">
	<h1 class="heading" style="color: #ffffff"><b>News</b></h1>
</div>
</div>

<div class="row" style="margin-bottom: 0.5%;margin-top: 0.5%;margin-left:5% !important;margin-right:5% !important;">
	<!--<div class="" style="padding: 0.5%">-->
		<div class="col-12">
			<div class="row">
<?php 
		    $sql  = "SELECT * FROM `tbl_news` WHERE `status` = '1'";
			$result = mysqli_query($dbcon,$sql) or die ('error 404z');
			while($row = mysqli_fetch_assoc($result)){
			$news_code = $row['code'];
			$news_title = $row['title'];
			$news_title_sub = substr($news_title, 0, 200);
			$news_details = $row['details'];
			$news_crDate = $row['crDate'];
			$news_image = $row['thumbnail'];
			$news_status = $row['status'];
			
            // echo '<div class="col-md-4 col-12" data-category="ui">
            //     <div class="lib-panel">
            //         <div class="row box-shadow">
            //             <div class="col-md-6 col-12" style="padding:5px !important;">
            //                 <img class="lib-img" src="assets/images/news/'.$news_image.'">
            //             </div>

            //             <div class="col-md-6 col-12" style="padding:5px !important;">
            //                 <div class="lib-row lib-header">
            //                     News
            //                     <div class="lib-header-seperator"></div>
            //                     <i class="fas fa-calendar"> </i> '.$news_crDate.'<br>
            //                         '.$news_title.'
            //                     </div>
            //                 <div class="lib-row lib-desc">
            //                     <a class="btn btn-dark btn-sm" href="Read/News/'.$news_code.'/'.str_replace(' ','-',$news_title).'" style="border-radius:0px">Read <i class="fas fa-arrow-circle-right"></i></a>
            //                 </div>
            //             </div>
            //         </div>
            //     </div>
            // </div>';
            
            // echo '<div class="col-lg-3 col-md-6 col-sm-6 col-12" data-category="ui" style="min-height:100%">
            //     <div class="lib-panel">
            //         <div class="row box-shadow">
            //             <div class="col-md-12 col-12" style="padding:5px !important;">
            //                 <img class="lib-img" src="assets/images/news/'.$news_image.'">
            //             </div>

            //             <div class="col-md-12 col-12" style="padding:5px !important;">
            //                 <div class="lib-row lib-header">
            //                     <p style="font-size:16px">'.$news_title.'</p>
            //                     </div>
            //                 <div class="lib-row lib-desc">
            //                     <a class="btn btn-dark btn-sm" href="Read/News/'.$news_code.'/'.str_replace(' ','-',$news_title).'" style="border-radius:0px">Read <i class="fas fa-arrow-circle-right"></i></a>
            //                 </div>
            //             </div>
            //         </div>
            //     </div>
            // </div>';
            //  echo    
            //                 '<div class="col-lg-3 col-md-6 col-sm-6 col-12" style="text-align:center;padding:5px !important">
            //                     <div class="item-container">
            //                     <img src="assets/images/news/'.$news_image.'" alt="No Image" style="width:100% !important">
            //                     <label class="top-story-label">NEWS</label>
            //                     <h3 class="top-story-title">'.$news_title_sub.'</h3>
            //                     <a class="btn btn-dark btn-sm" href="Read/News/'.$news_code.'/'.str_replace(' ','-',$news_title).'" style="border-radius:0px;margin-top: auto;">Read <i class="fas fa-arrow-circle-right"></i></a>
            //                     </div>
            //                 </div>';
            echo '<div class="col-lg-3 col-md-6 col-sm-6 col-12" style="text-align:center;padding:5px !important;" itemscope itemtype="https://schema.org/Article">
                                <a class="box-hover" href="Read/News/'.$news_code.'/'.str_replace(' ','-',$news_title).'"><div class="item-container">
                                <img src="assets/images/news/'.$news_image.'"  alt="No Image"  style="width:100% !important">
                                <div style="border: 1px solid #343a40 !important;margin-top:2%;margin-bottom:2%"></div>
                                <h5 class="top-story-title" style="margin-top:2.5%"><span style="color:#f16724">Published On : </span><span itemprop="dateCreated">'.date("d-m-Y", strtotime($news_crDate)).'<span></h5><br>
                                <h3 class="top-story-title" style="margin-top:2.5%">'.$news_title_sub.'</h3>
                                
                                </div></a>
                            </div>';
			}
		    ?>
			</div>
		</div>
	<!--</div>-->
</div>
<?php include('footer.php');?>
<style>
    .item-container{
    margin:0.5%;
    padding:1.5%;
    height:100% !important;
    box-shadow: 0px 2px 2px 2px rgba(217, 217, 242,0.8);
    display: flex;
    flex-direction: column;
    text-align:left;
  }
 .top-story-title{
     margin-top:1.5%;
     margin-bottom:1.5%;
     font-size:16px;
 }  
 .box-hover{
     color:black;
 }
 .box-hover:hover{
     text-decoration:none;
     color:#343a40;
 }  
</style>
</body>
</html>

                    