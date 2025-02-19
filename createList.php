<!DOCTYPE html>
<html>
<head>
<!-- <meta http-equiv="refresh" content="30"> -->
<?php include('includes.php');?>
<style type="text/css">
	#p-t-row{padding-top:1%;padding-bottom:1%;border-bottom:1px solid black}
	img{width: 45%;padding-top: 0px !important}
</style>
</head>
<body onload="check()">

<?php include('menu.php');?>

<div class="container" style="background-color: white;margin-top:0.5%">

<div class="row" style="padding-top: 2.5%">
	<div class="col-7">
	<a id="clear" href="javascript:void(0)" onclick="clearAll()" style="border-radius:0px;color:white;background-color: #f16724;padding: 2.5%"><b>Clear</b></a>
	<a id="clear" href="javascript:void(0)" onclick="clearAll()" style="border-radius:0px;color:white;background-color: #f16724;padding: 2.5%"><b>Get Qoutation</b></a>
	</div>
	<div class="col-3" style="text-align: right">
		<b style="color:#f16724;"><h3 id="totalValue">0</h3></b>
	</div>
	<div class="col-2">
		<b style="color:#f16724;"><h3>BDT</h3></b>
	</div>
</div>

<div class="row" id="p-t-row" style="background-color: lightgray;font-weight: bold">
	<div class="col-md-2 col-sm-2 col-6">Product</div>
	<div class="col-md-3 col-sm-4 col-6">Name</div>
	<div class="col-md-2 col-sm-4 col-6">Quantity</div>
	<div class="col-md-1 col-sm-2 col-6">Price</div>
	<div class="col-md-2 col-sm-2 col-6">Image</div>
	<div class="col-md-2 col-sm-2 col-6">Action</div>
</div>
<?php 
$i = 0;
$sql = "SELECT  `category_name`, `category_code` FROM `tbl_category` WHERE `category_status` = '1'";
$result = mysqli_query($dbcon,$sql) or die ('error 404');
		while($row = mysqli_fetch_assoc($result)){
			$i++;
			$category_code = $row['category_code'];
			$category_name = ucfirst($row['category_name']);

			for($j=1;$j<=3;$j++){
				echo '<div class="row" id="p-t-row">
				<div class="col-md-2 col-sm-2 col-6">'.$category_name.' - '.$j.'</div>
				<div class="col-md-3 col-sm-4 col-6"><label id="comp_'.$i.$j.'_name">Empty</label></div>
				<div class="col-md-2 col-sm-4 col-6"><label id="comp_'.$i.$j.'_qty">Empty</label></div>
				<div class="col-md-1 col-sm-2 col-6"><label id="comp_'.$i.$j.'_price">Empty</label></div>
				<div class="col-md-2 col-sm-2 col-6"><img id="comp_'.$i.$j.'_image" src="" alt="Select Item"></div>
				<div class="col-md-2 col-sm-2 col-6">
					<a href="javascript:void(0)" class="btn btn-sm" id="'.$i.$j.'_'.$category_code.'" onclick="openTab(this.id)" style="background-color: #f16724;border-radius: 0px;color:white;font-weight: bold">Choose</a>
					<a href="javascript:void(0)" class="btn btn-sm" id="action_button" onclick="remove_item('.$i.$j.')" style="background-color: red;border-radius: 0px;color:white;font-weight: bold">X</a>
				</div>
				</div>';
				}

			}
?>
<!-- <div class="row" id="p-t-row">
	<div class="col-md-2 col-sm-2 col-6">Processor</div>
	<div class="col-md-4 col-sm-4 col-6"><label id="Processor">Empty</label></div>
	<div class="col-md-2 col-sm-2 col-6"><label id="Processor_price">Empty</label></div>
	<div class="col-md-2 col-sm-2 col-6"><img id="processor_image" src="" alt="Select Item"></div>
	<div class="col-md-2 col-sm-2 col-6">
		<a href="javascript:void(0)" class="btn btn-sm" id="Processor_btn" onclick="openTab('1')" style="background-color: #f16724;border-radius: 0px;color:white;font-weight: bold">Choose</a>
		<a href="javascript:void(0)" class="btn btn-sm" id="Processor_btn" onclick="remove_item('Processor')" style="background-color: red;border-radius: 0px;color:white;font-weight: bold">X</a>
	</div>
</div>

<div class="row" id="p-t-row">
	<div class="col-md-2 col-sm-2 col-6">Graphics Card</div>
	<div class="col-md-4 col-sm-4 col-6"><label id="MotherBoard">Empty</label></div>
	<div class="col-md-2 col-sm-2 col-6"><label id="MotherBoard_price">Empty</label></div>
	<div class="col-md-2 col-sm-2 col-6"><img id="motherboard_image" src="" alt="Select Item"></div>
	<div class="col-md-2 col-sm-2 col-6">
		<a href="javascript:void(0)" class="btn btn-sm" id="MotherBoard_btn" onclick="openTab('2')" style="background-color: #f16724;border-radius: 0px;color:white;font-weight: bold">Choose</a>
		<a href="javascript:void(0)" class="btn btn-sm" id="MotherBoard_btn" onclick="remove_item('MotherBoard')" style="background-color: red;border-radius: 0px;color:white;font-weight: bold">X</a>
	</div>
</div>

