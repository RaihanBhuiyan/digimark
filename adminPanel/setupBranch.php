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
<div class="card-header"><h1>Branch Setup</h1></div>
<div class="card-body">
		<form action="Branch" method="post" enctype="multipart/form-data">
			<div class="row">
		  		<!-- <div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Code</label>
			    	<input type="text" name="User_Code" class="form-control" placeholder="Designation">
			    </div> -->
		  		<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Branch Title</label>
			    	<input required type="text" name="title" value="<?php echo $title;?>" class="form-control" placeholder="Branch Title">
			    	<input type="text" name="code" value="<?php echo $branch_code;?>" class="form-control" style="display: none">
			    </div>

			    <div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Address</label>
			    	<input required type="text" name="address" value="<?php echo $address;?>" class="form-control" placeholder="Address">
			    </div>
			    <div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Contact</label>
			    	<input required type="text" name="contact" value="<?php echo $contact;?>" class="form-control" placeholder="Contact">
			    </div>
			    <div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Email</label>
			    	<input required type="text" name="email" value="<?php echo $email;?>" class="form-control" placeholder="Email">
			    </div>
			    <div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>GMAP Link</label>
			    	<input required type="text" name="gmap" value="<?php echo $gmap;?>" class="form-control" placeholder="GMAP Link">
		    	</div>
			    <div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Weekly Holiday</label>
			    	<select name="holiday" class="form-control"  required>
			    		<?php
			    		if($holiday == 'Saturday'){echo '<option selected="" value="Saturday">Saturday</option>';}
			    		else{echo '<option value="Saturday">Saturday</option>';}

			    		if($holiday == 'Sunday'){echo '<option selected="" value="Sunday">Sunday</option>';}
			    		else{echo '<option value="Sunday">Sunday</option>';}

			    		if($holiday == 'Monday'){echo '<option selected="" value="Monday">Monday</option>';}
			    		else{echo '<option value="Monday">Monday</option>';}

			    		if($holiday == 'Tuesday'){echo '<option selected="" value="Tuesday">Tuesday</option>';}
			    		else{echo '<option value="Tuesday">Tuesday</option>';}

			    		if($holiday == 'Wednesday'){echo '<option selected="" value="Wednesday">Wednesday</option>';}
			    		else{echo '<option value="Wednesday">Wednesday</option>';}

			    		if($holiday == 'Thursday'){echo '<option selected="" value="Thursday">Thursday</option>';}
			    		else{echo '<option value="Thursday">Thursday</option>';}

			    		if($holiday == 'Friday'){echo '<option selected="" value="Friday">Friday</option>';}
			    		else{echo '<option value="Friday">Friday</option>';}
			    		?>
			    	</select>
		    	</div>
			    <div class="col-md-12 col-sm-12 col-xs-12 mt-3">
			  		<label>Special Branch Instruction</label>
			    	<input type="text" name="remark" value="<?php echo $remark;?>" class="form-control" placeholder="Special Branch Instruction">
		    	</div>
			    <div class="col-md-12 col-sm-12 col-xs-12 mt-3">
			  		<label>Branch Sort</label>
			    	<input type="text" name="sort" value="<?php echo $sort;?>" class="form-control" placeholder="Branch sort for show on home page">
		    	</div>
			  	<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Status</label>
			  		<select required  name="status" class="form-control">
			  			<?php
			  			if($branch_status == '1' || $branch_status == '0'){
			  				if($branch_status == '1'){echo '<option selected="" value="1">Active</option>
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
                <a id="showList" onclick="getList('branch')" class="btn btn-info btn-md">List <i class="fa fa-bars"></i></a>
                <a id="showList" onclick="reload('Branch')" class="btn btn-info btn-md">Clear <i class="fa fa-refresh"></i></a>
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
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $gmap = $_POST['gmap'];
	$holiday = $_POST['holiday'];
	$remark = $_POST['remark'];
	$sort = $_POST['sort'];
    $status = $_POST['status'];
    $crDate = date(Ymd);
    $crBy = $_SESSION['userCode'];
    
    $code = $_POST['code'];
	if(strlen($code)>0){
			$sql  = "UPDATE `master_branch` SET `title`='$title',`address`='$address',`contact`='$contact',`email`='$email',`gmap`='$gmap',`holiday`='$holiday',`remark`='$remark', `status` = '$status', `sort` = '$sort',`crDate` = '$crDate',`crBy` = '$crBy' WHERE `branch_code` = '$code'";
			$result = mysqli_query($dbcon,$sql) or die ('error 404');
			echo "<script>location='Branch'</script>";
	}

    else{
		$sql = "INSERT INTO `master_branch`(`id`, `branch_code`, `title`, `address`, `contact`, `email`, `gmap`,`holiday`,`remark`, `status`,`sort`, `crDate`, `crBy`) VALUES ('', '', '$title', '$address', '$contact', '$email', '$gmap','$holiday','$remark', '$status','$sort', '$crDate', '$crBy')";
		$result = mysqli_query($dbcon,$sql) or die ('error 4041');


		$last_id = mysqli_insert_id($dbcon);
		$n2 = str_pad($last_id, 5, 0, STR_PAD_LEFT);
		$newId =  "BRN".$n2;

		$sqlget1 = "UPDATE `master_branch` SET `branch_code` = '$newId' WHERE `id` = '$last_id'";
		$sqldata1 = mysqli_query($dbcon,$sqlget1) or die ('error 4042X');
			
			echo "<script>location='Branch'</script>";
		}
	}
?>


</body>
</html>