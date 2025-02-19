<?php
 include('assets/database/config.php');
 include('includes.php');
 $i = 0;
 $subcategory =  $_POST['category'];

$sql_category = "SELECT `subcategory_code` FROM `tbl_subcategory` WHERE `tbl_subcategory`.`subcategory_url` = '$subcategory'";
        $result_category = mysqli_query($dbcon,$sql_category) or die ('error 4041');
        while($row = mysqli_fetch_assoc($result_category)){
          $category = $row['subcategory_code'];
          }


$brand =  $_POST['brand'];
$filter = $_POST['filter'];
$showCount = $_POST['showCount'];

if($_POST['showSort'] !== '')
$showSort = '`tbl_product`.`product_name`'.$_POST['showSort'];
else
$showSort = '`tbl_product`.`product_code` ASC';

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

if($priceRange == '_'){
    $query = ''; 
}
else{
    $range = explode ("_", $priceRange);  
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
//FINAL_description_image_issue
//$sql = "SELECT `tbl_product`.`product_status` AS `prod_status`, `tbl_product`.`product_description` AS `prod_desc`, `tbl_product`.`product_features` AS `prod_features`,`tbl_product`.`product_name` AS `prod_name`,  `tbl_product`.`product_price` AS `prod_price`,  `tbl_product`.`product_thumb` AS `prod_thumb`, `tbl_product`.`product_url` AS `prod_url`,`tbl_product`.`product_category`,`tbl_category`.`category_name` AS `cat_name`,`tbl_category`.`category_url` AS `cat_url`,`tbl_product`.`product_brand`,`tbl_brand`.`brand_name` AS `brand_name`,`tbl_brand`.`brand_url` AS `brand_url`FROM `tbl_product` LEFT JOIN `tbl_category` ON `tbl_product`.`product_category` = `tbl_category`.`category_code` LEFT JOIN `tbl_brand` ON `tbl_product`.`product_brand` = `tbl_brand`.`brand_code` WHERE  `tbl_category`.`category_url` LIKE '%$category%' AND `tbl_brand`.`brand_url` LIKE '%$brand%' AND `tbl_brand`.`brand_status` = '1' $query ORDER BY `tbl_product`.`product_price` $showSort";

//SUB CAT SOLVED
// echo $sql = "SELECT DISTINCT `tbl_product`.`product_status` AS `prod_status`, `tbl_product`.`product_features` AS `prod_features`,`tbl_product`.`product_name` AS `prod_name`,  `tbl_product`.`product_price` AS `prod_price`,  `tbl_product`.`product_thumb` AS `prod_thumb`, `tbl_product`.`product_url` AS `prod_url`,`tbl_product`.`product_category`,`tbl_category`.`category_name` AS `cat_name`,`tbl_category`.`category_url` AS `cat_url`,`tbl_product`.`product_brand`,`tbl_brand`.`brand_name` AS `brand_name`,`tbl_brand`.`brand_url` AS `brand_url`
// FROM `tbl_product` 
// LEFT JOIN `master_filter` ON `master_filter`.`product_code` = `tbl_product`.`product_code`
// LEFT JOIN `tbl_category` ON `tbl_product`.`product_category` = `tbl_category`.`category_code` 
// LEFT JOIN `tbl_brand` ON `tbl_product`.`product_brand` = `tbl_brand`.`brand_code` 
// WHERE  `master_filter`.`category` LIKE '%$category%' AND `tbl_brand`.`brand_url` LIKE '%$brand%' AND `tbl_brand`.`brand_status` = '1' AND `tbl_product`.`product_status` = '1' $query ORDER BY $showSort";

$sql = "SELECT DISTINCT `tbl_product`.`product_code`, `tbl_product`.`product_status` AS `prod_status`, `tbl_product`.`product_features` AS `prod_features`,`tbl_product`.`product_name` AS `prod_name`,  `tbl_product`.`product_price` AS `prod_price`,  `tbl_product`.`product_thumb` AS `prod_thumb`, `tbl_product`.`product_url` AS `prod_url`,`tbl_product`.`product_brand`,`tbl_brand`.`brand_name` AS `brand_name`,`tbl_brand`.`brand_url` AS `brand_url`
FROM `tbl_product` 
LEFT JOIN `master_filter` ON `master_filter`.`product_code` = `tbl_product`.`product_code`
LEFT JOIN `tbl_subcategory` ON `tbl_product`.`product_category` = `tbl_subcategory`.`category_code` 
LEFT JOIN `tbl_brand` ON `tbl_product`.`product_brand` = `tbl_brand`.`brand_code` 
WHERE  `master_filter`.`category` LIKE '%$category%' AND `tbl_brand`.`brand_url` LIKE '%$brand%' AND `tbl_brand`.`brand_status` = '1' AND `tbl_product`.`product_status` = '1' $query ORDER BY $showSort";
}
else{
$filter = explode('_', $filter);
$filter = "'" . implode("','", $filter) . "'";

/*19_4_2021*/

$sql_head = "SELECT DISTINCT `f_head_code`,`filter_code` FROM `master_filter` WHERE `filter_code` IN($filter) ORDER BY `f_head_code` DESC";
$result_head = mysqli_query($dbcon,$sql_head) or die ('error 409');
$i=0;$qry = array();$head="";
while($row_head = mysqli_fetch_assoc($result_head)){
 $f_head_code = $row_head['f_head_code'];
 $filter_code = $row_head['filter_code'];
 
 if($f_head_code !== $head)
 {
     $i++;
     $head = $f_head_code;
     $qry[$i] = "`filter_code` =  '".$filter_code."'";
 }
 else{
     $qry[$i] = $qry[$i]." OR `filter_code` =  '".$filter_code."'";
 } 
}

//$pro_qry = 'SELECT DISTINCT `product_code` FROM `master_filter` WHERE `product_code` IN';
$pro_qry = '';
$last_brace = '';
for($k=count($qry);$k>= 1;$k--){
    // echo $qry[$k];
    // echo "<br>";
    
    $last_brace = $last_brace.')';
    
    if($k !== 1)
    $pro_qry = $pro_qry.'(SELECT DISTINCT  `product_code` FROM `master_filter` WHERE'.$qry[$k].'AND `product_code` IN';
    else
    $pro_qry = $pro_qry.'(SELECT DISTINCT  `product_code` FROM `master_filter` WHERE'.$qry[$k];
}
$pro_qry = $pro_qry.$last_brace;
/*19_4_2021*/




// $sql = "SELECT `tbl_product`.`product_status` AS `prod_status`, `tbl_product`.`product_description` AS `prod_desc`, `tbl_product`.`product_features` AS `prod_features`,`tbl_product`.`product_name` AS `prod_name`,  `tbl_product`.`product_price` AS `prod_price`,  `tbl_product`.`product_thumb` AS `prod_thumb`, `tbl_product`.`product_url` AS `prod_url`,`tbl_product`.`product_category`,`tbl_category`.`category_name` AS `cat_name`,`tbl_category`.`category_url` AS `cat_url`,`tbl_product`.`product_brand`,`tbl_brand`.`brand_name` AS `brand_name`,`tbl_brand`.`brand_url` AS `brand_url`FROM `tbl_product` LEFT JOIN `tbl_category` ON `tbl_product`.`product_category` = `tbl_category`.`category_code` LEFT JOIN `tbl_brand` ON `tbl_product`.`product_brand` = `tbl_brand`.`brand_code` WHERE  `tbl_category`.`category_url` LIKE '%$category%' AND `tbl_brand`.`brand_url` LIKE '%$brand%' AND `tbl_brand`.`brand_status` = '1' AND `tbl_product`.`product_code` IN (SELECT `product_code` FROM `master_filter` WHERE `product_code` IN ($pro_qry)) $query ORDER BY `tbl_product`.`product_price` $showSort";

//FINAL_description_image_issue
//$sql = "SELECT `tbl_product`.`product_status` AS `prod_status`, `tbl_product`.`product_description` AS `prod_desc`, `tbl_product`.`product_features` AS `prod_features`,`tbl_product`.`product_name` AS `prod_name`,  `tbl_product`.`product_price` AS `prod_price`,  `tbl_product`.`product_thumb` AS `prod_thumb`, `tbl_product`.`product_url` AS `prod_url`,`tbl_product`.`product_category`,`tbl_category`.`category_name` AS `cat_name`,`tbl_category`.`category_url` AS `cat_url`,`tbl_product`.`product_brand`,`tbl_brand`.`brand_name` AS `brand_name`,`tbl_brand`.`brand_url` AS `brand_url`FROM `tbl_product` LEFT JOIN `tbl_category` ON `tbl_product`.`product_category` = `tbl_category`.`category_code` LEFT JOIN `tbl_brand` ON `tbl_product`.`product_brand` = `tbl_brand`.`brand_code` WHERE  `tbl_category`.`category_url` LIKE '%$category%' AND `tbl_brand`.`brand_url` LIKE '%$brand%' AND `tbl_brand`.`brand_status` = '1' AND `tbl_product`.`product_status` = '1' AND `tbl_product`.`product_code` IN (SELECT `product_code` FROM `master_filter` WHERE `product_code` IN ($pro_qry)) $query ORDER BY `tbl_product`.`product_price` $showSort";

//echo $sql = "SELECT `tbl_product`.`product_status` AS `prod_status`,  `tbl_product`.`product_features` AS `prod_features`,`tbl_product`.`product_name` AS `prod_name`,  `tbl_product`.`product_price` AS `prod_price`,  `tbl_product`.`product_thumb` AS `prod_thumb`, `tbl_product`.`product_url` AS `prod_url`,`tbl_product`.`product_category`,`tbl_category`.`category_name` AS `cat_name`,`tbl_category`.`category_url` AS `cat_url`,`tbl_product`.`product_brand`,`tbl_brand`.`brand_name` AS `brand_name`,`tbl_brand`.`brand_url` AS `brand_url`FROM `tbl_product` LEFT JOIN `tbl_category` ON `tbl_product`.`product_category` = `tbl_category`.`category_code` LEFT JOIN `tbl_brand` ON `tbl_product`.`product_brand` = `tbl_brand`.`brand_code` WHERE  `tbl_category`.`category_code` LIKE '%$category%' AND `tbl_brand`.`brand_url` LIKE '%$brand%' AND `tbl_brand`.`brand_status` = '1' AND `tbl_product`.`product_status` = '1' AND `tbl_product`.`product_code` IN (SELECT `product_code` FROM `master_filter` WHERE `product_code` IN ($pro_qry)) $query AND `tbl_product`.`product_status` = '1'  ORDER BY $showSort";
//--LEFT JOIN `master_filter` ON `master_filter`.`product_code` = `tbl_product`.`product_code`

//SUB CAT SOLVED
// echo $sql = "SELECT DISTINCT `tbl_product`.`product_status` AS `prod_status`, `tbl_product`.`product_features` AS `prod_features`,`tbl_product`.`product_name` AS `prod_name`, `tbl_product`.`product_price` AS `prod_price`, `tbl_product`.`product_thumb` AS `prod_thumb`, `tbl_product`.`product_url` AS `prod_url`,`tbl_product`.`product_category`,`tbl_category`.`category_name` AS `cat_name`,`tbl_category`.`category_url` AS `cat_url`,`tbl_product`.`product_brand`,`tbl_brand`.`brand_name` AS `brand_name`,`tbl_brand`.`brand_url` AS `brand_url`

// FROM `tbl_product` 
// LEFT JOIN `master_filter` ON `master_filter`.`product_code` = `tbl_product`.`product_code`
// LEFT JOIN `tbl_category` ON `tbl_product`.`product_category` = `tbl_category`.`category_code` 
// LEFT JOIN `tbl_brand` ON `tbl_product`.`product_brand` = `tbl_brand`.`brand_code` WHERE
//  `master_filter`.`category` LIKE '%$category%' AND `tbl_brand`.`brand_url` LIKE '%$brand%' AND `tbl_brand`.`brand_status` = '1' AND `tbl_product`.`product_status` = '1' AND `tbl_product`.`product_code` IN (SELECT `product_code` FROM `master_filter` WHERE `product_code` IN ($pro_qry)) $query AND `tbl_product`.`product_status` = '1'  ORDER BY $showSort";

$sql = "SELECT DISTINCT `tbl_product`.`product_code`, `tbl_product`.`product_status` AS `prod_status`, `tbl_product`.`product_features` AS `prod_features`,`tbl_product`.`product_name` AS `prod_name`, `tbl_product`.`product_price` AS `prod_price`, `tbl_product`.`product_thumb` AS `prod_thumb`, `tbl_product`.`product_url` AS `prod_url`,`tbl_product`.`product_brand`,`tbl_brand`.`brand_name` AS `brand_name`,`tbl_brand`.`brand_url` AS `brand_url`

FROM `tbl_product` 
LEFT JOIN `master_filter` ON `master_filter`.`product_code` = `tbl_product`.`product_code`
LEFT JOIN `tbl_subcategory` ON `tbl_product`.`product_category` = `tbl_subcategory`.`category_code` 
LEFT JOIN `tbl_brand` ON `tbl_product`.`product_brand` = `tbl_brand`.`brand_code` WHERE
 `master_filter`.`category` LIKE '%$category%' AND `tbl_brand`.`brand_url` LIKE '%$brand%' AND `tbl_brand`.`brand_status` = '1' AND `tbl_product`.`product_status` = '1' AND `tbl_product`.`product_code` IN (SELECT `product_code` FROM `master_filter` WHERE `product_code` IN ($pro_qry)) $query AND `tbl_product`.`product_status` = '1'  ORDER BY $showSort";
}
$result = mysqli_query($dbcon,$sql); //or die ('error 409')
$num_rows = mysqli_num_rows($result);
echo '<div class="row" style="min-height: 50vh !important;">';
if(($result)){
    $i=0;
  while($row = mysqli_fetch_assoc($result)){
      $i++;
      $product_name = $row['prod_name'];
      $product_category = $row['cat_name'];
      $product_brand = $row['brand_name'];
      $product_price = $row['prod_price'];
      $product_thumb = $row['prod_thumb'];
      $product_status = $row['prod_status'];
      //$product_description = $row['prod_desc'];
      $product_features = $row['prod_features'];
      $product_url = $row['prod_url'];

      //$product_description_short = explode(".", $product_description);
      //$product_description = $product_description_short[0];
      
      
        if($i == 1)
          echo '<div class="col-12 text-md-left text-center" style="padding-left:2.5% !important;margin-bottom:-2% !important;">Total Product : <label style="color:#f16724"><b>'.$num_rows.'</b></label></div>';
          //  echo $i."--".$from."--".$to."<br>";
          if($i> $from && $i<= $to)
          {echo '
                    <div class="col-lg-3 col-md-4 col-sm-4 col-12" style="text-align: center;margin-top:2%;">
                        <div class="container divLink product-box" style="margin:0.5% !important;min-height:100%;display: flex;flex-direction: column;">
                            <a href="product/'.$product_url.'/">
                            <div id="pcontainer">
                              <img class="img img-responsive" src="assets/images/product_thumb/'.$product_thumb.'" alt="'.$product_name.'" style="width:65%">
                            </div>
                            <div id="pdetails">
                            <p>'.$product_name.'</p>
                            '.$product_features.'
                            </div>
                            </a>
                            <div class="row justify-content-center" style="margin-top:auto;margin-bottom:2.5%">
                                <a class="col-md-6 col-12" id="learnMoreBtn" style="border:1px solid gray;margin:1%;padding:1%;font-size:small" href="product/'.$product_url.'/">Learn More</a>
                                <div class="col-md-5 col-12" style="border:1px solid gray;margin:1%;padding:1%;font-size:small">Price : '.$product_price.' </div>
                            </div>
                        </div>
                    </div>
                ';
              
          }
    }
echo '</div><div class="row" style="margin: 0.5% !important;margin-left: 0.5% !important;margin-top:5vh !important;">
        <ul class="pagination flex-wrap">
          <li class="page-item" id="" style="display:none"><a class="page-link" href="javascript:void(0)" id="" >Previous</a></li>';

          $ipr = ceil($i/$showCount);
          for($j=1;$j<=$ipr;$j++){
            echo '<li class="page-item" id="page_'.$j.'" value="page_'.$j.'"><a class="page-link" href="javascript:void(0)" onclick="make_filter('.$j.')">'.$j.'</a></li>';
          }

echo      '<li class="page-item" id="" style="display:none"><a class="page-link" href="javascript:void(0)" id="">Next</a></li>
        </ul>
      </div>';
}

