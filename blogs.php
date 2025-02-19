<!DOCTYPE html>
<html>
<head>
<?php include('includes.php');
$_GET['x'] = 'Blog';
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
            $blog_title_sub = substr($blog_title, 0, 200);
			$blog_details = $row['details'];
			$blog_crDate = $row['crDate'];
			$blog_image = $row['thumbnail'];
			$blog_status = $row['status'];
			
                        echo    
                            '
                            <div class="col-lg-3 col-md-6 col-sm-6 col-12" style="text-align:center;padding:5px !important;" itemscope itemtype="https://schema.org/Article">
                                <a class="box-hover" href="Read/Blog/'.$blog_code.'/'.str_replace(' ','-',$blog_title).'"><div class="item-container">
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