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
<div class="card-header"><h1>Post Job Offer</h1></div>
<div class="card-body">
		<form action="Post-Job" method="post" enctype="multipart/form-data">
			<div class="row">
		  		<!-- <div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Code</label>
			    	<input type="text" name="User_Code" class="form-control" placeholder="Designation">
			    </div> -->
		  		<div class="col-md-12 col-sm-12 col-xs-12 mt-3">
			  		<label>Job Title</label>
			    	<input required type="text" name="title" value="<?php echo $title;?>" class="form-control" placeholder="Job Title">
			    	<input type="text" name="code" value="<?php echo $job_code;?>" class="form-control" style="display: none">
			    </div>

			    <div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Description</label>
			    	<textarea required  name="description" class="form-control" placeholder="Description"><?php echo $description;?></textarea>
			    </div>
			    <div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Experience</label>
			    	<textarea required name="experience" class="form-control" placeholder="Experience"><?php echo $experience;?></textarea>
			    </div>
			    <div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Qualification</label>
			    	<textarea required type="text" name="qualification" class="form-control" placeholder="Qualification"><?php echo $qualification;?></textarea>
			    </div>
			    <div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Special Job Instruction</label>
			    	<textarea type="text" name="instructions" class="form-control" placeholder="Special Job Instruction"><?php echo $instructions;?></textarea>
		    	</div>
			    <div class="col-md-12 col-sm-12 col-xs-12 mt-3">
			  		<label>Job Link</label>
			    	<input type="text" name="link" value="<?php echo $link;?>" class="form-control" placeholder="Job Link">
		    	</div>
			    <div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Dead Line</label>
			  		<input type="date" name="deadline" required value="<?php echo $deadline;?>" class="form-control">
		    	</div>
			  	<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Status</label>
			  		<select required  name="status" class="form-control">
			  			<?php
			  			if($job_status == '1' || $job_status == '0'){
			  				if($job_status == '1'){echo '<option selected="" value="1">Active</option>
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
                <a id="showList" onclick="getList('Post-Job')" class="btn btn-info btn-md">List <i class="fa fa-bars"></i></a>
                <a id="showList" onclick="reload('Post-Job')" class="btn btn-info btn-md">Clear <i class="fa fa-refresh"></i></a>
            </div>
			</div>
			</form>
</div>	

<div id="listResult" style="display: none">
	
</div>
</div>

<?php
 if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $experience = $_POST['experience'];
    $qualification = $_POST['qualification'];
    $instructions = $_POST['instructions'];
	$link = $_POST['link'];
	$deadline = $_POST['deadline'];
    $status = $_POST['status'];
    $crDate = date(Ymd);
    $crBy = $_SESSION['userCode'];
    
    $code = $_POST['code'];
	if(strlen($code)>0){
		$sql  = "UPDATE `tbl_career` SET `title`='$title',`description`='$description',`experience`='$experience',`qualification`='$qualification',`instructions`='$instructions',`link`='$link',`deadline`='$deadline', `status` = '$status',`crDate` = '$crDate',`crBy` = '$crBy' WHERE `job_code` = '$code'";
			$result = mysqli_query($dbcon,$sql) or die ('error 404');
			echo "<script>location='Post-Job'</script>";
	}

    else{
		$sql = "INSERT INTO `tbl_career`(`id`,  `job_code`, `title`, `description`, `experience`, `qualification`, `instructions`, `link`, `deadline`, `status`, `crDate`, `crBy`) VALUES ('', '', '$title', '$description', '$experience', '$qualification', '$instructions','$link','$deadline', '$status', '$crDate', '$crBy')";
		$result = mysqli_query($dbcon,$sql) or die ('error 4041');


		$last_id = mysqli_insert_id($dbcon);
		$n2 = str_pad($last_id, 5, 0, STR_PAD_LEFT);
		$newId =  "JOFF".$n2;

		$sqlget1 = "UPDATE `tbl_career` SET `job_code` = '$newId' WHERE `id` = '$last_id'";
		$sqldata1 = mysqli_query($dbcon,$sqlget1) or die ('error 4042X');
			
			echo "<script>location='Post-Job'</script>";
		}
	}
?>


</body>
</html>