else if(($result) && $num_rows < 0){
echo '<div class="row" style="margin: auto !important;margin-top:5vh !important;">
    <label style="text-align: center;font-weight:bold">Sorry No Result Found <br>
   Please try searching for something else</label>
  </div>';
}



else{
    echo '<div class="row" style="margin: auto !important;margin-top:5vh !important;">
    <label style="text-align: center;font-weight:bold">Sorry No Result Found <br>
   Please try searching for something else</label>
  </div>';
  }


echo '</div>';
?>

<style type="text/css">
  #pcontainer{
    overflow: hidden !important;
    
    position: static; width:100%;
  }
  #pcontainer img {
  display: block;
  transition: transform .4s;   /* smoother zoom */margin-left: auto;
  margin-right: auto;
}
#pcontainer:hover img {
  transform: scale(1.075);
  transform-origin: 50% 50%;
}
#pdetails p{
    font-size:14px !important;
    font-weight:bold !important;
    text-align:left !important;
}
#pdetails ul{
    padding-left:3% !important;
}
#pdetails li{
    text-align:left !important;
    padding:0px !important;
    margin:0px !important;
    font-size:13px !important;
}
.product-box{
/*-webkit-box-shadow:0px 0px 3px rgba(0, 0, 0,0.2) !important;*/
/*-moz-box-shadow: 0px 0px 3px rgba(0, 0, 0,0.2) !important;*/
/*box-shadow: 0px 0px 3px rgba(0, 0, 0,0.2) !important;*/
border:1px solid lightgray;
}

#learnMoreBtn{
    color:black !important;
    transition: 0.2s;
    padding:0px;
}
#learnMoreBtn:hover{
    background-color:black;
    color:white !important;
    text-decoration:none;
}
</style>
