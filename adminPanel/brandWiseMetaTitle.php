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
?>
<?php include('sidebar.php');?>
<div class="card">
<div class="card-header"><h1>Manage Brand wise Sub-Category Description</h1></div>
<div class="card-body">
		<form action="Manage-Subcategory-Brand" method="post" enctype="multipart/form-data">
			<div class="row">
		  		<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
		  			<input type="text" name="code" value="<?php echo $code;?>" class="form-control" style="display: none">
		  			<input type="text" name="sub_url" id="sub_url" value="<?php echo $sub_url; ?>" class="form-control" style="display: none">
			  		<label>Subcategory Name</label>
			    	 	<select name='subcategory' id='subcategory' class='form-control select2'  onchange='getSub()'>
			    	 	<option value=''>--Select Subcategory--</option>
			    	 	<?php
				  		$sql  = "SELECT * FROM `tbl_subcategory` WHERE `subcategory_status` = '1'";
					    $result = mysqli_query($dbcon,$sql) or die ('error 404');

							while($row = mysqli_fetch_assoc($result)){
							$subcategory_code = $row['subcategory_code'];
							$subcategory_url = $row['subcategory_url'];
							$subcategory_name = $row['subcategory_name'];

							if($subcategory_code == $select_subcategory_code){
								echo '<option value="'.$subcategory_code.'" data-surl="'.$subcategory_url.'" selected >'.$subcategory_name.'</option>';
							}
							else{
							echo '<option value="'.$subcategory_code.'" data-surl="'.$subcategory_url.'" >'.$subcategory_name.'</option>';
							}
							}
							echo "</select>";	
				  		?>
		    	</div>
		  		<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
		  			<input type="text" name="brand_url" id="brand_url" value="<?php echo $brand_url; ?>" class="form-control" style="display: none">
			  		<label>Brand</label>
			  		<select class="form-control" name="brand" id="brand" onchange="getBrand()">
			  			<option value="">--Select Brand--</option>
			  		<?php
			    	$sql3 = "SELECT * FROM `tbl_brand` WHERE `brand_status` = '1'";
					$result3 = mysqli_query($dbcon,$sql3) or die ('error 404');
			        while($row3 = mysqli_fetch_assoc($result3)){
			            $brand_code = $row3['brand_code'];
			            $brand_url = $row3['brand_url'];
			            $brand_name = $row3['brand_name'];
			            if($brand_code == $select_brand_code)
			            {	
			            	echo '<option value="'.$brand_code.'"  data-burl="'.$brand_url.'" selected>'.$brand_name.'</option>';
			            }else{
			            	echo '<option value="'.$brand_code.'"  data-burl="'.$brand_url.'" >'.$brand_name.'</option>';
			            }
			        }
			        ?>
			        </select>
			    </div>
			    
		  		<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Meta Title</label>
			    	<input required type="text" name="metaTitle" value="<?php echo $metaTitle;?>" class="form-control" placeholder="Meta Title">
		    	</div>
		    	
		  		<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Meta Keyword</label>
			    	<input  type="text" name="metaKeyWord" value="<?php echo $metaKeyWords;?>" class="form-control" placeholder="Meta KeyWord">
		    	</div>	
		    	
		  		<div class="col-md-12 col-sm-12 col-xs-12 mt-3">
			  		<label>Meta Description</label>
			    	<input  type="text" name="metaDesc" value="<?php echo $metaDescription;?>" class="form-control" placeholder="Meta Description">
		    	</div>
		    	
			    <div class="col-md-12 col-sm-12 col-xs-12 mt-3">
			  		<label>Page Content</label>
			    	<textarea required name="contentDescription" class="form-control" placeholder="Short Description"><?php echo $contentDescription;?></textarea>
			    </div>

			<div class="col-md-12 col-sm-12 col-xs-12" style="text-align: right;margin-top: 2.5%">
                <button type="submit" name="submit" id="submit" class="btn btn-dark btn-md">Update <i class="fa fa-check"></i></button>
                
                <a id="showList" onclick="getList('brandSubcategory')" class="btn btn-info btn-md">List <i class="fa fa-bars"></i></a>
                <a id="showList" onclick="reload('Manage-Subcategory-Brand')" class="btn btn-info btn-md">Clear <i class="fa fa-refresh"></i></a>

            </div>
			</div>
			</form>
