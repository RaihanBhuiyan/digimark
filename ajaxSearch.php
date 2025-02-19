<?php
 include('assets/database/config.php');
 $i = 0;
  $x = $_POST['keyWord'];
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
      
          <div class="col-12" style="text-align: center;background-color: white;padding:2.5%">
            <div class="container">
            <a href="product/'.$product_url.'">
              <div class="row">
                <div class="col-4 text-right"><img id="selected_text_image_'.$i.'" src="assets/images/product_thumb/'.$product_thumb.'" style="width: 50% !important"></div>
                <div class="col-8">
                  <p id="selected_text_name_'.$i.'" style="width:100% !important;text-align:left;color:#f16724;"> <b>Product :'.$product_name.'</b><br>
                  '.$product_category.': '.$product_brand.'
                  </p>
                </div>
              </div>
            </a>
            </div>
          </div>
      ';
    }

?>
