<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body onload="check()">
	<?php include('assets/database/config.php');?>
<?php 
$i = 0;
$sql = "SELECT  `category_name`, `category_code`,`category_url` FROM `tbl_category` WHERE `category_status` = '1'";
$result = mysqli_query($dbcon,$sql) or die ('error 404');
		while($row = mysqli_fetch_assoc($result)){
			$i++;
			$category_code = $row['category_code'];
			$category_url = $row['category_url'];
			$category_name = ucfirst($row['category_name']);

			for($j=1;$j<=3;$j++){
				echo '<div class="row" id="p-t-row">
				<div class="col-md-2 col-sm-2 col-6">'.$category_name.' - '.$j.'</div>
				<div class="col-md-3 col-sm-4 col-6"><label id="comp_'.$i.$j.'_name">Empty</label></div>
				<div class="col-md-1 col-sm-4 col-6"><label id="comp_'.$i.$j.'_qty">Empty</label></div>
				<div class="col-md-1 col-sm-2 col-6"><label id="comp_'.$i.$j.'_uprice">Empty</label></div>
				<div class="col-md-1 col-sm-2 col-6"><label id="comp_'.$i.$j.'_tprice">Empty</label></div>
				<div class="col-md-2 col-sm-2 col-6">
					<a href="javascript:void(0)" class="btn btn-sm" id="'.$category_url.'/'.$i.$j.'" onclick="openTab(this.id)" style="background-color: #f16724;border-radius: 0px;color:white;font-weight: bold">Choose</a>
					<a href="javascript:void(0)" class="btn btn-sm" id="action_button" onclick="remove_item('.$i.$j.')" style="background-color: red;border-radius: 0px;color:white;font-weight: bold">X</a>
				</div>
				</div>';
				}

			}
?>

<script type="text/javascript">
function check(){
	var totalPrice = 0;
	for(var i = 1; i<=10; i++){
		for(var j = 1;j<=3;j++){
			var value = i.toString()+j.toString();
			alert(localStorage.getItem("comp_"+value+"_name"));
			document.getElementById("comp_"+value+"_name").innerHTML = localStorage.getItem("comp_"+value+"_name");
			document.getElementById("comp_"+value+"_qty").innerHTML = localStorage.getItem("comp_"+value+"_qty");
			document.getElementById("comp_"+value+"_uprice").innerHTML = localStorage.getItem("comp_"+value+"_uprice");
			document.getElementById("comp_"+value+"_tprice").innerHTML = localStorage.getItem("comp_"+value+"_tprice");
			document.getElementById("comp_"+value+"_image").src = localStorage.getItem("comp_"+value+"_image");

			if(isNaN(parseInt(localStorage.getItem("comp_"+value+"_uprice")))){
			}else{
				totalPrice = totalPrice + (parseInt(localStorage.getItem("comp_"+value+"_uprice")) * parseInt(localStorage.getItem("comp_"+value+"_qty")));
			}
		}document.getElementById('totalValue').innerHTML = totalPrice;
	}
	
}
</script>
</body>
</html>