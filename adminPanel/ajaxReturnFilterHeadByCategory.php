<?php
include('../assets/database/config.php');
include('includes.php');


// $dtype = $_POST['dtype'];
// $category = $_POST['category'];

// if($dtype == 'category'){
// 	$sql  = "SELECT `master_filter_head`.`f_head_name` AS `filter_head_name`,`master_filter_head_with_category`.`filter_cat_code` AS `filter_code` FROM `master_filter_head` 
// JOIN `master_filter_head_with_category` ON `master_filter_head_with_category`.`f_head_code` = `master_filter_head`.`f_head_code` 
// WHERE `master_filter_head_with_category`.`cat_code` = '$category' AND `master_filter_head_with_category`.`status` = '1'";
// 		$result = mysqli_query($dbcon,$sql) or die ('error 404');
// 			while($row = mysqli_fetch_assoc($result)){
// 			$f_head_code = $row['filter_code'];
// 			$f_head_name = $row['filter_head_name'];

// 			echo '
// 			<input type="radio" id="fhead" name="fhead" value="'.$f_head_code.'" onclick="filter(this.value)">
// 			<label for="fhead">'.$f_head_name.'</label><br>
// 			';
// 			}
// }
// 	else if($dtype == 'value'){
// 		$i = 0;
// 		echo '<table class="table table-bordered"><tr><th>Sl</th><th>Value X</th><th>Status</th></tr>';
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
// 				<td>'.$status.'</td>
// 			</tr>
// 			';
// 			}
// 			echo '</table>';
// 	}
?>