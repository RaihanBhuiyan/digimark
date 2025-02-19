<!DOCTYPE html>
<html>
<head>
<?php include('includes.php');
$item = $litePath[2];
if($item == 'all' || $item == ''){
    include('metaContent.php');
}
else{
    // $slug = str_replace('-', '_', $litePath[2]);
    // $tbl = 'tbl_'.strtolower($slug);
    $get_url = urldecode($litePath[2]);
    			$sql  = "SELECT * FROM `tbl_news` WHERE `url`='$get_url' AND `status` IN('1','2')";
    			$result = mysqli_query($dbcon,$sql) or die ('error 404z');
    			
    			if(mysqli_num_rows($result) <= 0){
    			    echo '<script>location="404";</script>';
    			}
    			while($row = mysqli_fetch_assoc($result)){
    			$code = $row['code'];
    			$title = $row['title'];
    			
    			
    			$metaTitle = $row['metaTitle'];
    			$metaDesc = $row['metaDesc'];
    			$metaKeywords = $row['metaKeyword'];
    			
    			$details = $row['details'];
    			$crDate = $row['crDate'];
    			$image = $row['thumbnail'];
    			$status = $row['status'];
    		}
    	echo '<title>'.$metaTitle.'</title>';	
        echo '<meta name="title" content="'.$metaTitle.'"/>';  
    	echo '<meta name="description" content="'.$metaDesc.'"/>';
    	echo '<meta name="keywords" content= "'.$metaKeywords.'"/>';
}
?>
</head>
<body>
<?php 
include('menu.php');
?>
<?php 

if($item == 'all' || $item == ''){
?>
<div class="row row-article" style="margin:0px">
	<div class="" style="margin-left:5% !important;">
		<h1 class="heading" style="color: #ffffff"><b>News</b></h1>
	</div>
</div>
<div class="row" style="margin-top: 0.5%;margin-bottom: 0.5%;margin-left:5% !important;margin-right:5% !important;">
	<!--<div class="" style="padding: 0.5%">-->
		<div class="col-12">
			<div class="row">
            <?php 
		    $sql  = "SELECT * FROM `tbl_news` WHERE `status` IN('1','2')";
			$result = mysqli_query($dbcon,$sql) or die ('error 404z');
			while($row = mysqli_fetch_assoc($result)){
			$news_code = $row['code'];
			$news_title = $row['title'];
			$news_url = $row['url'];
            $news_title_sub = substr($news_title, 0, 200);
			$news_details = $row['details'];
			$news_crDate = $row['crDate'];
			$news_image = $row['thumbnail'];
			$news_status = $row['status'];
			
                        echo    
                            '
                            <div class="col-lg-3 col-md-6 col-sm-6 col-12" style="text-align:center;padding:5px !important;" itemscope itemtype="https://schema.org/Article">
                                <a class="box-hover" href="news/'.$news_url.'"><div class="item-container">
                                <img src="assets/images/news/'.$news_image.'"  alt="No Image"  style="width:100% !important">
                                <div style="border: 1px solid #343a40 !important;margin-top:2%;margin-bottom:2%"></div>
                                <h5 class="top-story-title" style="margin-top:2.5%"><span style="color:#f16724">Published On : </span><span itemprop="dateCreated">'.date("d-m-Y", strtotime($news_crDate)).'<span></h5><br>
                                <h3 class="top-story-title" style="margin-top:2.5%">'.$news_title_sub.'</h3>
                                
                                </div></a>
                            </div>
                            ';    
			}
		    ?>
			</div>
		</div>
	<!--</div>-->
</div>
<?php
}
else{
?>
<div class="row row-read-single" >
<div class="container" style="text-align: justify;">
<h7 style="color: #ffffff"><a href="News">All News</a> / <?php echo $title;?></h7>
</div>
</div>
<div class="row" style="margin: 1.5%">
	<div class="container">

<h1 class="heading" style="color: #4c4d4f;text-align: left;"><b><?php echo $title;?></b></h1><br>
<span style="color:#f16724">Published On : </span><span itemprop="dateCreated"><?php echo date("d-m-Y", strtotime($crDate));?><span><br>
<!-- <div style="text-align: center;"><img src="assets/images/<?php echo $slug.'/'.$image;?>" style="width:100%"></div> -->
<p class="text-details" style="color: #4c4d4f" style="text-align: justify !important;">
	<?php echo $details;?>
</p>

	</div>
</div>
<?php
}
?>





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

<style type="text/css">
.row-article{
    padding-top: 1.5% !important;
    padding-bottom: 1.5% !important;
    margin:auto;
    background-color: #ffffff;
    background-image: url('assets/images/background/home-stories-bg.jpg');
    background-size: cover;
    }
.row-read-single{
    padding-top: 1.5% !important;
    padding-bottom: 1.5% !important;
    margin:auto;
    background-color: #000000;
    /*background-image: url('assets/images/background/home-stories-bg.jpg');*/
    background-size: cover;
    }
	p > img{
        display:block;
        margin-left: auto;
        margin-right: auto;
	}
	p > iframe{
        display:block;
        width:100%;
        height:650px;
        margin-left: auto;
        margin-right: auto;
	}
	
	p > a{
	 /* These are technically the same, but use both */
      overflow-wrap: break-word;
      word-wrap: break-word;
    
      -ms-word-break: break-all;
      /* This is the dangerous one in WebKit, as it breaks things wherever */
      word-break: break-all;
      /* Instead use this non-standard one: */
      word-break: break-word;
    
      /* Adds a hyphen where the word breaks, if supported (No Blink) */
      -ms-hyphens: auto;
      -moz-hyphens: auto;
      -webkit-hyphens: auto;
      hyphens: auto;

	}
	h7 > a{
	    color:#f16623;
	}
	h7 > a:hover{
	    color:#ffffff;text-decoration:none !important;
	}
</style>
</body>
</html>