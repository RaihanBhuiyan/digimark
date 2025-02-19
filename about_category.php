<!DOCTYPE html>
<html>
<head>
<?php include('includes.php');
$_GET['x'] = 'products-&-solutions';
include('metaContent.php');
?>
<link rel="stylesheet" href="assets/css/about_content.css">
</head>
<body>
<?php 
include('menu.php');
?>
<div class="row row-about-categories">
<div class="col-12">
<h1 class="heading" style="color: #000000;box-shadow: 0px 0px 3px rgba(0,0,0,0.2);padding:1.5%"><b>Products & Solutions</b></h1>
</div>
</div>
<div class="row row-about-categories-bottom">
	<div class="col-12">        
        <div  class="col-12" style="text-align: left;box-shadow: 0px 0px 3px rgba(0,0,0,0.2);">
                <div class="brand-img-container">
                <!-- <div class="container"> -->
                    <div class="row" style="background-color: rgba(255,255,255,0.2);padding:5px">
                        <?php
                        $sql2 = "SELECT * FROM `tbl_category` WHERE `category_status` = '1'";
                        $result2 = mysqli_query($dbcon,$sql2) or die ('error 404');
                        while($row2 = mysqli_fetch_assoc($result2)){
                            $category_code = strtoupper($row2['category_code']);
                            $category_name = ucfirst($row2['category_name']);
                            $category_image =$row2['category_image'];
                            $category_url = strtoupper($row2['category_url']);

                            echo    
                            '
                            <div class="col-lg-3 col-md-4 col-sm-4 col-12" style="text-align:center;padding-top:1%;padding-bottom:1%;">
                                <a href="collections/'.$category_url.'" style="text-decoration:none">
                                <div id="pcontainer-about-categories">
                                <img src="assets/images/category/'.$category_image.'" alt="'.$category_image.'" style="width:40% !important"><br>
                                        <a href="collections/'.$category_url.'"><h3 style="font-size:2vh;color:#000000">'.$category_name.'</h3></a>
                                </div></a>
                            </div>
                            ';    
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

