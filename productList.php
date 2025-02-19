<!DOCTYPE html>
<html>
<head>
<?php include('includes.php');?>
</head>
<body>
<?php 
include('menu.php');
$compSent  = $_GET['comp'];
$product_category = $_GET['code'];
?>

<div class="container" style="margin-top: 0.5%">
	<div class="row" style="background-color: white;margin-bottom: 5%;border-bottom: 2px solid #4c4d4f">
<?php 
$i = 0;
$sql = "SELECT  `product_name`, `product_price`, `product_thumb`, `product_url`  FROM `tbl_product` WHERE `product_category` = '$product_category'";
		$result = mysqli_query($dbcon,$sql) or die ('error 404');
		while($row = mysqli_fetch_assoc($result)){
			$i++;
			$product_name = strtoupper($row['product_name']);
			$product_price = strtoupper($row['product_price']);
			$product_thumb = strtoupper($row['product_thumb']);
			$product_url = strtoupper($row['product_url']);

			echo '
			
					<div class="col-4" style="text-align: center;background-color: white">
						<img id="selected_text_image_'.$i.'" src="assets/images/product_thumb/'.$product_thumb.'">
						<p id="selected_text_name_'.$i.'">Product : '.$product_name.'</p>
						<p id="selected_text_price_'.$i.'" value="'.$product_price.'">Price : '.$product_price.' BDT</p>
						<input type="number" id="selected_qty_'.$i.'" name="quantity" min="1" max="10" value="1" style="text-align:center">
						<input style="display:none" type="text" id="compSent" value="'.$compSent.'">
						<input style="display:none" type="text" id="selected_name_'.$i.'" value="'.$product_name.'">
						<input style="display:none" type="text" id="selected_price_'.$i.'" value="'.$product_price.'">
						<input style="display:none" type="text" id="selected_image_'.$i.'" value="assets/images/product_thumb/'.$product_thumb.'">
						<button id="'.$i.'_'.$compSent.'" onclick="choosedItem(this.id)"  style="background-color: #f16724;color:white;margin:2%">Choose Item</button>
					</div>
			';
		}
?>

	</div>
</div>


<?php
// $compCode = $_GET['comp'];

// if($compCode == 1){
// 	echo '<label>Processor 1</label>
// 	<br><button id="1_1" onclick="choosedProcessor(this.id)" style="background-color: orange">Choose</button><br>';
// 	echo '<label>Processor 2</label>
// 	<br><button id="1_2" onclick="choosedProcessor(this.id)" style="background-color: orange">Choose</button><br>';
// 	echo '<label>Processor 3</label>
// 	<br><button id="1_3" onclick="choosedProcessor(this.id)" style="background-color: orange">Choose</button><br>';
// }
// else if($compCode == 2){
// 	echo '<label>MotherBoard 1</label>
// 	<br><button id="2_1" onclick="choosedMotherBoard(this.id)" style="background-color: orange">Choose</button><br>';
// 	echo '<label>MotherBoard 2</label>
// 	<br><button id="2_2" onclick="choosedMotherBoard(this.id)" style="background-color: orange">Choose</button><br>';
// 	echo '<label>MotherBoard 3</label>
// 	<br><button id="2_3" onclick="choosedMotherBoard(this.id)" style="background-color: orange">Choose</button><br>';
// }
// else if($compCode == 3){
// 	echo '<label>RAM 1</label>
// 	<br><button id="3_1" onclick="choosedRam(this.id)" style="background-color: orange">Choose</button><br>';
// 	echo '<label>RAM 2</label>
// 	<br><button id="3_2" onclick="choosedRam(this.id)" style="background-color: orange">Choose</button><br>';
// 	echo '<label>RAM 3</label>
// 	<br><button id="3_3" onclick="choosedRam(this.id)" style="background-color: orange">Choose</button><br>';
// }
?>

<!-- <script type="text/javascript">
	function choosedProcessor(code){
		localStorage.setItem("Processor", code);
		localStorage.setItem("load", 2);
		window.opener.location.reload(false);
		window.close();
	}
	function choosedMotherBoard(code){
		localStorage.setItem("MotherBoard", code);
		localStorage.setItem("load", 2);
		window.opener.location.reload(false);
		window.close();
	}
	function choosedRam(code){
		localStorage.setItem("RAM", code);
		localStorage.setItem("load", 2);
		window.opener.location.reload(false);
		window.close();
	}
</script> -->

<script type="text/javascript">
	function choosedItem(code){
		//alert(code);
		var fields = code.split('_');

		var code = fields[0];
		var sl = fields[1];


		localStorage.setItem("comp_"+sl+"_name", document.getElementById("selected_name_"+code).value);
		localStorage.setItem("comp_"+sl+"_price", document.getElementById("selected_price_"+code).value);
		localStorage.setItem("comp_"+sl+"_qty", document.getElementById("selected_qty_"+code).value);
		localStorage.setItem("comp_"+sl+"_image", document.getElementById("selected_image_"+code).value);
		localStorage.setItem("load", 2);


		//alert(localStorage.getItem("comp_"+code+"_name"));


		window.opener.location.reload(false);
		window.close();
	}
</script>


</body>
</html>