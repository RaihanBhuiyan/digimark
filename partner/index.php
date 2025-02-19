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
<p  class="col-lg-12 col-md-12 col-sm-12 mt-12" style="font-size: 40px;color:#7d7f82">Partner Dashboard </p><br>
<div class="col-lg-3 col-md-3 col-sm-6 mt-3" style="background-color: transparent;border-radius: 5px;padding:0.5% !important">
	<div style="margin: 2px !important;color:#ffffff !important;">
		<div style="background-color: #b3b3e6;color:#ffffff;padding: 2.5%"><h2>Price List</h2></div>
		<div style="background-color: #333399;height: 100px;padding: 5%">
		<i class="fa fa-sitemap" style="font-size: 3vh"></i>
		
		<?php
		    $query = "SELECT COUNT(`id`) AS `reviewCount` FROM `tbl_partner_items` WHERE `item_status` = '1' AND  `item_type` = '1'";
            $result = mysqli_query($dbcon,$query) or die ('error1');
      		while($rows = mysqli_fetch_assoc($result)){
            $reviewCount = $rows['reviewCount'];
            
            echo '<h2 class="pull-right" style="font-size: 3vh">'.$reviewCount.'</h2>';
        }
		?>
		</div>
		<div  style="background-color: #b3b3e6;"><a href="pricelist" style="margin-left:10px;color:#ffffff;font-size:16px">View All...</a></div>
		</div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 mt-3" style="background-color: transparent;border-radius: 5px;padding:0.5% !important">
	<div style="margin: 2px !important;color:#ffffff !important;">
		<div style="background-color: #b3b3e6;color:#ffffff;padding: 2.5%"><h2>Softwares</h2></div>
		<div style="background-color: #333399;height: 100px;padding: 5%">
		<i class="fa fa-gears" style="font-size: 3vh"></i>
		
		<?php
		    $query = "SELECT COUNT(`id`) AS `reviewCount` FROM `tbl_partner_items` WHERE `item_status` = '1' AND  `item_type` = '2'";
            $result = mysqli_query($dbcon,$query) or die ('error1');
      		while($rows = mysqli_fetch_assoc($result)){
            $reviewCount = $rows['reviewCount'];
            
            echo '<h2 class="pull-right" style="font-size: 3vh">'.$reviewCount.'</h2>';
        }
		?>
		</div>
		<div  style="background-color: #b3b3e6;"><a href="software" style="margin-left:10px;color:#ffffff;font-size:16px">View All...</a></div>
		</div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 mt-3" style="background-color: transparent;border-radius: 5px;padding:0.5% !important">
	<div style="margin: 2px !important;color:#ffffff !important;">
		<div style="background-color: #b3b3e6;color:#ffffff;padding: 2.5%"><h2>User Manuals</h2></div>
		<div style="background-color: #333399;height: 100px;padding: 5%">
		<i class="fa fa-users" style="font-size: 3vh"></i>
		
		<?php
		    $query = "SELECT COUNT(`id`) AS `reviewCount` FROM `tbl_partner_items` WHERE `item_status` = '1' AND  `item_type` = '3'";
            $result = mysqli_query($dbcon,$query) or die ('error1');
      		while($rows = mysqli_fetch_assoc($result)){
            $reviewCount = $rows['reviewCount'];
            
            echo '<h2 class="pull-right" style="font-size: 3vh">'.$reviewCount.'</h2>';
        }
		?>
		</div>
		<div  style="background-color: #b3b3e6;"><a href="usermanual" style="margin-left:10px;color:#ffffff;font-size:16px">View All...</a></div>
		</div>
</div><div class="col-lg-3 col-md-3 col-sm-6 mt-3" style="background-color: transparent;border-radius: 5px;padding:0.5% !important">
	<div style="margin: 2px !important;color:#ffffff !important;">
		<div style="background-color: #b3b3e6;color:#ffffff;padding: 2.5%"><h2>Tutorials</h2></div>
		<div style="background-color: #333399;height: 100px;padding: 5%">
		<i class="fa fa-image" style="font-size: 3vh"></i>
		
		<?php
		    $query = "SELECT COUNT(`id`) AS `reviewCount` FROM `tbl_partner_items` WHERE `item_status` = '1' AND  `item_type` = '4'";
            $result = mysqli_query($dbcon,$query) or die ('error1');
      		while($rows = mysqli_fetch_assoc($result)){
            $reviewCount = $rows['reviewCount'];
            
            echo '<h2 class="pull-right" style="font-size: 3vh">'.$reviewCount.'</h2>';
        }
		?>
		</div>
		<div  style="background-color: #b3b3e6;"><a href="tutorial" style="margin-left:10px;color:#ffffff;font-size:16px">View All...</a></div>
		</div>
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