<div class="row" id="p-t-row">
	<div class="col-md-2 col-sm-2 col-6">RAM</div>
	<div class="col-md-4 col-sm-4 col-6"><label id="RAM">Empty</label></div>
	<div class="col-md-2 col-sm-2 col-6"><label id="RAM_price">Empty</label></div>
	<div class="col-md-2 col-sm-2 col-6"><img id="ram_image" src="" alt="Select Item"></div>
	<div class="col-md-2 col-sm-2 col-6">
	<a href="javascript:void(0)" class="btn btn-sm" id="RAM_btn" onclick="openTab('3')" style="background-color: #f16724;border-radius: 0px;color:white;font-weight: bold">Choose</a>
	<a href="javascript:void(0)" class="btn btn-sm" id="RAM_btn" onclick="remove_item('RAM')" style="background-color: red;border-radius: 0px;color:white;font-weight: bold">X</a>
	</div>
</div> -->
</div>



<!-- <label id="Processor">Empty</label>
<button id="Processor_btn" onclick="openTab('1')" style="background-color: orange">Choose</button>
<button id="Processor_btn" onclick="remove_item('Processor')" style="background-color: red">X</button>
<br>

<label id="MotherBoard">Empty</label>
<button id="MotherBoard_btn" onclick="openTab('2')" style="background-color: orange">Choose</button>
<button id="MotherBoard_btn" onclick="remove_item('MotherBoard')" style="background-color: red">X</button>
<br>

<label id="RAM">Empty</label>
<button id="RAM_btn" onclick="openTab('3')" style="background-color: orange">Choose</button>
<button id="RAM_btn" onclick="remove_item('RAM')" style="background-color: red">X</button>
<br> -->




<!-- <script type="text/javascript">
if(localStorage.getItem("load") == 2){
	localStorage.setItem("load", 1);
	window.reload();
}
function check(){
document.getElementById('Processor').innerHTML = localStorage.getItem("Processor");
document.getElementById("MotherBoard").innerHTML = localStorage.getItem("MotherBoard"); 
document.getElementById('RAM').innerHTML = localStorage.getItem("RAM");

document.getElementById("processor_image").src = 'assets/images/P_'+localStorage.getItem("Processor")+'.jpg';
document.getElementById("motherboard_image").src = 'assets/images/G_'+localStorage.getItem("MotherBoard")+'.jpg';
document.getElementById("ram_image").src = 'assets/images/R_'+localStorage.getItem("RAM")+'.jpg';


document.getElementById('Processor_price').innerHTML = localStorage.getItem("Processor");
document.getElementById("MotherBoard_price").innerHTML = localStorage.getItem("MotherBoard"); 
document.getElementById('RAM_price').innerHTML = localStorage.getItem("RAM");
}

function openTab(code){
	window.open("productList.php?comp="+code);
}

function remove_item(item){
	localStorage.setItem(item, 'Choose Item');
	location.reload();
}
function clearAll(){
	localStorage.setItem("Processor", 'Choose Item');
	localStorage.setItem("MotherBoard", 'Choose Item');
	localStorage.setItem("RAM", 'Choose Item');
	window.location.replace("createList.php","_self");
}
</script> -->


<script type="text/javascript">
if(localStorage.getItem("load") == 2){
	localStorage.setItem("load", 1);
	window.reload();
}
function check(){
	var totalPrice = 0;
	for(var i = 1; i<=10; i++){
		for(var j = 1;j<=3;j++){
			var value = i.toString()+j.toString();
			//alert(value);
			document.getElementById("comp_"+value+"_name").innerHTML = localStorage.getItem("comp_"+value+"_name");
			document.getElementById("comp_"+value+"_qty").innerHTML = localStorage.getItem("comp_"+value+"_qty");
			document.getElementById("comp_"+value+"_price").innerHTML = localStorage.getItem("comp_"+value+"_price");
			document.getElementById("comp_"+value+"_image").src = localStorage.getItem("comp_"+value+"_image");

			if(isNaN(parseInt(localStorage.getItem("comp_"+value+"_price")))){
			}else{
				totalPrice = totalPrice + (parseInt(localStorage.getItem("comp_"+value+"_price")) * parseInt(localStorage.getItem("comp_"+value+"_qty")));
			}
		}document.getElementById('totalValue').innerHTML = totalPrice;
	}
	
}

function openTab(code){
	var fields = code.split('_');
	var comp =fields[0];
	var code = fields[1];


	window.open("productList.php?comp="+comp+'&code='+code);
}

function remove_item(item){
	localStorage.setItem("comp_"+item+"_name", 'Empty');
	localStorage.setItem("comp_"+item+"_price", 'Empty');
	localStorage.setItem("comp_"+item+"_qty", 'Empty');
	localStorage.setItem("comp_"+item+"_image", 'Select Item');
	location.reload();
}
function clearAll(){
	for(var i = 1; i<=10; i++){
		for(var j = 1; j<=10; j++){
			var value = i.toString()+j.toString();
		localStorage.setItem("comp_"+value+"_name", 'Empty');
		localStorage.setItem("comp_"+value+"_price", 'Empty');
		localStorage.setItem("comp_"+value+"_qty", 'Empty');
		localStorage.setItem("comp_"+value+"_image", 'Select Item');
		location.reload();
	}
	}
}
</script>
</body>
</html>