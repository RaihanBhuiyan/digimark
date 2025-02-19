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
include('menu.php');
include('../assets/database/config.php');
?>
<?php include('sidebar.php');?>
<div class="card">
<div class="card-header">	<h1>Set Filter Values</h1></div>
<div class="card-body">
		<form action="Filter-Value" method="post" enctype="multipart/form-data" autocomplete="off">
			<div class="row">
		  		<!-- <div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Code</label>
			    	<input type="text" name="User_Code" class="form-control" placeholder="Designation">
			    </div> -->
		  		<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<p><b>Category</b></p>
			    	 	<?php
			    	 	echo "<select name='category' class='form-control select2' id='category' onchange='categorySelected_for_head(this.value)'>
			    	 	<option value=''>--Select Category--</option>";
				  		$sql  = "SELECT `category_code`,`category_name` FROM `tbl_category` WHERE `category_status` = '1'";
					    $result = mysqli_query($dbcon,$sql) or die ('error 404');
							while($row = mysqli_fetch_assoc($result)){
							$category_code = $row['category_code'];
							$category_name = $row['category_name'];

							// echo '
							// <input type="radio" id="category" name="category" value="'.$category_code.'" onclick="categorySelected_for_head(this.value)">
						 //  	<label for="category">'.$category_name.'</label><br>
							// ';
							echo '<option value='.$category_code.'>'.$category_name.'</option>';
							}
							echo "</select>";	
				  		?>
		    	</div>
			  	<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<p><b>Filter Head</b></p>
			  		<div id="filterValue">

					</div>
			    </div>
			    <div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<p><b>New Filter Head</b></p>
			    	<input type="text" name="filter_box" id="filter_box" style="display: none">
			  		<input class="form-control" type="text" name="value" required id="newVAlue">
				</div>

			    <div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Status</label>
			  		<select required  name="status" class="form-control" style="margin-top: 1%">
			  			<?php
			  			if($f_head_status == '1' || $f_head_status == '0'){
			  				if($f_head_status == '1'){echo '<option selected="" value="1">Active</option>
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
			    <div class="col-md-12 col-sm-12 col-xs-12 mt-3">
			    	<!-- <p><b>Filter Head Head</b></p> -->
			    	<div id="value_box">
			  		
					</div>
			    </div>
			</div>
			<div class="row">
			<div class="col-md-10 col-sm-12 col-xs-12" style="text-align: right;margin-top: 2.5%">
                <button type="submit" name="submit" id="submit" class="btn btn-dark btn-md">Update <i class="fa fa-check"></i></button>
                <a id="showList" onclick="reload('Filter-Value')" class="btn btn-info btn-md">Clear <i class="fa fa-refresh"></i></a>
            </div>
			</div>
			</form>
</div>	

</div>

<?php
 if(isset($_POST['submit'])){
    $value_array = $_POST['value'];
    //$value_array = str_replace(' ', '', $value_array);
    $value_array = preg_replace('/\s*,\s*/', ',', $value_array);//str_replace(' ', '', $value_array);
    $filter_box = $_POST['filter_box'];
    $status = $_POST['status'];
    $crDate = date(Ymd);
    $crBy = $_SESSION['userCode'];
    
    $value_array = explode(',', $value_array);

    foreach($value_array as $single_value) {
    $value = $single_value;
    

		$sqlrecheck  = "SELECT COUNT(`filter_value`) AS `recheck`,`status` FROM `master_filter_value` WHERE `filter_cat_code` = '$filter_box' AND `filter_value`  = '$value'";
		$resultrecheck = mysqli_query($dbcon,$sqlrecheck) or die ('error 404');
			while($rowrecheck = mysqli_fetch_assoc($resultrecheck)){
			$recheck = $rowrecheck['recheck'];
			$restatus = $rowrecheck['status'];
			}
    	if($recheck>0){
    		if($restatus == $status)
    		echo '<script>alert("Head already exists");</script>';
    		else{
    		$sqlget1 = "UPDATE `master_filter_value` SET `status` = !'$restatus',`crDate` = '$crDate',`crBy` = '$crBy' WHERE `filter_cat_code` = '$filter_box' AND `filter_value`  = '$value'";
			$sqldata1 = mysqli_query($dbcon,$sqlget1) or die ('error 4042X');
    		}
    		//echo '<script>alert("Value already exists");</script>';
    	}
    	else{
		    $sql = "INSERT INTO `master_filter_value`(`id`, `filter_code`, `filter_cat_code`, `filter_value`, `status`, `crDate`, `crBy`) VALUES ('id', '', '$filter_box', '$value', '$status', '$crDate', '$crBy')";
		 	$result = mysqli_query($dbcon,$sql) or die ('error 4041');


			$last_id = mysqli_insert_id($dbcon);
			$n2 = str_pad($last_id, 5, 0, STR_PAD_LEFT);
			$newId =  "FIL".$n2;

			$sqlget1 = "UPDATE `master_filter_value` SET `filter_code` = '$newId' WHERE `id` = '$last_id'";
			$sqldata1 = mysqli_query($dbcon,$sqlget1) or die ('error 4042X');
		}
	}

	echo "<script>location='Filter-Value'</script>";
}
?>


<script type="text/javascript">
// function categorySelected(value){
// 	var dtype='category';
// 	$.ajax({
// 		      type:"post",
// 		      url:"ajaxReturnFilterHeadByCategory.php",
// 		      data:{category:value,dtype:dtype},
// 		      success:function(data)
// 		      {
// 		        if(!data){
// 		          document.getElementById('filterValue').style.display="none";
// 		        }else{
// 		          if(data !== ''){
// 		          	//alert(data);
// 		          document.getElementById('filterValue').style.display="block";
// 		          $('#filterValue').html(data);
// 		      	  }else{
// 		      	  	//alert(data);
// 		          document.getElementById('filterValue').style.display="none";
// 		      	  }
// 		        }
		            
// 		      }
// 		    });
// }

</script>

<script type="text/javascript">
// function filter(value){
// document.getElementById('filter_box').value = value;


// var dtype='value';
// 	$.ajax({
// 		      type:"post",
// 		      url:"ajaxReturnFilterHeadByCategory.php",
// 		      data:{category:value,dtype:dtype},
// 		      success:function(data)
// 		      {
// 		        if(!data){
// 		          document.getElementById('value_box').style.display="none";
// 		        }else{
// 		          if(data !== ''){
// 		          	//alert(data);
// 		          document.getElementById('value_box').style.display="block";
// 		          $('#value_box').html(data);
// 		      	  }else{
// 		      	  	//alert(data);
// 		          document.getElementById('value_box').style.display="none";
// 		      	  }
// 		        }
		            
// 		      }
// 		    });
// }
</script>

<script type="text/javascript">
$(document).ready(function() {
	//alert('ok i am called');
    $('#example').DataTable();
} );
</script>
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
$('.select2').select2();
</script>

<script type="text/javascript">
	function editValue(value){
		document.getElementById('newVAlue').value = value;
	}
</script>
</body>
</html>