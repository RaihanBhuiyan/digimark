<!-- Call from createProduct.php > ajax > getSubcategory() function -->
<?php
include('../assets/database/config.php');
$category = $_POST['category'];

			    	$sql3 = "SELECT * FROM `tbl_subcategory` WHERE  `category_code` = '$category' AND  `subcategory_status` = '1'";
					$result3 = mysqli_query($dbcon,$sql3) or die ('error 404');
					$j = 0;
			        while($row3 = mysqli_fetch_assoc($result3)){
			        	$j++;
			            $subcategory_code = strtoupper($row3['subcategory_code']);
			            $subcategory_name = strtoupper($row3['subcategory_name']);
			            echo '<input type="checkbox" name="subcategory[]" id="subcategory'.$j.'" value="'.$subcategory_code.'" style="margin:auto" onclick="markSubcategory()"/> 
								<label for="subcategory'.$j.'"  style="font-size:12px;margin:auto;margin-left:0px;color:#000000">
								<b> '.$subcategory_name.'</b>
								</label>
								<br>';
			        }

?>