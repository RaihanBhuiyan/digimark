<?php
include('../assets/database/config.php');
include('includes.php');


$listType = $_POST['listType'];
$tagCategory = $_POST['tagCategory'];

if($listType == 'category'){
		$i = 0;
		echo '<table id="example" class="display" style="width:100%"><thead><tr><th>Sl</th><th>Value</th><th>URL</th><th>Sort</th><th>Menu Sort</th><th>Status</th><th>Last Update</th><th>Update By</th><th>Edit</th></tr></thead><tbody>';
		//$sql  = "SELECT * FROM `tbl_category` ORDER BY `category_name` ASC";
		$sql  = "SELECT *,`master_user`.`userName` AS `lastUpdate` FROM `tbl_category` JOIN `master_user` ON `tbl_category`.`cr_by` = `master_user`.`userCode` ORDER BY `category_name` ASC";
		
		$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
				$i++;
			$category_code = $row['category_code'];
			$category_name = $row['category_name'];
			$category_url = $row['category_url'];
			$status = $row['category_status'];
			$sort = $row['category_sort'];
			$menu_sort = $row['menu_sort'];
			$updateOn = $row['cr_date'];
			$lastUpdate = $row['lastUpdate'];
            
			echo '
			<tr>
				<td>'.$i.'</td>
				<td>'.$category_name.'</td>
				<td>'.$category_url.'</td>
				<td>'.$sort.'</td>
				<td>'.$menu_sort.'</td>
				<td>';
					if($status == 1){echo "Active";} 
              		else{ echo "Inactive";}
              	echo '</td>
				<td>'.date("d/m/Y", strtotime($updateOn)).'</td>
				<td>'.$lastUpdate.'</td>
				<td><a href="Category/'.$category_code.'">Edit</a></td>
			</tr>
			';
			}
			echo '</tbody></table>';
}
else if($listType == 'subcategory'){
		$i = 0;
		echo '<table id="example" class="display" style="width:100%"><thead><tr><th>Sl</th><th>Category</th><th>Subcategory</th><th>URL</th><th>Sort</th><th>Menu Sort</th><th>Status</th><th>Last Update</th><th>Update By</th><th>Edit</th></tr></thead><tbody>';
		//$sql  = "SELECT * FROM `tbl_category` ORDER BY `category_name` ASC";
		$sql  = "SELECT *,`master_user`.`userName` AS `lastUpdate`,`tbl_category`.`category_code` AS `category_code`,`tbl_category`.`category_name` AS `category_name` FROM `tbl_subcategory` 
		JOIN `tbl_category` ON `tbl_category`.`category_code` = `tbl_subcategory`.`category_code` 
		LEFT JOIN `master_user` ON `tbl_subcategory`.`cr_by` = `master_user`.`userCode` ORDER BY `subcategory_name` ASC";
		
		$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
				$i++;
			$category_code = $row['category_code'];
			$category_name = $row['category_name'];
			$subcategory_code = $row['subcategory_code'];
			$subcategory_name = $row['subcategory_name'];
			$subcategory_url = $row['subcategory_url'];
			$status = $row['subcategory_status'];
			$sort = $row['subcategory_sort'];
			$menu_sort = $row['menu_sort'];
			$updateOn = $row['cr_date'];
			$lastUpdate = $row['lastUpdate'];
            
			echo '
			<tr>
				<td>'.$i.'</td>
				<td>'.$category_name.'</td>
				<td>'.$subcategory_name.'</td>
				<td>'.$subcategory_url.'</td>
				<td>'.$sort.'</td>
				<td>'.$menu_sort.'</td>
				<td>';
					if($status == 1){echo "Active";} 
              		else{ echo "Inactive";}
              	echo '</td>
				<td>'.date("d/m/Y", strtotime($updateOn)).'</td>
				<td>'.$lastUpdate.'</td>
				<td><a href="subcategory/'.$subcategory_code.'">Edit</a></td>
			</tr>
			';
			}
			echo '</tbody></table>';
}
else if($listType == 'brand'){
		$i = 0;
		echo '<table id="example" class="display" style="width:100%"><thead><tr><th>Sl</th><th>Value</th><th>URL</th><th>Sort</th><th>Status</th><th>Last Update</th><th>Update By</th><th>Edit</th></tr></thead><tbody>';
		//$sql  = "SELECT * FROM `tbl_brand` ORDER BY `brand_name` ASC";
		$sql  = "SELECT *,`master_user`.`userName` AS `lastUpdate` FROM `tbl_brand` JOIN `master_user` ON `tbl_brand`.`cr_by` = `master_user`.`userCode`  ORDER BY `brand_name` ASC";
		$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
				$i++;
			$brand_code = $row['brand_code'];
			$brand_name = $row['brand_name'];
			$brand_url = $row['brand_url'];
			$status = $row['brand_status'];
			$sort = $row['brand_sort'];

			$updateOn = $row['cr_date'];
			$lastUpdate = $row['lastUpdate'];
			
			echo '
			<tr>
				<td>'.$i.'</td>
				<td>'.$brand_name.'</td>
				<td>'.$brand_url.'</td>
				<td>'.$sort.'</td>
				<td>';if($status == 1){echo "Active";} 
              else{ echo "Inactive";}echo '</td>
				<td>'.date("d/m/Y", strtotime($updateOn)).'</td>
				<td>'.$lastUpdate.'</td>
				<td><a href="Brand/'.$brand_code.'">Edit</a></td>
			</tr>
			';
			}
			echo '</tbody></table>';
}
else if($listType == 'about'){
		$i = 0;
		echo '<table id="example" class="display" style="width:100%"><thead><tr><th>Sl</th><th>Page</th><th>Status</th><th>Edit</th></tr></thead><tbody>';
		$sql  = "SELECT * FROM `tbl_about_section` ORDER BY `id` ASC";
		$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
				$i++;
			$about_code = $row['about_code'];
			$about_page = $row['about_page'];
			$about_content = $row['about_content'];
			$status = $row['about_status'];

			echo '
			<tr>
				<td>'.$i.'</td>
				<td>'.$about_page.'</td>
				<td>';if($status == 1){echo "Active";} 
              else{ echo "Inactive";}echo '</td>
				<td><a href="About/'.$about_code.'">Edit</a></td>
			</tr>
			';
			}
			echo '</tbody></table>';
}
else if($listType == 'Meta-Content'){
		$i = 0;
		echo '<table id="example" class="display" style="width:100%"><thead><tr><th>Sl</th><th>Page</th><th>Status</th><th>Edit</th></tr></thead><tbody>';
		$sql  = "SELECT * FROM `tbl_meta_content` ORDER BY `id` ASC";
		$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
				$i++;
			$code = $row['code'];
			$page = $row['page'];
			$content = $row['content'];
			$status = $row['status'];

			echo '
			<tr>
				<td>'.$i.'</td>
				<td>'.$page.'</td>
				<td>';if($status == 1){echo "Active";} 
              else{ echo "Inactive";}echo '</td>
				<td><a href="Meta-Content/'.$code.'">Edit</a></td>
			</tr>
			';
			}
			echo '</tbody></table>';
}
else if($listType == 'award'){
		$i = 0;
		echo '<table id="example" class="display" style="width:100%"><thead><tr><th>Sl</th><th>Title</th><th>URL</th><th>Status</th><th>Edit</th></tr></thead><tbody>';
		$sql  = "SELECT * FROM `tbl_award` ORDER BY `award_name` ASC";
		$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
				$i++;
			$award_code = $row['award_code'];
			$award_name = $row['award_name'];
			$award_url = $row['award_url'];
			$status = $row['award_status'];

			echo '
			<tr>
				<td>'.$i.'</td>
				<td>'.$award_name.'</td>
				<td>'.$award_url.'</td>
				<td>';if($status == 1){echo "Active";} 
              else{ echo "Inactive";}echo '</td>
				<td><a href="Award/'.$award_code.'">Edit</a></td>
			</tr>
			';
			}
			echo '</tbody></table>';
}