</div>	

               
<div id="listResult" style="display: none">
	
</div>
</div>



<?php
 if(isset($_POST['submit'])){
    
    $code = $_POST['code'];
    $subcategoryCode = $_POST['subcategory'];
    $brandCode = $_POST['brand'];

    $sub_url = $_POST['sub_url'];
    $brand_url = $_POST['brand_url'];
    
    $metaTitle = $_POST['metaTitle'];
    $metaKeyWords = $_POST['metaKeyWord'];
    $metaDescription = $_POST['metaDesc'];
    $contentDescription = $_POST['contentDescription'];
    

    $crDate = date(Ymd);
    $crBy = $_SESSION['userCode'];
    
	if(strlen($code)>0){
		$sql  = "SELECT COUNT(`id`) AS `RowCount` FROM `tbl_brand_wise_subcategory_content` WHERE `code` = '$code'";
	    $result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
			$RowCount = $row['RowCount'];
			}
	    if($RowCount > 0){
			$sql  = "UPDATE `tbl_brand_wise_subcategory_content` SET `subcategoryCode` = '$subcategoryCode', `brandCode` = '$brandCode', `sub_url` = '$sub_url', `brand_url` = '$brand_url', `contentDescription` = '$contentDescription', `metaTitle` = '$metaTitle',  `metaKeyWords` = '$metaKeyWords',  `metaDescription` = '$metaDescription',`crDate` = '$crDate',`crBy` = '$crBy' WHERE `code` = '$code'";
			$result = mysqli_query($dbcon,$sql) or die ('error 404');

			echo "<script>location='Manage-Subcategory-Brand'</script>";
		}
	}
    else{
    	$sql  = "SELECT COUNT(`id`) AS `RowCount` FROM `tbl_brand_wise_subcategory_content` WHERE `code` = '$code'";
	    $result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
			$RowCount = $row['RowCount'];
			}
	    if($RowCount > 0){
	    	echo "<script>alert('Already Content exists.');</script>";
	    	echo "<script>location='Manage-Subcategory-Brand'</script>";
	    }else{
		    $sql = "INSERT INTO `tbl_brand_wise_subcategory_content`(`id`, `code`, `subcategoryCode`, `brandCode`,`sub_url`,`brand_url`,`metaTitle`,`metaKeyWords`,`metaDescription`,`contentDescription`, `crDate`, `crBy`) VALUES ('', '', '$subcategoryCode', '$brandCode','$sub_url','$brand_url','$metaTitle','$metaKeyWords','$metaDescription','$contentDescription' ,'$crDate', '$crBy')";
		 	$result = mysqli_query($dbcon,$sql) or die ('error 4041');


		$last_id = mysqli_insert_id($dbcon);
		$n2 = str_pad($last_id, 5, 0, STR_PAD_LEFT);
		$newId =  "BWP".$n2;

		$sqlget1 = "UPDATE `tbl_brand_wise_subcategory_content` SET `code` = '$newId' WHERE `id` = '$last_id'";
		$sqldata1 = mysqli_query($dbcon,$sqlget1) or die ('error 4042X');

		echo "<script>location='Manage-Subcategory-Brand'</script>";
		}
    }
}
?>

<script type="text/javascript">
	function getSub(){
		var sel = document.getElementById('subcategory');
		var selected = sel.options[sel.selectedIndex];
		var surl = selected.getAttribute('data-surl');
		document.getElementById('sub_url').value =  surl;
	}
	function getBrand(){
		var sel2 = document.getElementById('brand');
		var selected = sel2.options[sel2.selectedIndex];
		var burl = selected.getAttribute('data-burl');
		document.getElementById('brand_url').value =  burl;
	}
</script>
<script type="text/javascript">
 CKEDITOR.replace('contentDescription');
</script> 
</body>
</html>