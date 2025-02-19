<?php
 include('assets/database/config.php');
 include('includes.php');

$filter_string =  $_POST['filter'];
$filter_category =  $_POST['category'];
		$sql_category = "SELECT `category_code` FROM `tbl_category` WHERE `category_url` = '$filter_category'";
		$result_category = mysqli_query($dbcon,$sql_category) or die ('error 4041x');
		while($row_category = mysqli_fetch_assoc($result_category)){
						$category = $row_category['category_code'];
		}
//$filter_brand =  $_POST['brand'];
if($filter_string !== null)
{ //echo $filter_string.'XXX'.'1' ;
$filter_string = explode(',', $filter_string);
$filter_string = "'" . implode("','", $filter_string) . "'";

$sql_type_string = "SELECT DISTINCT `f_head_code` FROM `master_filter` WHERE `filter_code` IN ($filter_string)";
$result_type_string = mysqli_query($dbcon,$sql_type_string) or die ('error 4041x');
while($row = mysqli_fetch_assoc($result_type_string)){
				$type = $row['f_head_code'];
				$type_string = $type_string.', '.$type;
			}
//echo "<br><br>";

$sql = "SELECT `f_head_name`,`f_head_code` FROM `master_filter_head` WHERE `status`= '1' AND `f_head_code` IN (SELECT DISTINCT `f_head_code` FROM `master_filter` WHERE `category`= '$category'  ORDER BY `filter_code`)";
$result = mysqli_query($dbcon,$sql) or die ('error 4042');
$i = 0;
			while($row = mysqli_fetch_assoc($result)){
				$type = $row['f_head_code'];
				$type_name =  $row['f_head_name'];
				echo "<br>";
				echo '<b style="color:#f05a0f !important;margin-top:1.5% !important">'.$type_name.'</b>';
				$sql_filter = "SELECT DISTINCT `master_filter`.`filter_code` AS `filter_code` ,`master_filter`.`f_head_code` AS `f_head_code`, `master_filter_value`.`filter_value` AS `filter_value` FROM `master_filter` 
					JOIN `master_filter_value` ON `master_filter_value`.`filter_code` = `master_filter`.`filter_code`
					WHERE `master_filter`.`f_head_code` = '$type' AND `master_filter`.`category`= '$category' AND 
					`product_code` IN ( SELECT `master_filter`.`product_code` FROM `master_filter` WHERE `master_filter`.`filter_code` IN ($filter_string))";
					$result_filter = mysqli_query($dbcon,$sql_filter) or die ('error 4043');
					$j = 0;
						while($row_filter = mysqli_fetch_assoc($result_filter)){
							$hfilter = $row_filter['filter_code'];
							$hfilter_value = $row_filter['filter_value'];
							$htype = $row_filter['f_head_code'];
//false - contains , true - not contains							
							if((strpos($type_string, $htype) !== false) && (strpos($filter_string, $hfilter) !== false)){
									echo "<br>";
									echo '<input type="checkbox" id="filter'.$i.$j.'" name="filter[]" value="'.$hfilter.'" onclick="make_filter(1)" style="margin-top:1% !important"/> 
									<label for = "filter'.$i.$j.'" style="font-size:13px;margin:auto;margin-left:2%;color:#000000"> '.$hfilter_value.'</label>';
							}else if((strpos($type_string, $htype) !== false) && (strpos($filter_string, $hfilter) !== true)){
									// echo "<br>".$htype ;
									// echo '<input type="checkbox" id="filter'.$i.$j.'" name="filter[]" value="'.$hfilter.'" onclick="make_filter(1)" style="margin:auto"/> <label for = "filter'.$i.$j.'" style="font-size:13px;margin:auto;margin-left:2%;color:#000000"><b>2 '.$hfilter.'</b></label>';
							}else if((strpos($type_string, $htype) !== true) && (strpos($filter_string, $hfilter) !== true)){
									echo "<br>";
									echo '<input type="checkbox" id="filter'.$i.$j.'" name="filter[]" value="'.$hfilter.'" onclick="make_filter(1)" style="margin-top:1% !important"/> 
									<label for = "filter'.$i.$j.'" style="font-size:13px;margin:auto;margin-left:2%;color:#000000"> '.$hfilter_value.'</label>';
							}

						$j++;
						}
$i++;

}
    
}

else{ //echo $filter_string.'XXX'.'2' ;
	$sql = "SELECT `f_head_name`,`f_head_code` FROM `master_filter_head` WHERE `status`= '1' AND `f_head_code` IN (SELECT DISTINCT `f_head_code` FROM `master_filter` WHERE `category`= '$category'  ORDER BY `filter_code`)";
$result = mysqli_query($dbcon,$sql) or die ('error 4042');
$i = 0;
			while($row = mysqli_fetch_assoc($result)){
				$type = $row['f_head_code'];
				$type_name =  $row['f_head_name'];
				echo "<br>";
				echo '<b style="color:#f05a0f !important;margin-top:1.5% !important">'.$type_name.'</b>';
				$sql_filter = "SELECT DISTINCT `master_filter`.`filter_code` AS `filter_code` ,`master_filter`.`f_head_code` AS `f_head_code`, `master_filter_value`.`filter_value` AS `filter_value` FROM `master_filter` 
					JOIN `master_filter_value` ON `master_filter_value`.`filter_code` = `master_filter`.`filter_code`
					WHERE `master_filter`.`f_head_code` = '$type' AND `master_filter`.`category`= '$category' ";
					$result_filter = mysqli_query($dbcon,$sql_filter) or die ('error 4043');
					$j = 0;
						while($row_filter = mysqli_fetch_assoc($result_filter)){
							$hfilter = $row_filter['filter_code'];
							$hfilter_value = $row_filter['filter_value'];
							$htype = $row_filter['f_head_code'];
echo "<br>";
									echo '<input type="checkbox" id="filter'.$i.$j.'" name="filter[]" value="'.$hfilter.'" onclick="make_filter(1)" style="margin:auto;margin-top:1% !important"/> <label for = "filter'.$i.$j.'" style="font-size:13px;margin:auto;margin-left:2%;color:#000000"> '.$hfilter_value.'</label>';
									$j++;
								}
								$i++;
}
}

echo '<div class="clearfix"></div>
<a class="btn btn-sm btn-danger" style="border-radius:0px;margin-top:2%" href="collections/'.$filter_category.'"> Reset Filter</a>';
?>