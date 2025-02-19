<?php
 include('assets/database/config.php');

 $category = $_POST['category'];
 $id = $_POST['id'];


$sql = "SELECT `category_code` from `tbl_category` WHERE `category_url` = '$category'";
$result = mysqli_query($dbcon,$sql) or die ('error 404');
    while($row = mysqli_fetch_assoc($result)){
       	$category_code = $row['category_code'];
    }


echo '<select class="form-control" id="row_subcat_'.$id.'"  onchange="openTab(this.id)"  style="width:100%;border-color:1px solid cyan;border-radius:0px">
<option>Select Category</option>';
 $sql2 = "SELECT DISTINCT `tbl_subcategory`.`subcategory_name` AS `subcategory_name`,`tbl_subcategory`.`subcategory_url` AS `subcategory_url` FROM  `tbl_subcategory` WHERE `tbl_subcategory`.`category_code` = '$category_code' AND `tbl_subcategory`.`subcategory_status` = '1'";
                                    $result2 = mysqli_query($dbcon,$sql2) or die ('error 404');
                                            while($row2 = mysqli_fetch_assoc($result2)){
                                                $subcategory_name = $row2['subcategory_name'];
                                                $subcategory_url = $row2['subcategory_url'];
                                                    echo '<option value="'.$subcategory_url.'">'.$subcategory_name.'</option>';
                                            }
echo '</select>';
?> 