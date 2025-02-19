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

<!--RICHTEXT-->
<script type="text/javascript" src="https://cdn.ckeditor.com/4.4.7/full/ckeditor.js"></script>
<!--RICHTEXT-->
</head>
<body onload="subcategoryCheck()">

<?php
include('../assets/database/config.php');
include('editItem.php');
?>
<?php include('sidebar.php');?>
<div class="card">
<div class="card-header"><h1>Create New Product</h1></div>
<div class="card-body">
		<form action="Create-Product" method="post" enctype="multipart/form-data">
			<div class="row">
		  		<!-- <div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Code</label>
			    	<input type="text" name="User_Code" class="form-control" placeholder="Designation">
			    </div> -->
		  		<div class="col-md-4 col-sm-12 col-xs-12 mt-3">
			  		<label>Product Name</label>
			    	<input required type="text" name="productName" value="<?php echo $product_name;?>" class="form-control" placeholder="Product Name">
			    	<input type="text" name="code" value="<?php echo $product_code;?>" class="form-control" style="display: none">
		    	</div>
		  		<div class="col-md-4 col-sm-12 col-xs-12 mt-3">
			  		<label>Product URL</label>
			    	<input type="text" id="url" onkeyup="check()" name="productUrl" value="<?php echo $product_url;?>" class="form-control" placeholder="Product URL">
			    	<div id="message"></div>
			    </div>

			    <div class="col-md-4 col-sm-12 col-xs-12 mt-3">
			  		<label>Brochure</label>
			  		<?php if($product_brochure !== null){echo '<a href="javascript:void(0)" id="'.$product_brochure.'" 
			  		onclick="dispBrochure(this.id)">View Brochure</a>';}?>
			    	<input type="text" name="brochure_prev" class="form-control" value="<?php echo $product_brochure;?>" style="display: none">
			    	<?php 
			    	if($product_brochure !== null){echo '<input id="upload-file" type="file" name="brochure" class="form-control">';}
			    	else{echo '<input id="upload-file" type="file" name="brochure" class="form-control" >';}
			    	?>
			    </div>
		  		<div class="col-md-4 col-sm-12 col-xs-12 mt-3">
			  		<label>Thumbnail</label>
			  		<?php if($product_thumb !== null){echo '<a href="javascript:void(0)" id="'.$product_thumb.'" 
			  		onclick="dispImage(this.id)">View Image</a>';}?>
			    	<input type="text" name="image_prev" class="form-control" value="<?php echo $product_thumb;?>" style="display: none">
			    	<?php 
			    	if($product_thumb !== null){echo '<input id="upload-file" type="file" name="image" class="form-control">';}
			    	else{echo '<input id="upload-file" type="file" name="image" class="form-control" >';}
			    	?>
			    </div>

		  		<div class="col-md-4 col-sm-12 col-xs-12 mt-3">
			  		<label>Product Redirect URL</label>
			    	<input type="text" name="productRedirectUrl" value="<?php echo $product_redirect_url;?>" class="form-control" placeholder="Product Redirect URL">
			    	<div id="message"></div>
			    </div>


		  		<div class="col-md-4 col-sm-12 col-xs-12 mt-3">
			  		<label>Category</label>
			  		<select name='productCategory' class='form-control select2' id='category' onchange='getSubcategory()'>
			  			<option value="">--Select Category--</option>
			  		<?php
			    	$sql3 = "SELECT * FROM `tbl_category` WHERE `category_status` = '1'";
					$result3 = mysqli_query($dbcon,$sql3) or die ('error 404');
			        while($row3 = mysqli_fetch_assoc($result3)){
			            $category_code = strtoupper($row3['category_code']);
			            $category_name = strtoupper($row3['category_name']);
			            if(strtoupper($product_category_code) == $category_code)
			            {	
			            	echo '<option selected="" value="'.$category_code.'">'.$category_name.'</option>';
			            }else{
			            	echo '<option value="'.$category_code.'">'.$category_name.'</option>';
			            }
			        }
			        ?>
			        </select>
			    </div>
				
				<div class="col-md-12 col-sm-12 col-xs-12 mt-3">
			  		<p><b>Subcategories Head</b></p>
			    	<input type="text" name="product_subcategory" id="product_subcategory" value="<?php echo $product_subcategory;?>" class="form-control" style="display: none">
			    	<input type="text" name="product_subcategory_new" id="product_subcategory_new" value="<?php echo $product_subcategory;?>" class="form-control" style="display: none" required="">
			  		<div id="subcategories">

					</div>
			    </div>

		  		<!-- <div class="col-md-12 col-sm-12 col-xs-12 mt-3">
			  		<label>Multiple Category</label>
			        <div>
			        <?php
			  //   	$sql3 = "SELECT * FROM `tbl_category` WHERE `category_status` = '1'";
					// $result3 = mysqli_query($dbcon,$sql3) or die ('error 404');
					// $j = 0;
			  //       while($row3 = mysqli_fetch_assoc($result3)){
			  //       	$j++;
			  //           $category_code = strtoupper($row3['category_code']);
			  //           $category_name = strtoupper($row3['category_name']);
			  //           echo '<input type="checkbox" name="filter[]" id="filter'.$j.'" value="'.$category_code.'" style="margin:auto"/> 
					// 			<label for="filter'.$j.'"  style="font-size:12px;margin:auto;margin-left:0px;color:#000000">
					// 			<b> '.$category_name.'</b>
					// 			</label>
					// 			<br>';
			  //       }
			        ?>
			        </div>
			    </div> -->

		  		<div class="col-md-4 col-sm-12 col-xs-12 mt-3">
			  		<label>Brand</label>
			  		<select class="form-control" name="productBrand">
			  			<option value="">--Select Brand--</option>
			  		<?php
			    	$sql3 = "SELECT * FROM `tbl_brand` WHERE `brand_status` = '1'";
					$result3 = mysqli_query($dbcon,$sql3) or die ('error 404');
			        while($row3 = mysqli_fetch_assoc($result3)){
			            $brand_code = strtoupper($row3['brand_code']);
			            $brand_name = strtoupper($row3['brand_name']);
			            if(strtoupper($product_brand_code) == $brand_code)
			            {	
			            	echo '<option selected="" value="'.$brand_code.'">'.$brand_name.'</option>';
			            }else{
			            	echo '<option value="'.$brand_code.'">'.$brand_name.'</option>';
			            }
			        }
			        ?>
			        </select>
			    </div>

		  		<div class="col-md-4 col-sm-12 col-xs-12 mt-3">
			  		<label>Model</label>
			    	<input required type="text" name="productDiscount" value="<?php echo $product_discount;?>" class="form-control" placeholder="Model">
			    </div>
			    
		  		<div class="col-md-4 col-sm-12 col-xs-12 mt-3">
			  		<label>Price</label>
			    	<input required type="text" name="productPrice" value="<?php echo $product_price;?>" class="form-control" placeholder="Price">
			    </div>


		  		<div class="col-md-12 col-sm-12 col-xs-12 mt-3">
			  		<label>Key Features</label>
			    	<textarea required name="productFeatures" class="form-control" placeholder="Features"><?php echo $product_features;?></textarea>
			    </div>

		  		<div class="col-md-12 col-sm-12 col-xs-12 mt-3">
			  		<label>Description</label>
			    	<textarea required name="productDescription" class="form-control" placeholder="Short Description"><?php echo $product_description;?></textarea>
			    </div>

		  		<div class="col-md-12 col-sm-12 col-xs-12 mt-3">
			  		<label>Meta Title</label>
			    	<textarea required name="productMetaTitle" class="form-control" placeholder="Meta Title"><?php echo $product_metaTitle;?></textarea>
			    </div>
		  		<div class="col-md-12 col-sm-12 col-xs-12 mt-3">
			  		<label>Meta Description</label>
			    	<textarea name="productMetaDescription" class="form-control" placeholder="Meta Description"><?php echo $product_metaDescription;?></textarea>
			    </div>
		  		<div class="col-md-12 col-sm-12 col-xs-12 mt-3">
			  		<label>Meta Keywords</label>
			    	<textarea name="productMetaKeywords" class="form-control" placeholder="Meta Keywords"><?php echo $product_metaKeywords;?></textarea>
			    </div>


		  		<div class="col-md-4 col-sm-12 col-xs-12 mt-3">
			  		<label>Remark</label>
			    	<input required type="text" name="productRemark" value="<?php echo $product_remark;?>" class="form-control" placeholder="Remark">
			    </div>

			  	<div class="col-md-4 col-sm-12 col-xs-12 mt-3">
			  		<label>Status</label>
			  		<select required  name="stockStatus" class="form-control">
			  			<?php
			  			// if($stock_status == '1' || $stock_status == '0'){
			  			// 	if($stock_status == '1'){echo '<option selected="" value="1">In Stock</option>
			  			// <option value="0">Stock Out</option>';} 
        //       				else{ echo '<option value="1">In Stock</option>
			  			// <option selected="" value="0">Stock Out</option>';}
			  			// }else{
			  			// echo '<option value="1">In Stock</option>
			  			// <option selected="" value="0">Stock Out</option>';
			  			// }
			  			if($stock_status == '0' || $stock_status == '1' || $stock_status == '2' || $stock_status == '3' || $stock_status == '4')
			  			{
			  			    if($stock_status == '0'){
                                echo '  <option selected="" value="0">Stock Out</option>
                                        <option value="1">In Stock</option>
                                        <option value="2">Pre Order</option>
                                        <option value="3">Upcoming</option>
                                        <option value="4">Discontinued</option>';
                            } 
			  			    else if($stock_status == '1'){
                                echo '  <option value="0">Stock Out</option>
                                        <option selected="" value="1">In Stock</option>
                                        <option value="2">Pre Order</option>
                                        <option value="3">Upcoming</option>
                                        <option value="4">Discontinue</option>';
                            } 
			  			    else if($stock_status == '2'){
                                echo '  <option value="0">Stock Out</option>
                                        <option value="1">In Stock</option>
                                        <option selected="" value="2">Pre Order</option>
                                        <option value="3">Upcoming</option>
                                        <option value="4">Discontinue</option>';
                            } 
			  			    else if($stock_status == '3'){
                                echo '  <option value="0">Stock Out</option>
                                        <option value="1">In Stock</option>
                                        <option value="2">Pre Order</option>
                                        <option selected="" value="3">Upcoming</option>
                                        <option value="4">Discontinue</option>';
                            } 
			  			    else if($stock_status == '4'){
                                echo '  <option value="0">Stock Out</option>
                                        <option value="1">In Stock</option>
                                        <option value="2">Pre Order</option>
                                        <option value="3">Upcoming</option>
                                        <option selected="" value="4">Discontinue</option>';
                            } 
                                        
			  			}
			  			else{
			  			        echo '  <option value="0">Stock Out</option>
                                        <option selected="" value="1">In Stock</option>
                                        <option value="2">Pre Order</option>
                                        <option value="3">Upcoming</option>
                                        <option value="4">Discontinue</option>';
			  			}
			  			?>
			  		</select>
			    </div>
			    
			  	<div class="col-md-4 col-sm-12 col-xs-12 mt-3">
			  		<label>Status</label>
			  		<select required  name="productStatus" class="form-control">
			  			<?php
			  			if($product_status == '1' || $product_status == '0'){
			  				if($product_status == '1'){echo '<option selected="" value="1">Active</option>
			  			<option value="0">Inactive</option>';} 
              				else{ echo '<option value="1">Active</option>
			  			<option selected="" value="0">Inactive</option>';}
			  			}else{
			  			echo '<option value="1">Active</option>
			  			<option selected="" value="0">Inactive</option>';
			  			}
			  			?>
			  		</select>
			    </div>

			<div class="col-md-12 col-sm-12 col-xs-12" style="text-align: right;margin-top: 2.5%">
			 <input type="checkbox" name="next_section" id="next"> <label for="next"><b>Update and go to Add-Technical Spec</b></label>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12" style="text-align: right;margin-top: 2.5%" id="submitRow">
                <button type="submit" name="submit" id="submit" class="btn btn-dark btn-md">Update <i class="fa fa-check"></i></button>
                <a id="showList" onclick="getList('product')" class="btn btn-info btn-md">List <i class="fa fa-bars"></i></a>
                <a id="showList" onclick="reload('Create-Product')" class="btn btn-info btn-md">Clear <i class="fa fa-refresh"></i></a>

            </div>
			</div>
			</form>

</div>	
<div id="listResult" style="display: none">
	
</div>
</div>

<?php
if(isset($_POST['submit'])){

    		$product_code = addslashes($_POST['productCode']);
			$product_name = addslashes($_POST['productName']);
			$product_category = addslashes($_POST['productCategory']);
			$product_brand = addslashes($_POST['productBrand']);
			$product_price = addslashes($_POST['productPrice']);
			$product_discount = addslashes($_POST['productDiscount']);
			$product_remark = addslashes($_POST['productRemark']);
			$product_features = addslashes($_POST['productFeatures']);

			$product_metaTitle = addslashes($_POST['productMetaTitle']);
			$product_metaDescription = addslashes($_POST['productMetaDescription']);
			$product_metaKeywords = addslashes($_POST['productMetaKeywords']);
			
			$product_description = addslashes($_POST['productDescription']);
			$product_url = addslashes($_POST['productUrl']);
			$product_redirect_url = addslashes($_POST['productRedirectUrl']);
			$status = addslashes($_POST['productStatus']);
			$stock = addslashes($_POST['stockStatus']);


			$product_subcategory = $_POST['product_subcategory_new'];
			//$product_subcategory= implode(', ', $subcategory);
			

    $cr_date = date(Ymd);
    $cr_by = $_SESSION['userCode'];
    

//`product_code` = '$product_code',`product_name` = '$product_name',`product_category` = '$product_category',`product_brand` = '$product_brand',`product_price` = '$product_price',`product_discount` = '$product_discount',`product_remark` = '$product_remark',`product_features` = '$product_features',`product_description` = '$product_description',`product_url` = '$product_url',`status` = '$status'

    $code = $_POST['code'];
	if(strlen($code)>0){
		$sql  = "SELECT COUNT(`id`) AS `RowCount` FROM `tbl_product` WHERE `product_url` = '$product_url' AND `product_code` != '$code'";
	    $result = mysqli_query($dbcon,$sql) or die ('error 4044');
			while($row = mysqli_fetch_assoc($result)){
			$RowCount = $row['RowCount'];
			}
	    if($RowCount > 0){
	    	echo "<script>alert('Update Failed : Already URL exists.');</script>";
	    	echo "<script>location='Create-Product'</script>";
	    }else{
			$sql  = "UPDATE `tbl_product` SET `product_name` = '$product_name',`product_category` = '$product_category',`product_subcategory` = '$product_subcategory',`product_brand` = '$product_brand',`product_price` = '$product_price',`product_discount` = '$product_discount',`product_remark` = '$product_remark',`product_features` = '$product_features',`product_description` = '$product_description',`product_url` = '$product_url',`product_redirect_url` = '$product_redirect_url', `product_metaTitle` = '$product_metaTitle', `product_metaDescription` = '$product_metaDescription', `product_metaKeywords` = '$product_metaKeywords',`stock_status` = '$stock',`product_status` = '$status',`cr_date` = '$cr_date',`cr_by` = '$cr_by' WHERE `product_code` = '$code'";
				$result = mysqli_query($dbcon,$sql) or die ('error 404');

			if($_FILES['image']['size'] > 0){

		  $image_prev = $_POST['image_prev'];
		  unlink('../assets/images/product_thumb/'.$image_prev);

		    $name= $code."_".gmdate("YmdHis", time() + 3600*6*date("I"));//'Brand_'.date("YFjgis");//$userId.$elName.'img'.$_FILES['image']['name'];
		    $tmp_name= $_FILES['image']['tmp_name'];
		    $fileName = $_FILES['image']['name'];
		    $position= strpos($fileName, ".");
		    $fileextension= substr($fileName, $position + 1);
		    $fileextension= strtolower($fileextension);
		    if (isset($name)) {
		        $path= '../assets/images/product_thumb/';
		        if (empty($name))
		        {
		        echo "Please choose a file";
		        }
		        else if (!empty($name)){
		            if (1!==1)
		            {
		            echo "The file extension must be PNG OR JPG order to be uploaded";
		            }
		            else if (($fileextension == "jpeg") ||($fileextension == "jpg") ||($fileextension == "PNG") || ($fileextension == "png"))
		            {
		                move_uploaded_file($tmp_name, $path.$name.".".$fileextension);
		            }
		        }
		    }
		$setName = $name.'.'.$fileextension;
		    $sql = "UPDATE `tbl_product` SET `product_thumb` = '$setName',`cr_date` = '$cr_date',`cr_by` = '$cr_by' WHERE `product_code` = '$code'";
	 	$result = mysqli_query($dbcon,$sql) or die ('error 4041');
		}

			if($_FILES['brochure']['size'] > 0){
		  $brochure_prev = $_POST['brochure_prev'];
		  unlink('../assets/images/product_brochure/'.$brochure_prev);

		    $name= $code."_".gmdate("YmdHis", time() + 3600*6*date("I"));//'Brand_'.date("YFjgis");//$userId.$elName.'img'.$_FILES['image']['name'];
		    $tmp_name= $_FILES['brochure']['tmp_name'];
		    $fileName = $_FILES['brochure']['name'];
		    $position= strpos($fileName, ".");
		    $fileextension= substr($fileName, $position + 1);
		    $fileextension= strtolower($fileextension);
		    if (isset($name)) {
		        $path= '../assets/images/product_brochure/';
		        if (empty($name))
		        {
		        echo "Please choose a file";
		        }
		        else if (!empty($name)){
		            if (1!==1)
		            {
		            echo "The file extension must be PDF order to be uploaded";
		            }
		            else if (($fileextension == "pdf") ||($fileextension == "PDF"))
		            {
		                move_uploaded_file($tmp_name, $path.$name.".".$fileextension);
		            }
		        }
		    }
		$setName = $name.'.'.$fileextension;
		    $sql = "UPDATE `tbl_product` SET `product_brochure` = '$setName',`cr_date` = '$cr_date',`cr_by` = '$cr_by'  WHERE `product_code` = '$code'";
	 	$result = mysqli_query($dbcon,$sql) or die ('error 4041');
		}


		/*UPDATE FILTER VALUE*/
// 		Inactive due to new subcategory addition
				$sql = "SELECT  GROUP_CONCAT(DISTINCT `f_head_code`,'-',`filter_code`) AS `ext_val` FROM `master_filter` WHERE `product_code` = '$code'";
		  		$result = mysqli_query($dbcon,$sql) or die ('error 4041');
		  		$ext_i = 0;
		  		while($row = mysqli_fetch_assoc($result)){
					$ext_val = $row['ext_val'];
				}

		    $subcat_box_array = explode(',', $product_subcategory);
		    $filter_box_array = explode(',', $ext_val);

		    echo $del_sql= "DELETE FROM `master_filter` WHERE `product_code` = '$code'";
		    $del_result = mysqli_query($dbcon,$del_sql) or die ('error 404');
		    
			foreach($subcat_box_array as $subcatvalue) {
		    	$subcat_selected = $subcatvalue;

		    		foreach($filter_box_array as $value) {
		    			$filter_selected = $value;
		    			$filter_string = explode('-', $filter_selected);
		    			$filterHead = $filter_string[0];
		    			$filterCode = $filter_string[1];
			
		        		if($filterCode !== null){
		        	    	echo $ins_sql= "INSERT INTO `master_filter`(`id`, `filter_code`, `product_code`, `f_head_code`,`brand_code`, `category`,`crDate`,`crBy`) VALUES('','$filterCode','$code','$filterHead','$product_brand','$subcat_selected','$cr_date','$cr_by')";
		            		$ins_result = mysqli_query($dbcon,$ins_sql) or die ('error 404');
		        		}
		    		}
		    }
		/*UPDATE FILTER VALUE*/
		}
			

		if(isset($_POST['next_section'])){
			echo "<script>location='Add-Spec/".$code."'</script>";
		}
		else
			{
			echo "<script>location='Create-Product'</script>";
			}
	}

    else{
	    $sql  = "SELECT COUNT(`id`) AS `RowCount` FROM `tbl_product` WHERE `product_url` = '$product_url'";
	    $result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
			$RowCount = $row['RowCount'];
			}
	    if($RowCount > 0){
	    	echo "<script>alert('Already URL exists.');</script>";
	    	echo "<script>location='Brand'</script>";
	    }else{
	    $sql = "INSERT INTO `tbl_product`(`id`, `product_code`, `product_name`, `product_category`,`product_subcategory`, `product_brand`, `product_price`, `product_discount`, `product_remark`, `product_features`, `product_description`, `product_metaTitle`, `product_metaDescription`, `product_metaKeywords`, `product_brochure`, `product_thumb`, `product_url`, `stock_status`,`product_status`, `cr_date`, `cr_by`) VALUES ('', '', '$product_name', '$product_category', '$product_subcategory', '$product_brand', '$product_price', '$product_discount', '$product_remark', '$product_features', '$product_description', '$product_metaTitle', '$product_metaDescription', '$product_metaKeywords', '$product_brochure', '$product_thumb', '$product_url','$stock'
	    , '$status', '$cr_date', '$cr_by')";
	 	$result = mysqli_query($dbcon,$sql) or die ('error 4041');



	$last_id = mysqli_insert_id($dbcon);
	$n2 = str_pad($last_id, 5, 0, STR_PAD_LEFT);
	$newId =  "PR".$n2;

	$sqlget1 = "UPDATE `tbl_product` SET `product_code` = '$newId' WHERE `id` = '$last_id'";
	$sqldata1 = mysqli_query($dbcon,$sqlget1) or die ('error 4042X');
	
	for($i = 1;$i<=6;$i++){
	 		$code = 'C'.$i;
	 		$sql ="INSERT INTO `tbl_product_image`(`id`, `product_code`, `code`, `image`, `status`, `crDate`, `crBy`) VALUES ('','$newId','$code','','0','$cr_date','$cr_by')";
	 		$result = mysqli_query($dbcon,$sql) or die ('error 4041');
	 	    
	 	}

	if($_FILES['image']['size'] > 0){

		 // 	$comLogo = $_POST['comLogo'];
			// unlink('../assets/images/brand/'.$comLogo);

		    $name= $newId."_".gmdate("YmdHis", time() + 3600*6*date("I"));//'Brand_'.date("YFjgis");//$userId.$elName.'img'.$_FILES['image']['name'];
		    $tmp_name= $_FILES['image']['tmp_name'];
		    $fileName = $_FILES['image']['name'];
		    $position= strpos($fileName, ".");
		    $fileextension= substr($fileName, $position + 1);
		    $fileextension= strtolower($fileextension);
		    if (isset($name)) {
		        $path= '../assets/images/product_thumb/';
		        if (empty($name))
		        {
		        echo "Please choose a file";
		        }
		        else if (!empty($name)){
		            if (1!==1)
		            {
		            echo "The file extension must be PNG OR JPG order to be uploaded";
		            }
		            else if (($fileextension == "jpeg") ||($fileextension == "jpg") ||($fileextension == "PNG") || ($fileextension == "png"))
		            {
		                move_uploaded_file($tmp_name, $path.$name.".".$fileextension);
		            }
		        }
		    }
		$setName = $name.'.'.$fileextension;
		$sql = "UPDATE `tbl_product` SET `product_thumb` = '$setName',`cr_date` = '$cr_date',`cr_by` = '$cr_by'  WHERE `product_code` = '$newId'";
	 	$result = mysqli_query($dbcon,$sql) or die ('error 4041');

// 	 	for($i = 1;$i<=6;$i++){
// 	 		$code = 'C'.$i;
// 	 		$sql ="INSERT INTO `tbl_product_image`(`id`, `product_code`, `code`, `image`, `status`, `crDate`, `crBy`) VALUES ('','$newId','$code','','0','$cr_date','$cr_by')";
// 	 		$result = mysqli_query($dbcon,$sql) or die ('error 4041');
	 	    
// 	 	}
		}
		
		
		if($_FILES['brochure']['size'] > 0){
		    $name= $newId."_".gmdate("YmdHis", time() + 3600*6*date("I"));//'Brand_'.date("YFjgis");//$userId.$elName.'img'.$_FILES['image']['name'];
		    $tmp_name= $_FILES['brochure']['tmp_name'];
		    $fileName = $_FILES['brochure']['name'];
		    $position= strpos($fileName, ".");
		    $fileextension= substr($fileName, $position + 1);
		    $fileextension= strtolower($fileextension);
		    if (isset($name)) {
		        $path= '../assets/images/product_brochure/';
		        if (empty($name))
		        {
		        echo "Please choose a file";
		        }
		        else if (!empty($name)){
		            if (1!==1)
		            {
		            echo "The file extension must be PDF order to be uploaded";
		            }
		            else if (($fileextension == "pdf") ||($fileextension == "PDF"))
		            {
		                move_uploaded_file($tmp_name, $path.$name.".".$fileextension);
		            }
		        }
		    }
		$setName = $name.'.'.$fileextension;
		    $sql = "UPDATE `tbl_product` SET `product_brochure` = '$setName' WHERE `product_code` = '$newId'";
	 	$result = mysqli_query($dbcon,$sql) or die ('error 4041');
		}
		
		if(isset($_POST['next_section'])){
			echo "<script>location='Add-Spec/".$newId."'</script>";
		}
		else
			{echo "<script>location='Create-Product'</script>";}

		

		
	    }
	}
}
?>


<script type="text/javascript">
var upload = document.querySelector("#upload-file");
upload.onchange = function()
{
		var url = URL.createObjectURL(this.files[0]);
		var img = new Image();
		img.src = url;
		img.onload = function()
		{
			if(this.width != 200 && this.height !== 200){
				alert("Please select square size image of (200 x 200) pixel");
				document.getElementById('submitRow').style.display = 'none';
			}else{
				document.getElementById('submitRow').style.display = 'block';
			}
		}
		img.remove();
}

function dispImage(value){
	//alert(value);
	MyWindow=window.open('Display-Image?image='+value+'&item=product-image','MyWindow','width=600,height=600'); return false;
}function dispBrochure(value){
	//alert(value);
	MyWindow=window.open('Display-Image?image='+value+'&item=product-brochure','MyWindow','width=600,height=600'); return false;
}
	
</script>

<script type="text/javascript">
 CKEDITOR.replace('productFeatures');
 CKEDITOR.replace('productDescription');
</script> 

<script type="text/javascript">
	function check(){
		var url = document.getElementById('url').value;
	$.ajax({
		      type:"post",
		      url:"ajaxUrlWarning.php",
		      data:{url:url},
		      success:function(data)
		      {
		        if(!data){
		          document.getElementById('message').style.display="none";
		        }else{
		          if(data !== ''){
		          	//alert(data);
		          document.getElementById('message').style.display="block";
		          $('#message').html(data);
		      	  }else{
		      	  	//alert(data);
		          document.getElementById('message').style.display="none";
		      	  }
		        }
		            
		      }
		    });
	}


	function getSubcategory(){
	var category = document.getElementById('category').value;
	$.ajax({
		      type:"post",
		      url:"ajaxGetSubCategory.php",
		      data:{category:category},
		      success:function(data)
		      {
		        if(!data){
		          document.getElementById('subcategories').style.display="none";
		        }else{
		          if(data !== ''){
		          	//alert(data);
		          document.getElementById('subcategories').style.display="block";
		          $('#subcategories').html(data);

		          getMarkedSubcategory();
		      	  }else{
		      	  	//alert(data);
		          document.getElementById('subcategories').style.display="none";
		      	  }
		        }
		            
		      }
		    });
	}


	function subcategoryCheck(){
		var subcategory = document.getElementById('product_subcategory').value;


		if((subcategory.length) !== 0){
		var category = document.getElementById('category').value;
		getSubcategory();
		}
	}

	function getMarkedSubcategory(){
		var subcategory = document.getElementById('product_subcategory').value;
		document.getElementById('product_subcategory_new').value = subcategory;
			if(subcategory !== ''){
				var output = subcategory.split(',');
				var filterParam = "subcategory";
				var elems = $('input[name^='+filterParam+']');

				output.forEach(function(val){
				 elems.filter("[value="+ val +"]").prop("checked",true);
				});
			}
	}

	function markSubcategory(){
		var output = jQuery.map($(':checkbox[name=subcategory\\[\\]]:checked'), function (n, i) {
		    return n.value;
		}).join(',');
		//alert(output);
		document.getElementById('product_subcategory_new').value = output;
	}
</script>
<script type="text/javascript">
$("#submit").click(function() {
    	var subcategory = document.getElementById('product_subcategory_new').value;
    	if(subcategory === ''){alert("Select at least one subcategory");}
  	});
</script>



<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>