else if($listType == 'filterHead'){
	$i = 0;
		echo '<table id="example" class="display" style="width:100%"><thead><tr><th>Sl</th><th>Value</th><th>Status</th><th>Edit</th></tr></thead><tbody>';
		$sql  = "SELECT * FROM `master_filter_head` ORDER BY `f_head_name` ASC";
		$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
				$i++;
			$f_head_code = $row['f_head_code'];
			$f_head_name = $row['f_head_name'];
			$status = $row['status'];

			echo '
			<tr>
				<td>'.$i.'</td>
				<td>'.$f_head_name.'</td>
				<td>';if($status == 1){echo "Active";} 
              else{ echo "Inactive";}echo '</td>
				<td><a href="Filter-Head/'.$f_head_code.'">Edit</a></td>
			</tr>
			';
			}
			echo '</tbody></table>';
}

// `tbl_product`.`product_code` AS `product_code`,`tbl_product`.`product_name` AS `product_name`,`tbl_product`.`product_category_code` AS `product_category_code`,`tbl_product`.`product_brand_code` AS `product_brand_code`,`tbl_product`.`product_price` AS `product_price`,`tbl_product`.`product_discount` AS `product_discount`,`tbl_product`.`product_remark` AS `product_remark`,`tbl_product`.`product_url` AS `product_url`,`tbl_product`.`product_status` AS `product_status`

else if($listType == 'product'){
	$i = 0;
// 		echo '<table id="example" class="display" style="width:100%">
// 		<thead><tr><th>Sl</th><th>Product Code</th><th>Product Name</th><th>Category</th><th>Brand</th><th>Price</th><th>Discount</th><th>Remark</th><th>Features</th><th>Description</th><th>Product URL</th><th>Status</th><th>Edit</th></tr></thead><tbody>';
		echo '<table id="example" class="display" style="width:100%">
		<thead><tr><th>Sl</th><th>Product Code</th><th>Product Name</th><th>Category</th><th>Brand</th><th>Price</th><th>Discount</th><th>Product URL</th><th>Status</th><th>Last Update</th><th>Update By</th><th>Edit</th></tr></thead><tbody>';
		/*$sql  = "SELECT `tbl_product`.`product_code` AS `product_code`,`tbl_product`.`product_name` AS `product_name`,`tbl_product`.`product_category` AS `product_category_code`,`tbl_product`.`product_brand` AS `product_brand_code`,`tbl_product`.`product_price` AS `product_price`,`tbl_product`.`product_discount` AS `product_discount`,`tbl_product`.`product_remark` AS `product_remark`,`tbl_product`.`product_url` AS `product_url`,`tbl_product`.`product_status` AS `product_status`,`tbl_category`.`category_name` AS `product_category_name`, `tbl_brand`.`brand_name`  AS `product_brand_name` FROM `tbl_product` 
				LEFT JOIN  `tbl_category` ON  `tbl_category`.`category_code` = `tbl_product`.`product_category` 
				LEFT JOIN  `tbl_brand` ON  `tbl_brand`.`brand_code` = `tbl_product`.`product_brand` 
				ORDER BY `tbl_product`.`product_name` ASC";*/
		$sql  = "SELECT `tbl_product`.`product_code` AS `product_code`,`tbl_product`.`product_name` AS `product_name`,`tbl_product`.`product_category` AS `product_category_code`,`tbl_product`.`product_brand` AS `product_brand_code`,`tbl_product`.`product_price` AS `product_price`,`tbl_product`.`product_discount` AS `product_discount`,`tbl_product`.`product_remark` AS `product_remark`,`tbl_product`.`product_url` AS `product_url`,`tbl_product`.`product_status` AS `product_status`,`tbl_category`.`category_name` AS `product_category_name`, `tbl_brand`.`brand_name`  AS `product_brand_name`,`tbl_product`.`cr_date` AS `cr_date`,`master_user`.`userName` AS `lastUpdate` FROM `tbl_product` 
				LEFT JOIN  `tbl_category` ON  `tbl_category`.`category_code` = `tbl_product`.`product_category` 
				LEFT JOIN  `tbl_brand` ON  `tbl_brand`.`brand_code` = `tbl_product`.`product_brand` 
				LEFT JOIN `master_user` ON `tbl_product`.`cr_by` = `master_user`.`userCode`
				ORDER BY `tbl_product`.`product_name` ASC";
		$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
				$i++;
			$product_code = $row['product_code'];
			$product_name = $row['product_name'];
			$product_category_code = $row['product_category_code'];
			$product_brand_code = $row['product_brand_code'];
			$product_category_name = $row['product_category_name'];
			$product_brand_name = $row['product_brand_name'];
			$product_price = $row['product_price'];
			$product_discount = $row['product_discount'];
			$product_remark = $row['product_remark'];
			$product_features = $row['product_features'];
			//$product_description = $row['product_description'];
			$product_url = $row['product_url'];
			$status = $row['product_status'];

			$updateOn = $row['cr_date'];
			$lastUpdate = $row['lastUpdate'];
			
			
			echo '
			<tr>
				<td>'.$i.'</td>
				<td>'.$product_code.'</td>
				<td>'.$product_name.'</td>
				<td>'.$product_category_name.'</td>
				<td>'.$product_brand_name.'</td>
				<td>'.$product_price.'</td>
				<td>'.$product_discount.'</td>
				<!--td>'.$product_remark.'</td>
				<td>'.$product_features.'</td>
				<td>'.$product_description.'</td-->
				<td>'.$product_url.'</td>
				<td>';if($status == 1){echo "Active";} 
              else{ echo "Inactive";}echo '</td>
				<td>'.date("d/m/Y", strtotime($updateOn)).'</td>
				<td>'.$lastUpdate.'</td>
				<td><a href="Create-Product/'.$product_code.'">Edit</a></td>
			</tr>
			';
			}
			echo '</tbody></table>';
}

