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
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
});
</script>
</head>
<body>
<?php
include('../assets/database/config.php');
include('editItem.php');
?>
<?php include('sidebar.php');?>
<div class="card">
<div class="card-header"><h1><a href=""><i class="fas fa-home"> </i></a> <i class="fas fa-chevron-right"> </i>View All Reviews</h1></div>
<div class="card-body">
<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
        <th>Sl</th>
        <th style="display:none;color:red">Review Code</th>
        <th style="width:15%">Reviewer Name/ Email</th>
        <th style="width:15%">Product Code/ Name</th>
        <th style="width:30%">Rating / Review</th>
        <th>Post Date</th>
        <th>Approved By</th>
        <th>Approved date</th>
        </tr>
    </thead>
    <tbody>
<?php
//         $sql  = "SELECT *,`tbl_product`.`product_name` AS `product_name` FROM `tbl_review` 
// 		LEFT JOIN `tbl_product` ON `tbl_product`.`product_code`  = `tbl_review`.`product_code` WHERE `tbl_review`.`status` = '1' ORDER BY `tbl_review`.`id` DESC";

// $sql  = "SELECT *,`tbl_product`.`product_name` AS `product_name`,`master_user`.`userName` AS `updatedBy`,`tbl_review`.`approvedDate` AS `createdOn` FROM `tbl_review` 
// 		LEFT JOIN `tbl_product` ON `tbl_product`.`product_code`  = `tbl_review`.`product_code` 
// 		LEFT JOIN `master_user` ON `master_user`.`userCode`  = `tbl_review`.`approvedBy` 
// 		WHERE `tbl_review`.`status` = '1' ORDER BY `tbl_review`.`id` DESC";

$sql  = "SELECT `tbl_review`.*,`tbl_product`.`product_name` AS `product_name`,`master_user`.`userName` AS `updatedBy`,`tbl_review`.`approvedDate` AS `createdOn` FROM `tbl_review` 
		LEFT JOIN `tbl_product` ON `tbl_product`.`product_code`  = `tbl_review`.`product_code` 
		LEFT JOIN `master_user` ON `master_user`.`userCode`  = `tbl_review`.`approvedBy` 
		WHERE `tbl_review`.`status` = '1' AND  `tbl_review`.`product_code` != '' ORDER BY `tbl_review`.`id` DESC";
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
			$updatedBy = $row['updatedBy'];
			$createdOn = $row['createdOn'];
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
				<td>'.$updatedBy.'</td>
				<td>'.date("d-m-Y",strtotime($createdOn)).'</td>
			</tr>';
			
		}
		?>


</tbody>
</table>
</div>
</div>



<script type="text/javascript">
// $(document).ready(function() {
// 	//alert('ok i am called');
//     $('#example').DataTable();
// });
</script>


</body>
</html>