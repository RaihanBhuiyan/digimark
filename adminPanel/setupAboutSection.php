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
<div class="card-header"><h1>Manage About Sections</h1></div>
<div class="card-body">
		<form action="About" method="post" enctype="multipart/form-data">
			<div class="row">
		  		<div class="col-md-12 col-sm-12 col-xs-12 mt-3">
			  		<label>Page</label>
			    	<input required type="text" name="aboutPage" value="<?php echo $about_page;?>" class="form-control" placeholder="About Page Name" readonly="">
					<input type="text" name="code" value="<?php echo $about_code;?>" class="form-control" style="display: none;">
		    	</div>
		    	<div class="col-md-12 col-sm-12 col-xs-12 mt-3">
			  		<label>Page Content</label>
			    	<textarea required name="aboutContent" class="form-control" placeholder="Page Content"><?php echo $about_content;?></textarea>
			    </div>
			    
		    	
			  	<div class="col-md-12 col-sm-12 col-xs-12 mt-3">
			  		<label>Status</label>
			  		<select required  name="status" class="form-control">
			  			<?php
			  			if($about_status == '1' || $about_status == '0'){
			  				if($about_status == '1'){echo '<option selected="" value="1">Active</option>
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
                
                <a id="showList" onclick="getList('about')" class="btn btn-info btn-md">List <i class="fa fa-bars"></i></a>
                <a id="showList" onclick="reload('About')" class="btn btn-info btn-md">Clear <i class="fa fa-refresh"></i></a>

            </div>
			</div>
			</form>
</div>	

               
<div id="listResult" style="display: none">
	
</div>
</div>


<?php
 if(isset($_POST['submit'])){
    
    $about_content = $_POST['aboutContent'];
    
    $about_status = $_POST['status'];
    $crDate = date(Ymd);
    $crBy =  $_SESSION['userCode'];
    
    $code = $_POST['code'];
	if(strlen($code)>0){
			$sql  = "UPDATE `tbl_about_section` SET `about_content` = '$about_content', `about_status` = '$about_status',`crDate` = '$crDate',`crBy` = '$crBy' WHERE `about_code` = '$code'";
			$result = mysqli_query($dbcon,$sql) or die ('error 404');
			echo "<script>location='About'</script>";
	}
	else{
		echo "<script>alert('Select Page First.');</script>";
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
			if(this.width != 150 && this.height !== 80){
				alert("Please select square size image of (150 x 80) pixel");
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
 CKEDITOR.replace('aboutContent');
</script> 
</body>
</html>