else if($listType == 'Add-Spec'){
	$i = 0;
// 		echo '<table id="example" class="display" style="width:100%">
// 		<thead><tr><th>Sl</th><th>Product Code</th><th>Product Name</th><th>Category</th><th>Brand</th><th>Price</th><th>Discount</th><th>Remark</th><th>Features</th><th>Description</th><th>Product URL</th><th>Status</th><th>Edit</th></tr></thead><tbody>';
		echo '<table id="example" class="display" style="width:100%">
		<thead><tr><th>Sl</th><th>Product Code</th><th>Product Name</th><th>Category</th><th>Brand</th><th>Price</th><th>Discount</th><th>Product URL</th><th>Status</th><th>Edit</th></tr></thead><tbody>';
// 		$sql  = "SELECT *,`tbl_category`.`category_name` AS `product_category_name`, `tbl_brand`.`brand_name`  AS `product_brand_name` FROM `tbl_product` 
// 				LEFT JOIN  `tbl_category` ON  `tbl_category`.`category_code` = `tbl_product`.`product_category` 
// 				LEFT JOIN  `tbl_brand` ON  `tbl_brand`.`brand_code` = `tbl_product`.`product_brand` 
// 				ORDER BY `tbl_product`.`product_name` ASC";  TIME CONSUMING SQL

		$sql  = "SELECT `tbl_product`.`product_code` AS `product_code`,`tbl_product`.`product_name` AS `product_name`,`tbl_product`.`product_category` AS `product_category_code`,`tbl_product`.`product_brand` AS `product_brand_code`,`tbl_product`.`product_price` AS `product_price`,`tbl_product`.`product_discount` AS `product_discount`,`tbl_product`.`product_remark` AS `product_remark`,`tbl_product`.`product_url` AS `product_url`,`tbl_product`.`product_status` AS `product_status`,`tbl_category`.`category_name` AS `product_category_name`, `tbl_brand`.`brand_name`  AS `product_brand_name` FROM `tbl_product` 
				LEFT JOIN  `tbl_category` ON  `tbl_category`.`category_code` = `tbl_product`.`product_category` 
				LEFT JOIN  `tbl_brand` ON  `tbl_brand`.`brand_code` = `tbl_product`.`product_brand` 
				ORDER BY `tbl_product`.`product_name` ASC";
		$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
				$i++;
			$product_code = $row['product_code'];
			$product_name = $row['product_name'];
			$product_category_code = $row['product_category_code'];
			$product_brand_code = $row['product_brand_code'];
			$product_category_name = $row['product_category_name'];
			$product_brand_name = $row['product_brand_name'];
			$product_price = $row['product_price'];
			$product_discount = $row['product_discount'];
			$product_remark = $row['product_remark'];
			$product_features = $row['product_features'];
			//$product_description = $row['product_description'];
			$product_url = $row['product_url'];
			$status = $row['product_status'];
			
			echo '
			<tr>
				<td>'.$i.'</td>
				<td>'.$product_code.'</td>
				<td>'.$product_name.'</td>
				<td>'.$product_category_name.'</td>
				<td>'.$product_brand_name.'</td>
				<td>'.$product_price.'</td>
				<td>'.$product_discount.'</td>
				<!--td>'.$product_remark.'</td>
				<td>'.$product_features.'</td>
				<td>'.$product_description.'</td-->
				<td>'.$product_url.'</td>
				<td>';if($status == 1){echo "Active";} 
              else{ echo "Inactive";}echo '</td>
				<td><a href="Add-Spec/'.$product_code.'">Edit</a></td>
			</tr>
			';
			}
			echo '</tbody></table>';
}
else if($listType == 'Add-Filter'){ 
	$i = 0;
// 		echo '<table id="example" class="display" style="width:100%">
// 		<thead><tr><th>Sl</th><th>Product Code</th><th>Product Name</th><th>Category</th><th>Brand</th><th>Price</th><th>Discount</th><th>Remark</th><th>Features</th><th>Description</th><th>Product URL</th><th>Status</th><th>Edit</th></tr></thead><tbody>';
		echo '<table id="example" class="display" style="width:100%">
		<thead><tr><th>Sl</th><th>Product Code</th><th>Product Name</th><th>Category</th><th>Brand</th><th>Price</th><th>Discount</th><th>Product URL</th><th>Status</th><th>Edit</th></tr></thead><tbody>';
// 		$sql  = "SELECT *,`tbl_category`.`category_name` AS `product_category_name`, `tbl_brand`.`brand_name`  AS `product_brand_name` FROM `tbl_product` 
// 				LEFT JOIN  `tbl_category` ON  `tbl_category`.`category_code` = `tbl_product`.`product_category` 
// 				LEFT JOIN  `tbl_brand` ON  `tbl_brand`.`brand_code` = `tbl_product`.`product_brand` 
// 				ORDER BY `tbl_product`.`product_name` ASC"; TIME CONSUMING SQL

    //     $sql  = "SELECT `tbl_product`.`product_code` AS `product_code`,`tbl_product`.`product_name` AS `product_name`,`tbl_product`.`product_category` AS `product_category_code`,`tbl_product`.`product_brand` AS `product_brand_code`,`tbl_product`.`product_price` AS `product_price`,`tbl_product`.`product_discount` AS `product_discount`,`tbl_product`.`product_remark` AS `product_remark`,`tbl_product`.`product_url` AS `product_url`,`tbl_product`.`product_status` AS `product_status`,`tbl_category`.`category_name` AS `product_category_name`, `tbl_brand`.`brand_name`  AS `product_brand_name` FROM `tbl_product` 
				// LEFT JOIN  `tbl_category` ON  `tbl_category`.`category_code` = `tbl_product`.`product_category` 
				// LEFT JOIN  `tbl_brand` ON  `tbl_brand`.`brand_code` = `tbl_product`.`product_brand` 
				// ORDER BY `tbl_product`.`product_name` ASC";
		
		$sql  = "SELECT `tbl_product`.`product_code` AS `product_code`,`tbl_product`.`product_name` AS `product_name`,`tbl_product`.`product_category` AS `product_category_code`,`tbl_product`.`product_subcategory` AS `product_subcategory_code`,`tbl_product`.`product_brand` AS `product_brand_code`,`tbl_product`.`product_price` AS `product_price`,`tbl_product`.`product_discount` AS `product_discount`,`tbl_product`.`product_remark` AS `product_remark`,`tbl_product`.`product_url` AS `product_url`,`tbl_product`.`product_status` AS `product_status`,`tbl_category`.`category_name` AS `product_category_name`, `tbl_brand`.`brand_name`  AS `product_brand_name` FROM `tbl_product` 
				LEFT JOIN  `tbl_category` ON  `tbl_category`.`category_code` = `tbl_product`.`product_category` 
				LEFT JOIN  `tbl_brand` ON  `tbl_brand`.`brand_code` = `tbl_product`.`product_brand` 
				ORDER BY `tbl_product`.`product_name` ASC";
		$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
				$i++;
			$product_code = $row['product_code'];
			$product_name = $row['product_name'];
			$product_category = $row['product_category_code'];
			$product_subcategory = $row['product_subcategory_code'];
			$product_brand = $row['product_brand_code'];
			$product_category_name = $row['product_category_name'];
			$product_brand_name = $row['product_brand_name'];
			$product_price = $row['product_price'];
			$product_discount = $row['product_discount'];
			$product_remark = $row['product_remark'];
			$product_features = $row['product_features'];
			//$product_description = $row['product_description'];
			$product_url = $row['product_url'];
			$status = $row['product_status'];
			
			echo '
			<tr>
				<td>'.$i.'</td>
				<td>'.$product_code.'</td>
				<td>'.$product_name.'</td>
				<td>'.$product_category_name.'</td>
				<td>'.$product_brand_name.'</td>
				<td>'.$product_price.'</td>
				<td>'.$product_discount.'</td>
				<!--td>'.$product_remark.'</td>
				<td>'.$product_features.'</td>
				<td>'.$product_description.'</td-->
				<td>'.$product_url.'</td>
				<td>';if($status == 1){echo "Active";} 
              else{ echo "Inactive";}echo '</td>
				<td><a href="Add-Filter/'.$product_code.'/'.$product_subcategory.'/'.$product_brand.'">Edit</a></td>
			</tr>
			';
			}
			echo '</tbody></table>';
}
else if($listType == 'Product-Image'){
	$i = 0;
		echo '<table id="example" class="display" style="width:100%">
		<thead><tr><th>Sl</th><th>Product Code</th><th>Product Name</th><th>Product URL</th><th>Status</th><th>Edit</th></tr></thead><tbody>';
		$sql  = "SELECT * FROM  `tbl_product` ORDER BY `id` ASC";
		$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
				$i++;
			$product_code = $row['product_code'];
			$product_name = $row['product_name'];
			$url = $row['product_url'];
			$status = $row['product_status'];
			$crDate = $row['crDate'];
			$crBy = $row['crBy'];

			echo '
			<tr>
				<td>'.$i.'</td>
				<td>'.$product_code.'</td>
				<td>'.$product_name.'</td>
				<td>'.$url.'</td>
				<td>';if($status == 1){echo "Active";} 
              else{ echo "Inactive";}echo '</td>
				<td><a href="Product-Image/'.$product_code.'">Edit</a></td>
			</tr>
			';
			}
			echo '</tbody></table>';
}

