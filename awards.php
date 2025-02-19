<!DOCTYPE html>
<html>
<head>
<?php include('includes.php');
$_GET['x'] = 'Awards';
include('metaContent.php');
?>
<link rel="stylesheet" href="assets/css/about_content.css">
</head>
<body>
<?php 
include('menu.php');
?>
<div class="row row-about">
<div class="col-12" style="background-image:url('assets/images/background/about_head_bg.jpg');background-size:cover">
<h1 class="heading" style="color: #ffffff;box-shadow: 0px 0px 3px rgba(0,0,0,0.2);padding:3%;font-size:4vh !important"><b>Award & Certificates</b></h1>
</div>
</div>
<div class="row row-about-bottom">
	<div class="col-12">        
        <div  class="col-12" style="text-align: left;box-shadow: 0px 0px 3px rgba(0,0,0,0.2);">
                <div class="brand-img-container">
                <!-- <div class="container"> -->
                    <div class="row" style="background-color: rgba(255,255,255,0.2);padding:5px">
                        <?php
                        $sql2 = "SELECT * FROM `tbl_award` WHERE `award_status` = '1'";
                    	$result2 = mysqli_query($dbcon,$sql2) or die ('error 404');
                        while($row2 = mysqli_fetch_assoc($result2)){
                            $award_code = strtoupper($row2['award_code']);
                            $award_url = strtolower($row2['award_url']);
                            $award_name = $row2['award_name'];
                            $award_image = $row2['award_image'];

                            echo    '<div class="col-lg-2 col-md-3 col-sm-4 col-12" style="text-align:center;padding-top:1%;padding-bottom:1%;">
                                        <a href="award-details/'.$award_url.'" style="text-decoration:none">
                                        <div id="pcontainer-award">
                                        <img src="assets/images/award/'.$award_image.'"><br>
                                        <h3 style="font-size:2vh;color:black">'.$award_name.'</h3>
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

