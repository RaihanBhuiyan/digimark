<!DOCTYPE html>
<html>
<head>
<?php include('includes.php');
$_GET['x'] = 'Life-at-Digimark';
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
<h1 class="heading" style="color: #ffffff;box-shadow: 0px 0px 3px rgba(0,0,0,0.2);padding:3%;font-size:4vh !important"><b>Life at Digimark</b></h1>
</div>
</div>
<!-- Intro with Text Right -->
<div class="row row-about-bottom">
	<div class="col-12">
		<div class="col-12" style="box-shadow: 0px 0px 3px rgba(0,0,0,0.2);padding: 1.5%">
<?php
echo '<div class="row" style="background-color: rgba(255,255,255,0.2);padding:5px">';

$sql  = "SELECT `id`,`thumbnail` FROM `tbl_life_at_digimark` WHERE `status` = '1' ORDER BY `id` DESC";
	$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
			$thumbnail = $row['thumbnail'];
			
			echo    '<div class="col-12" style="text-align:center;padding-top:1%;padding-bottom:1%;">
                    <img src="assets/images/life_at_digimark/'.$thumbnail.'" style="width:100%">
                    </div>'; 
		}
echo '</div>';
?>
</div>
</div>
</div>
<?php include('footer.php');?>
<style type="text/css">
    p{
         font-size:16px;
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
</style>
</body>
</html>