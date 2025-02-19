<!DOCTYPE html>
<html>
<head>
<?php include('includes.php');
$award_title  = $litePath[2];
$sql = "SELECT `award_metaTitle` FROM `tbl_award` WHERE `award_url` = '$award_title'";
$result = mysqli_query($dbcon,$sql) or die ('error 4041');
while($row = mysqli_fetch_assoc($result)){
$award_title = $row['award_metaTitle'];
}

echo '<title>'.$award_title.'</title>';
?>
</head>
<body>
<?php 
include('menu.php');
$x  = $litePath[2];
//if($x=='award'){$x='';$sent_type='award';}
$y  = $litePath[3];
?>

<div class="row row-product-top">
  	<div class="col-12" style="box-shadow: 0px 0px 5px rgba(0,0,0,0.2);">
  		<div class="row" style="padding-left: 0px !important">
	    	<?php
                $sql2 = "SELECT * FROM `tbl_award` WHERE `award_url` LIKE '%$x%'";
                $result2 = mysqli_query($dbcon,$sql2) or die ('error 404');
                    while($row2 = mysqli_fetch_assoc($result2)){
                        $award_code = $row2['award_code'];
                        $award_name = $row2['award_name'];
                        $award_image = $row2['award_image'];
                        $award_desc = $row2['award_desc'];

                        echo '<div class="col-md-4 col-sm-4 col-12" style="text-align:center;margin-top:2.5%;margin-bottom:2.5%;">
                            <img src="assets/images/award/'.$award_image.'" style="width:100%!important;"><br>
                            </div>
                            <div class="col-md-8 col-sm-4 col-12 text-md-left text-left" style="margin-top:7.5%;margin-bottom:2.5%;">
                            <label><b>'.$award_name.'</b></label><br><p style="text-align:justify">'.$award_desc.'</p>
                            <a href="awards">Back To Awards</a>
                            </div>';    
                            }  

	    	?>
	    	
		</div>
	</div>
</div>


<?php include('footer.php');?>

<style type="text/css">
  #pcontainer{
    overflow: hidden !important;
    background-color:transparent;
    padding: auto !important;position: static; width:100%;
  }
  #pcontainer img {
  display: block;
  width:100% !important;
  margin-right: auto;
    background-color:transparent;
}
/*#pcontainer:hover img {*/
/*  transform: scale(1.3);*/
/*  transform-origin: 50% 50%;*/
/*}*/


</style>
<style type="text/css">
.ui-slider .ui-slider-handle{z-index: 1;}
</style>

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


    .row-product-top{
  min-height: 5vh;
  background-color: #ffffff;
  margin-top: 1%;
  margin-bottom: 1%;
  margin-right: 5% !important;
  margin-left: 5% !important;
  }
  .row-product-inner-top{
  min-height: 5vh;
  padding-top: 1.5%;
  padding-bottom: 1%;
  }
  .row-product-bottom{
  min-height: 5vh;
  background-color: #ffffff;
  margin-top: 0%;
  margin-bottom: 1%;
  margin-right: 5% !important;
  margin-left: 5% !important;
  }
  .row-product-inner-bottom{
  min-height: 5vh;
  margin-bottom: 0% !important;
  }
</style>
</body>
</html>