else if($listType == 'category-tag'){
	$i = 0;$head_list = '';
		
		$sql  = "SELECT `master_filter_head`.`f_head_name` AS `filter_head_name`, `master_filter_head`.`f_head_code` AS `filter_head_code`,`master_filter_head_with_category`.`filter_cat_code` AS `filter_code`, `master_filter_head`.`status` AS `status`
		 FROM `master_filter_head` 
		JOIN `master_filter_head_with_category` ON `master_filter_head_with_category`.`f_head_code` = `master_filter_head`.`f_head_code` 
		WHERE `master_filter_head_with_category`.`cat_code` = '$tagCategory' AND `master_filter_head_with_category`.`status` = '1'";
		$result = mysqli_query($dbcon,$sql) or die ('error 404');
						while($row = mysqli_fetch_assoc($result)){
							$i++;
						//$f_head_code = $row['filter_code'];
						$f_head_code = $row['filter_head_code'];
						$f_head_name = $row['filter_head_name'];
						$status = $row['status'];
						if($head_list == '')
						$head_list = $head_list.$f_head_code;
						else
						$head_list = $head_list.','.$f_head_code;
			}

			echo '<input type="text" id="head_list" value="'.$head_list.'">';

}
// else if($listType == 'category-tag'){
// 	$i = 0;$head_list = '';
// 		echo '<table id="example" class="display" style="width:100%"><thead><tr><th>Sl</th><th>Allocated Heads</th><th>Status</th></tr></thead><tbody>';
// 		$sql  = "SELECT `master_filter_head`.`f_head_name` AS `filter_head_name`, `master_filter_head`.`f_head_code` AS `filter_head_code`,`master_filter_head_with_category`.`filter_cat_code` AS `filter_code`, `master_filter_head`.`status` AS `status`
// 			 FROM `master_filter_head` 
// 			JOIN `master_filter_head_with_category` ON `master_filter_head_with_category`.`f_head_code` = `master_filter_head`.`f_head_code` 
// 			WHERE `master_filter_head_with_category`.`cat_code` = '$tagCategory' AND `master_filter_head_with_category`.`status` = '1'";
// 		$result = mysqli_query($dbcon,$sql) or die ('error 404');
// 						while($row = mysqli_fetch_assoc($result)){
// 							$i++;
// 						//$f_head_code = $row['filter_code'];
// 						$f_head_code = $row['filter_head_code'];
// 						$f_head_name = $row['filter_head_name'];
// 						$status = $row['status'];
// 						if($head_list == '')
// 						$head_list = $head_list.$f_head_code;
// 						else
// 						$head_list = $head_list.','.$f_head_code;
// 			echo '
// 			<tr>
// 				<td>'.$i.'</td>
// 				<td>'.$f_head_name.'</td>
// 				<td>';if($status == 1){echo "Active";} 
//               else{ echo "Inactive";}echo '</td>
// 			</tr>
// 			';

			
// 			}
// 			echo '<input type="text" id="head_list" value="'.$head_list.'">';
// 			echo '</tbody></table>';
// }


