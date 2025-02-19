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
include('editItem.php');
?>
<?php include('sidebar.php');?>
<div class="card">
<div class="card-header"><h1>Manage Review</h1></div>
<div class="card-body">
		<form action="Manage-Review" method="post" enctype="multipart/form-data">
			<div class="row">
		  		<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Reviewed Product Name</label>
			    	<input readonly="" required type="text" name="product_name" value="<?php echo $product_name;?>" class="form-control" placeholder="Reviewed Product Name">

			    	<input type="text" name="code" value="<?php echo $review_code;?>" class="form-control" style="display: none">
		    	</div>
		  		<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Reviewer Name</label>
			    	<input readonly="" required type="text" name="name" value="<?php echo $name;?>" class="form-control" placeholder="Reviewer Name">
			    </div>
		  		<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Reviewer Email</label>
			    	<input readonly="" required type="text" name="email" value="<?php echo $email;?>" class="form-control" placeholder="Reviewer Email">
			    </div>
		  		<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Review</label>
			    	<textarea readonly="" required type="text" name="categoryUrl" class="form-control" placeholder="Review"><?php echo $review;?></textarea>
			    </div>
			    <div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Rating</label><br>
			    	<?php
			    	for($i=0;$i<$review_rating;$i++){
						echo '<span class="fa fa-star checked"></span>';
					}
			    	?>
			    </div>
			    
			  	<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Status</label>
			  		<select required  name="status" class="form-control">
			  			<?php
			  			if($review_status == '1' || $review_status == '0' || $review_status == 'X'){
              					if($review_status == '1'){
                                        echo '<option selected="" value="1">Confirm</option>
                                              <option value="0">Pending</option>
                                              <option value="X">Rejected</option>';
                                        } 
                                        elseif($review_status == '0'){ 
                                          echo '<option value="1">Confirm</option>
                                                <option selected="" value="0">Pending</option>
                                                <option value="X">Rejected</option>';
                                        } 
                                        elseif($review_status == 'X'){ 
                                          echo '<option value="1">Confirm</option>
                                                <option value="0">Pending</option>
                                                <option selected="" value="X" >Rejected</option>';
                                        }
              			}
			  			?>
			  		</select>
			    </div>

			<div class="col-md-12 col-sm-12 col-xs-12" style="text-align: right;margin-top: 2.5%">
                <button type="submit" name="submit" id="submit" class="btn btn-dark btn-md">Update <i class="fa fa-check"></i></button>
                
                <a id="showList" onclick="getList('Manage-Review')" class="btn btn-info btn-md">List <i class="fa fa-bars"></i></a>
                <a id="showList" onclick="reload('Manage-Review')" class="btn btn-info btn-md">Clear <i class="fa fa-refresh"></i></a>

            </div>
			</div>
			</form>
</div>	

               
<div id="listResult" style="display: none">
	
</div>
</div>

<?php
 if(isset($_POST['submit'])){
    $code = $_POST['code'];
    $status = $_POST['status'];
    $approvedBy =  $_SESSION['userCode']; 
    $approvedDate = date(Ymd);

		$sql  = "UPDATE `tbl_review` SET `status` = '$status' , `approvedBy` = '$approvedBy', `approvedDate` = '$approvedDate' WHERE `review_code` = '$code'";
		$result = mysqli_query($dbcon,$sql) or die ('error 404');
		echo "<script>location='Manage-Review'</script>";
}
?>
<script type="text/javascript">
$(document).ready(function() {
	//alert('ok i am called');
    // $('#listResult').DataTable();
     $('#example').DataTable();
});
</script>
</body>
</html>