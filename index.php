<!DOCTYPE html>
<html>
<head>
    <!--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
<meta name="google-site-verification" content="BNNMjX06LlAGPzn3B1GHcOdQJLutnuDvnbYPebJD4C0" />
<?php 
include('includes.php');
$_GET['x'] = 'Home';
include('metaContent.php');
?>
<!--<link rel="stylesheet" href="assets/css/home_content.css">-->
</head>
<body onload="showAdd()">

<?php 
include('menu.php');
?>
</head>
<body>
<!-- Intro with Text Right -->
<?php include('carousel.php');?>
<?php include('about.php');?>

<?php include('categories.php');?>

<?php include('brands.php');?>
<?php include('topStories.php');?>

<?php include('branches.php');?>
<?php include('footer.php');?>
<?php include('overlay-add.php');?>

</body>
</html>