else if($listType == 'specHead'){
	$i = 0;
		echo '<table id="example" class="display" style="width:100%"><thead><tr><th>Sl</th><th>Value</th><th>Status</th><th>Edit</th></tr></thead><tbody>';
		$sql  = "SELECT * FROM `master_spec_head` ORDER BY `spec_head_name` ASC";
		$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
				$i++;
			$spec_head_code = $row['spec_head_code'];
			$spec_head_name = $row['spec_head_name'];
			$status = $row['status'];

			echo '
			<tr>
				<td>'.$i.'</td>
				<td>'.$spec_head_name.'</td>
				<td>';if($status == 1){echo "Active";} 
              else{ echo "Inactive";}echo '</td>
				<td><a href="Spec-Head/'.$spec_head_code.'">Edit</a></td>
			</tr>
			';
			}
}

else if($listType == 'specSubhead'){
	$i = 0;
		echo '<table id="example" class="display" style="width:100%"><thead><tr><th>Sl</th><th>Value</th><th>Status</th><th>Edit</th></tr></thead><tbody>';
		$sql  = "SELECT * FROM `master_spec_subhead` ORDER BY `spec_subhead_name` ASC";
		$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
				$i++;
			$spec_subhead_code = $row['spec_subhead_code'];
			$spec_subhead_name = $row['spec_subhead_name'];
			$status = $row['status'];

			echo '
			<tr>
				<td>'.$i.'</td>
				<td>'.$spec_subhead_name.'</td>
				<td>';if($status == 1){echo "Active";} 
              else{ echo "Inactive";}echo '</td>
				<td><a href="Spec-Subhead/'.$spec_subhead_code.'">Edit</a></td>
			</tr>
			';
			}
}

else if($listType == 'specTable'){
	$productCode = $_POST['productCode'];
	$i = 0;
		echo '<table id="example" class="display" style="width:100%">
		<thead><tr><th>Sl</th><th>Spec Title</th><!--th>Details</th--><th>Status</th><th>Edit</th></tr></thead><tbody>';
		$sql  = "SELECT *,`tbl_product_spec`.`status` AS `spec_status`,`master_spec_head`.`spec_head_name` AS `spec_head_name` FROM `tbl_product_spec` JOIN `master_spec_head` ON
		    `master_spec_head`.`spec_head_code` = `tbl_product_spec`.`spec_head_code` 
		    WHERE `tbl_product_spec`.`product_code` = '$productCode' ORDER BY `tbl_product_spec`.`spec_head_code` ASC";
		$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
				$i++;
			$spec_code = $row['spec_code'];
			$product_code = $row['product_code'];
			$product_spec_head_code = $row['spec_head_code'];
			//$product_spec_subhead_code = $row['spec_subhead_code'];
			$product_spec_head_name = $row['spec_head_name'];
			$details = $row['details'];
			$status = $row['spec_status'];

			echo '
			<tr>
				<td>'.$i.'</td>
				<td>'.$product_spec_head_name.'</td>
				<!--td>'.$details.'</td-->
				<td>';if($status == 1){echo "Active";} 
              else{ echo "Inactive";}echo '</td>
				<td><a href="Add-Spec/'.$product_code.'/'.$spec_code.'">Edit</a></td>
			</tr>
			';
			}
}


$dtype = $_POST['dtype'];
$category = $_POST['category'];

if($dtype == 'category'){
echo '<select name="fhead" class="form-control select2" id="fhead" onchange="filter_for_head(this.value)">
		<option value="">--Select Filter Group--</option>';
	$sql  = "SELECT `master_filter_head`.`f_head_name` AS `filter_head_name`,`master_filter_head_with_category`.`filter_cat_code` AS `filter_code` FROM `master_filter_head` 
JOIN `master_filter_head_with_category` ON `master_filter_head_with_category`.`f_head_code` = `master_filter_head`.`f_head_code` 
WHERE `master_filter_head_with_category`.`cat_code` = '$category' AND `master_filter_head_with_category`.`status` = '1'";
		$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
			$f_head_code = $row['filter_code'];
			$f_head_name = $row['filter_head_name'];
			echo '<option value='.$f_head_code.'>'.$f_head_name.'</option>';
			// echo '
			// <input type="radio" id="fhead" name="fhead" value="'.$f_head_code.'" onclick="filter_for_head(this.value)">
			// <label for="fhead">'.$f_head_name.'</label><br>
			// ';
			}
			echo "</select>";
}
// 	else if($dtype == 'value'){
// 		$i = 0;
// 		echo '<table id="example" class="display" style="width:100%"><thead><tr><th>Sl</th><th>Value</th><th>Status</th><th>Action</th></tr></thead><tbody>';
// 		$sql  = "SELECT * FROM `master_filter_value` WHERE `filter_cat_code` = '$category'";
// 		$result = mysqli_query($dbcon,$sql) or die ('error 404');
// 			while($row = mysqli_fetch_assoc($result)){
// 				$i++;
// 			$filter_code = $row['filter_code'];
// 			$filter_value = $row['filter_value'];
// 			$status = $row['status'];

