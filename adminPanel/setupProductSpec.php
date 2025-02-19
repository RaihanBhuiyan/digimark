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
 <!--RICHTEXT-->
<script type="text/javascript" src="https://cdn.ckeditor.com/4.4.7/full/ckeditor.js"></script>
<!--RICHTEXT-->
</head>
<body>

<?php
include('../assets/database/config.php');
include('editItem.php');
$product_code = $litePath[3];
?>
<?php include('sidebar.php');?>
<div class="card">
<div class="card-header"><h1>Product Spec Setup</h1></div>
<div class="card-body">
		<form action="Add-Spec" method="post" enctype="multipart/form-data">
			<div class="row">
		  		<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Spec Head</label>
			  		<select class="form-control select2" name="specHead" required>
			  			<option value="">--Select Head--</option>
			  		<?php
			    	$sql3 = "SELECT * FROM `master_spec_head` WHERE `status` = '1'";
					$result3 = mysqli_query($dbcon,$sql3) or die ('error 404');
			        while($row3 = mysqli_fetch_assoc($result3)){
			            $spec_head_code = strtoupper($row3['spec_head_code']);
			            $spec_head_name = strtoupper($row3['spec_head_name']);
			            if(strtoupper($product_spec_head_code) == $spec_head_code)
			            {	
			            	echo '<option selected="" value="'.$spec_head_code.'">'.$spec_head_name.'</option>';
			            }else{
			            	echo '<option value="'.$spec_head_code.'">'.$spec_head_name.'</option>';
			            }
			        }
			        ?>
			        </select>
			    </div>

		  		<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Spec Subhead</label>
			  		<select class="form-control" name="specSubhead" required>
			  			<option value="">--Select Subhead--</option>
			  		<?php
			    	$sql3 = "SELECT * FROM `master_spec_subhead` WHERE `status` = '1'";
					$result3 = mysqli_query($dbcon,$sql3) or die ('error 404');
			        while($row3 = mysqli_fetch_assoc($result3)){
			            $spec_subhead_code = strtoupper($row3['spec_subhead_code']);
			            $spec_subhead_name = strtoupper($row3['spec_subhead_name']);
			            if(strtoupper($product_spec_subhead_code) == $spec_subhead_code)
			            {	
			            	echo '<option selected="" value="'.$spec_subhead_code.'">'.$spec_subhead_name.'</option>';
			            }else{
			            	echo '<option value="'.$spec_subhead_code.'">'.$spec_subhead_name.'</option>';
			            }
			        }
			        ?>
			        </select>
			    </div>
			    <div class="col-md-12 col-sm-12 col-xs-12 mt-3">
			  		<label>Spec Details</label>
			        <label style="color:red" class="w3-code notranslate htmlHigh">To add table please add class="featureTable table table-striped" in the first line</label>
			  		<input type="text" name="pcode" value="<?php echo $product_code;?>" style="display: none;">
			  		<input type="text" name="scode" value="<?php echo $spec_code;?>" style="display: none;">
			    	<textarea required name="details" class="form-control" placeholder="Features"><?php echo $details;?></textarea>
			    </div>
			  	<div class="col-md-12 col-sm-12 col-xs-12 mt-3">
			  		<label>Status</label>
			  		<select required  name="status" class="form-control">
			  			<?php
			  			if($spec_status == '1' || $spec_status == '0'){
			  				if($spec_status == '1'){echo '<option selected="" value="1">Active</option>
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

			<div class="col-md-12 col-sm-12 col-xs-12" style="text-align: right;margin-top: 2.5%">
			 <input type="checkbox" name="next_section" id="next"> <label for="next"><b>Update and go to Add-Filter</b></label>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12" style="text-align: right;margin-top: 2.5%">

                <button type="submit" name="submit" id="submit" class="btn btn-dark btn-md">Update <i class="fa fa-check"></i></button>
                
                <a id="showList" onclick="getProductSpecList('specTable','<?php echo $product_code;?>')" class="btn btn-info btn-md">List <i class="fa fa-bars"></i></a>
                <a id="showList" onclick="reload('Add-Spec/<?php echo $product_code;?>')" class="btn btn-info btn-md">Clear <i class="fa fa-refresh"></i></a>

            </div>
			</div>
			</form>
</div>	

               
<div id="listResult" style="display: none">
	
</div>
</div>

<?php
 if(isset($_POST['submit'])){
    $pcode = $_POST['pcode'];
    $scode = $_POST['scode'];
    $specHead = $_POST['specHead'];
    $specSubhead = $_POST['specSubhead'];
    $details = $_POST['details'];
    $status = $_POST['status'];
    $crDate = date(Ymd);
    $crBy = $_SESSION['userCode'];
    
	if(strlen($scode)>0){
	// 	$sql  = "SELECT COUNT(`id`) AS `RowCount` FROM `tbl_product_spec` WHERE `spec_code` = '$code'";
	//     $result = mysqli_query($dbcon,$sql) or die ('error 404');
	// 		while($row = mysqli_fetch_assoc($result)){
	// 		$RowCount = $row['RowCount'];
	// 		}
	//     if($RowCount > 0){
	//     	echo "<script>alert('Already URL exists.');</script>";
	//     	echo "<script>location='Category'</script>";
	//     }else{
			$sql  = "UPDATE `tbl_product_spec` SET `spec_head_code` = '$specHead', `spec_subhead_code` = '$specSubhead', `details` = '$details', `status` = '$status',`crDate` = '$crDate',`crBy` = '$crBy' WHERE `spec_code` = '$scode'";
			$result = mysqli_query($dbcon,$sql) or die ('error 404');

			
			if(isset($_POST['next_section'])){
			echo $sql3 = "SELECT `product_subcategory` FROM `tbl_product` WHERE `product_code` = '$pcode'";
			$result3 = mysqli_query($dbcon,$sql3) or die ('error 404');
			        while($row3 = mysqli_fetch_assoc($result3)){
			            echo $product_subcategory = strtoupper($row3['product_subcategory']);
			        }
			echo "<script>location='Add-Filter/".$pcode."/".$product_subcategory."'</script>";
		}
		else
			{echo "<script>location='Add-Spec/".$pcode."'</script>";}
		// }
		// }
	}
    else{
   //  	$sql  = "SELECT COUNT(`id`) AS `RowCount` FROM `tbl_product_spec` WHERE `spec_code` = '$code'";
	  //   $result = mysqli_query($dbcon,$sql) or die ('error 404');
			// while($row = mysqli_fetch_assoc($result)){
			// $RowCount = $row['RowCount'];
			// }
	  //   if($RowCount > 0){
	  //   	echo "<script>alert('Already URL exists.');</script>";
	  //   	echo "<script>location='Category'</script>";
	  //   }else{
		    $sql = "INSERT INTO `tbl_product_spec`(`id`, `spec_code`, `product_code`, `spec_head_code`, `spec_subhead_code`, `details`, `status`, `crDate`, `crBy`) VALUES ('','', '$pcode', '$specHead', '$specSubhead', '$details', '$status', '$crDate', '$crBy')";
		 	$result = mysqli_query($dbcon,$sql) or die ('error 4041');


		$last_id = mysqli_insert_id($dbcon);
		$n2 = str_pad($last_id, 5, 0, STR_PAD_LEFT);
		$newId =  "SPC".$n2;

		$sqlget1 = "UPDATE `tbl_product_spec` SET `spec_code` = '$newId' WHERE `id` = '$last_id'";
		$sqldata1 = mysqli_query($dbcon,$sqlget1) or die ('error 4042X');
			
		if(isset($_POST['next_section'])){
			echo $sql3 = "SELECT `product_subcategory` FROM `tbl_product` WHERE `product_code` = '$pcode'";
			$result3 = mysqli_query($dbcon,$sql3) or die ('error 404');
			        while($row3 = mysqli_fetch_assoc($result3)){
			            echo $product_subcategory = strtoupper($row3['product_subcategory']);
			        }
			echo "<script>location='Add-Filter/".$pcode."/".$product_subcategory."'</script>";
		}
		else
			{echo "<script>location='Add-Spec/".$pcode."'</script>";}
		// }
   }
}
?>

<script type="text/javascript">
 CKEDITOR.replace('details');
</script> 
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
$('.select2').select2();
</script>
</body>
</html>