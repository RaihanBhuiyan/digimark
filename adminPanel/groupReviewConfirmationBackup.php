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
<div class="card-header"><h1><a href=""><i class="fas fa-home"> </i></a> <i class="fas fa-chevron-right"> </i>All Reviews</h1></div>
<div class="card-body">
<form action="All-Reviews" method="post" enctype="multipart/form-data">
<table id="example" class="display" style="width:100%">
    <thead><tr><th>Sl</th><th style="display:none">Review Code</th><th style="width:15%">Reviewer Name/ Email</th><th style="width:15%">Product Code/ Name</th><th style="width:30%">Rating / Review</th><th>Post Date</th><th>Action</th></tr></thead>
    <tbody>
<?php   $sql  = "SELECT *,`tbl_product`.`product_name` AS `product_name` FROM `tbl_review` 
		LEFT JOIN `tbl_product` ON `tbl_product`.`product_code`  = `tbl_review`.`product_code` WHERE `tbl_review`.`status` = '0' ORDER BY `tbl_review`.`id` ASC LIMIT 10";
		$result = mysqli_query($dbcon,$sql) or die ('error 404');
		
		$i = 0;
			while($row = mysqli_fetch_assoc($result)){
				$i++;
			$review_code = $row['review_code'];
			$product_code = $row['product_code'];
			$product_name = $row['product_name'];
			$review_rating = $row['review_rating'];
			$review = $row['review'];//substr($row['review'],0,50);
			$email = $row['email'];
			$name = $row['name'];
			$posted = $row['reviewDate'];
			$status = $row['status'];

			echo '
			<tr>
				<td>'.$i.'</td>
				<td  style="display:none"><input type="text" name="RC'.$i.'" value="'.$review_code.'" style="border:none;" readonly="true"></td>
				<td>'.$name.'<br>'.$email.'</td>
				<td>'.$product_code.'<br>'.$product_name.'</td>
				<td>';
				for($star=0;$star<$review_rating;$star++){
						echo '<span class="fa fa-star checked" style="color:#FFD700"></span>';
					}
				echo '<br>'.$review.'</td>
				<td>'.$posted.'</td>
				<td><select required name="ST'.$i.'" id="STI'.$i.'" class="form-control">
                            <option selected="" value="1" style="color:white">Confirm</option>
                            <option value="0" style="color:white">Pending</option>
                            <option value="X" style="color:white">Rejected</option>
</select></td>
			</tr>';
			
		}?>


</tbody>
</table>

<div class="container" style="text-align:center">
<input class="btn btn-success btn-xl" type="submit" name="submit" value="Submit All Reviews" style="width:40%">
</div>
</form>
</div>
</div>
<?php
if(isset($_POST['submit'])){

for($i=1;$i<=10;$i++){
	//$N2 = str_pad($i, 5, 0, STR_PAD_LEFT);
	$code =  "RC".$i;
	$status =  "ST".$i;


	$code = $_POST[$code];
	
	$status = $_POST[$status];
    

    $approvedBy =  $_SESSION['userCode']; 
    $approvedDate = date(Ymd);
    
    
    echo $sql  = "UPDATE `tbl_review` SET `status` = '$status' , `approvedBy` = '$approvedBy', `approvedDate` = '$approvedDate' WHERE `review_code` = '$code'";
	$result = mysqli_query($dbcon,$sql) or die ('error 404');
	
	
    echo "<script>location='All-Reviews'</script>";
	//echo "<br>";
}
}
?>
<style>
tr,td{vertical-align:top;}
</style>
<script type="text/javascript">
$(document).ready(function() {
	//alert('ok i am called');
    $('#example').DataTable();
} );


for(var c = 1; c<=10; c++){
    $('#STI'+c).css('background-color', 'green');
    $('#STI'+c).css('color', 'white');
}

for(var c = 1; c<=10; c++){
$('#STI'+c).change(function(e) {
    //$('#STI1').removeClass().addClass('form-control '+this.value);
    if($(this).val() == '1'){$(this).css('background-color', 'green');}
    else if($(this).val() == '0'){$(this).css('background-color', 'blue');}
    else if($(this).val() == 'X'){$(this).css('background-color', 'red');}
});
}
</script>

</body>
</html?