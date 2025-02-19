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
<div class="card-header"><h1>Manage Category</h1></div>
<div class="card-body">
		<form action="Category" method="post" enctype="multipart/form-data">
			<div class="row">
		  		<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Category Name</label>
			    	<input required type="text" name="categoryName" value="<?php echo $category_name;?>" class="form-control" placeholder="Category Name">
					<input type="text" name="code" value="<?php echo $category_code;?>" class="form-control" style="display: none">
		    	</div>
		  		<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Category URL</label>
			    	<input required type="text" name="categoryUrl" value="<?php echo $category_url;?>" class="form-control" placeholder="Category URL">
			    </div>
		    	
			    <div class="col-md-12 col-sm-12 col-xs-12 mt-3">
			  		<label>Short Description</label>
			    	<textarea required name="categoryDesc" class="form-control" placeholder="Short Description"><?php echo $category_desc;?></textarea>
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
			  		<label>Category Image</label>
			  		<?php if($category_image !== null){echo '<a href="javascript:void(0)" id="'.$category_image.'" 
			  		onclick="dispImage(this.id)">View Image</a>';}?>
			    	<input type="text" name="image_prev" class="form-control" value="<?php echo $category_image;?>" style="display: none">
			    	<?php 
			    	if($category_image !== null){echo '<input id="upload-file" type="file" name="image" class="form-control">';}
			    	else{echo '<input id="upload-file" type="file" name="image" class="form-control" required="">';}
			    	?>
			    	
			    </div>
			  	<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Status</label>
			  		<select required  name="status" class="form-control">
			  			<?php
			  			if($category_status == '1' || $category_status == '0'){
			  				if($category_status == '1'){echo '<option selected="" value="1">Active</option>
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
			  				if($category_sort == $i){echo '<option selected="" value="'.$i.'">'.$i.'</option>';} 
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
                
                <a id="showList" onclick="getList('category')" class="btn btn-info btn-md">List <i class="fa fa-bars"></i></a>
                <a id="showList" onclick="reload('Category')" class="btn btn-info btn-md">Clear <i class="fa fa-refresh"></i></a>

            </div>
			</div>
			</form>
</div>	

               
<div id="listResult" style="display: none">
	
</div>
</div>



<?php
 if(isset($_POST['submit'])){
    
    $category_name = $_POST['categoryName'];
    $category_url = $_POST['categoryUrl'];
    $category_desc = $_POST['categoryDesc'];
    
    $category_metaTitle = $_POST['metaTitle'];
    $category_metaKeyWord = $_POST['metaKeyWord'];
    $category_metaDesc = $_POST['metaDesc'];
    
    
    $category_status = $_POST['status'];
    $category_sort = $_POST['sort'];
    $menu_sort = $_POST['menu_sort'];
    $cr_date = date(Ymd);
    $cr_by = $_SESSION['userCode'];
    
    $code = $_POST['code'];
	if(strlen($code)>0){
		$sql  = "SELECT COUNT(`id`) AS `RowCount` FROM `tbl_category` WHERE `category_url` = '$category_url'";
	    $result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
			$RowCount = $row['RowCount'];
			}
	    if($RowCount > 0){
	    	$sort_update = "UPDATE `tbl_category` SET `category_sort` = '0' WHERE `category_sort` = '$category_sort'";
	    	$sort_update_result = mysqli_query($dbcon,$sort_update) or die ('error 404');
	    	$sort_update = "UPDATE `tbl_category` SET `menu_sort` = '0' WHERE `menu_sort` = '$menu_sort'";
	    	$sort_update_result = mysqli_query($dbcon,$sort_update) or die ('error 404');

			$sql  = "UPDATE `tbl_category` SET `category_name` = '$category_name', `category_url` = '$category_url', `category_desc` = '$category_desc', `category_metaTitle` = '$category_metaTitle',  `category_metaKeyWord` = '$category_metaKeyWord',  `category_metaDesc` = '$category_metaDesc', `category_status` = '$category_status',`category_sort` = '$category_sort',`menu_sort` = '$menu_sort',`cr_date` = '$cr_date',`cr_by` = '$cr_by' WHERE `category_code` = '$code'";
			$result = mysqli_query($dbcon,$sql) or die ('error 404');

			if($_FILES['image']['size'] > 0){

		 	$image_prev = $_POST['image_prev'];
			unlink('../assets/images/category/'.$image_prev);

		    $name= $code."_".gmdate("YmdHis", time() + 3600*6*date("I"));;//'Brand_'.date("YFjgis");//$userId.$elName.'img'.$_FILES['image']['name'];
		    $tmp_name= $_FILES['image']['tmp_name'];
		    $fileName = $_FILES['image']['name'];
		    $position= strpos($fileName, ".");
		    $fileextension= substr($fileName, $position + 1);
		    $fileextension= strtolower($fileextension);
		    if (isset($name)) {
		        $path= '../assets/images/category/';
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
		    $sql = "UPDATE `tbl_category` SET `category_image` = '$setName' WHERE `category_code` = '$code'";
	 	$result = mysqli_query($dbcon,$sql) or die ('error 4041');
		}


			echo "<script>location='Category'</script>";
		}
	}
    else{
    	$sql  = "SELECT COUNT(`id`) AS `RowCount` FROM `tbl_category` WHERE `category_url` = '$category_url'";
	    $result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
			$RowCount = $row['RowCount'];
			}
	    if($RowCount > 0){
	    	echo "<script>alert('Already URL exists.');</script>";
	    	echo "<script>location='Category'</script>";
	    }else{
	    $sort_update = "UPDATE `tbl_category` SET `category_sort` = '0' WHERE `category_sort` = '$category_sort'";
	    $sort_update_result = mysqli_query($dbcon,$sort_update) or die ('error 404');
	    
	    	$sort_update = "UPDATE `tbl_category` SET `menu_sort` = '0' WHERE `menu_sort` = '$menu_sort'";
	    	$sort_update_result = mysqli_query($dbcon,$sort_update) or die ('error 404');


		    $sql = "INSERT INTO `tbl_category`(`id`, `category_code`, `category_name`, `category_url`,`category_desc`,`category_metaTitle`,`category_metaKeyWord`,`category_metaDesc`, `category_status`,`category_sort`,`menu_sort`, `cr_date`, `cr_by`) VALUES ('', '', '$category_name', '$category_url','$category_desc','$category_metaTitle','$category_metaKeyWord','$category_metaDesc' ,'$category_status', '$category_sort','$menu_sort','$cr_date', '$cr_by')";
		 	$result = mysqli_query($dbcon,$sql) or die ('error 4041');


		$last_id = mysqli_insert_id($dbcon);
		$n2 = str_pad($last_id, 5, 0, STR_PAD_LEFT);
		$newId =  "CAT".$n2;

		$sqlget1 = "UPDATE `tbl_category` SET `category_code` = '$newId' WHERE `id` = '$last_id'";
		$sqldata1 = mysqli_query($dbcon,$sqlget1) or die ('error 4042X');
			

			if($_FILES['image']['size'] > 0){

		 	$image_prev = $_POST['image_prev'];
			unlink('../assets/images/category/'.$image_prev);

		    $name= $newId."_".gmdate("YmdHis", time() + 3600*6*date("I"));//'Brand_'.date("YFjgis");//$userId.$elName.'img'.$_FILES['image']['name'];
		    $tmp_name= $_FILES['image']['tmp_name'];
		    $fileName = $_FILES['image']['name'];
		    $position= strpos($fileName, ".");
		    $fileextension= substr($fileName, $position + 1);
		    $fileextension= strtolower($fileextension);
		    if (isset($name)) {
		        $path= '../assets/images/category/';
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
		    $sql = "UPDATE `tbl_category` SET `category_image` = '$setName' WHERE `category_code` = '$newId'";
	 	$result = mysqli_query($dbcon,$sql) or die ('error 4041');
		}

		echo "<script>location='Category'</script>";
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
				alert("Please select  size image of (300x160) pixel");
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
	MyWindow=window.open('Display-Image?image='+value+'&item=category','MyWindow','width=300,height=300'); return false;
}
</script>
<script type="text/javascript">
 CKEDITOR.replace('categoryDesc');
</script> 
</body>
</html>