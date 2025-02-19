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
<div class="card-header"><h1>Manage Product Image</h1></div>
<div class="card-body">
		<form action="Product-Image" method="post" enctype="multipart/form-data">
			<div class="row">
		  		<!-- <div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Code</label>
			    	<input type="text" name="User_Code" class="form-control" placeholder="Designation">
			    </div> -->
			    <?php 
			    $product_code = $litePath[3];
				$sql_mtnc = "SELECT * FROM `tbl_product_image` WHERE `product_code` = '$product_code'";
				$result_mtnc = mysqli_query($dbcon,$sql_mtnc) or die ('error 404');
				$i = 0;
				    while($row_mtnc = mysqli_fetch_assoc($result_mtnc)){
				    	$i++;
				        $product_code = $row_mtnc['product_code'];
				        $code = $row_mtnc['code'];
				        $image = $row_mtnc['image'];
				        $status = $row_mtnc['status'];
				?>
		  		<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Product Image <?php echo $i;?></label>
			  		<?php 
			  		if($image !== null){
			  		echo '<a href="javascript:void(0)" id="'.$image.'" onclick="dispImage(this.id)">View Image</a>';
			  		echo '<a href="javascript:void(0)" id="products'.$i.'" data-type="products"  data-product="'.$product_code.'"  data-image="'.$image.'" onclick="delImage(this.id)" style="margin-left:5%">Delete Image</a>';
			  		}
			  		?>
			    	<input type="text" name="image_prev_<?php echo $i;?>" class="form-control" value="<?php echo $image;?>" style="display: none">
			    	<input id="upload-file" type="file" name="image_<?php echo $i;?>" class="form-control">
			    </div>
			  	<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
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
			    echo '<input type="text" name="product_code" class="form-control" value="'.$product_code.'" style="display: none">';
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
 	$product_code = $_POST['product_code'];

    // $carousel_image_1 = $_POST['image_1'];
    // $carousel_image_2 = $_POST['image_2'];
    // $carousel_image_3 = $_POST['image_3'];
    // $carousel_image_4 = $_POST['image_4'];
    // $carousel_image_5 = $_POST['image_5'];
    // $carousel_image_6 = $_POST['image_6'];

    // $carousel_status_1 = $_POST['status_1'];
    // $carousel_status_2 = $_POST['status_2'];
    // $carousel_status_3 = $_POST['status_3'];
    // $carousel_status_4 = $_POST['status_4'];
    // $carousel_status_5 = $_POST['status_5'];
    // $carousel_status_6 = $_POST['status_6'];


    $crDate = date(Ymd);
    $crBy =  $_SESSION['userCode'];

    	for($i = 1; $i<=6;$i++){
    			$code = 'C'.$i;
    			$status = $_POST['status_'.$i];

    			$sql  = "UPDATE `tbl_product_image` SET `status` = '$status',`crDate` = '$crDate',`crBy` = '$crBy' WHERE `code` = '$code' AND  `product_code` = '$product_code'";
				$result = mysqli_query($dbcon,$sql) or die ('error 404');
			

			if($_FILES['image_'.$i]['size'] > 0){

			 	$image_prev = $_POST['image_prev_'.$i];
				unlink('../assets/images/products/'.$image_prev);

			    $name= $product_code.'_'.$i."_".gmdate("YmdHis", time() + 3600*6*date("I"));
			    $tmp_name= $_FILES['image_'.$i]['tmp_name'];
			    $fileName = $_FILES['image_'.$i]['name'];
			    $position= strpos($fileName, ".");
			    $fileextension= substr($fileName, $position + 1);
			    $fileextension= strtolower($fileextension);
			    if (isset($name)) {
			        $path= '../assets/images/products/';
			        if (empty($name))
			        {
			        echo "Please choose a file";
			        }
			        else if (!empty($name)){
			            if (1!==1)
			            {
			            echo "The file extension must be PNG OR JPG order to be uploaded";
			            }
			            else if (($fileextension == "jpeg") ||($fileextension == "jpg")) // ||($fileextension == "PNG") || ($fileextension == "png")
			            {
			                move_uploaded_file($tmp_name, $path.$name.".".$fileextension);
			            }
			        }
			    }

				$setName = $name.'.'.$fileextension;

				$code = 'C'.$i;
				$sql = "UPDATE `tbl_product_image` SET `image` = '$setName' WHERE `code` = '$code' AND  `product_code` = '$product_code'";
			 	$result = mysqli_query($dbcon,$sql) or die ('error 4041');
			}
		
		}
			echo "<script>location='Product-Image/".$product_code."'</script>";
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
			if(this.width != 1024 && this.height !== 1024){
				alert("Please select square size image of (1024 x 1024) pixel");
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
	MyWindow=window.open('Display-Image?image='+value+'&item=product-all','MyWindow','width=1024,height=1024'); return false;
}
</script>

<script type="text/javascript">
	function delImage(getValue){
		var setValue = getValue;
		var elem = document.getElementById(getValue);
		var type = elem.getAttribute('data-type'); 
		var product = elem.getAttribute('data-product'); 
		var image = elem.getAttribute('data-image'); 
		//alert(product+'-'+image);
	    if (confirm('Do you want to delete image')) {
            $.ajax({
		      type:"post",
		      url:"ajaxDelImage.php",
		      data:{type:type,product:product,image:image},
		      success:function(data)
		      {
		        if(!data){
		        }else{
		          if(data !== ''){
		          alert('Image Deleted');
		          location.reload();
		      	  }else{
		      	  }
		        }
		            
		      }
		    });
        }
        else {
           
        }
	}
</script>

</body>
</html>