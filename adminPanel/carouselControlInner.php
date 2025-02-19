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
?>
<?php include('sidebar.php');?>

<div class="card">
<div class="card-header"><h1>Manage Carousel InnerContent</h1></div>
<div class="card-body">
<form action="sub-carousel-control" class="form-control" method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="col-12">
		<input class="form-control" type="text" name="contentFor" readonly="" style="margin-top:1.5%" value="<?php echo $litePath[3];?>">
			<h1>Content One</h1>
			<select name="colValOne" class="form-control" style="margin-top:1.5%">
				<option value="">Select Position</option>
				<option value="col-6">Always half</option>
				<option value="col-12">Always Full</option>
				<option value="col-md-6 col-12">Desktop Half & Mobile Full</option>
			</select>
			<select name="itemTypeOne" class="form-control" style="margin-top:1.5%">
				<option value="">Select Content Type</option>
				<option value="img">Image</option>
				<option value="text">Text</option>
			</select>
			<div id="itemOneImg">
			<input class="form-control" type="file" name="itemOneImg" style="margin-top:1.5%">
			</div>
			<div id="itemOneText">
			<input class="form-control" type="text" name="itemOneTextOne" style="margin-top:1.5%" placeholder="Header One Text">
			<input class="form-control" type="text" name="itemOneTextTwo" style="margin-top:1.5%" placeholder="Header Two Text">
			</div>
		</div>
		<div class="col-12">
			<h1>Content Two</h1>
			<select name="colValTwo" class="form-control" style="margin-top:1.5%">
				<option value="">Select Position</option>
				<option value="col-6">Always half</option>
				<option value="col-12">Always Full</option>
				<option value="col-md-6 col-12">Desktop Half & Mobile Full</option>
			</select>
			<select name="itemTypeTwo" class="form-control" style="margin-top:1.5%">
				<option value="">Select Content Type</option>
				<option value="img">Image</option>
				<option value="text">Text</option>
			</select>
			<div id="itemTwoImg">
			<input class="form-control" type="file" name="itemTwoImg" style="margin-top:1.5%">
			</div>
			<div id="itemOneText">
			<input class="form-control" type="text" name="itemTwoTextOne" style="margin-top:1.5%" placeholder="Header One Text">
			<input class="form-control" type="text" name="itemTwoTextTwo" style="margin-top:1.5%" placeholder="Header Two Text">
			</div>
		</div>


		<div class="col-md-12 col-sm-12 col-xs-12" style="text-align: right;margin-top: 2.5%" id="submitRow">
            <button type="submit" name="submit" id="submit" class="btn btn-dark btn-md">Update <i class="fa fa-check"></i></button>
        </div>
	</div>
</form>
</div>
</div>
</div>


