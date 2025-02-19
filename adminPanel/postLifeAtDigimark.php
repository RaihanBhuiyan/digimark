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
<div class="card-header"><h1>Manage Life at Digimark</h1></div>
<div class="card-body">
		<form action="Manage-Life-At-Digimark" method="post" enctype="multipart/form-data">
			<div class="row">
		  		<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
		  		    <input type="text" name="code" value="<?php echo $life_code;?>" class="form-control" style="display: none;">
			  		<label>Select Image</label>
			  		<?php if($life_image !== null){echo '<a href="javascript:void(0)" id="'.$life_image.'" 
			  		onclick="dispImage(this.id)">View Image</a>';}?>
			    	<input type="text" name="image_prev" class="form-control" value="<?php echo $life_image;?>" style="display: none">
			    	<input id="upload-file" type="file" name="image" class="form-control">
			    </div>
			  	<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Status</label>
			  		<select required  name="status" class="form-control">
			  			<?php
			  			// if($news_status == '1' || $news_status == '0'){
			  			// 	if($news_status == '1'){echo '<option selected="" value="1">Active</option>
			  			// <option value="0">Inactive</option>';} 
        //       				else{ echo '<option value="1">Active</option>
			  			// <option selected="" value="0">Inactive</option>';}
			  			// }else{
			  			// echo '<option selected="" value="1">Active</option>
			  			// <option value="0">Inactive</option>';
			  			// }
			  			
			  			if($news_status == '0' || $news_status == '1'){
			  				if($news_status == '0'){
			  				echo '
			  			    <option value="0" selected="">Inactive</option>
			  				<option value="1">Active</option>';
			  				} 
              				else if($news_status == '1'){
              				echo '
			  			    <option value="0">Inactive</option>
			  				<option value="1" selected="">Active</option>';
              				}
			  			}else{
			  			echo '<option value="0" selected="">Inactive</option>
			  				<option value="1">Active</option>';
			  			}
			  			?>
			  		</select>
			    </div>

			<div class="col-md-12 col-sm-12 col-xs-12" style="text-align: right;margin-top: 2.5%" id="submitRow">
                <button type="submit" name="submit" id="submit" class="btn btn-dark btn-md">Update <i class="fa fa-check"></i></button>
                <a id="showList" onclick="getList('Manage-Life-At-Digimark')" class="btn btn-info btn-md">List <i class="fa fa-bars"></i></a>
                <a id="showList" onclick="reload('Manage-Life-At-Digimark')" class="btn btn-info btn-md">Clear <i class="fa fa-refresh"></i></a>

            </div>
			</div>
			</form>

</div>	
<div id="listResult" style="display: none">
	
</div>
</div>

<?php
 if(isset($_POST['submit'])){


    $news_status = $_POST['status'];
    
    
    $crDate = date(Ymd);
    $crBy = $_SESSION['userCode'];
    
    $code = $_POST['code'];
	if(strlen($code)>0){ 
			$sql  = "UPDATE `tbl_life_at_digimark` SET  `status` = '$news_status',`crDate` = '$crDate',`crBy` = '$crBy' WHERE `code` = '$code'";
			$result = mysqli_query($dbcon,$sql) or die ('error 404');

			if($_FILES['image']['size'] > 0){

		 	$image_prev = $_POST['image_prev'];
			unlink('../assets/images/life_at_digimark/'.$image_prev);

		    $name= $code."_".gmdate("YmdHis", time() + 3600*6*date("I"));;//'news_'.date("YFjgis");//$userId.$elName.'img'.$_FILES['image']['name'];
		    $tmp_name= $_FILES['image']['tmp_name'];
		    $fileName = $_FILES['image']['name'];
		    $position= strpos($fileName, ".");
		    $fileextension= substr($fileName, $position + 1);
		    $fileextension= strtolower($fileextension);
		    if (isset($name)) {
		        $path= '../assets/images/life_at_digimark/';
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
		    $sql = "UPDATE `tbl_life_at_digimark` SET `thumbnail` = '$setName' WHERE `code` = '$code'";
	 	$result = mysqli_query($dbcon,$sql) or die ('error 4041');
		}
		
			echo "<script>location='Manage-Life-At-Digimark'</script>";
		}
	

    else{ 
	    $sql = "INSERT INTO `tbl_life_at_digimark`(`id`, `code`, `status`, `crDate`, `crBy`) VALUES ('', '', '$news_status', '$crDate', '$crBy')";
	 	$result = mysqli_query($dbcon,$sql) or die ('error 4042');


	$last_id = mysqli_insert_id($dbcon);
	$n2 = str_pad($last_id, 5, 0, STR_PAD_LEFT);
	$newId =  "LAD".$n2;

	$sqlget1 = "UPDATE `tbl_life_at_digimark` SET `code` = '$newId' WHERE `id` = '$last_id'";
	$sqldata1 = mysqli_query($dbcon,$sqlget1) or die ('error 4042X');

	if($_FILES['image']['size'] > 0){

		 	$image_prev = $_POST['image_prev'];
			unlink('../assets/images/life_at_digimark/'.$image_prev);

		    $name= $newId."_".gmdate("YmdHis", time() + 3600*6*date("I"));;//'news_'.date("YFjgis");//$userId.$elName.'img'.$_FILES['image']['name'];
		    $tmp_name= $_FILES['image']['tmp_name'];
		    $fileName = $_FILES['image']['name'];
		    $position= strpos($fileName, ".");
		    $fileextension= substr($fileName, $position + 1);
		    $fileextension= strtolower($fileextension);
		    if (isset($name)) {
		        $path= '../assets/images/life_at_digimark/';
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
		    $sql = "UPDATE `tbl_life_at_digimark` SET `thumbnail` = '$setName' WHERE `code` = '$newId'";
	 	$result = mysqli_query($dbcon,$sql) or die ('error 4041');
		}
		
		echo "<script>location='Manage-Life-At-Digimark'</script>";
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
			if(this.width != 1200 && this.height !== 900){
				alert("Please select square size image of (1200 x 900) pixel");
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
	MyWindow=window.open('Display-Image?image='+value+'&item=life-at-digimark','MyWindow','width=300,height=300'); return false;
}
</script>

<script type="text/javascript">
 CKEDITOR.replace('details');
</script> 
</body>
</html>