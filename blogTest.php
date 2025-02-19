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
    $get_url = $litePath[2];
    			$sql  = "SELECT * FROM `tbl_blog` WHERE `url`='$get_url' AND `status` IN('1','2')";
    			$result = mysqli_query($dbcon,$sql) or die ('error 404z');
    			
    			if(mysqli_num_rows($result) <= 0){
    			    echo '<script>location="404";</script>';
    			}
    			while($row = mysqli_fetch_assoc($result)){
    			$code = $row['code'];
    			$url = $row['url'];
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
		<h1 class="heading" style="color: #ffffff"><b>Blog</b></h1>
	</div>
</div>
<div class="row" style="margin-top: 0.5%;margin-bottom: 0.5%;margin-left:5% !important;margin-right:5% !important;">
	<!--<div class="" style="padding: 0.5%">-->
		<div class="col-12">
			<div class="row">
            <?php 
		    $sql  = "SELECT * FROM `tbl_blog` WHERE `status` IN('1','2')";
			$result = mysqli_query($dbcon,$sql) or die ('error 404z');
			while($row = mysqli_fetch_assoc($result)){
			$blog_code = $row['code'];
			$blog_title = $row['title'];
			$blog_url = $row['url'];
            $blog_title_sub = substr($blog_title, 0, 200);
			$blog_details = $row['details'];
			$blog_crDate = $row['crDate'];
			$blog_image = $row['thumbnail'];
			$blog_status = $row['status'];
			
                        echo    
                            '
                            <div class="col-lg-3 col-md-6 col-sm-6 col-12" style="text-align:center;padding:5px !important;" itemscope itemtype="https://schema.org/Article">
                                <a class="box-hover" href="BlogTest990/'.$blog_url.'"><div class="item-container">
                                <img src="assets/images/blog/'.$blog_image.'"  alt="No Image"  style="width:100% !important">
                                <div style="border: 1px solid #343a40 !important;margin-top:2%;margin-bottom:2%"></div>
                                <h5 class="top-story-title" style="margin-top:2.5%"><span style="color:#f16724">Published On : </span><span itemprop="dateCreated">'.date("d-m-Y", strtotime($blog_crDate)).'<span></h5><br>
                                <h3 class="top-story-title" style="margin-top:2.5%">'.$blog_title_sub.'</h3>
                                
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
<h7 style="color: #ffffff"><a href="BlogTest990">All Blogs</a> / <?php echo $title;?></h7>
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


<div class="container"><form action="BlogTest990" method="post">	 
<div class="row">
	<input type="text" id="pcode" name="code" value="<?php echo $code;?>" style="display:none">
	<input type="text" name="url" value="<?php echo $url;?>" style="display:none">

	<div class="col-md-12 col-sm-12 col-xs-12 mt-3">
		<textarea spellcheck="true" id="review" class="form-control" name="review"  placeholder="Write a review*" ></textarea>
	</div>

	<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
	                <input type="text" class="form-control" id="login_name" name="login_name" placeholder="Name**" required="" style="margin-top: 1.5%">
	</div>

	<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
		            <input type="email" class="form-control" id="login_email" name="login_email" placeholder="Email**" required="" style="margin-top: 1.5%">
	</div>

	<div class="col-md-12 col-sm-12 col-xs-12 mt-3 float-right">
	    <label style="color:red">**Please enter the captcha</label><br>
	    <div class="input-group">
            <input type="text" class="form-control" id="revCapValue" readonly name="revCapValue" data-cap="" style="border-radius:0px;font-weight:bold;text-align: center;font-size: 20px;color:#f69c6f;" />
            <input type="text" class="form-control" placeholder="Enter The Result**" id="revEntryValue" name="revEntryValue" style="border-radius:0px;"/>
        </div>
		<button class="btn btn-sm btn-success float-right" type="submit" name="submit" id="btnRevCaptcha" disabled="true"  style="margin-top:1%"><i class="fas fa-comment"> </i> Post Review</button>
	            <!-- <a class="btn btn-sm btn-success float-right" href="javascript:void(0)" onclick="gmail_login()" style="margin-top:1%"><i class="fas fa-comment"> </i> Login with gmail</a> -->
	</div>
	</div>
	</form>
<div class="row">
		<div class="col-md-12 col-sm-12" style="margin-top: 2.5%">
		        		<label style="color:#f16724;font-weight: bold;font-size: 20px;margin-bottom: 2.5%">Comments</label>
		        		<?php
		        		$sql = "SELECT * FROM `tbl_review` WHERE `product_code` = '$reviewProduct' AND `status` = '1'";
						$result = mysqli_query($dbcon,$sql) or die ('error 404');
							while($row = mysqli_fetch_assoc($result)){
							$name = $row['name'];
							$reviewDate = $row['reviewDate'];
							$review = $row['review'];
							$review_rating = $row['review_rating'];

							echo 	'<div class="pr_box">
							<div class="row" style="border-bottom:1px solid lightgray;" itemprop="itemReviewed" itemtype="https://schema.org/itemReviewed" itemscope>
										<div class="col-md-1 col-4" style="text-align: center;margin:auto">
											<img class="rounded" src="assets/images/user.png" style="width: 75px;">
										</div>
										<div class="col-md-11 col-8 card-body" style="margin-left:auto;">
											<p style="">
											<span itemprop="author"><b>'.$name.'</b></span><br>
											<meta itemprop="datePublished" content="'.$reviewDate.'"><b>'.$reviewDate.'</b><br>
											</p>
										</div>
									</div>
								</div>';
							}
						?>
						<div class="col-12" style="text-align:center;padding:2%;"><a href="#" id="load">Load More</a></div>
		        	</div>
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