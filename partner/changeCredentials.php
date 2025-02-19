<?php
session_start();
if(!isset($_SESSION['dealerCode'])){
//echo '<script>window.location="Logout";</script>';
}
?>
<!DOCTYPE html>
<html>
<head>
<?php
include('includes.php');
?>

<!--RICHTEXT-->
<script type="text/javascript" src="https://cdn.ckeditor.com/4.4.7/standard/ckeditor.js"></script>
<!--RICHTEXT-->
</head>
<body>

<?php
include('../assets/database/config.php');
//include('editItem.php');
?>
<?php include('sidebar.php');?>
<div class="card">
<div class="card-header"><h1>Change Credentials</h1></div>
<div class="card-body">
		<form action="Credentials" method="post" enctype="multipart/form-data">
			<div class="row">
		  		<!-- <div class="col-md-6 col-sm-12 col-xs-12 mt-3">
			  		<label>Code</label>
			    	<input type="text" name="User_Code" class="form-control" placeholder="Designation">
			    </div> -->
		  		<div class="col-md-12 col-sm-12 col-xs-12 mt-3">
			  		<label>Previous Password</label>
			    	<input required type="password" name="previousPassword" value="<?php echo $product_name;?>" class="form-control" placeholder="Previous Password">
			    	<input type="text" name="code" value="<?php echo $_SESSION['dealerCode'];?>" class="form-control" style="display: none">
		    	</div>
		  		<div class="col-md-12 col-sm-12 col-xs-12 mt-3">
			  		<label>New Password</label>
			    	<input required type="password" name="newPassword" value="<?php echo $product_name;?>" class="form-control" placeholder="New Password">
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

    $dealerRegCode = $_POST['code'];
	$prevPassword = $_POST['previousPassword'];
	$newPassword = $_POST['newPassword'];
    $cr_date = date(Ymd);
    $cr_by = "test";
    
    $sql3 = "SELECT * FROM `master_dealer_register` WHERE `dealerRegCode` = '$dealerRegCode'";
	$result3 = mysqli_query($dbcon,$sql3) or die ('error 404');
			        while($row3 = mysqli_fetch_assoc($result3)){
			            $oldPassword = strtoupper($row3['dealerPassword']);
			        }

	if($oldPassword == $prevPassword)
		{
			$sql = "UPDATE `master_dealer_register` SET `dealerPassword` = '$newPassword' WHERE `dealerRegCode` = '$dealerRegCode'";
			$result = mysqli_query($dbcon,$sql) or die ('error 4041');
				
			echo "<script>location='Logout'</script>";
		}
	else{
			echo "<script>location='Credentials'</script>";
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
</script>
</body>
</html>