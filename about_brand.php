<!DOCTYPE html>
<html>
<head>
<?php include('includes.php');
$_GET['x'] = 'brands-we-represent';
include('metaContent.php');
?>
<link rel="stylesheet" href="assets/css/about_content.css">
</head>
<body>
<?php 
include('menu.php');
?>
<div class="row row-about-brand">  
<div class="col-12" style="background-image:url('assets/images/background/about_head_bg.jpg');background-size:cover">
<h1 class="heading" style="color: #ffffff;box-shadow: 0px 0px 3px rgba(0,0,0,0.2);padding:1.5%"><b>Brands We Represent</b></h1>
</div>
</div>
<div class="row row-about-brand-bottom">  
	<div class="col-12"> 
        <div  class="col-12" style="text-align: left;box-shadow: 0px 0px 3px rgba(0,0,0,0.2);">
                <div class="brand-img-container">
                <!-- <div class="container"> -->
                    <div class="row" style="background-color: rgba(255,255,255,0.2);padding:5px">
                        <?php
                        $sql2 = "SELECT * FROM `tbl_brand` WHERE `brand_status` = '1' ORDER BY brand_sort ASC";
                    	$result2 = mysqli_query($dbcon,$sql2) or die ('error 404');
                        while($row2 = mysqli_fetch_assoc($result2)){
                            $brand_code = strtoupper($row2['brand_code']);
                            $brand_name = strtoupper($row2['brand_name']);
                            $brand_image =$row2['brand_bg_image'];
                            $brand_url = $row2['brand_url'];
                            
                //     echo '<div class="col-lg-3 col-md-4 col-sm-4 col-12" style="text-align: center;margi:0.5%;">
                //   <div style="margin:0.5% !important;box-shadow: 0px 0px 3px rgba(0, 0, 0,0.2);min-height:100%;padding:0.5%">
                //     <a href="brand-collections/'.$brand_url.'"><div id="pcontainer-about-brand">
                //       <img class="img img-responsive" src="assets/images/brand/'.$brand_image.'" alt="'.$brand_image.'" style="width:50%;height:100px;">
                //       <!--a class="btn btn-dark btn-sm" style="border-radius:0px" href="brand-collections/'.$brand_url.'">View Details</a-->
                //     </div></a>
                //      </div>
                // </div>';
                
                echo    '<div class="col-lg-3 col-md-4 col-sm-4 col-12" style="text-align:center;padding-top:1%;padding-bottom:1%;">
                                        <a href="brand-collections/'.$brand_url.'" style="text-decoration:none">
                                        <div id="pcontainer-about-brand">
                                        <img class="img img-responsive" src="assets/images/brand/'.$brand_image.'" alt="'.$brand_image.'" style="width:50%;height:100px;">
                                    </div></a>
                                    </div>';
                            }  
                        ?>  	
                    </div>

                </div>
        </div>
   </div>     
</div>
<?php include('footer.php');?>

</body>
</html>

