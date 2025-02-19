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
<div class="card-header"><h1>Partner Item Upload</h1></div>
<div class="card-body">
		<form action="Partner-Item-Upload" method="post" enctype="multipart/form-data">
			<div class="row">
		  		<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Name</label>
			    	<input required type="text" name="itemName" value="<?php echo $item_name;?>" class="form-control" placeholder="item Name">
					<input type="text" name="code" value="<?php echo $item_code;?>" class="form-control" style="display: none;">
		    	</div>
		  		<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>File</label>
			  		<?php if($item_file !== null){echo '<a href="javascript:void(0)" id="'.$item_file.'" 
			  		onclick="dispImage(this.id)">View Image</a>';}?>
			    	<input type="text" name="file_prev" class="form-control" value="<?php echo $item_file;?>" style="display: none">
			    	<?php 
			    	if($item_file !== null){echo '<input id="upload-file" type="file" name="file" class="form-control">';}
			    	else{echo '<input id="upload-file" type="file" name="file" class="form-control" >';}
			    	?>
			    	
			    </div>
		  		<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Type</label>
			  		<select required  name="type" class="form-control">
			  			<?php
			  			// if($item_type == '1' || $item_type == '0'){
			  			// 	if($item_type == '1'){echo '<option selected="" value="1">Software</option>
			  			// <option value="0">other</option>';} 
        //       				else{ echo '<option value="1">Software</option>
			  			// <option selected="" value="0">other</option>';}
			  			// }else{
			  			// echo '<option selected="" value="1">Software</option>
			  			// <option value="0">other</option>';
			  			// }

			  			if($item_type == '1' || $item_type == '2' || $item_type == '3' || $item_type == '4'){
			  			    if($item_type == '1'){
    			  			echo '<option selected="" value="1">Price List</option>
    			  			<option value="2">Softwares & Firmwares</option>
    			  			<option value="3">Tutorials</option>
    			  			<option value="4">User Manuals</option>';
    			  			} 
    			  			else if($item_type == '2'){
    			  			echo '<optionvalue="1">Price List</option>
    			  			<option selected=""  value="2">Softwares & Firmwares</option>
    			  			<option value="3">Tutorials</option>
    			  			<option value="4">User Manuals</option>';
    			  			} 
    			  			else if($item_type == '3'){
    			  		    echo '<option value="1">Price List</option>
    			  			<option value="2">Softwares & Firmwares</option>
    			  			<option selected="" value="3">User Manuals</option>
    			  			<option value="4">Tutorials</option>';  
    			  			} 
    			  			else if($item_type == '4'){
    			  			echo '<option value="1">Price List</option>
    			  			<option value="2">Softwares & Firmwares</option>
    			  			<option value="3">Tutorials</option>
    			  			<option selected="" value="4">User Manuals</option>';
    			  			} 
			  			}else{
			  			echo '
			  			<option selected="" value="">Select Type</option>
			  			<option value="1">Price List</option>
			  			<option value="2">Softwares & Firmwares</option>
			  			<option value="3">User Manuals</option>
			  			<option value="4">Tutorials</option>';
			  			}
			  			?>
			  		</select>
			    	
			    </div>
			    <div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>External Link</label>
			    	<input type="text" name="itemExternalLink" value="<?php echo $item_external_link;?>" class="form-control" placeholder="External Link">
		    	</div>
		    	
		    	<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Logo (Optional)</label>
			  		<?php if($item_logo !== null){echo '<a href="javascript:void(0)" id="'.$item_logo.'" 
			  		onclick="dispImage(this.id)">View Image</a>';}?>
			    	<input type="text" name="image_prev" class="form-control" value="<?php echo $item_logo;?>" style="display: none">
			    	<?php 
			    	if($item_logo !== null){echo '<input id="upload-file" type="file" name="image" class="form-control">';}
			    	else{echo '<input id="upload-file" type="file" name="image" class="form-control" required="">';}
			    	?>
			    	
			    </div>
			    
			    
			  	<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Status</label>
			  		<select required  name="status" class="form-control">
			  			<?php
			  			if($item_status == '1' || $item_status == '0'){
			  				if($item_status == '1'){echo '<option selected="" value="1">Active</option>
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
                <button type="submit" name="submit" id="submit" class="btn btn-dark btn-md">Update <i class="fa fa-check"></i></button>
                
                <a id="showList" onclick="getList('partner-item')" class="btn btn-info btn-md">List <i class="fa fa-bars"></i></a>
                <a id="showList" onclick="reload('Partner-Item-Upload')" class="btn btn-info btn-md">Clear <i class="fa fa-refresh"></i></a>

            </div>
			</div>
			</form>
</div>	

               
<div id="listResult" style="display: none">
	
</div>
</div>

<?php
 if(isset($_POST['submit'])){
    
    $item_name = $_POST['itemName'];
    $item_external_link = $_POST['itemExternalLink'];
    $item_type = $_POST['type'];
    $item_status = $_POST['status'];
    $crDate = date(Ymd);
    $crBy = $_SESSION['userCode'];
    
    $code = $_POST['code'];
	if(strlen($code)>0){
			$sql  = "UPDATE `tbl_partner_items` SET `item_name` = '$item_name', `item_status` = '$item_status', `item_type` = '$item_type',`item_external_link` = '$item_external_link',`crDate` = '$crDate',`crBy` = '$crBy' WHERE `item_code` = '$code'";
			$result = mysqli_query($dbcon,$sql) or die ('error 404');

			if($_FILES['file']['size'] > 0){

		 	$file_prev = $_POST['file_prev'];
			unlink('../assets/partnerItems/'.$file_prev);

		    $name= $code."_".gmdate("YmdHis", time() + 3600*6*date("I"));;//'Brand_'.date("YFjgis");//$userId.$elName.'img'.$_FILES['file']['name'];
		    $tmp_name= $_FILES['file']['tmp_name'];
		    $fileName = $_FILES['file']['name'];
		    $position= strpos($fileName, ".");
		    $fileextension= substr($fileName, $position + 1);
		    $fileextension= strtolower($fileextension);
		    if (isset($name)) {
		        $path= '../assets/partnerItems/';
		        if (empty($name))
		        {
		        echo "Please choose a file";
		        }
		        else if (!empty($name)){
		            if (1!==1)
		            {
		            echo "The file extension must be PNG OR JPG order to be uploaded";
		            }
		            else
		            {
		                move_uploaded_file($tmp_name, $path.$name.".".$fileextension);
		            }
		        }
		    }
		$setName = $name.'.'.$fileextension;
		    $sql = "UPDATE `tbl_partner_items` SET `item_file` = '$setName' WHERE `item_code` = '$code'";
	 	$result = mysqli_query($dbcon,$sql) or die ('error 4041');
		}

if($_FILES['image']['size'] > 0){

		 	$image_prev = $_POST['image_prev'];
			unlink('../assets/partnerItemsLogo/'.$image_prev);

		    $name= "L".$code."_".gmdate("YmdHis", time() + 3600*6*date("I"));;//'Brand_'.date("YFjgis");//$userId.$elName.'img'.$_FILES['image']['name'];
		    $tmp_name= $_FILES['image']['tmp_name'];
		    $fileName = $_FILES['image']['name'];
		    $position= strpos($fileName, ".");
		    $fileextension= substr($fileName, $position + 1);
		    $fileextension= strtolower($fileextension);
		    if (isset($name)) {
		        $path= '../assets/partnerItemsLogo/';
		        if (empty($name))
		        {
		        echo "Please choose a file";
		        }
		        else if (!empty($name)){
		            if (1!==1)
		            {
		            echo "The file extension must be PNG OR JPG order to be uploaded";
		            }
		            else if (($fileextension == "jpeg") ||($fileextension == "jpg") ||($fileextension == "PNG") || ($fileextension == "png") ||($fileextension == "GIF") || ($fileextension == "gif"))
		            {
		                move_uploaded_file($tmp_name, $path.$name.".".$fileextension);
		            }
		        }
		    }
		$setName = $name.'.'.$fileextension;
		    $sql = "UPDATE `tbl_partner_items` SET `item_logo` = '$setName' WHERE `item_code` = '$code'";
	 	$result = mysqli_query($dbcon,$sql) or die ('error 4041');
		}
			echo "<script>location='Partner-Item-Upload'</script>";
	}
    else{
		$sql = "INSERT INTO `tbl_partner_items`(`id`, `item_code`, `item_type`, `item_name`, `item_file`,`item_external_link`, `item_logo`, `item_status`, `crDate`, `crBy`) VALUES ('', '','$item_type', '$item_name', '$item_file','$item_external_link','$item_logo','$item_status', '$crDate', '$crBy')";
		$result = mysqli_query($dbcon,$sql) or die ('error 4041');


		$last_id = mysqli_insert_id($dbcon);
		$n2 = str_pad($last_id, 5, 0, STR_PAD_LEFT);
		$newId =  "PIT".$n2;

		$sqlget1 = "UPDATE `tbl_partner_items` SET `item_code` = '$newId' WHERE `id` = '$last_id'";
		$sqldata1 = mysqli_query($dbcon,$sqlget1) or die ('error 4042X');
			

			if($_FILES['file']['size'] > 0){

		 	$file_prev = $_POST['file_prev'];
			unlink('../assets/partnerItems/'.$file_prev);

		    $name= $newId."_".gmdate("YmdHis", time() + 3600*6*date("I"));//'Brand_'.date("YFjgis");//$userId.$elName.'img'.$_FILES['file']['name'];
		    $tmp_name= $_FILES['file']['tmp_name'];
		    $fileName = $_FILES['file']['name'];
		    $position= strpos($fileName, ".");
		    $fileextension= substr($fileName, $position + 1);
		    $fileextension= strtolower($fileextension);
		    if (isset($name)) {
		        $path= '../assets/partnerItems/';
		        if (empty($name))
		        {
		        echo "Please choose a file";
		        }
		        else if (!empty($name)){
		            if (1!==1)
		            {
		            echo "The file extension must be PNG OR JPG order to be uploaded";
		            }
		            else
		            {
		                move_uploaded_file($tmp_name, $path.$name.".".$fileextension);
		            }
		        }
		    }
		$setName = $name.'.'.$fileextension;
		    $sql = "UPDATE `tbl_partner_items` SET `item_file` = '$setName' WHERE `item_code` = '$newId'";
	 	$result = mysqli_query($dbcon,$sql) or die ('error 4041');
		}
		
		if($_FILES['image']['size'] > 0){

		 	$image_prev = $_POST['image_prev'];
			unlink('../assets/partnerItemsLogo/'.$image_prev);

		    $name= "L".$newId."_".gmdate("YmdHis", time() + 3600*6*date("I"));;//'Brand_'.date("YFjgis");//$userId.$elName.'img'.$_FILES['image']['name'];
		    $tmp_name= $_FILES['image']['tmp_name'];
		    $fileName = $_FILES['image']['name'];
		    $position= strpos($fileName, ".");
		    $fileextension= substr($fileName, $position + 1);
		    $fileextension= strtolower($fileextension);
		    if (isset($name)) {
		        $path= '../assets/partnerItemsLogo/';
		        if (empty($name))
		        {
		        echo "Please choose a file";
		        }
		        else if (!empty($name)){
		            if (1!==1)
		            {
		            echo "The file extension must be PNG OR JPG order to be uploaded";
		            }
		            else if (($fileextension == "jpeg") ||($fileextension == "jpg") ||($fileextension == "PNG") || ($fileextension == "png") ||($fileextension == "GIF") || ($fileextension == "gif"))
		            {
		                move_uploaded_file($tmp_name, $path.$name.".".$fileextension);
		            }
		        }
		    }
		$setName = $name.'.'.$fileextension;
		    $sql = "UPDATE `tbl_partner_items` SET `item_logo` = '$setName' WHERE `item_code` = '$newId'";
	 	$result = mysqli_query($dbcon,$sql) or die ('error 4041');
		}

		echo "<script>location='Partner-Item-Upload'</script>";

    }
}
?>

<script type="text/javascript">
// var upload = document.querySelector("#upload-file");
// upload.onchange = function()
// {
// 		var url = URL.createObjectURL(this.files[0]);
// 		var img = new Image();
// 		img.src = url;
// 		img.onload = function()
// 		{
// 			if(this.width != 150 && this.height !== 80){
// 				alert("Please select square size image of (150 x 80) pixel");
// 				document.getElementById('submitRow').style.display = 'none';
// 			}else{
// 				document.getElementById('submitRow').style.display = 'block';
// 			}
// 		}
// 		img.remove();
// }

</script>
<script type="text/javascript">

function dispImage(value){
	//alert(value);
	MyWindow=window.open('Display-Image?image='+value+'&item=award','MyWindow','width=300,height=300'); return false;
}
</script>
<script type="text/javascript">
 CKEDITOR.replace('categoryDesc');
</script> 
</body>
</html>