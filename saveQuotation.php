<!DOCTYPE html>
<html>
<head>
<!-- <meta http-equiv="refresh" content="30"> -->
<?php include('includes.php');?>
<style type="text/css">
	tr,th,th{border:1px solid black !important;line-height: 10px;}
</style>
</head>
<body onload="check()">

<div class="container" style="background-color: white;margin-top:0.5%">
<div style="padding-top: 2.5%;">
	<div class="row">
		<div class="col-6"><img class="img img-responsive" src="assets/images/logo.png" style="width: 50%"></div>
		<div class="col-6"><p>28/1/C,Rahmania International Complex (1st Floor),Toyenbee Circular Road, Motijheel,Dhaka-1000 </p></div>
		<div class="col-12" style="text-align: center;margin-top: 2.5%;"><label style="border-bottom: 1px solid black;font-size: 20px;font-weight: bold">Price Quotation</label></div>
	</div>

	<div class="row">
		<div class="col-12" style="margin-top: 2.5%;margin-bottom: 2.5%;">
			<label style="font-size: 20px"><b>Subject:</b> Online Quotation</label><br>
			<label style="font-size: 20px"><b>Contact No:</b> 
			</label> <label id="quotationNo" style="font-size: 20px"> <b>Tets</b></label>
		</div>
		<div class="col-12">
		<table class="table table-bordered" id="myTable">
			<thead>
				<tr>
					<th>Sl</th>
					<th>Product</th>
					<th>Unit Price</th>
					<th>Quantity</th>
					<th>Total</th>
				</tr>
			</thead>
			<tbody>
			<?php 
			include('assets/database/config.php');
			$i = 0;
			$sql = "SELECT  `category_name`, `category_code`,`category_url` FROM `tbl_category` WHERE `category_status` = '1'";
			$result = mysqli_query($dbcon,$sql) or die ('error 404');
					while($row = mysqli_fetch_assoc($result)){
						$i++;
						$category_code = $row['category_code'];
						$category_url = $row['category_url'];
						$category_name = ucfirst($row['category_name']);
					}
			?>
			</tbody>
		</table>
		</div>
		


		<div class="col-12">
			<table class="table table-bordered">
				<tr>
					<td style="text-align: right"><b><h7>Total Quantity:</h7></b></td>
					<td style="text-align: left;"><b><h7 id="totalQuantity">0</h7></b></td>
					<td style="text-align: right"><b><h7>Total Price:</h7></b></td>
					<td style="text-align: left;"><b><h7 id="totalValue">0</h7></b></td>
				</tr>
			</table>
		</div>
		<!-- <div class="col-12">
			<hr><hr>
			<div class="row">
				<div class="col-3" style="text-align: right">
					<b><h3>Total Quantity:</h3></b>
				</div>
				<div class="col-3" style="text-align: left;">
					<b><h3 id="totalQuantity">0</h3></b>
				</div>
				<div class="col-3" style="text-align: right">
					<b><h3>Total Price:</h3></b>
				</div>
				<div class="col-3" style="text-align: left;">
					<b><h3 id="totalValue">0</h3></b>
				</div>
			</div>
		</div> -->
	</div>

</div>
</div>



<script type="text/javascript">
function check(){
	var totalPrice = 0;
	var totalQuantity = 0;
	var sl = 0;
	var table = document.getElementById("myTable");
  	
  	document.getElementById("quotationNo").innerHTML = localStorage.getItem("quotationContact");

	for(var i = 1; i<=10; i++){
		for(var j = 1;j<=3;j++){
			var value = i.toString()+j.toString();
				if(parseInt(localStorage.getItem("comp_"+value+"_qty")) > 0){
					sl++;
					
					// var row = table.insertRow(1);
					// var cell1 = row.insertCell(0);
					// var cell2 = row.insertCell(1);
					// var cell3 = row.insertCell(2);
					// var cell4 = row.insertCell(3);
					// var cell5 = row.insertCell(4);

						//cell1.innerHTML = sl;
			  			//cell2.innerHTML = localStorage.getItem("comp_"+value+"_name");
						//cell3.innerHTML = localStorage.getItem("comp_"+value+"_qty");
			  			//cell4.innerHTML = localStorage.getItem("comp_"+value+"_uprice");
						//cell5.innerHTML = localStorage.getItem("comp_"+value+"_tprice");
						$("#myTable > tbody").append("<tr><td>"+sl+"</td><td>"+localStorage.getItem("comp_"+value+"_name")+"</td><td>"+localStorage.getItem("comp_"+value+"_uprice")+"</td><td>"+localStorage.getItem("comp_"+value+"_qty")+"</td><td>"+localStorage.getItem("comp_"+value+"_tprice")+"</td></tr>");

						totalPrice = totalPrice + parseInt(localStorage.getItem("comp_"+value+"_tprice"));
						totalQuantity = totalQuantity + parseInt(localStorage.getItem("comp_"+value+"_qty"));
				}
			//alert('hello');
			// var value = i.toString()+j.toString();
			// document.getElementById("comp_"+value+"_name").innerHTML = localStorage.getItem("comp_"+value+"_name");
			// document.getElementById("comp_"+value+"_qty").innerHTML = localStorage.getItem("comp_"+value+"_qty");
			// document.getElementById("comp_"+value+"_uprice").innerHTML = localStorage.getItem("comp_"+value+"_uprice");
			// document.getElementById("comp_"+value+"_tprice").innerHTML = localStorage.getItem("comp_"+value+"_tprice");

			// if(isNaN(parseInt(localStorage.getItem("comp_"+value+"_uprice")))){
			// }else{
			// 	totalPrice = totalPrice + (parseInt(localStorage.getItem("comp_"+value+"_uprice")) * parseInt(localStorage.getItem("comp_"+value+"_qty")));
			// }
		}
		document.getElementById('totalValue').innerHTML = totalPrice;
		document.getElementById('totalQuantity').innerHTML = totalQuantity;
	}
	window.print();
	window.close();
}
</script>
</body>
</html>