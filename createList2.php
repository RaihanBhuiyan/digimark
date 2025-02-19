<!DOCTYPE html>
<html>
<head>
<!-- <meta http-equiv="refresh" content="30"> -->
<?php include('includes.php');?>
<style type="text/css">
	#p-t-row{padding-top:1%;padding-bottom:1%;border-bottom:1px solid black}
	img{width: 45%;padding-top: 0px !important}
	
	.print-only{
        display: none;
    }

    @media print {
	        .no-print {
	            display: none;
	        }

	        .print-only{
	            display: block;
	        }
		}
	}
</style>
</head>
<body onload="check()">

<?php include('menu.php');?>

<div class="container" style="background-color: white;margin-top:0.5%">

<div class="row d-print-none" style="padding-top: 2.5%">
	<div class="col-12" style="text-align: center;">
		<h5>Create Product List</h5>
	<input type="text" id="contactasquotation" onkeyup="checkToValidate()" placeholder="Enter Your Number to download list**" style="min-width:50%">
	</div>
	<div class="col-12" style="text-align: center;margin-top: 1%">
	<button id="clear" class="btn btn-dark" href="javascript:void(0)" onclick="clearAll()" style="border-radius:0px;color:white;padding: 0.5%"><b>Clear</b></button>
	<button id="clear" class="btn btn-dark" href="javascript:void(0)" onclick="clearAll()" style="border-radius:0px;color:white;padding: 0.5%"><b>Get Qoutation</b></button>
	<button id="save" class="btn btn-dark" href="javascript:void(0)" disabled="true" onclick="window.open('Save-Quotation')" style="border-radius:0px;color:white;padding: 0.5%;">
		<i class="fas fa-download"></i> <b>Download</b></button>
	</div>
</div>
<div class="print-only" style="padding-top: 2.5%;">
	<div class="row">
		<div class="col-md-4"><img src="assets/images/logo.png" style="width: 50%"></div>
		<div class="col-md-4"></div>
		<div class="col-md-4"><p>28/1/C,Rahmania International Complex (1st Floor),Toyenbee Circular Road, Motijheel,Dhaka-1000 </p></div>
	</div>
</div>
<div class="row" id="p-t-row" style="background-color: lightgray;font-weight: bold;margin-top: 2.5%">
	<div class="col-md-2 col-sm-2 col-6">Product</div>
	<div class="col-md-3 col-sm-4 col-6">Name</div>
	<div class="col-md-1 col-sm-4 col-6">Quantity</div>
	<div class="col-md-1 col-sm-2 col-6">Unit Price</div>
	<div class="col-md-1 col-sm-2 col-6">Total Price</div>
	<div class="col-md-2 col-sm-2 col-6">Image</div>
	<div class="col-md-2 col-sm-2 col-6">Action</div>
</div>
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
				<div class="col-md-2 col-sm-2 col-6"><img id="comp_'.$i.$j.'_image" src="" alt="Select Item"></div>
				<div class="col-md-2 col-sm-2 col-6">
					<a href="javascript:void(0)" class="btn btn-sm" id="'.$category_url.'/'.$i.$j.'" onclick="openTab(this.id)" style="background-color: #4c4d4f;border-radius: 0px;color:white;font-weight: bold">Choose</a>
					<a href="javascript:void(0)" class="btn btn-sm" id="action_button" onclick="remove_item('.$i.$j.')" style="background-color: red;border-radius: 0px;color:white;font-weight: bold">X</a>
				</div>
				</div>';
				}

			}
?>

<div class="row">
	<div class="col-6" style="text-align: right">
		<b style="color:#4c4d4f;"><h3>Total :</h3></b>
	</div>
	<div class="col-2" style="text-align: right">
		<b style="color:#4c4d4f;"><h3 id="totalValue">0</h3></b>
	</div>
	<div class="col-4">
		<b style="color:#4c4d4f;"><h3>BDT</h3></b>
	</div>
</div>
</div>


<?php include('footer.php');?>


<script type="text/javascript">
if(localStorage.getItem("load") == 2){
	localStorage.setItem("load", 1);
	window.reload();
}
function check(){
	var totalPrice = 0;
	for(var i = 1; i<=9999; i++){
		for(var j = 1;j<=3;j++){
			var value = i.toString()+j.toString();
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

function openTab(code){
	//var fields = code.split('_');
	// var comp =fields[0];
	// var code = fields[1];


	window.open('ListItem/'+code);
}

function remove_item(item){
	localStorage.setItem("comp_"+item+"_name", 'Empty');
	localStorage.setItem("comp_"+item+"_uprice", 'Empty');
	localStorage.setItem("comp_"+item+"_tprice", 'Empty');
	localStorage.setItem("comp_"+item+"_qty", 'Empty');
	localStorage.setItem("comp_"+item+"_image", 'Select Item');
	location.reload();
}
function clearAll(){
	for(var i = 1; i<=10; i++){
		for(var j = 1; j<=10; j++){
			var value = i.toString()+j.toString();
		localStorage.setItem("comp_"+value+"_name", 'Empty');
		localStorage.setItem("comp_"+value+"_uprice", 'Empty');
		localStorage.setItem("comp_"+value+"_tprice", 'Empty');
		localStorage.setItem("comp_"+value+"_qty", 'Empty');
		localStorage.setItem("comp_"+value+"_image", 'Select Item');
		location.reload();
	}
	}
}

function checkToValidate(){
	var val = document.getElementById("contactasquotation").value;
	var n = val.length;
	if(n == 11){localStorage.setItem("quotationContact",val);
		document.getElementById("save").disabled = false;
	}else{document.getElementById("save").disabled = true;}
}
</script>
</body>
</html>