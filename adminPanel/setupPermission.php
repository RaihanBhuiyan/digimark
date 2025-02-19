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
include('sidebar.php');
$userSelected = $litePath[3];
?>
<div class="container">
	<h1>Permission Setup</h1>
<form action="Permission" method="post" enctype="multipart/form-data">
			<div class="row">
		  		<!-- <div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Code</label>
			    	<input type="text" name="User_Code" class="form-control" placeholder="Designation">
			    </div> -->
		  		<div class="col-12" style="margin-bottom: 2.5%">
			  		<h2>User</h2>
			  		<select name="userCode" class="form-control" id="userCode" onchange="getuserpermission()">
			  		    	<option value="">--Select User--</option>
			  		<?php
			  		if($litePath !== '')
			  		$sql  = "SELECT `userCode`,`userName` FROM `master_user` WHERE `status` = '1'";
				    $result = mysqli_query($dbcon,$sql) or die ('error 404');
						while($row = mysqli_fetch_assoc($result)){
						$userCode = $row['userCode'];
						$userName = $row['userName'];
						if($userCode == $userSelected){
							echo '
						<option value="'.$userCode.'" selected="">'.$userName.'</option>
						';
						}else{echo '
			            <option value="'.$userCode.'">'.$userName.'</option>
						';}
						
						}
			  		?>
			    	</select>
		    	</div>
			  	<div class="col-6" style="max-height: 50vh;overflow-y: scroll;">
			  		<h2>Menu Item</h2>
			  		<?php
			  		$sql  = "SELECT * FROM `master_menu`";
				    $result = mysqli_query($dbcon,$sql) or die ('error 404');
						while($row = mysqli_fetch_assoc($result)){
						$type = $row['type'];
						$menu = $row['menu'];
						$pageCode = $row['pageCode'];

						echo '
						<input type="checkbox" name="filter[]" value="'.$pageCode.'" id="'.$pageCode.'" onclick="filter_tag_with_category()">
					  	<label for="'.$pageCode.'">'.$type.'-'.$menu.'</label><br>
						';
						}
			  		?>
			    </div>

			  	<div class="col-6" style="max-height: 50vh;overflow-y: scroll;">
			  		<h2>Existing Menu Permission</h2>
			  		<?php
                    $i = 0;$type_str = '';

			  		
                    $sql = "SELECT * FROM `table_permission` JOIN `master_menu` ON `table_permission`.`pageCode` = `master_menu`.`pageCode` WHERE `table_permission`.`userCode` = '$userSelected'";
                	
                    $result = mysqli_query($dbcon,$sql) or die ('error 404');
                        while($row = mysqli_fetch_assoc($result)){
                        $userCode = $row['userCode'];
                        $pageCode = $row['pageCode'];
                        $menu = $row['menu'];
                        $type = $row['type'];

                        if($type !== $type_str)
                              {echo '<h5>
                                     <span>'.$type.'</span>
                                     </h5>';}
                          
                            echo '<h7>'.$pageCode.'</h7><br>';
							$type_str = $type;
                        }
                    ?>
			    </div>
			    <div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			    	<input type="text" name="filter_box" id="filter_box" style="display: none">
			    	<div id="listResult" style="display: none">
			
					</div>
				</div>
			</div>
			<div class="row">
			<div class="col-12" style="text-align: right;margin-top: 2.5%">
                <button type="submit" name="submit" id="submit" class="btn btn-dark btn-md">Update <i class="fa fa-check"></i></button>
            </div>
			</div>
			</form>

<?php
 if(isset($_POST['submit'])){
    $userCode = $_POST['userCode'];
    $filter_box = $_POST['filter_box'];
    $status = '1';
    $crDate = date(Ymd);
    $crBy = $_SESSION['userCode'];
    
    $filter_box_array = explode(',', $filter_box);

    $sql = "DELETE FROM `table_permission` WHERE `userCode` = '$userCode'";
	$result = mysqli_query($dbcon,$sql) or die ('error 4041');

    foreach($filter_box_array as $value) {
    	$pageCode = $value;

    	
	    	$sql = "INSERT INTO `table_permission`(`id`, `userCode`, `pageCode`,`crDate`,`crBy`) VALUES ('id', '$userCode', '$pageCode','$crDate', '$crBy')";
		 	$result = mysqli_query($dbcon,$sql) or die ('error 4041');


			// $last_id = mysqli_insert_id($dbcon);
			// $n2 = str_pad($last_id, 5, 0, STR_PAD_LEFT);
			// $newId =  "FC".$n2;

			// $sqlget1 = "UPDATE `master_filter_head_with_category` SET `filter_cat_code` = '$newId' WHERE `id` = '$last_id'";
			// $sqldata1 = mysqli_query($dbcon,$sqlget1) or die ('error 4042X');
		}
    
    
	
	echo "<script>location='Permission'</script>";
}
?>

<script type="text/javascript">
function filter_tag_with_category(){
	var output = jQuery.map($(':checkbox[name=filter\\[\\]]:checked'), function (n, i) {
    return n.value;
}).join(',');
document.getElementById('filter_box').value = output;
}

function getuserpermission(){
	var e = document.getElementById("userCode");
	var value = e.options[e.selectedIndex].value;
	location='Permission/'+value;
}
</script>
</body>
</html>