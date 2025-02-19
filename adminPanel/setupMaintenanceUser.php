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
<div class="card-header"><h1>Manage Maintenance User</h1></div>
<div class="card-body">
		<form action="Manage-Maintenance-User" method="post" enctype="multipart/form-data">
			<div class="row">
		  		<!-- <div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Code</label>
			    	<input type="text" name="User_Code" class="form-control" placeholder="Designation">
			    </div> -->
		  		<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Employee Name</label>
			    	<input required type="text" name="userName" value="<?php echo $userName;?>" class="form-control" placeholder="Employee Name">
			    	<input type="text" name="code" value="<?php echo $userMCode;?>" class="form-control" style="display: none;">
		    	</div>
		  		<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Designation</label>
			    	<input required type="text" name="userDesignation" value="<?php echo $userDesignation;?>" class="form-control" placeholder="Designation">
		    	</div>
		  		<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Email</label>
			    	<input required type="email" name="userEmail" value="<?php echo $userEmail;?>" class="form-control" placeholder="Email">
		    	</div>
		  		<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Initial Password</label>
			    	<input required type="password" name="userPassword" value="<?php echo $userPassword;?>" class="form-control" placeholder="Initial Password">
		    	</div>
			  	<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Status</label>
			  		<select required  name="status" class="form-control">
			  			<?php
			  			if($userStatus == '1' || $userStatus == '0'){
			  				if($userStatus == '1'){echo '<option selected="" value="1">Active</option>
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
                <a id="showList" onclick="getList('Maintenance-User')" class="btn btn-info btn-md">List <i class="fa fa-bars"></i></a>
                <a id="showList" onclick="reload('Manage-Maintenance-User')" class="btn btn-info btn-md">Clear <i class="fa fa-refresh"></i></a>
            </div>
			</div>
			</form>
</div>	

<div id="listResult" style="display: none">
	
</div>
</div>

<?php
 if(isset($_POST['submit'])){

	$userName = $_POST['userName'];
    $userDesignation = $_POST['userDesignation'];
    $userEmail = $_POST['userEmail'];
    $userPassword = $_POST['userPassword'];
    $status = $_POST['status'];
    $crDate = date(Ymd);
    $crBy = $_SESSION['userCode'];
    
    $code = $_POST['code'];
	if(strlen($code)>0){
		$sql  = "UPDATE `master_user` SET `userName` = '$userName',`userDesignation` = '$userDesignation',`userEmail` = '$userEmail',`userPassword` = '$userPassword', `status` = '$status',`crDate` = '$crDate',`crBy` = '$crBy' WHERE `userCode` = '$code'";
			$result = mysqli_query($dbcon,$sql) or die ('error 404');
			echo "<script>location='Manage-Maintenance-User'</script>";
	}

    else{
		$sql = "INSERT INTO `master_user`(`id`, `userCode`, `userName`, `userDesignation`, `userEmail`, `userPassword`, `status`, `crDate`, `crBy`) VALUES (NULL, '','$userName','$userDesignation','$userEmail','$userPassword', '$status', '$crDate', '$crBy')";
		$result = mysqli_query($dbcon,$sql) or die ('error 4041');


		$last_id = mysqli_insert_id($dbcon);
		$n2 = str_pad($last_id, 5, 0, STR_PAD_LEFT);
		$newId =  "DGM".$n2;

		echo $sqlget1 = "UPDATE `master_user` SET `userCode` = '$newId' WHERE `id` = '$last_id'";
		$sqldata1 = mysqli_query($dbcon,$sqlget1) or die ('error 4042X');
			
			echo "<script>location='Manage-Maintenance-User'</script>";
		}
	}
?>


</body>
</html>