// 			echo '
// 			<tr>
// 				<td>'.$i.'</td>
// 				<td>'.$filter_value.'</td>
// 				<td>';if($status == 1){echo "Active";} 
//               else{ echo "Inactive";}echo '</td>
// 				<td><a href="javascript:void(0)" id="'.$filter_value.'" onclick="editValue(this.id)">Edit</a></td>
// 			</tr>
// 			';
// 			}
// 			echo '</tbody></table>';
// 	}
	else if($dtype == 'value'){
		$i = 0;
		echo '<table id="example" class="display" style="width:100%"><thead><tr><th>Sl</th><th>code</th><th>Value</th><th>Status</th><th>Action</th></tr></thead><tbody>';
		$sql  = "SELECT * FROM `master_filter_value` WHERE `filter_cat_code` = '$category'";
		$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
				$i++;
			$filter_code = $row['filter_code'];
			$filter_value = $row['filter_value'];
			$status = $row['status'];

			echo '
			<tr>
				<td>'.$i.'</td>
				<td>'.$filter_code.'</td>
				<td>'.$filter_value.'</td>
				<td>';if($status == 1){echo "Active";} 
              else{ echo "Inactive";}echo '</td>
				<td><a href="javascript:void(0)" id="'.$filter_code.'" data-value="'.$filter_value.'" data-code="'.$filter_code.'" onclick="editValue(this.id)">Edit</a></td>
			</tr>
			';
			}
			echo '</tbody></table>';
	}


else if($listType == 'branch'){
		$i = 0;
		echo '<table id="example" class="display" style="width:100%">
		<thead><tr><th>Sl</th><th>Title</th><th>Address</th><th>Contact</th><th>Email</th><th>Gmap</th><th>Holiday</th><th>Sp. Ins.</th><th>Status</th><th>Sort</th><th>Edit</th></tr></thead><tbody>';
		$sql  = "SELECT * FROM `master_branch` ORDER BY `title` ASC";
		$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
				$i++;
			$branch_code = $row['branch_code'];
			$title = $row['title'];
			$address = $row['address'];
			$contact = $row['contact'];
			$email = $row['email'];
			$gmap = $row['gmap'];
			$holiday = $row['holiday'];
			$remark = $row['remark'];
			$status = $row['status'];
			$sort = $row['sort'];

			echo '
			<tr>
				<td>'.$i.'</td>
				<td>'.$title.'</td>
				<td>'.$address.'</td>
				<td>'.$contact.'</td>
				<td>'.$email.'</td>
				<td>'.$gmap.'</td>
				<td>'.$holiday.'</td>
				<td>'.$remark.'</td>
				<td>';if($status == 1){echo "Active";} 
              else{ echo "Inactive";}echo '</td>
				<td>'.$sort.'</td>
				<td><a href="Branch/'.$branch_code.'">Edit</a></td>
			</tr>
			';
			}
			echo '</tbody></table>';
}
else if($listType == 'Post-Job'){
		$i = 0;
		echo '<table id="example" class="display" style="width:100%">
		<thead><tr><th>Sl</th><th>Job Title</th><th>Description</th><th>Experience</th><th>Qualification</th><th>Job Link</th><th>Special Job Instruction</th><th>Dead Line</th><th>Status</th><th>Edit</th></tr></thead><tbody>';
		$sql  = "SELECT * FROM `tbl_career` ORDER BY `id` ASC";
		$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
				$i++;
			$job_code = $row['job_code'];
			$title = $row['title'];
			$description = substr($row['description'],0,50);
			$experience = substr($row['experience'],0,50);
			$qualification = substr($row['qualification'],0,50);
			$instructions = substr($row['instructions'],0,50);
			$link = $row['link'];
			$deadline = $row['deadline'];
			$status = $row['status'];

			echo '
			<tr>
				<td>'.$i.'</td>
				<td>'.$title.'</td>
				<td>'.$description.'... </td>
				<td>'.$experience.'... </td>
				<td>'.$qualification.'... </td>
				<td>'.$instructions.'... </td>
				<td>'.$link.'</td>
				<td>'.$deadline.'</td>
				<td>';if($status == 1){echo "Active";} 
              else{ echo "Inactive";}echo '</td>
				<td><a href="Post-Job/'.$job_code.'">Edit</a></td>
			</tr>
			';
			}
			echo '</tbody></table>';
}
else if($listType == 'Manage-Review'){
		$i = 0;
		echo '<table id="example" class="display" style="width:100%">
		<thead><tr><th>Sl</th><th>Review Code</th><th>Product Code</th><th>Product Name</th><th>Review</th><th>Reviewer Name</th><th>Email</th><th>Post Date</th><th>Status</th><th>Edit</th></tr></thead><tbody>';
		$sql  = "SELECT *,`tbl_product`.`product_name` AS `product_name` FROM `tbl_review` 
		LEFT JOIN `tbl_product` ON `tbl_product`.`product_code`  = `tbl_review`.`product_code`
		WHERE `tbl_review`.`product_code` != ''";
		$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
				$i++;
			$review_code = $row['review_code'];
			$product_code = $row['product_code'];
			$product_name = $row['product_name'];
			$review = substr($row['review'],0,50);
			$email = $row['email'];
			$name = $row['name'];
			$posted = $row['reviewDate'];
			$status = $row['status'];

			echo '
			<tr>
				<td>'.$i.'</td>
				<td>'.$review_code.'</td>
				<td>'.$product_code.'</td>
				<td>'.$product_name.'</td>
				<td>'.$review.'</td>
				<td>'.$email.'</td>
				<td>'.$name.'</td>
				<td>'.$posted.'</td>
				<td>';
				if($status == "1"){echo "Confirmed";}
              		elseif($status == "0"){ echo "Pending";}
              			elseif($status == "X"){ echo "Rejected";}
				echo '</td>
				<td><a href="Manage-Review/'.$review_code.'">Edit</a></td>
			</tr>
			';
			}
			echo '</tbody></table>';
}

