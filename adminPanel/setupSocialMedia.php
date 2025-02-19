<?php
session_start();
if(!isset($_SESSION['userCode'])){
echo '<script>window.location="Logout";</script>';
}
?>
<!DOCTYPE html>
<html>
<head>
<!--DATA TABLES-->
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<!--DATA TABLES-->
<?php
include('includes.php');
?>
</head>
<body>

<?php
include('../assets/database/config.php');
include('editItem.php');
?>
<?php include('sidebar.php');?>
<div class="card">
<div class="card-header"><h1>Social-Media Setup</h1></div>
<div class="card-body">
		<form action="Social-Media" method="post" enctype="multipart/form-data">
			<div class="row">
		  		<!-- <div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Code</label>
			    	<input type="text" name="User_Code" class="form-control" placeholder="Designation">
			    </div> -->
		  		<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>HotLine</label>
			    	<input type="text" name="hotline" value="<?php echo $hotline;?>" class="form-control" placeholder="HotLine">
			    </div>

			    <div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Whatsapp</label>
			    	<input type="text" name="whatsapp" value="<?php echo $whatsapp;?>" class="form-control" placeholder="Whatsapp">
			    </div>
			    <div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Facebook</label>
			    	<input type="text" name="facebook" value="<?php echo $facebook;?>" class="form-control" placeholder="Facebook">
			    </div>
			    <div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Youtube</label>
			    	<input type="text" name="youtube" value="<?php echo $youtube;?>" class="form-control" placeholder="Youtube">
			    </div>
			    <div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Linked In</label>
			    	<input type="text" name="linkedin" value="<?php echo $linkedin;?>" class="form-control" placeholder="Linked In">
		    	</div>
			    <div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Pinterest</label>
			    	<input type="text" name="pinterest" value="<?php echo $pinterest;?>" class="form-control" placeholder="Pinterest">
		    	</div>
			    <div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Instagram</label>
			    	<input type="text" name="instagram" value="<?php echo $instagram;?>" class="form-control" placeholder="Instagram">
		    	</div>
			    <div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Twitter</label>
			    	<input type="text" name="twitter" value="<?php echo $twitter;?>" class="form-control" placeholder="Twitter">
		    	</div>
			    <div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Gmail</label>
			    	<input type="text" name="gmail" value="<?php echo $gmail;?>" class="form-control" placeholder="Gmail">
		    	</div>

			<div class="col-md-12 col-sm-12 col-xs-12" style="text-align: right;margin-top: 2.5%">
                <button type="submit" name="submit" id="submit" class="btn btn-dark btn-md">Update <i class="fa fa-check"></i></button>
                <a id="showList" onclick="reload('Social-Media/0/')" class="btn btn-info btn-md">Clear <i class="fa fa-refresh"></i></a>
            </div>
			</div>
			</form>
</div>	

<div id="listResult" style="display: none">
	
</div>
</div>

<?php
 if(isset($_POST['submit'])){
    $hotline = $_POST['hotline'];
    $whatsapp = $_POST['whatsapp'];
    $facebook = $_POST['facebook'];
    $youtube = $_POST['youtube'];
    $linkedin = $_POST['linkedin'];
    $pinterest = $_POST['pinterest'];
    $instagram = $_POST['instagram'];
    $twitter = $_POST['twitter'];
	$gmail = $_POST['gmail'];
    $crDate = date(Ymd);
    $crBy = $_SESSION['userCode'];
    
		$sql = "INSERT INTO `master_social`(`id`, `updateid`, `hotline`, `whatsapp`, `facebook`, `youtube`, `linkedin`,`pinterest`,`instagram`,`twitter`,`gmail`, `crDate`, `crBy`) VALUES ('', '', '$hotline', '$whatsapp', '$facebook', '$youtube', '$linkedin','$pinterest','$instagram','$twitter','$gmail', '$crDate', '$crBy')";
		$result = mysqli_query($dbcon,$sql) or die ('error 4041');


		$last_id = mysqli_insert_id($dbcon);
		$n2 = str_pad($last_id, 5, 0, STR_PAD_LEFT);
		$newId =  "UID".$n2;

		$sqlget1 = "UPDATE `master_social` SET `updateid` = '$newId' WHERE `id` = '$last_id'";
		$sqldata1 = mysqli_query($dbcon,$sqlget1) or die ('error 4042X');
			
			echo "<script>
			alert('Successfully Updated');
			location='Social-Media/0/'
			</script>";
	}
?>


</body>
</html>