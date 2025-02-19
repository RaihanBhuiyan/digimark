<?php
session_start();
if(!isset($_SESSION['userCode'])){
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
<?php
if($_SESSION['userDesignation'] == 'Super Admin'){
echo '<p  class="col-lg-12 col-md-12 col-sm-12 mt-12" style="font-size: 20px;color:#7d7f82">Maintenance Mode-'; 
 
$query = "SELECT `status` FROM maintenance";
$result = mysqli_query($dbcon,$query) or die ('error1');
      		while($rows = mysqli_fetch_assoc($result)){
            $status = $rows['status'];
        }
if($status == "1"){echo "On";} 
              else{ echo "Off";}
          echo '</h7><a href="Toggle-Maintanance"><i class="fa fa-refresh" style="font-size: 15px"> </i></a>
</p>';
}
?>

<br>
<p>
	<p  class="col-lg-12 col-md-12 col-sm-12 mt-12" style="font-size: 40px;color:#7d7f82">User Details</p>
	<p style="margin-left: 2.5%">User Code : <?php echo $_SESSION['userCode'];?><br>
		User Name : <?php echo $_SESSION['userName'];?><br>
		Login Time : <?php echo date("Y/m/d");?></p>
</p>
<p  class="col-lg-12 col-md-12 col-sm-12 mt-12" style="font-size: 40px;color:#7d7f82">Dashboard</p><br>

<div class="col-lg-4 col-md-3 col-sm-6 mt-3" style="background-color: transparent;border-radius: 5px;padding:0.5% !important">
	<div style="margin: 2px !important;">
		<div style="background-color: #fcdecf;padding: 2.5%">Pending Review <span class="pull-right" style="display:none">
		0%</span></div>
		<div style="background-color: #f48c57;height: 100px;padding: 5%">
		<i class="fa fa-comment" style="font-size: 3vh"></i>
		
		<?php
		    $query = "SELECT COUNT(`id`) AS `reviewCount` FROM `tbl_review` WHERE `product_code` != '' AND `status` = '0'";
            $result = mysqli_query($dbcon,$query) or die ('error1');
      		while($rows = mysqli_fetch_assoc($result)){
            $reviewCount = $rows['reviewCount'];
            
            echo '<h2 class="pull-right" style="font-size: 3vh">'.$reviewCount.'</h2>';
        }
		?>
		</div>
		<div  style="background-color: #fcdecf"><a href="javascript:void(0)">View more...</a></div>
		</div>
</div>

<div class="col-lg-4 col-md-3 col-sm-6 mt-3" style="background-color: transparent;border-radius: 5px;padding:0.5% !important">
	<div style="margin: 2px !important;">
		<div style="background-color: #fcdecf;padding: 2.5%">Pending Dealer Request <span class="pull-right" style="display:none">
		0%</span></div>
		<div style="background-color: #f48c57;height: 100px;padding: 5%">
		<i class="fa fa-comment" style="font-size: 3vh"></i>
		
		<?php
		    $query = "SELECT COUNT(`id`) AS `dealerCount` FROM `master_dealer_register` WHERE `conStatus` = '0'";
            $result = mysqli_query($dbcon,$query) or die ('error1');
      		while($rows = mysqli_fetch_assoc($result)){
            $dealerCount = $rows['dealerCount'];
            
            echo '<h2 class="pull-right" style="font-size: 3vh">'.$dealerCount.'</h2>';
        }
		?>
		</div>
		<div  style="background-color: #fcdecf"><a href="javascript:void(0)">View more...</a></div>
		</div>
</div>

<div class="col-lg-4 col-md-3 col-sm-6 mt-3" style="background-color: transparent;border-radius: 5px;padding:0.5% !important">
	<div style="margin: 2px !important;">
		<div style="background-color: #fcdecf;padding: 2.5%">Total Active Products <span class="pull-right" style="display:none">
		0%</span></div>
		<div style="background-color: #f48c57;height: 100px;padding: 5%">
		<i class="fa fa-shopping-cart" style="font-size: 3vh"></i>
		
		<?php
		    $query = "SELECT COUNT(`id`) AS `productCount` FROM `tbl_product` WHERE `product_status` = '1'";
            $result = mysqli_query($dbcon,$query) or die ('error1');
      		while($rows = mysqli_fetch_assoc($result)){
            $productCount = $rows['productCount'];
            
            echo '<h2 class="pull-right" style="font-size: 3vh">'.$productCount.'</h2>';
        }
		?>
		
		</div>
		<div  style="background-color: #fcdecf"><a href="javascript:void(0)">View more...</a></div>
		</div>
</div>
<!--<div class="col-lg-3 col-md-3 col-sm-6 mt-3" style="background-color: transparent;border-radius: 5px;padding:0.5% !important">-->
<!--	<div style="margin: 2px !important;">-->
<!--		<div style="background-color: #fcdecf;padding: 2.5%">Total Active Dealer <span class="pull-right">-->
<!--		0%</span></div>-->
<!--		<div style="background-color: #f48c57;height: 100px;padding: 5%">-->
<!--		<i class="fa fa-users" style="font-size: 3vh"></i>-->
<!--		<h2 class="pull-right" style="font-size: 3vh">8K</h2>-->
<!--		</div>-->
<!--		<div  style="background-color: #fcdecf"><a href="https://demo.opencart.com/admin/index.php?route=sale/order&amp;user_token=e1slbNsd3fdX2IhAH8dVoQgs4DTR0WGK">View more...</a></div>-->
<!--		</div>-->
<!--</div>-->
<!--<div class="col-lg-3 col-md-3 col-sm-6 mt-3" style="background-color: transparent;border-radius: 5px;padding:0.5% !important">-->
<!--	<div style="margin: 2px !important;">-->
<!--		<div style="background-color: #fcdecf;padding: 2.5%">Total Active Branch <span class="pull-right">-->
<!--		0%</span></div>-->
<!--		<div style="background-color: #f48c57;height: 100px;padding: 5%">-->
<!--		<i class="fa fa-globe" style="font-size: 3vh"></i>-->
<!--		<h2 class="pull-right" style="font-size: 3vh">8K</h2>-->
<!--		</div>-->
<!--		<div  style="background-color: #fcdecf"><a href="https://demo.opencart.com/admin/index.php?route=sale/order&amp;user_token=e1slbNsd3fdX2IhAH8dVoQgs4DTR0WGK">View more...</a></div>-->
<!--		</div>-->
<!--</div>-->
</div>
</body>
</html>