<?php
 include('assets/database/config.php');
 include('includes.php');
 $i = 0;
$category =  $_POST['category'];
$brand =  $_POST['brand'];
$filter = $_POST['filter'];
$showCount = $_POST['showCount'];
$showSort = $_POST['showSort'];
$y = $_POST['y'];
$showPage = $_POST['showPage'];
$priceRange = $_POST['priceRange'];

if($showPage !== ''){ 
    $to = $showPage * $showCount;
    $from = $to - $showCount;
}
else{
    $from = 0;
    $to = $showCount;
}

if($priceRange == ','){ 
    $query = '';  
}
else{
    $range = explode (",", $priceRange);  
    $fromPrice = $range[0]; 
    $toPrice = $range[1];

    if($fromPrice !== '' && $toPrice !== '')
    $query = "AND (`tbl_product`.`product_price` BETWEEN $fromPrice AND $toPrice)";
    else if($fromPrice == '' && $toPrice !== '')
    $query = "AND (`tbl_product`.`product_price` BETWEEN 0 AND $toPrice)";
    else if($fromPrice !== '' && $toPrice == '')
    $query = "AND (`tbl_product`.`product_price` >= $fromPrice)";

}


if($filter == null){
$sql = "SELECT  `tbl_product`.`product_status` AS `prod_status`, `tbl_product`.`product_description` AS `prod_desc`,`tbl_product`.`product_name` AS `prod_name`,  `tbl_product`.`product_price` AS `prod_price`,  `tbl_product`.`product_thumb` AS `prod_thumb`, `tbl_product`.`product_url` AS `prod_url`,`tbl_product`.`product_category`,`tbl_category`.`category_name` AS `cat_name`,`tbl_category`.`category_url` AS `cat_url`,`tbl_product`.`product_brand`,`tbl_brand`.`brand_name` AS `brand_name`,`tbl_brand`.`brand_url` AS `brand_url`FROM `tbl_product` LEFT JOIN `tbl_category` ON `tbl_product`.`product_category` = `tbl_category`.`category_code` LEFT JOIN `tbl_brand` ON `tbl_product`.`product_brand` = `tbl_brand`.`brand_code` WHERE  `tbl_category`.`category_url` LIKE '%$category%' AND `tbl_brand`.`brand_url` LIKE '%$brand%' $query ORDER BY `tbl_product`.`product_price` $showSort";
}
else{
$sql2 = "SELECT `category_code` FROM `tbl_category` WHERE `category_status` = '1' AND `category_url` = '$category'";
$result2 = mysqli_query($dbcon,$sql2) or die ('error 404');
while($row2 = mysqli_fetch_assoc($result2)){
$category_code = strtoupper($row2['category_code']);
}

  $filter_head_type = '';$piv_col_name = '';$piv_where_clause = '';
  $filter = explode(',', $filter);
//echo $filter = '"' . implode("','", $filter) . '"';

$sql_FC = "SELECT DISTINCT `f_head_code` FROM `master_filter` WHERE `category`= '$category_code'";
$result_FC = mysqli_query($dbcon,$sql_FC) or die ('error 4042');
$i = 0;$piv_col_name = '';$piv_where_clause = '';
      while($row_FC = mysqli_fetch_assoc($result_FC)){
        $filter_head_code = $row_FC['f_head_code'];
    for($x = 0;$x<count($filter);$x++){
        $check = $filter[$x];
          $sql_select_filter = "SELECT DISTINCT `f_head_code` FROM `master_filter` WHERE `filter_code` = '$check'"; 
          $result_select_filter = mysqli_query($dbcon,$sql_select_filter) or die ('error 4044X');
            while($row_select_filter = mysqli_fetch_assoc($result_select_filter)){
               $filter_head_type = $row_select_filter['f_head_code'];
                if($filter_head_type == $filter_head_code){ 
                  //echo "<br>";
                   $piv_col_name = $piv_col_name.",MAX((CASE WHEN `f_head_code` = '".$filter_head_code."' THEN `filter_code` ELSE NULL END)) AS `".$filter_head_code."` ";
                  //echo "<br>";
                   $piv_where_clause = $piv_where_clause." AND `PTable`.`".$filter_head_code."` LIKE '%".$filter[$x]."%' "; 
                }
            }
    }
}

   $sql="SELECT  `tbl_product`.`product_status` AS `prod_status`, `tbl_product`.`product_description` AS `prod_desc`,`tbl_product`.`product_name` AS `prod_name`,  `tbl_product`.`product_price` AS `prod_price`,  `tbl_product`.`product_thumb` AS `prod_thumb`, `tbl_product`.`product_url` AS `prod_url`,`tbl_product`.`product_category`,`tbl_category`.`category_name` AS `cat_name`,`tbl_category`.`category_url` AS `cat_url`,`tbl_product`.`product_brand`,`tbl_brand`.`brand_name` AS `brand_name`,`tbl_brand`.`brand_url` AS `brand_url` FROM `tbl_product` LEFT JOIN `tbl_category` ON `tbl_product`.`product_category` = `tbl_category`.`category_code` LEFT JOIN `tbl_brand` ON `tbl_product`.`product_brand` = `tbl_brand`.`brand_code` WHERE  `tbl_category`.`category_url` LIKE '%$category%' AND `tbl_brand`.`brand_url` LIKE '%$brand%' AND `tbl_product`.`product_code` IN (SELECT `product_code` FROM(SELECT `product_code`,`category` $piv_col_name FROM `master_filter` GROUP BY `product_code`)AS `PTable`WHERE `PTable`.`category` = '$category_code' $piv_where_clause) $query  ORDER BY `tbl_product`.`product_price` $showSort";
}
echo '<div class="row" style="min-height: 50vh !important;">';
$result = mysqli_query($dbcon,$sql) or die ('error 409');

