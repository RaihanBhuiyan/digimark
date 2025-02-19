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
<body onload="check_old_filter_extended()">

<?php
include('../assets/database/config.php');
$productCode= $litePath[3];
$categoryCode= urldecode($litePath[4]);
$brandCode= $litePath[5];
?>
<?php include('sidebar.php');?>
<div class="card">
<div class="card-header"><h1>Product Filter Setup</h1></div>
<div class="card-body">
		<form action="Add-Filter" method="post" enctype="multipart/form-data">
			<div class="row">
		  		<div class="col-md-12 col-sm-12 col-xs-12 mt-3">
			    	<input type="text" name="code" value="<?php echo $productCode;?>" class="form-control" style="display: none">
			    	<input type="text" name="sccode" value="<?php echo $categoryCode;?>" class="form-control" style="display: none">
			    	<input type="text" name="brcode" value="<?php echo $brandCode;?>" class="form-control" style="display: none">
			    	<input type="text" name="filter_box" id="filter_box" style="display: none;background-color: red">
		    	</div>
		  		<div class="col-md-12 col-sm-12 col-xs-12 mt-3">
		  		<div class="accordion">
		  			<?php
		  // 		$sql = "SELECT DISTINCT `master_filter_head`.`f_head_name`  AS `filter_head`
				// FROM `master_filter_value` 
				// LEFT JOIN `master_filter_head_with_category` ON `master_filter_value`.`filter_cat_code` = `master_filter_head_with_category`.`filter_cat_code` 
				// LEFT JOIN `tbl_category` ON `master_filter_head_with_category`.`cat_code` = `tbl_category`.`category_code` 
				// LEFT JOIN `master_filter_head` ON `master_filter_head_with_category`.`f_head_code` = `master_filter_head`.`f_head_code` 
				// WHERE `tbl_category`.`category_code` = '$categoryCode'";

		  		$sql = "SELECT  GROUP_CONCAT(DISTINCT `f_head_code`,'-',`filter_code`) AS `ext_val` FROM `master_filter` WHERE `product_code` = '$productCode'";
		  		$result = mysqli_query($dbcon,$sql) or die ('error 4041');
		  		$ext_i = 0;
		  		while($row = mysqli_fetch_assoc($result)){
		  			//$new_array[] = $row;
						$ext_val = $row['ext_val'];
						// $f_head_code = $row['f_head_code'];
						// $filter_code = $row['filter_code'];
					}

		  		echo '<input type="text" name="filter_box_old" id="filter_box_old" value="'.$ext_val.'" style="display: none">';

				$sql = "SELECT DISTINCT `f_head_code`,`f_head_name` FROM `master_filter_head` ORDER BY `f_head_name` ASC";
				$i = 0;
				$result = mysqli_query($dbcon,$sql) or die ('error 4041');
					while($row = mysqli_fetch_assoc($result)){
						$f_head_code = $row['f_head_code'];
						$f_head_name = $row['f_head_name'];
						

						if($i==0){
					    echo '<h4 class="accordion-toggle active" style="font-size:14px;color:#000000;font-size:20px;font-weight:bold">'.$f_head_name.'</h4>
			            <div class="accordion-content" style="display:block">';
						}else{
						    echo '<h4 class="accordion-toggle" style="font-size:14px;color:#000000;font-size:20px;font-weight:bold">'.$f_head_name.'</h4>
				            <div class="accordion-content">';
						}
						
						$i++;


						$sql_filter = "SELECT `filter_code`,`filter_value` FROM `master_filter_value` WHERE `filter_cat_code` = '$f_head_code'";
						$result_filter = mysqli_query($dbcon,$sql_filter) or die ('error 4042');
						$j = 0;
							echo '<p>';
						while($row_filter = mysqli_fetch_assoc($result_filter)){
										
							$filter_code = $row_filter['filter_code'];
							$filter_value = $row_filter['filter_value'];
							echo '<input type="checkbox" name="filter[]" id="filter'.$i.$j.'" value="'.$f_head_code.'-'.$filter_code.'" onclick="make_filter(100)" style="margin:auto"/> 
											<label for="filter'.$i.$j.'"  style="font-size:12px;margin:auto;margin-left:0px;color:#000000"><b> '.$filter_value.'</b></label>';
								echo '<br>';
										$j++;
								}
						echo '</p>
						</div>';
					}
		  			?>
		  		</div>
			    </div>

