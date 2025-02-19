<?php
session_start();
if(!isset($_SESSION['userCode'])){
echo '<script>window.location="Logout";</script>';
}
?>
<!DOCTYPE html>
<html>
<head>
<?php
include('includes.php');
?>
</head>
<body>

<?php
include('menu.php');
include('../assets/database/config.php');
?>
<?php include('sidebar.php');?>
<div class="card">
<div class="card-header">	<h1>Tag Filter Group With Category</h1></div>
<div class="card-body">
		<form action="Filter-Tag" method="post" enctype="multipart/form-data">
			<div class="row">
		  		<!-- <div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Code</label>
			    	<input type="text" name="User_Code" class="form-control" placeholder="Designation">
			    </div> -->
		  		<div class="col-md-4 col-sm-12 col-xs-12 mt-3">
			  		<p><b>Category</b></p>
			  		<?php

			  		$i = 0;
			  		echo "<select name='category_box' class='form-control select2'>
			  		<option value=''>--Select Category--</option>";
			  		$sql  = "SELECT `category_code`,`category_name` FROM `tbl_category` WHERE `category_status` = '1'";
				    $result = mysqli_query($dbcon,$sql) or die ('error 404');
						while($row = mysqli_fetch_assoc($result)){
						$category_code = $row['category_code'];
						$category_name = $row['category_name'];
						$i++;
							echo '<option value='.$category_code.'>'.$category_name.'</option>';
						}
					echo "</select>";	
			  		?>
			    	 	
					  	<!-- <input type="radio" id="female" name="gender" value="female">
					  	<label for="female">CCTV</label><br>
					  	<input type="radio" id="other" name="gender" value="other">
					  	<label for="other">DVR</label> -->
		    	</div>
			  	<div class="col-md-4 col-sm-12 col-xs-12 mt-3" id="termSheetPopup">
			  		<p><b>Filter Group</b></p>
			  		<?php
			  		$i = 0;
			  		echo "<select name='filter_box' class='form-control select2'>
			  		<option value=''>--Select Filter Group--</option>";
			  		$sql  = "SELECT `f_head_code`,`f_head_name`,`status` FROM `master_filter_head` WHERE `status` = '1'";
				    $result = mysqli_query($dbcon,$sql) or die ('error 404');
						while($row = mysqli_fetch_assoc($result)){
						$f_head_code = $row['f_head_code'];
						$f_head_name = $row['f_head_name'];
						$status = $row['status'];
						$i++;
						echo '<option value='.$f_head_code.'>'.$f_head_name.'</option>';
						}
						echo "</select>";
			  		?><!-- 
			  		<input type="checkbox" id="male" name="gender" value="male">
					  	<label for="male">Type</label><br>
					  	<input type="checkbox" id="female" name="gender" value="female">
					  	<label for="female">Sensor</label><br>
					  	<input type="checkbox" id="other" name="gender" value="other">
					  	<label for="other">Generation</label><br>
					  	<input type="checkbox" id="other" name="gender" value="other">
					  	<label for="other">OS</label><br>
					  	<input type="checkbox" id="other" name="gender" value="other">
					  	<label for="other">Processor</label> -->
			    </div>
			    <div class="col-md-4 col-sm-12 col-xs-12 mt-3">
			  		<p><b>Status</b></p>
			  		<select required  name="status" class="form-control">
			  			<?php
			  			if($f_head_status == '1' || $f_head_status == '0'){
			  				if($f_head_status == '1'){echo '<option selected="" value="1">Active</option>
			  			<option value="0">Inactive</option>';} 
              				else{ echo '<option value="1">Active</option>
			  			<option selected="" value="0">Inactive</option>';}
			  			}else{
			  			echo '<option selected="" value="1">Active</option>
			  			<option value="0">Inactive</option>';
			  			}
			  			?>
			  		</select>
			    </div>
			    <div class="col-md-12 col-sm-12 col-xs-12 mt-3">
			    	<input type="text" name="category_box_" id="category_box" style="display: none;">
			    	<input type="text" name="filter_box_" id="filter_box" style="display: none;">
			    	<div id="listResult" style="display: block;">
			
					</div>
				</div>
			</div>
			<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12" style="text-align: right;margin-top: 2.5%">
                <button type="submit" name="submit" id="submit" class="btn btn-dark btn-md">Update <i class="fa fa-check"></i></button>
            </div>
			</div>
			<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12" style="text-align: right;margin-top: 2.5%">
                <table id="example" class="display" style="width:100%">
						<thead>
			    		<tr><th><b>Sl</b></th><th><b>Category</b></th><th><b>Filter Group</b></th><th><b>Status</b></th></tr>
			    		</thead><tbody>
			    		<?php
			    		$sql  = "SELECT `tbl_category`.`category_name` AS `categoryName`,`master_filter_head`.`f_head_name` AS `filterGroup`,`master_filter_head_with_category`.`status` FROM `master_filter_head_with_category` JOIN `tbl_category` ON `tbl_category`.`category_code` = `master_filter_head_with_category`.`cat_code` JOIN `master_filter_head` ON `master_filter_head`.`f_head_code` = `master_filter_head_with_category`.`f_head_code` ";
				    	$result = mysqli_query($dbcon,$sql) or die ('error 404');
						while($row = mysqli_fetch_assoc($result)){
						$categoryName = $row['categoryName'];
						$filterGroup = $row['filterGroup'];
						$status = $row['status'];
						$i++;
						if($status == 1){$statVal = 'Active';}else{$statVal = 'Inactive';}
						echo '<tr><td><b>'.$i.'</b></td><td><b>'.$categoryName.'</b></td><td><b>'.$filterGroup.'</b></td><td><b>'.$statVal.'</b></td></tr>';
						}
						?>
						</tbody></table>
            </div>
			</div>
			</form>
</div>	
</div>

<?php
 if(isset($_POST['submit'])){
    $category_box = $_POST['category_box'];
    $filter_box = $_POST['filter_box'];
    $status = $_POST['status'];
    $crDate = date(Ymd);
    $crBy =  $_SESSION['userCode'];
    
    $filter_box_array = explode(',', $filter_box);

    foreach($filter_box_array as $value) {
    	$f_head_code = $value;

    	$sqlrecheck  = "SELECT COUNT(`f_head_code`) AS `recheck`,`status` FROM `master_filter_head_with_category` WHERE `cat_code` = '$category_box' AND `f_head_code`  = '$f_head_code'";
		$resultrecheck = mysqli_query($dbcon,$sqlrecheck) or die ('error 404');
			while($rowrecheck = mysqli_fetch_assoc($resultrecheck)){
			$recheck = $rowrecheck['recheck'];
			$restatus = $rowrecheck['status'];
			}
    	if($recheck>0){
    		if($restatus == $status)
    		echo '<script>alert("Head already exists");</script>';
    		else{
    		$sqlget1 = "UPDATE `master_filter_head_with_category` SET `status` = !'$restatus',`crDate` = '$crDate',`crBy` = '$crBy' WHERE `cat_code` = '$category_box' AND `f_head_code`  = '$f_head_code'";
			$sqldata1 = mysqli_query($dbcon,$sqlget1) or die ('error 4042X');
    		}
    	}
    	else{
	    $sql = "INSERT INTO `master_filter_head_with_category`(`id`, `filter_cat_code`, `f_head_code`, `cat_code`, `status`, `crDate`, `crBy`) VALUES ('id', '', '$f_head_code', '$category_box', '$status', '$crDate', '$crBy')";
		 	$result = mysqli_query($dbcon,$sql) or die ('error 4041');


			$last_id = mysqli_insert_id($dbcon);
			$n2 = str_pad($last_id, 5, 0, STR_PAD_LEFT);
			$newId =  "FC".$n2;

			$sqlget1 = "UPDATE `master_filter_head_with_category` SET `filter_cat_code` = '$newId' WHERE `id` = '$last_id'";
			$sqldata1 = mysqli_query($dbcon,$sqlget1) or die ('error 4042X');
		}
    }
    
	
	echo "<script>location='Filter-Tag'</script>";
}
?>

<script type="text/javascript">
// function filter_tag_with_category(){
// 	var output = jQuery.map($(':checkbox[name=filter\\[\\]]:checked'), function (n, i) {
//     return n.value;
// }).join(',');
// document.getElementById('filter_box').value = output;
// }

// function categorySelected(value){
// document.getElementById('category_box').value = value;

// getListTags('category-tag',value);
// }


</script>
<script type="text/javascript">
$(document).ready(function() {
	//alert('ok i am called');
    $('#example').DataTable();
} );
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
$('.select2').select2();
</script>
</body>
</html>