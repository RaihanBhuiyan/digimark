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
include('../assets/database/config.php');
?>
<?php include('sidebar.php');?>
<?php 
			$sql_mtnc = "SELECT `advImg`,`adv` FROM `maintenance`";
		  	$result_mtnc = mysqli_query($dbcon,$sql_mtnc) or die ('error 404');
        		while($row_mtnc = mysqli_fetch_assoc($result_mtnc)){
            		$brand_image = $row_mtnc['advImg'];
            		$brand_status = $row_mtnc['adv'];
        }
?>
<div class="card">
<div class="card-header"><h1>Manage Overlay Ad</h1></div>
<div class="card-body">
		<form action="Overlay-Adv" method="post" enctype="multipart/form-data">
			<div class="row">
		  		<!-- <div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Code</label>
			    	<input type="text" name="User_Code" class="form-control" placeholder="Designation">
			    </div> -->
		  		<div class="col-md-3 col-sm-12 col-xs-12 mt-3">
			  		<label>Adv Image</label>
			  		<?php if($brand_image !== null){echo '<a href="javascript:void(0)" id="'.$brand_image.'" 
			  		onclick="dispImage(this.id)">View Image</a>';}?>
			    	<input type="text" name="image_prev" class="form-control" value="<?php echo $brand_image;?>" style="display: none">
			    	<input id="upload-file" type="file" name="image" class="form-control">
			    </div>
			  	<div class="col-md-3 col-sm-12 col-xs-12 mt-3">
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

			<div class="col-md-12 col-sm-12 col-xs-12" style="text-align: right;margin-top: 2.5%" id="submitRow">
                <button type="submit" name="submit" id="submit" class="btn btn-dark btn-md">Update <i class="fa fa-check"></i></button>
                <!-- <a id="showList" onclick="getList('brand')" class="btn btn-info btn-md">List <i class="fa fa-bars"></i></a>
                <a id="showList" onclick="reload('Brand')" class="btn btn-info btn-md">Clear <i class="fa fa-refresh"></i></a> -->

            </div>
			</div>
			</form>

</div>	
<div id="listResult" style="display: none">
	
</div>
</div>

<?php
 if(isset($_POST['submit'])){

    $brand_status = $_POST['status'];
    $cr_date = date(Ymd);
    $cr_by = $_SESSION['userCode'];

			$sql  = "UPDATE `maintenance` SET `adv` = '$brand_status'";
			$result = mysqli_query($dbcon,$sql) or die ('error 404');

			if($_FILES['image']['size'] > 0){

		 	$image_prev = $_POST['image_prev'];
			unlink('../assets/images/adv/'.$image_prev);

		    $name= 'ADV'."_".gmdate("YmdHis", time() + 3600*6*date("I"));;//'Brand_'.date("YFjgis");//$userId.$elName.'img'.$_FILES['image']['name'];
		    $tmp_name= $_FILES['image']['tmp_name'];
		    $fileName = $_FILES['image']['name'];
		    $position= strpos($fileName, ".");
		    $fileextension= substr($fileName, $position + 1);
		    $fileextension= strtolower($fileextension);
		    if (isset($name)) {
		        $path= '../assets/images/adv/';
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
		    $sql = "UPDATE `maintenance` SET `advImg` = '$setName'";
	 	$result = mysqli_query($dbcon,$sql) or die ('error 4041');
		}
		
			echo "<script>location='Overlay-Adv'</script>";
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
			if(this.width != 500 && this.height !== 300){
				alert("Please select square size image of (500 x 300) pixel");
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
	MyWindow=window.open('Display-Image?image='+value+'&item=adv','MyWindow','width=300,height=300'); return false;
}
</script>

</body>
</html>