else if($listType == 'Manage-Pending-Dealer'){
		$i = 0;
		echo '<table id="example" class="display" style="width:100%">
		<thead><tr><th>Sl</th><th>Name</th><th>Companye</th><th>District</th><th>Phone</th><th>Status</th><th>Edit</th></tr></thead><tbody>';
		$sql  = "SELECT * FROM `master_dealer_register` WHERE `conStatus` = '0'";
		$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
			$dealerRegCode = $row['dealerRegCode'];
			$dealerCompany = $row['dealerCompany'];
			$dealerName = $row['dealerName'];
			$dealerPhone = $row['dealerPhone'];
			$dealerEmail = $row['dealerEmail'];
			$dealerAddress = $row['dealerAddress'];
			$dealerDistCode = $row['dealerDistCode'];
			$regDate = $row['regDate'];
			$status = $row['conStatus'];

			echo '
			<tr>
				<td>'.$i.'</td>
				<td>'.$dealerCompany.'</td>
				<td>'.$dealerName.'</td>
				<td>'.$dealerDistCode.'</td>
				<td>'.$dealerPhone.'</td>
				<td>';
				if($status == "1"){echo "Confirmed";}
              		elseif($status == "0"){ echo "Pending";}
              			elseif($status == "X"){ echo "Rejected";}
              	echo '</td>
				<td><a href="Manage-Pending-Dealer/'.$dealerRegCode.'">Edit</a></td>
			</tr>
			';
			}
			echo '</tbody></table>';
}

else if($listType == 'Manage-Pending-Dealer-Active'){
		$i = 0;
		echo '<table id="example" class="display" style="width:100%">
		<thead><tr><th>Sl</th><th>Name</th><th>Companye</th><th>District</th><th>Phone</th><th>Status</th><th>Edit</th></tr></thead><tbody>';
		$sql  = "SELECT * FROM `master_dealer_register` WHERE `conStatus` = '1'";
		$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
			$dealerRegCode = $row['dealerRegCode'];
			$dealerCompany = $row['dealerCompany'];
			$dealerName = $row['dealerName'];
			$dealerPhone = $row['dealerPhone'];
			$dealerEmail = $row['dealerEmail'];
			$dealerAddress = $row['dealerAddress'];
			$dealerDistCode = $row['dealerDistCode'];
			$regDate = $row['regDate'];
			$status = $row['conStatus'];

			echo '
			<tr>
				<td>'.$i.'</td>
				<td>'.$dealerCompany.'</td>
				<td>'.$dealerName.'</td>
				<td>'.$dealerDistCode.'</td>
				<td>'.$dealerPhone.'</td>
				<td>';
				if($status == "1"){echo "Confirmed";}
              		elseif($status == "0"){ echo "Pending";}
              			elseif($status == "X"){ echo "Rejected";}
              	echo '</td>
				<td><a href="Manage-Pending-Dealer/'.$dealerRegCode.'">Edit</a></td>
			</tr>
			';
			}
			echo '</tbody></table>';
}

else if($listType == 'Manage-Life-At-Digimark'){
		$i = 0;
		echo '<table id="example" class="display" style="width:100%"><thead><tr><th>Sl</th><th>Title</th><th>Status</th><th>Edit</th></tr></thead><tbody>';
		$sql  = "SELECT * FROM `tbl_life_at_digimark` ORDER BY `title` ASC";
		$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
				$i++;
			$life_code = $row['code'];
			$life_thumbnail = $row['thumbnail'];
			$life_status = $row['status'];

			echo '
			<tr>
				<td>'.$i.'</td>
				<td><img src="../assets/images/life_at_digimark/'.$life_thumbnail.'" style="width:50px"></td>
				<td>';
				if($life_status == 1){echo "Active";}
                else{ echo "Inactive";}
                echo '</td>
				<td><a href="Manage-Life-At-Digimark/'.$life_code.'">Edit</a></td>
			</tr>
			';
			}
			echo '</tbody></table>';
}
else if($listType == 'Manage-News'){
		$i = 0;
		echo '<table id="example" class="display" style="width:100%"><thead><tr><th>Sl</th><th>Title</th><th>Status</th><th>Edit</th></tr></thead><tbody>';
		$sql  = "SELECT * FROM `tbl_news` ORDER BY `title` ASC";
		$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
				$i++;
			$news_code = $row['code'];
			$news_title = $row['title'];
			$news_details = $row['details'];
			$news_status = $row['status'];

			echo '
			<tr>
				<td>'.$i.'</td>
				<td>'.$news_title.'</td>
				<td>';
				if($news_status == 1){echo "Active";}
				else if($news_status == 2){echo "Pinned";} 
                else{ echo "Inactive";}
                echo '</td>
				<td><a href="Manage-News/'.$news_code.'">Edit</a></td>
			</tr>
			';
			}
			echo '</tbody></table>';
}

