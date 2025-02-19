<?php
 include('../assets/database/config.php');
 include('includes.php');
 $product_url = $_POST['url'];
 $sql  = "SELECT COUNT(`id`) AS `RowCount` FROM `tbl_product` WHERE `product_url` = '$product_url'";
	    $result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
			$RowCount = $row['RowCount'];
			}

			if($RowCount == 0){
	    	echo '<label style="color:green">Available</label>';
	    	}else{
	    	echo '<label style="color:red">Not Available</label>';
	    	}
?>