<div class="col-md-12 col-sm-12 col-xs-12" style="text-align: right;margin-top: 2.5%">
			 <input type="checkbox" name="next_section" id="next"> <label for="next"><b>Update and go to Add Image</b></label>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12" style="text-align: right;margin-top: 2.5%">
                <button type="submit" name="submit" id="submit" class="btn btn-dark btn-md">Update <i class="fa fa-check"></i></button>

            </div>
			</div>
			</form>
</div>	
</div>

<?php
 if(isset($_POST['submit'])){
    $code = $_POST['code'];
    $sccode = $_POST['sccode'];
    $brcode = $_POST['brcode'];
    $filter_box = $_POST['filter_box'];
    
	$crDate = date(Ymd);
    $crBy = $_SESSION['userCode'];

    $subcat_box_array = explode(',', $sccode);
    $filter_box_array = explode(',', $filter_box);

    $del_sql= "DELETE FROM `master_filter` WHERE `product_code` = '$code'";
    $del_result = mysqli_query($dbcon,$del_sql) or die ('error 404');
    
	foreach($subcat_box_array as $subcatvalue) {
    	$subcat_selected = $subcatvalue;

    		foreach($filter_box_array as $value) {
    			$filter_selected = $value;
    			$filter_string = explode('-', $filter_selected);
    			$filterHead = $filter_string[0];
    			$filterCode = $filter_string[1];
	
        		if($filterCode !== null){
        	    	echo $ins_sql= "INSERT INTO `master_filter`(`id`, `filter_code`, `product_code`, `f_head_code`,`brand_code`, `category`,`crDate`,`crBy`) VALUES('','$filterCode','$code','$filterHead','$brcode','$subcat_selected','$crDate','$crBy')";
            		$ins_result = mysqli_query($dbcon,$ins_sql) or die ('error 404');
        		}
    		}
    //echo "<script>location='Add-Filter/".$code."/".$ccode."'</script>";Product-Image/000001

    if(isset($_POST['next_section'])){
			
			echo "<script>location='Product-Image/".$code."'</script>";
		}
		else{
			echo "<script>location='Add-Filter/".$code."/".$sccode."/".$brcode."'</script>";
		}
	}
	//echo "<script>location='Product-Image/".$code."'</script>";
}
?>


<script type="text/javascript">
function check_old_filter_extended(){
	var old_list = document.getElementById('filter_box_old').value;
	document.getElementById('filter_box').value = old_list;
	//alert(old_list);
	if(old_list !== ''){
	var output = old_list.split(',');
	var filterParam = "filter";
	var elems = $('input[name^='+filterParam+']');

	output.forEach(function(val){
	 elems.filter("[value="+ val +"]").prop("checked",true);
	});
	}
}
function make_filter(){
	var output = jQuery.map($(':checkbox[name=filter\\[\\]]:checked'), function (n, i) {
    return n.value;
}).join(',');
document.getElementById('filter_box').value = output;
}
</script>

<style>
    		.accordion{width:auto; margin: 0 auto;}
			.accordion-toggle {cursor: pointer;margin: 0;padding: 10px 0;position: relative;}
			.accordion-toggle.active:after{content:"";position:absolute;right:0;top:17px;width:0;height:0;border-bottom:5px solid #f00;border-left:5px solid rgba(0,0,0,0);border-right:5px solid rgba(0,0,0,0);}
			.accordion-toggle:before{content:"";position:absolute;right:0;top:17px;width:0;height:0;border-top:5px solid #000;border-left:5px solid rgba(0,0,0,0);border-right:5px solid rgba(0,0,0,0);}
			.accordion-toggle.active:before{display:none;}
			.accordion-content {display: none;}
			.accordion-toggle.active {color: #ff0000 !important;}
</style>
<script>
$(document).ready(function() {
	$('.accordion').find('.accordion-toggle').click(function() {
		$(this).next().slideToggle('600');
		$(".accordion-content").not($(this).next()).slideUp('600');
	});
	$('.accordion-toggle').on('click', function() {
		$(this).toggleClass('active').siblings().removeClass('active');
	});
});
</script>
</body>
</html>