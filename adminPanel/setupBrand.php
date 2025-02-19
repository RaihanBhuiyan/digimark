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
<div class="card-header"><h1>Manage Brand</h1></div>
<div class="card-body">
		<form action="Brand" method="post" enctype="multipart/form-data">
			<div class="row">
		  		<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Brand Name</label>
			    	<input required type="text" name="brandName" value="<?php echo $brand_name;?>" class="form-control" placeholder="brand Name">
			    	<input type="text" name="code" value="<?php echo $brand_code;?>" class="form-control" style="display: none;">
		    	</div>
		  		<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Brand URL</label>
			    	<input required type="text" name="brandUrl" value="<?php echo $brand_url;?>" class="form-control" placeholder="brand URL">
			    </div>			    
			    <div class="col-md-12 col-sm-12 col-xs-12 mt-3">
			  		<label>Short Description</label>
			    	<textarea required name="brandDesc" class="form-control" placeholder="Short Description"><?php echo $brand_desc;?></textarea>
			    </div>
			    
			    
			    
		  		<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Meta Title</label>
			    	<input required type="text" name="metaTitle" value="<?php echo $metaTitle;?>" class="form-control" placeholder="Meta Title">
		    	</div>
		    	
		  		<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Meta Keyword</label>
			    	<input  type="text" name="metaKeyWord" value="<?php echo $metaKeyWord;?>" class="form-control" placeholder="Meta KeyWord">
		    	</div>	
		    	
		  		<div class="col-md-12 col-sm-12 col-xs-12 mt-3">
			  		<label>Meta Description</label>
			    	<input  type="text" name="metaDesc" value="<?php echo $metaDesc;?>" class="form-control" placeholder="Meta Description">
		    	</div>
		    	
		    	
		  		<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Brand Foreground Image</label>
			  		<?php if($brand_image !== null){
			  		echo '<a href="javascript:void(0)" id="'.$brand_image.'" onclick="dispImage(this.id)">View Image</a>';
			  		}
			  		?>
			    	<input type="text" name="image_prev" class="form-control" value="<?php echo $brand_image;?>" style="display: none">
			    	<?php 
			    	if($brand_image !== null){echo '<input id="upload-file" type="file" name="image" class="form-control">';}
			    	else{echo '<input id="upload-file" type="file" name="image" class="form-control" required="">';}
			    	?>
			    	
			    </div>
		  		<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Brand Background Image</label>
			  		<?php if($brand_bg_image !== null){
			  		echo '<a href="javascript:void(0)" id="'.$brand_bg_image.'" onclick="dispImage(this.id)">View Image</a>';
			  		}
			  		?>
			    	<input type="text" name="bg_image_prev" class="form-control" value="<?php echo $brand_bg_image;?>" style="display: none">
			    	<?php 
			    	if($brand_bg_image !== null){echo '<input id="upload-file" type="file" name="bg_image" class="form-control">';}
			    	else{echo '<input id="upload-file" type="file" name="bg_image" class="form-control" required="">';}
			    	?>
			    	
			    </div>
			  	<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Status</label>
			  		<select required  name="status" class="form-control">
			  			<?php
			  			if($brand_status == '1' || $brand_status == '0'){
			  				if($brand_status == '1'){echo '<option selected="" value="1">Active</option>
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
			  	<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Sort</label>
			  		<select required  name="sort" class="form-control">
			  			<?php
			  			for($i = 0;$i<=35;$i++){
			  				if($brand_sort == $i){echo '<option selected="" value="'.$i.'">'.$i.'</option>';} 
              				else{ echo '<option value="'.$i.'">'.$i.'</option>';}
			  			}
			  			?>
			  		</select>
			    </div>

			<div class="col-md-12 col-sm-12 col-xs-12" style="text-align: right;margin-top: 2.5%" id="submitRow">
                <button type="submit" name="submit" id="submit" class="btn btn-dark btn-md">Update <i class="fa fa-check"></i></button>
                <a id="showList" onclick="getList('brand')" class="btn btn-info btn-md">List <i class="fa fa-bars"></i></a>
                <a id="showList" onclick="reload('Brand')" class="btn btn-info btn-md">Clear <i class="fa fa-refresh"></i></a>

            </div>
			</div>
			</form>

</div>	
<div id="listResult" style="display: none">
	
</div>
</div>

<?php
 if(isset($_POST['submit'])){

    $brand_name = $_POST['brandName'];
    $brand_url = $_POST['brandUrl'];
    $brand_desc = $_POST['brandDesc'];
    
    
    $brand_metaTitle = $_POST['metaTitle'];
    $brand_metaKeyWord = $_POST['metaKeyWord'];
    $brand_metaDesc = $_POST['metaDesc'];
    
    
    $brand_status = $_POST['status'];
    $brand_sort = $_POST['sort'];
    $cr_date = date(Ymd);
    $cr_by =  $_SESSION['userCode'];
    
    $code = $_POST['code'];
	if(strlen($code)>0){
		$sql  = "SELECT COUNT(`id`) AS `RowCount` FROM `tbl_brand` WHERE `brand_url` = '$brand_url'";
	    $result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
			$RowCount = $row['RowCount'];
			}
	    if($RowCount > 0){
	    	$sort_update = "UPDATE `tbl_brand` SET `brand_sort` = '0' WHERE `brand_sort` = '$brand_sort'";
	    	$sort_update_result = mysqli_query($dbcon,$sort_update) or die ('error 404');

			$sql  = "UPDATE `tbl_brand` SET `brand_name` = '$brand_name', `brand_url` = '$brand_url', `brand_desc` = '$brand_desc', `brand_metaTitle` = '$brand_metaTitle',  `brand_metaKeyWord` = '$brand_metaKeyWord',  `brand_metaDesc` = '$brand_metaDesc',`brand_status` = '$brand_status',`brand_sort` = '$brand_sort',`cr_date` = '$cr_date',`cr_by` = '$cr_by' WHERE `brand_code` = '$code'";
			$result = mysqli_query($dbcon,$sql) or die ('error 404');

			if($_FILES['image']['size'] > 0){

		 	$image_prev = $_POST['image_prev'];
			unlink('../assets/images/brand/'.$image_prev);

		    $name= $code."_".gmdate("YmdHis", time() + 3600*6*date("I"));;//'Brand_'.date("YFjgis");//$userId.$elName.'img'.$_FILES['image']['name'];
		    $tmp_name= $_FILES['image']['tmp_name'];
		    $fileName = $_FILES['image']['name'];
		    $position= strpos($fileName, ".");
		    $fileextension= substr($fileName, $position + 1);
		    $fileextension= strtolower($fileextension);
		    if (isset($name)) {
		        $path= '../assets/images/brand/';
		        if (empty($name))
		        {
		        echo "Please choose a file";
		        }
		        else if (!empty($name)){
		            if (1!==1)
		            {
		            echo "The file extension must be PNG OR JPG order to be uploaded";
		            }
		            else if (($fileextension == "jpeg") ||($fileextension == "jpg") ||($fileextension == "PNG") || ($fileextension == "png") || ($fileextension == "svg") || ($fileextension == "SVG"))
		            {
		                move_uploaded_file($tmp_name, $path.$name.".".$fileextension);
		            }
		        }
		    }
		$setName = $name.'.'.$fileextension;
		$sql = "UPDATE `tbl_brand` SET `brand_image` = '$setName' WHERE `brand_code` = '$code'";
	 	$result = mysqli_query($dbcon,$sql) or die ('error 4041');
		}
		
		
			if($_FILES['bg_image']['size'] > 0){

		 	$image_prev = $_POST['bg_image_prev'];
			unlink('../assets/images/brand/'.$image_prev);

		    $name= $code."_bg_".gmdate("YmdHis", time() + 3600*6*date("I"));;//'Brand_'.date("YFjgis");//$userId.$elName.'img'.$_FILES['image']['name'];
		    $tmp_name= $_FILES['bg_image']['tmp_name'];
		    $fileName = $_FILES['bg_image']['name'];
		    $position= strpos($fileName, ".");
		    $fileextension= substr($fileName, $position + 1);
		    $fileextension= strtolower($fileextension);
		    if (isset($name)) {
		        $path= '../assets/images/brand/';
		        if (empty($name))
		        {
		        echo "Please choose a file";
		        }
		        else if (!empty($name)){
		            if (1!==1)
		            {
		            echo "The file extension must be PNG OR JPG order to be uploaded";
		            }
		            else if (($fileextension == "jpeg") ||($fileextension == "jpg") ||($fileextension == "PNG") || ($fileextension == "png") || ($fileextension == "svg") || ($fileextension == "SVG"))
		            {
		                move_uploaded_file($tmp_name, $path.$name.".".$fileextension);
		            }
		        }
		    }
		$setName = $name.'.'.$fileextension;
		$sql = "UPDATE `tbl_brand` SET `brand_bg_image` = '$setName' WHERE `brand_code` = '$code'";
	 	$result = mysqli_query($dbcon,$sql) or die ('error 4041');
		}
		
			echo "<script>location='Brand'</script>";
		}
	}

    else{
	    $sql  = "SELECT COUNT(`id`) AS `RowCount` FROM `tbl_brand` WHERE `brand_url` = '$brand_url'";
	    $result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
			$RowCount = $row['RowCount'];
			}
	    if($RowCount > 0){
	    	echo "<script>alert('Update Failed : Already URL exists.');</script>";
	    	echo "<script>location='Brand'</script>";
	    }else{


	    	$sort_update = "UPDATE `tbl_brand` SET `brand_sort` = '0' WHERE `brand_sort` = '$brand_sort'";
	    	$sort_update_result = mysqli_query($dbcon,$sort_update) or die ('error 404');

	    $sql = "INSERT INTO `tbl_brand`(`id`, `brand_code`, `brand_name`, `brand_url`,`brand_desc`,`brand_metaTitle`,`brand_metaKeyWord`,`brand_metaDesc`, `brand_status`,`brand_sort`, `cr_date`, `cr_by`) VALUES ('', '', '$brand_name', '$brand_url','$brand_desc','$brand_metaTitle','$brand_metaKeyWord','$brand_metaDesc', '$brand_status','$brand_sort','$cr_date', '$cr_by')";
	 	$result = mysqli_query($dbcon,$sql) or die ('error 4041');


	$last_id = mysqli_insert_id($dbcon);
	$n2 = str_pad($last_id, 5, 0, STR_PAD_LEFT);
	$newId =  "BRAN".$n2;

	$sqlget1 = "UPDATE `tbl_brand` SET `brand_code` = '$newId' WHERE `id` = '$last_id'";
	$sqldata1 = mysqli_query($dbcon,$sqlget1) or die ('error 4042X');

	if($_FILES['image']['size'] > 0){

		 	$image_prev = $_POST['image_prev'];
			unlink('../assets/images/brand/'.$image_prev);

		    $name= $newId."_".gmdate("YmdHis", time() + 3600*6*date("I"));//'Brand_'.date("YFjgis");//$userId.$elName.'img'.$_FILES['image']['name'];
		    $tmp_name= $_FILES['image']['tmp_name'];
		    $fileName = $_FILES['image']['name'];
		    $position= strpos($fileName, ".");
		    $fileextension= substr($fileName, $position + 1);
		    $fileextension= strtolower($fileextension);
		    if (isset($name)) {
		        $path= '../assets/images/brand/';
		        if (empty($name))
		        {
		        echo "Please choose a file";
		        }
		        else if (!empty($name)){
		            if (1!==1)
		            {
		            echo "The file extension must be PNG OR JPG order to be uploaded";
		            }
		            else if (($fileextension == "jpeg") ||($fileextension == "jpg") ||($fileextension == "PNG") || ($fileextension == "png") || ($fileextension == "svg") || ($fileextension == "SVG"))
		            {
		                move_uploaded_file($tmp_name, $path.$name.".".$fileextension);
		            }
		        }
		    }
		$setName = $name.'.'.$fileextension;
		    $sql = "UPDATE `tbl_brand` SET `brand_image` = '$setName' WHERE `brand_code` = '$newId'";
	 	$result = mysqli_query($dbcon,$sql) or die ('error 4041');
		}
		
		
	if($_FILES['bg_image']['size'] > 0){

		 	$image_prev = $_POST['bg_image_prev'];
			unlink('../assets/images/brand/'.$image_prev);

		    $name= $newId."_bg_".gmdate("YmdHis", time() + 3600*6*date("I"));//'Brand_'.date("YFjgis");//$userId.$elName.'img'.$_FILES['image']['name'];
		    $tmp_name= $_FILES['bg_image']['tmp_name'];
		    $fileName = $_FILES['bg_image']['name'];
		    $position= strpos($fileName, ".");
		    $fileextension= substr($fileName, $position + 1);
		    $fileextension= strtolower($fileextension);
		    if (isset($name)) {
		        $path= '../assets/images/brand/';
		        if (empty($name))
		        {
		        echo "Please choose a file";
		        }
		        else if (!empty($name)){
		            if (1!==1)
		            {
		            echo "The file extension must be PNG OR JPG order to be uploaded";
		            }
		            else if (($fileextension == "jpeg") ||($fileextension == "jpg") ||($fileextension == "PNG") || ($fileextension == "png") || ($fileextension == "svg") || ($fileextension == "SVG"))
		            {
		                move_uploaded_file($tmp_name, $path.$name.".".$fileextension);
		            }
		        }
		    }
		$setName = $name.'.'.$fileextension;
		    $sql = "UPDATE `tbl_brand` SET `brand_bg_image` = '$setName' WHERE `brand_code` = '$newId'";
	 	$result = mysqli_query($dbcon,$sql) or die ('error 4041');
		}
		
		echo "<script>location='Brand'</script>";
	    }
	}
}
?>


<script type="text/javascript">
var upload = document.querySelector("#upload-file");
upload.onchange = function()
{
		var url = URL.createObjectURL(this.files[0]);
		var img = new Image();
		img.src = url;
		img.onload = function()
		{
			if(this.width != 300 && this.height !== 160){
				alert("Please select square size image of (300 x 160) pixel");
				document.getElementById('submitRow').style.display = 'none';
			}else{
				document.getElementById('submitRow').style.display = 'block';
			}
		}
		img.remove();
}

</script>
<script type="text/javascript">

function dispImage(value){
	//alert(value);
	MyWindow=window.open('Display-Image?image='+value+'&item=brand','MyWindow','width=300,height=300'); return false;
}
</script>


<script type="text/javascript">
 CKEDITOR.replace('brandDesc');
</script> 
</body>
</html>