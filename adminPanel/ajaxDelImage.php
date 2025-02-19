<?php 
include('../assets/database/config.php');
include('includes.php');

$type = $_POST['type'];
$product = $_POST['product'];
$image = $_POST['image'];

if($type=='products'){
    unlink('../assets/images/products/'.$image);
    
    $sqlget1 = "UPDATE `tbl_product_image` SET `image` = '',`status` = '0' WHERE `product_code` = '$product' AND `image` = '$image'";
	$sqldata1 = mysqli_query($dbcon,$sqlget1) or die ('error 4042X');
	
echo 'Image Deleted';
}
?>