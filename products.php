<!DOCTYPE html>
<html>
<head>
<?php 
include('includes.php');
$x = $catgTitle  = ucfirst($litePath[2]);
$y = $branTitle  = ucfirst($litePath[3]);
$detUrl = '';

$sqlCat = "SELECT `category_code`,`category_name` FROM `tbl_category` WHERE `tbl_category`.`category_url` = '$catgTitle'";
$resultCat = mysqli_query($dbcon,$sqlCat) or die ('error 4041');
if(mysqli_num_rows($resultCat)){
	$detUrl = 'category';
	while($row = mysqli_fetch_assoc($resultCat)){
                $get_category_code = $row['category_code'];
                $get_category_name = $row['category_name'];
	}
}


$sqlSub = "SELECT `subcategory_code` FROM `tbl_subcategory` WHERE `tbl_subcategory`.`subcategory_url` = '$catgTitle'";
$resultSub = mysqli_query($dbcon,$sqlSub) or die ('error 4041');
if(mysqli_num_rows($resultSub)){$detUrl = 'Subcategory';}



// $sql = "SELECT `category_metaTitle` FROM `tbl_category` WHERE `category_url` = '$catgTitle'";
// $result = mysqli_query($dbcon,$sql) or die ('error 4041');
// while($row = mysqli_fetch_assoc($result)){
// $catgTitle = $row['category_metaTitle'];
// }

if($detUrl == 'category'){
    $sql = "SELECT `category_metaTitle` FROM `tbl_category` WHERE `category_url` = '$catgTitle'";
$result = mysqli_query($dbcon,$sql) or die ('error 4041');
while($row = mysqli_fetch_assoc($result)){
$catgTitle = $row['category_metaTitle'];
}
}
elseif($detUrl == 'Subcategory'){
    $sql = "SELECT `subcategory_metaTitle` FROM `tbl_subcategory` WHERE `subcategory_url` = '$catgTitle'";
$result = mysqli_query($dbcon,$sql) or die ('error 4041');
while($row = mysqli_fetch_assoc($result)){
$catgTitle = $row['subcategory_metaTitle'];
}
}

if($branTitle=='')
echo '<title>'.$catgTitle.'</title>';
else
{
$sql = "SELECT `metaTitle` FROM `tbl_brand_wise_subcategory_content` WHERE `brand_url` = '$y' AND `sub_url` = '$x'";
$result = mysqli_query($dbcon,$sql) or die ('error 4041');
while($row = mysqli_fetch_assoc($result)){
$brandTitle = $row['metaTitle'];
}


echo '<title>'.$brandTitle.'</title>';
}
?>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
<style type="text/css">
select {
   -moz-appearance:none;
    -webkit-appearance:none;
    appearance:none;
    width: auto;
    padding-right: 25px !important;
    font-size: 14px;
    line-height: auto;
    background-color: white !important;
    border: 0;
    border-radius: 0px;
    height: auto;
    background: url(http://cdn1.iconfinder.com/data/icons/cc_mono_icon_set/blacks/16x16/br_down.png) no-repeat right transparent;
    -webkit-appearance: none;
    background-position-x: 90% !important;
}
</style>
</head>
<body onload="filter()">
<?php 
include('menu.php');
$x  = $litePath[2];
//if($x=='brand'){$x='';$sent_type='brand';}
$y  = $litePath[3];
?>
<?php
if($detUrl == 'category'){include('selected_category.php');}
if($detUrl == 'Subcategory'){include('selected_subcategory.php');}
?>
</body>
</html>