<?php

 if(isset($_POST['submit'])){
    $contentFor = $_POST['contentFor'];

    $itemOneImg = $_POST['itemOneImg'];
    $itemTwoImg = $_POST['itemTwoImg'];

    $colValOne = $_POST['colValOne'];
    $itemTypeOne = $_POST['itemTypeOne'];
    $itemOneTextOne = $_POST['itemOneTextOne'];
    $itemOneTextTwo = $_POST['itemOneTextTwo'];

    $colValTwo = $_POST['colValTwo'];
    $itemTypeTwo = $_POST['itemTypeTwo'];
    $itemTwoTextOne = $_POST['itemTwoTextOne'];
    $itemTwoTextTwo = $_POST['itemTwoTextTwo'];


    $cr_date = date(Ymd);
    $cr_by = $_SESSION['userCode'];

    	if($_FILES['itemOneImg']['size'] > 0){
    	$sql  = "SELECT `itemTypeOne`,`itemOneOne`,`itemOneTwo` FROM `tbl_img_slider` WHERE `code` = '$contentFor'";
		$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
			echo $itemTypeOne_prev = $row['itemTypeOne'];
			echo $itemOneOne_prev = $row['itemOneOne'];
			echo $itemOneTwo_prev = $row['itemOneTwo'];
				if($itemTypeOne_prev == "img")
				{
					unlink('../assets/images/subcarousel/'.$itemOneOne_prev);
				}
				$sql = "UPDATE `tbl_img_slider` SET `itemTypeOne` = '',`colValOne` = '', `itemOneOne` = '',`itemOneTwo` = '',`crDate` = '$cr_date',`crBy` = '$cr_by' WHERE `code` = '$contentFor'";
			 	$result = mysqli_query($dbcon,$sql) or die ('error 4041');
				}
			 	

			    $name= 'image_'.$contentFor."_1_".gmdate("YmdHis", time() + 3600*6*date("I"));;//'Brand_'.date("YFjgis");//$userId.$elName.'img'.$_FILES['image']['name'];
			    $tmp_name= $_FILES['itemOneImg']['tmp_name'];
			    $fileName = $_FILES['itemOneImg']['name'];
			    $position= strpos($fileName, ".");
			    $fileextension= substr($fileName, $position + 1);
			    $fileextension= strtolower($fileextension);
			    if (isset($name)) {
			        $path= '../assets/images/subcarousel/';
			        if (empty($name))
			        {
			        echo "Please choose a file";
			        }
			        else if (!empty($name)){
			            if (1!==1)
			            {
			            echo "The file extension must be PNG OR JPG order to be uploaded";
			            }
			            else if (($fileextension == "jpeg") ||($fileextension == "jpg") ||($fileextension == "PNG") || ($fileextension == "png") || ($fileextension == "gif") ||($fileextension == "GIF") ||($fileextension == "svg") || ($fileextension == "SVG"))
			            {
			                move_uploaded_file($tmp_name, $path.$name.".".$fileextension);
			            }
			        }
			    }

				$setName = $name.'.'.$fileextension;
				echo $sql = "UPDATE `tbl_img_slider` SET `itemTypeOne` = 'img',`colValOne` = '$colValOne', `itemOneOne` = '$setName',`crDate` = '$cr_date',`crBy` = '$cr_by' WHERE `code` = '$contentFor'";
			 	$result = mysqli_query($dbcon,$sql) or die ('error 4041');
		}

		elseif($_FILES['itemOneImg']['size'] <= 0){
			$sql  = "SELECT `itemTypeOne`,`itemOneOne`,`itemOneTwo` FROM `tbl_img_slider` WHERE `code` = '$contentFor'";
			$result = mysqli_query($dbcon,$sql) or die ('error 404');
				while($row = mysqli_fetch_assoc($result)){
				echo $itemTypeOne_prev = $row['itemTypeOne'];
				echo $itemOneOne_prev = $row['itemOneOne'];
				echo $itemOneTwo_prev = $row['itemOneTwo'];
					if($itemTypeOne_prev == "img")
					{
						unlink('../assets/images/subcarousel/'.$itemOneOne_prev);
					}
					echo $sql = "UPDATE `tbl_img_slider` SET `itemTypeOne` = '$itemTypeOne',`colValOne` = '$colValOne',`itemOneOne` = '$itemOneTextOne',`itemOneTwo` = '$itemOneTextTwo',`crDate` = '$cr_date',`crBy` = '$cr_by' WHERE `code` = '$contentFor'";
			 		$result = mysqli_query($dbcon,$sql) or die ('error 4041');
					}
				}




    	if($_FILES['itemTwoImg']['size'] > 0){
    	$sql  = "SELECT `itemTypeTwo`,`itemTwoOne`,`itemTwoTwo` FROM `tbl_img_slider` WHERE `code` = '$contentFor'";
		$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
			echo $itemTypeTwo_prev = $row['itemTypeTwo'];
			echo $itemTwoOne_prev = $row['itemTwoOne'];
			echo $itemTwoTwo_prev = $row['itemTwoTwo'];
				if($itemTypeTwo_prev == "img")
				{
					unlink('../assets/images/subcarousel/'.$itemTwoOne_prev);
				}
				$sql = "UPDATE `tbl_img_slider` SET `itemTypeTwo` = '',`colValTwo` = '', `itemTwoOne` = '',`itemTwoTwo` = '',`crDate` = '$cr_date',`crBy` = '$cr_by' WHERE `code` = '$contentFor'";
			 	$result = mysqli_query($dbcon,$sql) or die ('error 4041');
				}
			 	

			    $name= 'image_'.$contentFor."_2_".gmdate("YmdHis", time() + 3600*6*date("I"));;//'Brand_'.date("YFjgis");//$userId.$elName.'img'.$_FILES['image']['name'];
			    $tmp_name= $_FILES['itemTwoImg']['tmp_name'];
			    $fileName = $_FILES['itemTwoImg']['name'];
			    $position= strpos($fileName, ".");
			    $fileextension= substr($fileName, $position + 1);
			    $fileextension= strtolower($fileextension);
			    if (isset($name)) {
			        $path= '../assets/images/subcarousel/';
			        if (empty($name))
			        {
			        echo "Please choose a file";
			        }
			        else if (!empty($name)){
			            if (1!==1)
			            {
			            echo "The file extension must be PNG OR JPG order to be uploaded";
			            }
			            else if (($fileextension == "jpeg") ||($fileextension == "jpg") ||($fileextension == "PNG") || ($fileextension == "png") || ($fileextension == "gif") ||($fileextension == "GIF") ||($fileextension == "svg") || ($fileextension == "SVG"))
			            {
			                move_uploaded_file($tmp_name, $path.$name.".".$fileextension);
			            }
			        }
			    }

				$setName = $name.'.'.$fileextension;
				echo $sql = "UPDATE `tbl_img_slider` SET `itemTypeTwo` = 'img',`colValTwo` = '$colValTwo',`itemTwoOne` = '$setName',`crDate` = '$cr_date',`crBy` = '$cr_by' WHERE `code` = '$contentFor'";
			 	$result = mysqli_query($dbcon,$sql) or die ('error 4041');
		}

		elseif($_FILES['itemTwoImg']['size'] <= 0){
			$sql  = "SELECT `itemTypeTwo`,`itemTwoOne`,`itemTwoTwo` FROM `tbl_img_slider` WHERE `code` = '$contentFor'";
			$result = mysqli_query($dbcon,$sql) or die ('error 404');
				while($row = mysqli_fetch_assoc($result)){
				echo $itemTypeTwo_prev = $row['itemTypeTwoe'];
				echo $itemTwoOne_prev = $row['itemTwoOne'];
				echo $itemTwoTwo_prev = $row['itemTwoTwo'];
					if($itemTypeTwo_prev == "img")
					{
						unlink('../assets/images/subcarousel/'.$itemTwoOne_prev);
					}
					echo $sql = "UPDATE `tbl_img_slider` SET `itemTypeTwo` = '$itemTypeTwo',`colValTwo` = '$colValTwo',`itemTwoOne` = '$itemTwoTextOne',`itemTwoTwo` = '$itemTwoTextTwo',`crDate` = '$cr_date',`crBy` = '$cr_by' WHERE `code` = '$contentFor'";
			 		$result = mysqli_query($dbcon,$sql) or die ('error 4041');
					}
				}

	echo "<script>location='sub-carousel-control/".$contentFor."'</script>";
}
?>

</body>
</html>