if(!empty($result)){
  while($row = mysqli_fetch_assoc($result)){
      $i++;
      $product_name = $row['prod_name'];
      $product_category = $row['cat_name'];
      $product_brand = $row['brand_name'];
      $product_price = $row['prod_price'];
      $product_thumb = $row['prod_thumb'];
      $product_status = $row['prod_status'];
      $product_description = $row['prod_desc'];
      $product_url = $row['prod_url'];

      $product_description_short = explode(".", $product_description);
      $product_description = $product_description_short[0];

      if($i> $from && $i<= $to && $product_status == '1')
      {echo '
      <div class="col-3" style="text-align: center;background-color: transparent">
            <img id="selected_text_image_'.$i.'" src="assets/images/product_thumb/'.$product_thumb.'">
            <p id="selected_text_name_'.$i.'">Product : '.$product_name.'</p>
            <p id="selected_text_price_'.$i.'" value="'.$product_price.'">Price : '.$product_price.' BDT</p>
            <input type="number" id="selected_qty_'.$i.'" name="quantity" min="1" max="10" value="1" style="text-align:center">
            <input style="display:none" type="text" id="y" value="'.$y.'">
            <input style="display:none" type="text" id="selected_name_'.$i.'" value="'.$product_name.'">
            <input style="display:none" type="text" id="selected_uprice_'.$i.'" value="'.$product_price.'">
            <input style="display:none" type="text" id="selected_brand_'.$i.'" value="'.$product_brand.'">
            <input style="display:none" type="text" id="selected_image_'.$i.'" value="assets/images/product_thumb/'.$product_thumb.'"><br>
            <button id="'.$i.'_'.$y.'" onclick="choosedItem(this.id)"  style="background-color: #f16724;color:white;margin:2%">Choose Item</button>
          </div>
            ';}
    }
echo '</div><div class="row" style="margin: 0.5% !important;margin-top:10vh !important;">              
        <ul class="pagination">
          <li class="page-item" id="" style="display:none"><a class="page-link" href="javascript:void(0)" id="" >Previous</a></li>';

          $ipr = ceil($i/$showCount);
          for($j=1;$j<=$ipr;$j++){
            echo '<li class="page-item" id="page_'.$j.'"><a class="page-link" href="javascript:void(0)" onclick="getPage('.$j.')">'.$j.'</a></li>';
          }

echo      '<li class="page-item" id="" style="display:none"><a class="page-link" href="javascript:void(0)" id="">Next</a></li>
        </ul>
      </div>';
}else{
    echo '<h3 style="text-align: center;margin-top:5%">Sorry No Result Found</h3>
  <h3 style="text-align: center;font-size: 16px">Please try searching for something else</h3>';
  }


echo '</div>';
?>

<style type="text/css">
  #pcontainer{
    overflow: hidden !important;
    padding: auto !important;position: static; width:100%;
  }
  #pcontainer img {
  display: block;
  transition: transform .4s;   /* smoother zoom */margin-left: auto;
  margin-right: auto;
}
#pcontainer:hover img {
  transform: scale(1.3);
  transform-origin: 50% 50%;
}


</style>