else if($listType == 'Manage-Newsletter'){
		$i = 0;
		echo '<table id="example" class="display" style="width:100%"><thead><tr><th>Sl</th><th>Title</th><th>Status</th><th>Edit</th></tr></thead><tbody>';
		$sql  = "SELECT * FROM `tbl_newsletter` ORDER BY `title` ASC";
		$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
				$i++;
			$news_code = $row['code'];
			$news_title = $row['title'];
			$news_details = $row['details'];
			$news_status = $row['status'];

			echo '
			<tr>
				<td>'.$i.'</td>
				<td>'.$news_title.'</td>
				<td>';
				if($news_status == 1){echo "Active";}
				else if($news_status == 2){echo "Pinned";} 
                else{ echo "Inactive";}
                echo '</td>
				<td><a href="Manage-Newsletter/'.$news_code.'">Edit</a></td>
			</tr>
			';
			}
			echo '</tbody></table>';
}
else if($listType == 'Manage-Blog'){
		$i = 0;
		echo '<table id="example" class="display" style="width:100%"><thead><tr><th>Sl</th><th>Title</th><th>Status</th><th>Edit</th></tr></thead><tbody>';
		$sql  = "SELECT * FROM `tbl_blog` ORDER BY `title` ASC";
		$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
				$i++;
			$blog_code = $row['code'];
			$blog_title = $row['title'];
			$blog_details = $row['details'];
			$blog_status = $row['status'];

			echo '
			<tr>
				<td>'.$i.'</td>
				<td>'.$blog_title.'</td>
				<td>';
				if($blog_status == 1){echo "Active";}
				else if($blog_status == 2){echo "Pinned";} 
                else{ echo "Inactive";}
                echo '</td>
				<td><a href="Manage-Blog/'.$blog_code.'">Edit</a></td>
			</tr>
			';
			}
			echo '</tbody></table>';
}
else if($listType == 'Manage-Case-Study'){
		$i = 0;
		echo '<table id="example" class="display" style="width:100%"><thead><tr><th>Sl</th><th>Title</th><th>Status</th><th>Edit</th></tr></thead><tbody>';
		$sql  = "SELECT * FROM `tbl_case_study` ORDER BY `title` ASC";
		$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
				$i++;
			$cs_code = $row['code'];
			$cs_title = $row['title'];
			$cs_details = $row['details'];
			$cs_status = $row['status'];

			echo '
			<tr>
				<td>'.$i.'</td>
				<td>'.$cs_title.'</td>
				<td>';
				if($cs_status == 1){echo "Active";}
				else if($cs_status == 2){echo "Pinned";} 
                else{ echo "Inactive";}
                echo '</td>
				<td><a href="Manage-Case-Study/'.$cs_code.'">Edit</a></td>
			</tr>
			';
			}
			echo '</tbody></table>';
}



else if($listType == 'partner-item'){
		$i = 0;
		echo '<table id="example" class="display" style="width:100%"><thead><tr><th>Sl</th><th>Value</th><th>Status</th><th>Edit</th></tr></thead><tbody>';
		$sql  = "SELECT * FROM `tbl_partner_items` ORDER BY `item_name` ASC";
		$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
				$i++;
			$item_code = $row['item_code'];
			$item_type = $row['item_type'];
			$item_name = $row['item_name'];
			$item_file = $row['item_file'];
			$item_status = $row['item_status'];

			echo '
			<tr>
				<td>'.$i.'</td>
				<td>'.$item_name.'</td>
				<td>';if($item_status == 1){echo "Active";} 
              else{ echo "Inactive";}echo '</td>
				<td><a href="Partner-Item-Upload/'.$item_code.'">Edit</a></td>
			</tr>
			';
			}
			echo '</tbody></table>';
}
else if($listType == 'Maintenance-User'){
		$i = 0;
		echo '<table id="example" class="display" style="width:100%"><thead><tr><th>Sl</th><th>User</th><th>Designation</th><th>Status</th><th>Edit</th></tr></thead><tbody>';
		$sql  = "SELECT * FROM `master_user`";
		$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
				$i++;
			$userCode = $row['userCode'];
			$userName = $row['userName'];
			$userDesignation = $row['userDesignation'];
			$userStatus = $row['status'];

			echo '
			<tr>
				<td>'.$i.'</td>
				<td>'.$userName.'</td>
				<td>'.$userDesignation.'</td>
				<td>';if($userStatus == 1){echo "Active";} 
              else{ echo "Inactive";}echo '</td>
				<td><a href="Manage-Maintenance-User/'.$userCode.'">Edit</a></td>
			</tr>
			';
			}
			echo '</tbody></table>';
}


else if($listType == 'Support-Menu'){
	$i = 0;
		echo '<table id="example" class="display" style="width:100%"><thead><tr><th>Sl</th><th>Menu Item</th><th>Menu URL</th><th>Sort</th><th>Status</th><th>Edit</th></tr></thead><tbody>';
		$sql  = "SELECT * FROM `tbl_support_menu` ORDER BY `menuName` ASC";
		$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
				$i++;
			$menuCode = $row['menuCode'];
			$menuName = $row['menuName'];
			$menuUrl = $row['menuUrl'];
			$menuSort = $row['menuSort'];
			$status = $row['status'];

			echo '
			<tr>
				<td>'.$i.'</td>
				<td>'.$menuName.'</td>
				<td>'.$menuUrl.'</td>
				<td>'.$menuSort.'</td>
				<td>';if($status == 1){echo "Active";} 
              else{ echo "Inactive";}echo '</td>
				<td><a href="Support-Menu/'.$menuCode.'">Edit</a></td>
			</tr>
			';
			}
}

else if($listType == 'brandSubcategory'){
		$i = 0;
		echo '<table id="example" class="display" style="width:100%"><thead><tr><th>Sl</th><th>Brand Name</th><th>Subcategory</th><th>Edit</th></tr></thead><tbody>';
		
		$sqlbws  = "SELECT `tbl_brand_wise_subcategory_content`.*,`tbl_brand`.`brand_name` AS `brandName`,`tbl_subcategory`.`subcategory_name` AS `subcategoryName` FROM `tbl_brand_wise_subcategory_content` 
		JOIN `tbl_brand` ON `tbl_brand`.`brand_code` = `tbl_brand_wise_subcategory_content`.`brandCode`
		JOIN `tbl_subcategory` ON `tbl_subcategory`.`subcategory_code` = `tbl_brand_wise_subcategory_content`.`subcategoryCode`";
		$resultbws = mysqli_query($dbcon,$sqlbws) or die ('error 404');
			while($rowbws = mysqli_fetch_assoc($resultbws)){
			$i++;
			$bws_code = $rowbws['code'];
			$brand_code = $rowbws['brandCode'];
			$brand_name = $rowbws['brandName'];
			$subcategory_code = $rowbws['subcategoryCode'];
			$subcategory_name = $rowbws['subcategoryName'];
			
			echo '
			<tr>
				<td>'.$i.'</td>
				<td>'.$brand_name.'</td>
				<td>'.$subcategory_name.'</td>
				<td><a href="Manage-Subcategory-Brand/'.$bws_code.'">Edit</a></td>
			</tr>
			';
			}
			echo '</tbody></table>';
}
?>


<script type="text/javascript">
$(document).ready(function() {
	//alert('ok i am called');
    $('#example').DataTable();
} );
</script>



