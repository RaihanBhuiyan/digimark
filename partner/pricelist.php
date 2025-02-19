<?php
session_start();
if(!isset($_SESSION['dealerCode'])){
echo '<script>window.location="Logout";</script>';
}
?>
<!DOCTYPE html>
<html>
<head>
<?php include('includes.php');?>
<?php include('../assets/database/config.php');?>
</head>
<body>
<?php include('sidebar.php');?>
<div class="row">
<p  class="col-lg-12 col-md-12 col-sm-12 mt-12" style="font-size: 40px;color:#7d7f82">Price List</p><br>
	<div class="col-lg-12 col-md-3 col-sm-6 mt-3" style="background-color: transparent;border-radius: 5px;padding:0.5% !important">
		<table id="example" class="display" style="width:100%"><thead><tr><th>Sl</th><th>Name</th><th>Logo</th><th>File</th></tr></thead><tbody>
		<?php
		$sql  = "SELECT * FROM `tbl_partner_items` WHERE `item_type` = '1' AND `item_status` = '1' ORDER BY `item_name` ASC";
		$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
				$i++;
			$item_code = $row['item_code'];
			$item_type = $row['item_type'];
			$item_name = $row['item_name'];
			$item_file = $row['item_file'];
			$item_logo = $row['item_logo'];
			$item_external_link = $row['item_external_link'];
			$item_status = $row['item_status'];
            
            $ext = $item_file;    
            $ext = substr($ext, strpos($ext, ".") + 1);    
            
			echo '<tr>
				<td>'.$i.'</td>
				<td>'.$item_name.'</td>
				<td><img src="../assets/partnerItemsLogo/'.$item_logo.'" style="width:50px"></td>';
				if($item_external_link == ''){
				    echo '<td><a href="../assets/partnerItems/'.$item_file.'" download="'.$item_name.'.'.$ext.'">Download</a></td>';
				}else{
				    echo '<td><a href="'.$item_external_link.'" target="_blank">Download</a></td>';
				}
			echo '</tr>';
			}
			?>
			</tbody></table>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function() {
	//alert('ok i am called');
    $('#example').DataTable();
} );
</script>
</body>
</html>