<!DOCTYPE html>
<html>
<head>
<?php include('includes.php');
$_GET['x'] = 'CEO-Speech';
include('metaContent.php');
?>
<link rel="stylesheet" href="assets/css/about_content.css">
<style type="text/css">
/*.row-about{*/
  /*  padding-top: 1.5% !important;*/
  /*  padding-bottom: 0% !important;*/
  /*  margin-right: 5% !important;*/
  /*margin-right: 5% !important;*/
  /*margin-left: 5% !important;*/
  /*  background-color: #ffffff;*/
    /*background-image: url('assets/images/management1.jpg');
    background-size: cover;*/
    /*}*/
</style>
</head>
<body>
<?php 
include('menu.php');
?>

<div class="row row-about">
<div class="col-12"  style="background-image:url('assets/images/background/about_head_bg.jpg');background-size:cover">
<h1 class="heading" style="color: #ffffff;box-shadow: 0px 0px 3px rgba(0,0,0,0.2);padding:3%;font-size:4vh !important"><b>CEO's Speech</b></h1>
</div>
</div>
<!-- Intro with Text Right -->
<div class="row row-about-bottom" style="margin-top:0px;margin-bottom:1%;">
	<div class="col-12" style="text-align: justify;">
		<div class="col-12" style="box-shadow: 0px 0px 3px rgba(0,0,0,0.2);padding: 1.5%">
<?php
$sql  = "SELECT * FROM `tbl_about_section` WHERE `about_code` = 'PG0005' AND `about_status` = '1'";
	$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
			$about_content = $row['about_content'];
			
			echo '<p>'.$about_content.'</p>';
		}
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