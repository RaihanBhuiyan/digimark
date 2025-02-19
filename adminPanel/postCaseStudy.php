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
<div class="card-header"><h1>Manage Case Study</h1></div>
<div class="card-body">
		<form action="Manage-Case-Study" method="post" enctype="multipart/form-data">
			<div class="row">
		  		<!-- <div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Code</label>
			    	<input type="text" name="User_Code" class="form-control" placeholder="Designation">
			    </div> -->
		  		<div class="col-md-12 col-sm-12 col-xs-12 mt-3">
			  		<label>Case Study Title</label>
			    	<input required type="text" name="cs_title" value="<?php echo $cs_title;?>" class="form-control" placeholder="Case Study Title">
			    	<input type="text" name="code" value="<?php echo $cs_code;?>" class="form-control" style="display: none;">
		    	</div>
		    	
		    	
		  		<div class="col-md-12 col-sm-12 col-xs-12 mt-3">
			  		<label>URL</label>
			    	<input required type="text" name="cs_url" value="<?php echo $cs_url;?>" class="form-control" placeholder="Case Study Url">
		    	</div>
		    	
		  		<div class="col-md-12 col-sm-12 col-xs-12 mt-3">
			  		<label>Case Study Details</label>
			    	<textarea required name="details" class="form-control" placeholder="Deatils"><?php echo $cs_details;?></textarea>
			    </div>
			    
			    
		    	
		  		<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Meta Title</label>
			    	<input required type="text" name="metaTitle" value="<?php echo $metaTitle;?>" class="form-control" placeholder="Meta Title">
		    	</div>
		    	
		  		<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Meta Keyword</label>
			    	<input type="text" name="metaKeyWord" value="<?php echo $metaKeyWord;?>" class="form-control" placeholder="Meta KeyWord">
		    	</div>	
		    	
		  		<div class="col-md-12 col-sm-12 col-xs-12 mt-3">
			  		<label>Meta Description</label>
			    	<input type="text" name="metaDesc" value="<?php echo $metaDesc;?>" class="form-control" placeholder="Meta Description">
		    	</div>
		    	
		    	
		  		<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Thumbnail Image</label>
			  		<?php if($cs_image !== null){echo '<a href="javascript:void(0)" id="'.$cs_image.'" 
			  		onclick="dispImage(this.id)">View Image</a>';}?>
			    	<input type="text" name="image_prev" class="form-control" value="<?php echo $cs_image;?>" style="display: none">
			    	<input id="upload-file" type="file" name="image" class="form-control">
			    </div>
			  	<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Status</label>
			  		<select required  name="status" class="form-control">
			  			<?php
			  			// if($cs_status == '1' || $cs_status == '0'){
			  			// 	if($cs_status == '1'){echo '<option selected="" value="1">Active</option>
			  			// <option value="0">Inactive</option>';} 
        //       				else{ echo '<option value="1">Active</option>
			  			// <option selected="" value="0">Inactive</option>';}
			  			// }else{
			  			// echo '<option selected="" value="1">Active</option>
			  			// <option value="0">Inactive</option>';
			  			// }
			  			
			  			
			  			
			  			if($cs_status == '0' || $cs_status == '1' || $cs_status == '2'){
			  				if($cs_status == '0'){
			  				echo '
			  			    <option value="0" selected="">Inactive</option>
			  				<option value="1">Active</option>
			  				<option value="2">Active & Pinned</option>';
			  				} 
              				else if($cs_status == '1'){
              				echo '
			  			    <option value="0">Inactive</option>
			  				<option value="1" selected="">Active</option>
			  				<option value="2">Active & Pinned</option>';
              				}
              				else if($cs_status == '2'){
              				echo '
			  			    <option value="0">Inactive</option>
			  				<option value="1">Active</option>
			  				<option value="2" selected="">Active & Pinned</option>';
              				}
			  			}else{
			  			echo '<option value="0">Inactive</option>
			  				<option value="1">Active</option>
			  				<option value="2">Active & Pinned</option>';
			  			}
			  			?>
			  		</select>
			    </div>

			<div class="col-md-12 col-sm-12 col-xs-12" style="text-align: right;margin-top: 2.5%" id="submitRow">
                <button type="submit" name="submit" id="submit" class="btn btn-dark btn-md">Update <i class="fa fa-check"></i></button>
                <a id="showList" onclick="getList('Manage-Case-Study')" class="btn btn-info btn-md">List <i class="fa fa-bars"></i></a>
                <a id="showList" onclick="reload('Manage-Case-Study')" class="btn btn-info btn-md">Clear <i class="fa fa-refresh"></i></a>

            </div>
			</div>
			</form>

</div>	
<div id="listResult" style="display: none">
	
</div>
</div>

<?php
 if(isset($_POST['submit'])){

    $cs_title = addslashes($_POST['cs_title']);
    $cs_url = addslashes($_POST['cs_url']);
    $cs_details = addslashes($_POST['details']);
    $cs_status = addslashes($_POST['status']);
    
    
    
    $metaTitle = addslashes($_POST['metaTitle']);
    $metaDesc = addslashes($_POST['metaDesc']);
    $metaKeyWord = addslashes($_POST['metaKeyWord']);
    
    $crDate = date(Ymd);
    $crBy =  $_SESSION['userCode'];
    
    $code = $_POST['code'];
	if(strlen($code)>0){
	    
	    
	        if($cs_status == 2){
	            $sql  = "UPDATE `tbl_case_study` SET `status` = '1' WHERE `status` = '2'";
                $result = mysqli_query($dbcon,$sql) or die ('error 404');
	        }
	    
	    
			$sql  = "UPDATE `tbl_case_study` SET `title` = '$cs_title', `url` = '$cs_url', `details` = '$cs_details',  `metaTitle` = '$metaTitle',  `metaDesc` = '$metaDesc',  `metaKeyWord` = '$metaKeyWord', `status` = '$cs_status',`crDate` = '$crDate',`crBy` = '$crBy' WHERE `code` = '$code'";
			$result = mysqli_query($dbcon,$sql) or die ('error 404');

			if($_FILES['image']['size'] > 0){

		 	$image_prev = $_POST['image_prev'];
			unlink('../assets/images/case_study/'.$image_prev);

		    $name= $code."_".gmdate("YmdHis", time() + 3600*6*date("I"));;//'case_study_'.date("YFjgis");//$userId.$elName.'img'.$_FILES['image']['name'];
		    $tmp_name= $_FILES['image']['tmp_name'];
		    $fileName = $_FILES['image']['name'];
		    $position= strpos($fileName, ".");
		    $fileextension= substr($fileName, $position + 1);
		    $fileextension= strtolower($fileextension);
		    if (isset($name)) {
		        $path= '../assets/images/case_study/';
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
		    $sql = "UPDATE `tbl_case_study` SET `thumbnail` = '$setName' WHERE `code` = '$code'";
	 	$result = mysqli_query($dbcon,$sql) or die ('error 4041');
		}
		
			echo "<script>location=Manage-Case-Study'</script>";
		}
	

    else{
        
        
	        if($cs_status == 2){
	            $sql  = "UPDATE `tbl_case_study` SET `status` = '1' WHERE `status` = '2'";
                $result = mysqli_query($dbcon,$sql) or die ('error 404');
	        }
	        
	        
	    $sql = "INSERT INTO `tbl_case_study`(`id`, `code`, `title`, `url`, `details`,`metaTitle`,`metaDesc`,`metaKeyWord`, `status`, `crDate`, `crBy`) VALUES ('', '', '$cs_title', '$cs_url', '$cs_details','$metaTitle','$metaDesc','$metaKeyWord', '$cs_status', '$crDate', '$crBy')";
	 	$result = mysqli_query($dbcon,$sql) or die ('error 4042');


	$last_id = mysqli_insert_id($dbcon);
	$n2 = str_pad($last_id, 5, 0, STR_PAD_LEFT);
	$newId =  "CS".$n2;

	$sqlget1 = "UPDATE `tbl_case_study` SET `code` = '$newId' WHERE `id` = '$last_id'";
	$sqldata1 = mysqli_query($dbcon,$sqlget1) or die ('error 4042X');

	if($_FILES['image']['size'] > 0){

		 	$image_prev = $_POST['image_prev'];
			unlink('../assets/images/case_study/'.$image_prev);

		    $name= $newId."_".gmdate("YmdHis", time() + 3600*6*date("I"));;//'case_study_'.date("YFjgis");//$userId.$elName.'img'.$_FILES['image']['name'];
		    $tmp_name= $_FILES['image']['tmp_name'];
		    $fileName = $_FILES['image']['name'];
		    $position= strpos($fileName, ".");
		    $fileextension= substr($fileName, $position + 1);
		    $fileextension= strtolower($fileextension);
		    if (isset($name)) {
		        $path= '../assets/images/case_study/';
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
		    $sql = "UPDATE `tbl_case_study` SET `thumbnail` = '$setName' WHERE `code` = '$newId'";
	 	$result = mysqli_query($dbcon,$sql) or die ('error 4041');
		}
		
		echo "<script>location=Manage-Case-Study'</script>";
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
			if(this.width != 400 && this.height !== 300){
				alert("Please select square size image of (400 x 300) pixel");
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
	MyWindow=window.open('Display-Image?image='+value+'&item=case_study','MyWindow','width=300,height=300'); return false;
}
</script>

<script type="text/javascript">
 CKEDITOR.replace('details');
</script> 
</body>
</html>