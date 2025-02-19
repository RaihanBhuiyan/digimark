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
<div class="card-header"><h1>Manage Awards</h1></div>
<div class="card-body">
		<form action="Award" method="post" enctype="multipart/form-data">
			<div class="row">
		  		<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Award Name</label>
			    	<input required type="text" name="awardName" value="<?php echo $award_name;?>" class="form-control" placeholder="Award Name">
					<input type="text" name="code" value="<?php echo $award_code;?>" class="form-control" style="display: none;">
		    	</div>
		    	
		  		<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Award Url</label>
			    	<input required type="text" name="awardUrl" value="<?php echo $award_Url;?>" class="form-control" placeholder="Award Url">
		    	</div>
		    	
		  		<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Meta Title</label>
			    	<input required type="text" name="metaTitle" value="<?php echo $metaTitle;?>" class="form-control" placeholder="Award Meta Title">
		    	</div>
		    	
		  		<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Meta Keyword</label>
			    	<input required type="text" name="metaKeyWord" value="<?php echo $metaKeyWord;?>" class="form-control" placeholder="Award Meta KeyWord">
		    	</div>
		    	
		  		<div class="col-md-12 col-sm-12 col-xs-12 mt-3">
			  		<label>Meta Description</label>
			    	<input required type="text" name="metaDesc" value="<?php echo $metaDesc;?>" class="form-control" placeholder="Award Meta Description">
		    	</div>
		    	
			    <div class="col-md-12 col-sm-12 col-xs-12 mt-3">
			  		<label>Short Description</label>
			    	<textarea required name="awardDesc" class="form-control" placeholder="Short Description"><?php echo $award_desc;?></textarea>
			    </div>
		    	
		  		<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Award Image</label>
			  		<?php if($award_image !== null){echo '<a href="javascript:void(0)" id="'.$award_image.'" 
			  		onclick="dispImage(this.id)">View Image</a>';}?>
			    	<input type="text" name="image_prev" class="form-control" value="<?php echo $award_image;?>" style="display: none">
			    	<?php 
			    	if($award_image !== null){echo '<input id="upload-file" type="file" name="image" class="form-control">';}
			    	else{echo '<input id="upload-file" type="file" name="image" class="form-control" required="">';}
			    	?>
			    	
			    </div>
			  	<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Status</label>
			  		<select required  name="status" class="form-control">
			  			<?php
			  			if($award_status == '1' || $award_status == '0'){
			  				if($award_status == '1'){echo '<option selected="" value="1">Active</option>
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

			<div class="col-md-12 col-sm-12 col-xs-12" id="submitRow" style="text-align: right;margin-top: 2.5%">
                <button type="submit" name="submit" id="submit" class="btn btn-dark btn-md">Update <i class="fa fa-check"></i></button>
                
                <a id="showList" onclick="getList('award')" class="btn btn-info btn-md">List <i class="fa fa-bars"></i></a>
                <a id="showList" onclick="reload('Award')" class="btn btn-info btn-md">Clear <i class="fa fa-refresh"></i></a>

            </div>
			</div>
			</form>
</div>	

               
<div id="listResult" style="display: none">
	
</div>
</div>

<?php
 if(isset($_POST['submit'])){
    
    $award_name = $_POST['awardName'];
    
    
    $award_url = $_POST['awardUrl'];
    $award_metaTitle = $_POST['metaTitle'];
    $award_metaDesc = $_POST['metaDesc'];
    $award_metaKeyWord = $_POST['metaKeyWord'];
    $award_desc = $_POST['awardDesc'];
    
    
    $award_status = $_POST['status'];
    $cr_date = date(Ymd);
    $cr_by = $_SESSION['userCode'];
    
    $code = $_POST['code'];
	if(strlen($code)>0){
			$sql  = "UPDATE `tbl_award` SET `award_name` = '$award_name', `award_url`='$award_url', `award_metaTitle`='$award_metaTitle', `award_metaDesc`='$award_metaDesc', `award_metaKeyWord`='$award_metaKeyWord', `award_desc`='$award_desc',`award_status` = '$award_status',`cr_date` = '$cr_date',`cr_by` = '$cr_by' WHERE `award_code` = '$code'";
			$result = mysqli_query($dbcon,$sql) or die ('error 404');

			if($_FILES['image']['size'] > 0){

		 	$image_prev = $_POST['image_prev'];
			unlink('../assets/images/award/'.$image_prev);

		    $name= $code."_".gmdate("YmdHis", time() + 3600*6*date("I"));;//'Brand_'.date("YFjgis");//$userId.$elName.'img'.$_FILES['image']['name'];
		    $tmp_name= $_FILES['image']['tmp_name'];
		    $fileName = $_FILES['image']['name'];
		    $position= strpos($fileName, ".");
		    $fileextension= substr($fileName, $position + 1);
		    $fileextension= strtolower($fileextension);
		    if (isset($name)) {
		        $path= '../assets/images/award/';
		        if (empty($name))
		        {
		        echo "Please choose a file";
		        }
		        else if (!empty($name)){
		            if (1!==1)
		            {
		            echo "The file extension must be PNG OR JPG order to be uploaded";
		            }
		            else if (($fileextension == "jpeg") ||($fileextension == "jpg") ||($fileextension == "PNG") || ($fileextension == "png"))
		            {
		                move_uploaded_file($tmp_name, $path.$name.".".$fileextension);
		            }
		        }
		    }
		$setName = $name.'.'.$fileextension;
		    $sql = "UPDATE `tbl_award` SET `award_image` = '$setName' WHERE `award_code` = '$code'";
	 	$result = mysqli_query($dbcon,$sql) or die ('error 4041');
		}


			echo "<script>location='Award'</script>";
	}
    else{
		$sql = "INSERT INTO `tbl_award`(`id`, `award_code`, `award_name`, `award_url`, `award_metaTitle`, `award_metaDesc`, `award_metaKeyWord`, `award_desc` `award_status`, `cr_date`, `cr_by`) VALUES ('', '', '$award_name','$award_url','$award_metaTitle','$award_metaDesc','$award_metaKeyWord','$award_desc' ,'$award_status', '$cr_date', '$cr_by')";
		$result = mysqli_query($dbcon,$sql) or die ('error 4041');


		$last_id = mysqli_insert_id($dbcon);
		$n2 = str_pad($last_id, 5, 0, STR_PAD_LEFT);
		$newId =  "AWD".$n2;

		$sqlget1 = "UPDATE `tbl_award` SET `award_code` = '$newId' WHERE `id` = '$last_id'";
		$sqldata1 = mysqli_query($dbcon,$sqlget1) or die ('error 4042X');
			

			if($_FILES['image']['size'] > 0){

		 	$image_prev = $_POST['image_prev'];
			unlink('../assets/images/award/'.$image_prev);

		    $name= $newId."_".gmdate("YmdHis", time() + 3600*6*date("I"));//'Brand_'.date("YFjgis");//$userId.$elName.'img'.$_FILES['image']['name'];
		    $tmp_name= $_FILES['image']['tmp_name'];
		    $fileName = $_FILES['image']['name'];
		    $position= strpos($fileName, ".");
		    $fileextension= substr($fileName, $position + 1);
		    $fileextension= strtolower($fileextension);
		    if (isset($name)) {
		        $path= '../assets/images/award/';
		        if (empty($name))
		        {
		        echo "Please choose a file";
		        }
		        else if (!empty($name)){
		            if (1!==1)
		            {
		            echo "The file extension must be PNG OR JPG order to be uploaded";
		            }
		            else if (($fileextension == "jpeg") ||($fileextension == "jpg") ||($fileextension == "PNG") || ($fileextension == "png"))
		            {
		                move_uploaded_file($tmp_name, $path.$name.".".$fileextension);
		            }
		        }
		    }
		$setName = $name.'.'.$fileextension;
		    $sql = "UPDATE `tbl_award` SET `award_image` = '$setName' WHERE `award_code` = '$newId'";
	 	$result = mysqli_query($dbcon,$sql) or die ('error 4041');
		}

		echo "<script>location='Award'</script>";

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
			if(this.width != 400 && this.height !== 400){
				alert("Please select square size image of (400 x 400) pixel");
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
	MyWindow=window.open('Display-Image?image='+value+'&item=award','MyWindow','width=300,height=300'); return false;
}
</script>
<script type="text/javascript">
 CKEDITOR.replace('awardDesc');
</script> 
</body>
</html>