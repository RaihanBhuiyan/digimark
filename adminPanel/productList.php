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
$target = $litePath[3];
?>
</head>
<body onload="getList('<?php echo $target;?>')">

<?php
include('../assets/database/config.php');
//include('editItem.php');
?>
<?php include('sidebar.php');?>
<div class="card">
<div class="card-header"><h1>Product List</h1></div>
<div class="card-body">
	<div id="listResult" style="display: none">
	
	</div>
</div>
</div>

<script type="text/javascript"></script>
</body>
</html>