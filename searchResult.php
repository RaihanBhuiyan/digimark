<!DOCTYPE html>
<html>
<head>
<?php include('includes.php');?>
</head>
<body>
<?php 
include('menu.php');
?>

<div class="row row-product-bottom" style="margin-top:2%">
	<div class="col-12" style="box-shadow: 0px 0px 5px rgba(0,0,0,0.2);">
		<div class="row row-product-inner-bottom">
			<div class="col-12">
				<div id="displayDiv">
					<h3 style="margin: 2.5%;">Search Result for "<?php echo $litePath[2];?>"</h3>
					<div class="row" style="min-height: 50vh !important;">
					    <?php
 include('assets/database/config.php');
 $i = 0;
  $x = $litePath[2];//$_POST['keyWord'];
  $sql = "SELECT  `tbl_product`.`product_description` AS `prod_desc`,`tbl_product`.`product_name` AS `prod_name`,  `tbl_product`.`product_price` AS `prod_price`,  `tbl_product`.`product_thumb` AS `prod_thumb`, `tbl_product`.`product_url` AS `prod_url`,`tbl_product`.`product_category`,`tbl_category`.`category_name` AS `cat_name`,`tbl_category`.`category_url` AS `cat_url`,`tbl_product`.`product_brand`,`tbl_brand`.`brand_name` AS `brand_name`,`tbl_brand`.`brand_url` AS `brand_url`FROM `tbl_product` LEFT JOIN `tbl_category` ON `tbl_product`.`product_category` = `tbl_category`.`category_code` LEFT JOIN `tbl_brand` ON `tbl_product`.`product_brand` = `tbl_brand`.`brand_code` WHERE  `tbl_category`.`category_url` LIKE '%$x%' OR `tbl_brand`.`brand_url` LIKE '%$x%' OR `tbl_product`.`product_name` LIKE '%$x%'";
$result = mysqli_query($dbcon,$sql) or die ('error 404');
    while($row = mysqli_fetch_assoc($result)){
      $i++;
      $product_name = $row['prod_name'];
      $product_category = $row['cat_name'];
      $product_brand = $row['brand_name'];
      $product_price = $row['prod_price'];
      $product_thumb = $row['prod_thumb'];
      $product_description = $row['prod_desc'];
      $product_url = $row['prod_url'];

      $product_description_short = explode(".", $product_description);
      $product_description = $product_description_short[0];
      echo '
      
          <div class="col-lg-2 col-md-3 col-sm-4 col-12" style="text-align: center;">
                  <div class="container divLink" style="margin:2.5% !important">
                    <a href="product/'.$product_url.'/">
                    <div id="pcontainer">
                      <img class="img img-responsive" src="assets/images/product_thumb/'.$product_thumb.'"><br>
                       <label>'.$product_name.'</label>
                    </div>
                    </a>
                  </div>
                </div>
      ';
    }

?>
					</div>
				</div>
			</div>
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