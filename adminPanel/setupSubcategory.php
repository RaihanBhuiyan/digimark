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
<div class="card-header"><h1>Manage Subcategory</h1></div>
<div class="card-body">
		<form action="subcategory" method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-4 col-sm-12 col-xs-12 mt-3">
			  		<label>Category Name</label>
			    	 	<?php
			    	 	echo "<select name='category' class='form-control select2' id='category' required>
			    	 	<option value=''>--Select Category--</option>";
				  		$sql  = "SELECT `category_code`,`category_name` FROM `tbl_category` WHERE `category_status` = '1'";
					    $result = mysqli_query($dbcon,$sql) or die ('error 404');
							while($row = mysqli_fetch_assoc($result)){
							$select_category_code = $row['category_code'];
							$select_category_name = $row['category_name'];

							// echo '
							// <input type="radio" id="subcategory" name="subcategory" value="'.$subcategory_code.'" onclick="subcategorySelected_for_head(this.value)">
						 //  	<label for="subcategory">'.$subcategory_name.'</label><br>
							// ';
							if($category_code == $select_category_code){
								echo '<option value='.$select_category_code.' selected>'.$select_category_name.'</option>';
							}
							else{
							echo '<option value='.$select_category_code.'>'.$select_category_name.'</option>';
							}
							}
							echo "</select>";	
				  		?>
		    	</div>
		  		<div class="col-md-4 col-sm-12 col-xs-12 mt-3">
			  		<label>Subcategory Name</label>
			    	<input required type="text" name="subcategoryName" value="<?php echo $subcategory_name;?>" class="form-control" placeholder="Subcategory Name">
					<input type="text" name="code" value="<?php echo $subcategory_code;?>" class="form-control" style="display: none">
		    	</div>
		  		<div class="col-md-4 col-sm-12 col-xs-12 mt-3">
			  		<label>subCategory URL</label>
			    	<input required type="text" name="subcategoryUrl" value="<?php echo $subcategory_url;?>" class="form-control" placeholder="Subcategory URL">
			    </div>
		    	
			    <div class="col-md-12 col-sm-12 col-xs-12 mt-3">
			  		<label>Short Description</label>
			    	<textarea required name="subcategoryDesc" class="form-control" placeholder="Short Description"><?php echo $subcategory_desc;?></textarea>
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
			  		<label>subCategory Image</label>
			  		<?php if($subcategory_image !== null){echo '<a href="javascript:void(0)" id="'.$subcategory_image.'" 
			  		onclick="dispImage(this.id)">View Image</a>';}?>
			    	<input type="text" name="image_prev" class="form-control" value="<?php echo $subcategory_image;?>" style="display: none">
			    	<?php 
			    	if($subcategory_image !== null){echo '<input id="upload-file" type="file" name="image" class="form-control">';}
			    	else{echo '<input id="upload-file" type="file" name="image" class="form-control" required="">';}
			    	?>
			    	
			    </div>
			  	<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Status</label>
			  		<select required  name="status" class="form-control">
			  			<?php
			  			if($subcategory_status == '1' || $subcategory_status == '0'){
			  				if($subcategory_status == '1'){echo '<option selected="" value="1">Active</option>
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
			  			for($i = 0;$i<=8;$i++){
			  				if($subcategory_sort == $i){echo '<option selected="" value="'.$i.'">'.$i.'</option>';} 
              				else{ echo '<option value="'.$i.'">'.$i.'</option>';}
			  			}
			  			?>
			  		</select>
			    </div>
			  	<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Menu Sort</label>
			  		<select required  name="menu_sort" class="form-control">
			  			<?php
			  			for($i = 0;$i<=10;$i++){
			  				if($menu_sort == $i){echo '<option selected="" value="'.$i.'">'.$i.'</option>';} 
              				else{ echo '<option value="'.$i.'">'.$i.'</option>';}
			  			}
			  			?>
			  		</select>
			    </div>

			<div class="col-md-12 col-sm-12 col-xs-12" style="text-align: right;margin-top: 2.5%">
                <button type="submit" name="submit" id="submit" class="btn btn-dark btn-md">Update <i class="fa fa-check"></i></button>
                
                <a id="showList" onclick="getList('subcategory')" class="btn btn-info btn-md">List <i class="fa fa-bars"></i></a>
                <a id="showList" onclick="reload('subcategory')" class="btn btn-info btn-md">Clear <i class="fa fa-refresh"></i></a>

            </div>
			</div>
			</form>
</div>	

               
<div id="listResult" style="display: none">
	
</div>
</div>



<?php
 if(isset($_POST['submit'])){
    
    $category_code = $_POST['category'];
    $subcategory_name = $_POST['subcategoryName'];
    $subcategory_url = $_POST['subcategoryUrl'];
    $subcategory_desc = $_POST['subcategoryDesc'];
    
    $subcategory_metaTitle = $_POST['metaTitle'];
    $subcategory_metaKeyWord = $_POST['metaKeyWord'];
    $subcategory_metaDesc = $_POST['metaDesc'];
    
    
    $subcategory_status = $_POST['status'];
    $subcategory_sort = $_POST['sort'];
    $menu_sort = $_POST['menu_sort'];
    $cr_date = date(Ymd);
    $cr_by = $_SESSION['userCode'];
    
    $code = $_POST['code'];
	if(strlen($code)>0){
		$sql  = "SELECT COUNT(`id`) AS `RowCount` FROM `tbl_subcategory` WHERE `subcategory_code` = '$code'";
	    $result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
			$RowCount = $row['RowCount'];
			}
	    if($RowCount > 0){
	    	$sort_update = "UPDATE `tbl_subcategory` SET `subcategory_sort` = '0' WHERE `subcategory_sort` = '$subcategory_sort'";
	    	$sort_update_result = mysqli_query($dbcon,$sort_update) or die ('error 404');
	    	$sort_update = "UPDATE `tbl_subcategory` SET `menu_sort` = '0' WHERE `menu_sort` = '$menu_sort'";
	    	$sort_update_result = mysqli_query($dbcon,$sort_update) or die ('error 404');

			$sql  = "UPDATE `tbl_subcategory` SET `category_code` = '$category_code', `subcategory_name` = '$subcategory_name', `subcategory_url` = '$subcategory_url', `subcategory_desc` = '$subcategory_desc', `subcategory_metaTitle` = '$subcategory_metaTitle',  `subcategory_metaKeyWord` = '$subcategory_metaKeyWord',  `subcategory_metaDesc` = '$subcategory_metaDesc', `subcategory_status` = '$subcategory_status',`subcategory_sort` = '$subcategory_sort',`menu_sort` = '$menu_sort',`cr_date` = '$cr_date',`cr_by` = '$cr_by' WHERE `subcategory_code` = '$code'";
			$result = mysqli_query($dbcon,$sql) or die ('error 404');

			if($_FILES['image']['size'] > 0){

		 	$image_prev = $_POST['image_prev'];
			unlink('../assets/images/subcategory/'.$image_prev);

		    $name= $code."_".gmdate("YmdHis", time() + 3600*6*date("I"));;//'Brand_'.date("YFjgis");//$userId.$elName.'img'.$_FILES['image']['name'];
		    $tmp_name= $_FILES['image']['tmp_name'];
		    $fileName = $_FILES['image']['name'];
		    $position= strpos($fileName, ".");
		    $fileextension= substr($fileName, $position + 1);
		    $fileextension= strtolower($fileextension);
		    if (isset($name)) {
		        $path= '../assets/images/subcategory/';
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
		    $sql = "UPDATE `tbl_subcategory` SET `subcategory_image` = '$setName' WHERE `subcategory_code` = '$code'";
	 	$result = mysqli_query($dbcon,$sql) or die ('error 4041');
		}


			//echo "<script>location='subcategory'</script>";
		}
	}
    else{
    	$sql  = "SELECT COUNT(`id`) AS `RowCount` FROM `tbl_subcategory` WHERE `subcategory_url` = '$subcategory_url'";
	    $result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
			$RowCount = $row['RowCount'];
			}
	    if($RowCount > 0){
	    	echo "<script>alert('Already URL exists.');</script>";
	    	echo "<script>location='subCategory'</script>";
	    }else{
	    $sort_update = "UPDATE `tbl_subcategory` SET `subcategory_sort` = '0' WHERE `subcategory_sort` = '$subcategory_sort'";
	    $sort_update_result = mysqli_query($dbcon,$sort_update) or die ('error 404');
	    
	    	$sort_update = "UPDATE `tbl_subcategory` SET `menu_sort` = '0' WHERE `menu_sort` = '$menu_sort'";
	    	$sort_update_result = mysqli_query($dbcon,$sort_update) or die ('error 404');


		    $sql = "INSERT INTO `tbl_subcategory`(`id`, `category_code`,`subcategory_code`, `subcategory_name`, `subcategory_url`,`subcategory_desc`,`subcategory_metaTitle`,`subcategory_metaKeyWord`,`subcategory_metaDesc`, `subcategory_status`,`subcategory_sort`,`menu_sort`, `cr_date`, `cr_by`) VALUES ('','$category_code' , '', '$subcategory_name', '$subcategory_url','$subcategory_desc','$subcategory_metaTitle','$subcategory_metaKeyWord','$subcategory_metaDesc' ,'$subcategory_status', '$subcategory_sort','$menu_sort','$cr_date', '$cr_by')";
		 	$result = mysqli_query($dbcon,$sql) or die ('error 4041');


		$last_id = mysqli_insert_id($dbcon);
		$n2 = str_pad($last_id, 5, 0, STR_PAD_LEFT);
		$newId =  "SCAT".$n2;

		$sqlget1 = "UPDATE `tbl_subcategory` SET `subcategory_code` = '$newId' WHERE `id` = '$last_id'";
		$sqldata1 = mysqli_query($dbcon,$sqlget1) or die ('error 4042X');
			

			if($_FILES['image']['size'] > 0){

		 	$image_prev = $_POST['image_prev'];
			unlink('../assets/images/subcategory/'.$image_prev);

		    $name= $newId."_".gmdate("YmdHis", time() + 3600*6*date("I"));//'Brand_'.date("YFjgis");//$userId.$elName.'img'.$_FILES['image']['name'];
		    $tmp_name= $_FILES['image']['tmp_name'];
		    $fileName = $_FILES['image']['name'];
		    $position= strpos($fileName, ".");
		    $fileextension= substr($fileName, $position + 1);
		    $fileextension= strtolower($fileextension);
		    if (isset($name)) {
		        $path= '../assets/images/subcategory/';
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
		    $sql = "UPDATE `tbl_subcategory` SET `subcategory_image` = '$setName' WHERE `subcategory_code` = '$newId'";
	 	$result = mysqli_query($dbcon,$sql) or die ('error 4041');
		}

		echo "<script>location='subcategory'</script>";
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
			if(this.width != 160 && this.height !== 160){
				alert("Please select  size image of (160x160) pixel");
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
	MyWindow=window.open('Display-Image?image='+value+'&item=subcategory','MyWindow','width=300,height=300'); return false;
}
</script>
<script type="text/javascript">
 CKEDITOR.replace('subcategoryDesc');
</script> 
</body>
</html>