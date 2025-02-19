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

<div class="card">
<div class="card-header"><h1>Manage Carousel</h1></div>
<div class="card-body">
		<form action="Carousel-Control" method="post" enctype="multipart/form-data">
			<div class="row">
		  		<!-- <div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Code</label>
			    	<input type="text" name="User_Code" class="form-control" placeholder="Designation">
			    </div> -->
			    <?php 
				$sql_mtnc = "SELECT `code`,`image`,`sort`,`url`,`status` FROM `tbl_img_slider`";
				$result_mtnc = mysqli_query($dbcon,$sql_mtnc) or die ('error 404');
				$i = 0;
				    while($row_mtnc = mysqli_fetch_assoc($result_mtnc)){
				    	$i++;
				        $code = $row_mtnc['code'];
				        $image = $row_mtnc['image'];
				        $sort = $row_mtnc['sort'];
				        $url = $row_mtnc['url'];
				        $status = $row_mtnc['status'];
				?>
		  		<div class="col-md-3 col-sm-12 col-xs-12 mt-3">
			  		<div class="row">
			  			<div class="col-4">
			  				<label>Carousel <?php echo $i;?></label>
			  			</div>
			  			<div class="col-4">
			  				<a href="sub-carousel-control/<?php echo $code;?>">Inner Setup</a>
			  			</div>
			  			<div class="col-4">
			  				<?php if($image !== null){echo '<a href="javascript:void(0)" id="'.$image.'" onclick="dispImage(this.id)">View Image</a>';}?>
			  			</div>
			  		</div>
			    	<input type="text" name="image_prev_<?php echo $i;?>" class="form-control" value="<?php echo $image;?>" style="display: none">
			    	<input id="upload-file" type="file" name="image_<?php echo $i;?>" class="form-control">
			    </div>
			    
			    
			    <div class="col-md-3 col-sm-12 col-xs-12 mt-3">
			  		<label>URL</label>
			  		<input type="text" name="url_<?php echo $i;?>" class="form-control" value="<?php echo $url;?>">
			    </div>
			    
			    <div class="col-md-3 col-sm-12 col-xs-12 mt-3">
			  		<label>Sort</label>
			  		<select required  name="sort_<?php echo $i;?>" class="form-control">
			  			<?php
			  			for($s = 0;$s<=6;$s++){
			  				if($sort == $s){echo '<option selected="" value="'.$s.'">'.$s.'</option>';} 
              				else{ echo '<option value="'.$s.'">'.$s.'</option>';}
			  			}
			  			?>
			  		</select>
			    </div>
			    
			    
			  	<div class="col-md-3 col-sm-12 col-xs-12 mt-3">
			  		<label>Status</label>
			  		<select required  name="status_<?php echo $i;?>" class="form-control">
			  			<?php
			  			if($status == '1' || $status == '0'){
			  				if($status == '1'){echo '<option selected="" value="1">Active</option>
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
			    <?php
			        }
			    ?>
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
    $carousel_image_1 = $_POST['image_1'];
    $carousel_image_2 = $_POST['image_2'];
    $carousel_image_3 = $_POST['image_3'];
    $carousel_image_4 = $_POST['image_4'];
    $carousel_image_5 = $_POST['image_5'];
    $carousel_image_6 = $_POST['image_6'];

    // $carousel_status_1 = $_POST['status_1'];
    // $carousel_status_2 = $_POST['status_2'];
    // $carousel_status_3 = $_POST['status_3'];
    // $carousel_status_4 = $_POST['status_4'];
    // $carousel_status_5 = $_POST['status_5'];
    // $carousel_status_6 = $_POST['status_6'];

    $cr_date = date(Ymd);
    $cr_by = $_SESSION['userCode'];

    	for($i = 1; $i<=6;$i++){
    			$code = 'C'.$i;
    			$status = $_POST['status_'.$i];
                $url = $_POST['url_'.$i];
                $sort = $_POST['sort_'.$i];

    			$sql  = "UPDATE `tbl_img_slider` SET `sort` = '$sort', `url` = '$url',`status` = '$status',`crDate` = '$cr_date',`crBy` = '$cr_by' WHERE `code` = '$code'";
				$result = mysqli_query($dbcon,$sql) or die ('error 404');
			

			if($_FILES['image_'.$i]['size'] > 0){

			 	$image_prev = $_POST['image_prev_'.$i];
				unlink('../assets/images/carousel/'.$image_prev);

			    $name= 'image_'.$i."_".gmdate("YmdHis", time() + 3600*6*date("I"));
			    $tmp_name= $_FILES['image_'.$i]['tmp_name'];
			    $fileName = $_FILES['image_'.$i]['name'];
			    $position= strpos($fileName, ".");
			    $fileextension= substr($fileName, $position + 1);
			    $fileextension= strtolower($fileextension);
			    if (isset($name)) {
			        $path= '../assets/images/carousel/';
			        if (empty($name))
			        {
			        echo "Please choose a file";
			        }
			        else if (!empty($name)){
			            if (1!==1)
			            {
			            echo "The file extension must be PNG OR JPG order to be uploaded";
			            }
			            else if (($fileextension == "jpeg") ||($fileextension == "jpg") ||($fileextension == "PNG") || ($fileextension == "png") || ($fileextension == "gif") ||($fileextension == "GIF") ||($fileextension == "svg") || ($fileextension == "SVG"))
			            {
			                move_uploaded_file($tmp_name, $path.$name.".".$fileextension);
			            }
			        }
			    }

				$setName = $name.'.'.$fileextension;

				$code = 'C'.$i;
				$sql = "UPDATE `tbl_img_slider` SET `image` = '$setName',`crDate` = '$cr_date',`crBy` = '$cr_by'  WHERE `code` = '$code'";
			 	$result = mysqli_query($dbcon,$sql) or die ('error 4041');
			}
		
		}
			echo "<script>location='Carousel-Control'</script>";
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
			if(this.width != 1024 && this.height !== 475){
				alert("Please select square size image of (1024 x 475) pixel");
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
	MyWindow=window.open('Display-Image?image='+value+'&item=carousel','MyWindow','width=300,height=300'); return false;
}
</script>

</body>
</html>