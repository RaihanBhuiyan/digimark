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
<div class="card-header"><h1>Manage Meta Content</h1></div>
<div class="card-body">
		<form action="Meta-Content" method="post" enctype="multipart/form-data">
			<div class="row">
		  		<div class="col-md-12 col-sm-12 col-xs-12 mt-3">
			  		<label>Page</label>
			    	<input required type="text" name="page" value="<?php echo $page;?>" class="form-control" placeholder="Meta Content Page Name" readonly="">
					<input type="text" name="code" value="<?php echo $code;?>" class="form-control" style="display: none;">
		    	</div>
			    
		    	
		  		<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Meta Title</label>
			    	<input required type="text" name="metaTitle" value="<?php echo $metaTitle;?>" class="form-control" placeholder="Meta Title">
		    	</div>
		    	
		  		<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Meta Keyword</label>
			    	<input required type="text" name="metaKeyWord" value="<?php echo $metaKeyWord;?>" class="form-control" placeholder="Meta KeyWord">
		    	</div>	
		    	
		  		<div class="col-md-12 col-sm-12 col-xs-12 mt-3">
			  		<label>Meta Description</label>
			    	<input required type="text" name="metaDesc" value="<?php echo $metaDesc;?>" class="form-control" placeholder="Meta Description">
		    	</div>
		    	
			  	<div class="col-md-12 col-sm-12 col-xs-12 mt-3">
			  		<label>Status</label>
			  		<select required  name="status" class="form-control">
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

			<div class="col-md-12 col-sm-12 col-xs-12" style="text-align: right;margin-top: 2.5%">
                <button type="submit" name="submit" id="submit" class="btn btn-dark btn-md">Update <i class="fa fa-check"></i></button>
                
                <a id="showList" onclick="getList('Meta-Content')" class="btn btn-info btn-md">List <i class="fa fa-bars"></i></a>
                <a id="showList" onclick="reload('Meta-Content')" class="btn btn-info btn-md">Clear <i class="fa fa-refresh"></i></a>

            </div>
			</div>
			</form>
</div>	

               
<div id="listResult" style="display: none">
	
</div>
</div>


<?php
 if(isset($_POST['submit'])){
    $metaTitle = $_POST['metaTitle'];
    $metaKeyWord = $_POST['metaKeyWord'];
    $metaDesc = $_POST['metaDesc'];
    
    $status = $_POST['status'];
    $crDate = date(Ymd);
    $crBy =  $_SESSION['userCode'];
    
    $code = $_POST['code'];
	if(strlen($code)>0){
			$sql  = "UPDATE `tbl_meta_content` SET `metaTitle`='$metaTitle',`metaDesc`='$metaDesc',`metaKeyWord`='$metaKeyWord', `status` = '$status',`crDate` = '$crDate',`crBy` = '$crBy' WHERE `code` = '$code'";
			$result = mysqli_query($dbcon,$sql) or die ('error 404');
			echo "<script>location='Meta-Content'</script>";
	}
	else{
		echo "<script>alert('Select Page First.');</script>";
	}
}
?>

</body>
</html>