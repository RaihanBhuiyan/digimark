<!DOCTYPE html>
<html>
<head>
<?php 
include('includes.php');
$slug = str_replace('-', '_', $litePath[2]);
$tbl = 'tbl_'.strtolower($slug);
$code = $litePath[3];
			$sql  = "SELECT * FROM `".$tbl."` WHERE `code`='$code' AND `status` IN('1','2')";
			$result = mysqli_query($dbcon,$sql) or die ('error 404z');
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
		}?>
	<title><?php echo $metaTitle;?></title>		
    <meta name="title" content="<?php echo $metaTitle;?>" />   
	<meta name="description" content="<?php echo $metaDesc;?>" />    
	<meta name="keywords" content= "<?php echo $metaKeywords;?>" />

<style type="text/css">
.row-read-single{
    padding-top: 1.5% !important;
    padding-bottom: 1.5% !important;
    margin:auto;
    background-color: #000000;
    /*background-image: url('assets/images/background/home-stories-bg.jpg');*/
    background-size: cover;
    }
</style>
</head>
<body>
<?php include('menu.php');?>


<div class="row row-read-single" >
<div class="container" style="text-align: justify;">
<h7 style="color: #ffffff"><a href="<?php echo $litePath[2];?>">All <?php echo $litePath[2];?></a> / <?php echo $title;?></h7>
</div>
</div>
<!-- Intro with Text Right -->
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
<?php include('footer.php');?>
<style type="text/css">
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

<script>
// for(var i=0;i<100;i++)
// document.getElementsByClassName("link")[i].innerHTML = "Read Here";
</script>
</body>
</html>