<!DOCTYPE html>
<html>
<head>
<?php include('includes.php');?>

<style type="text/css">
select {
   -moz-appearance:none;
    -webkit-appearance:none;
    appearance:none;
    width: auto;
    padding-right: 25px !important;
    font-size: 14px;
    line-height: auto;
    background-color: white !important;
    border: 0;
    border-radius: 0px;
    height: auto;
    background: url(http://cdn1.iconfinder.com/data/icons/cc_mono_icon_set/blacks/16x16/br_down.png) no-repeat right transparent;
    -webkit-appearance: none;
    background-position-x: 90% !important;
}
</style>
</head>
<body>
<?php 
include('menu.php');
$x  = $litePath[3];
$y  = $litePath[4];
$z  = $litePath[5];
?>

<div class="container" style="margin-top: 0.5%;background-color: white">
	<div class="row" style="background-color: #4c4d4f;border-top: 0px solid #4c4d4f;padding: 0.75%">


		<div class="col-md-6" style="color: white;font-size: 14px;margin: auto;">
			<i class="fas fa-home"></i><i class="fas fa-caret-right" style="margin-left:10px;margin-right:10px"></i>List Item<i class="fas fa-caret-right" style="margin-left:10px;margin-right:10px"></i>
			<?php echo $litePath[3];
			if($litePath[5] !== null){
				echo '<i class="fas fa-caret-right" style="margin-left:10px;margin-right:10px"></i>'.$litePath[5];
			}
			?><br>
			<input style="display: none;" type="text" id="baseUrl" value="<?php echo $baseUrl;?>">
			<input style="display: none;" type="text" id="cata" value="<?php echo $x;?>">
			<input style="display: none;" type="text" id="bran" value="<?php echo $z;?>">
		</div>

		<div class="col-md-6 col-sm-12 col-12">
			<div class="row float-right">
				<label class="float-right mr-3 mt-1" style="font-weight: bold;color: white">Sort By</label>
				<select class="float-right mr-3">
					<option>--Sort By--</option>
					<option>Ascending</option>
					<option>Descending</option>
				</select>
				<label class="float-right mr-3 mt-1" style="font-weight: bold;color: white">Show</label>
				<select id="showNumb" class="float-right mr-3">
					<option>4</option>
					<option>8</option>
					<option>12</option>
				</select>
			</div>
		</div>
	</div>
	
	<div class="row" style="margin-bottom: 5%;border-bottom: 2px solid #4c4d4f">
		<div class="col-md-3 col-12" style="padding: 2.5%;background-color: #f69c6f">

			<div id="range" style="margin-bottom: 5%">
			
				<p>
				  <label for="amount"><b>Price range:</b></label><br>
				  <input type="text" id="amount1" onkeyup="changeUi()" style="border:0; color:#f6931f; font-weight:bold;width: 100px">
				  <label>To</label>
				  <input type="text" id="amount2" onkeyup="changeUi()" style="border:0; color:#f6931f; font-weight:bold;width: 100px">
				</p>
				 
				<div id="slider-range"></div>


				  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
				  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
				  <script>
				  	function changeUi(){
				  		var val1 = document.getElementById('amount1').value;
				  		var val2 = document.getElementById('amount2').value;
				  		$( "#slider-range" ).slider({
						values: [ val1, val2 ],
						});
				  	}
				  $( function() {
				    $( "#slider-range" ).slider({
				      range: true,
				      min: 100,
				      max: 50000,
				      values: [ 100, 50000 ],
				      slide: function( event, ui ) {
				        $( "#amount1" ).val(  ui.values[ 0 ]);
				        $( "#amount2" ).val(  ui.values[ 1 ]);
				      }
				    });
				    $( "#amount1" ).val(  $( "#slider-range" ).slider( "values", 0 ));
				    $( "#amount2" ).val( $( "#slider-range" ).slider( "values", 1 ) );
				  } );
				  </script>		
			</div>

			<?php
			$sql = "SELECT DISTINCT `master_filter_head`.`f_head_name`  AS `filter_head`
				FROM `master_filter_value` 
				LEFT JOIN `master_filter_head_with_category` ON `master_filter_value`.`filter_cat_code` = `master_filter_head_with_category`.`filter_cat_code` 
				LEFT JOIN `tbl_category` ON `master_filter_head_with_category`.`cat_code` = `tbl_category`.`category_code` 
				LEFT JOIN `master_filter_head` ON `master_filter_head_with_category`.`f_head_code` = `master_filter_head`.`f_head_code` 
				WHERE `tbl_category`.`category_url` = '$x'";

			$result = mysqli_query($dbcon,$sql) or die ('error 4041');
					while($row = mysqli_fetch_assoc($result)){
						$filter_head = $row['filter_head'];
						echo '<b>'.$filter_head.'</b><br>';
							$sql_filter = "SELECT `master_filter_value`.`filter_code` AS `filter_code`,`master_filter_value`.`filter_value` AS `filter_value`
				FROM `master_filter_value` 
				LEFT JOIN `master_filter_head_with_category` ON `master_filter_value`.`filter_cat_code` = `master_filter_head_with_category`.`filter_cat_code` 
				LEFT JOIN `tbl_category` ON `master_filter_head_with_category`.`cat_code` = `tbl_category`.`category_code` 
				LEFT JOIN `master_filter_head` ON `master_filter_head_with_category`.`f_head_code` = `master_filter_head`.`f_head_code` 
				WHERE `master_filter_head`.`f_head_name` = '$filter_head' AND `tbl_category`.`category_url` = '$x'";
							$result_filter = mysqli_query($dbcon,$sql_filter) or die ('error 4042');
									while($row_filter = mysqli_fetch_assoc($result_filter)){
										
						$filter_code = $row_filter['filter_code'];
						$filter_value = $row_filter['filter_value'];
										echo '<input type="checkbox" name="filter[]" value="'.$filter_code.'" onclick="filter('.$y.')"/> <label><b> '.$filter_value.'</b></label>';
										echo '<br>';
									}
					}
			?>
		</div>
	
	<div class="col-md-9 col-12">


	
	<div class="row" style="margin-top: 0.25%">
		<div class="col-12" >
		<?php 
		if($z == ''){
			$sql = "SELECT DISTINCT `tbl_brand`.`brand_name` AS `brand_name`,`tbl_brand`.`brand_url` AS `brand_url` FROM `tbl_product` LEFT JOIN `tbl_category` ON `tbl_product`.`product_category` = `tbl_category`.`category_code` LEFT JOIN `tbl_brand` ON `tbl_product`.`product_brand` = `tbl_brand`.`brand_code` WHERE  `tbl_category`.`category_url` LIKE '%$x%'";
			$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
			 $product_brand = $row['brand_name'];
			echo '<a class="btn btn-md" href="ListItem/'.$x.'/'.$y.'/'.$product_brand.'" style="background-color:#4c4d4f;color:#ffffff;border-radius:0px; margin:0.5% !important;font-size:14px !important">'.$product_brand.'</a>';
			}
		}else{
			echo '<a class="btn btn-md" href="ListItem/'.$x.'/'.$y.'" style="background-color:#4c4d4f;color:#ffffff;border-radius:0px; margin:0.5% !important;font-size:14px !important">Show All Brands</a>';
		}
		?>
	</div>
	</div>

<div id="displayDiv">
	<div class="row" style="min-height: 50vh !important;">
<?php
$i = 0;
$sql = "SELECT  `tbl_product`.`product_description` AS `prod_desc`,`tbl_product`.`product_name` AS `prod_name`,  `tbl_product`.`product_price` AS `prod_price`,  `tbl_product`.`product_thumb` AS `prod_thumb`, `tbl_product`.`product_url` AS `prod_url`,`tbl_product`.`product_category`,`tbl_category`.`category_name` AS `cat_name`,`tbl_category`.`category_url` AS `cat_url`,`tbl_product`.`product_brand`,`tbl_brand`.`brand_name` AS `brand_name`,`tbl_brand`.`brand_url` AS `brand_url` FROM `tbl_product` LEFT JOIN `tbl_category` ON `tbl_product`.`product_category` = `tbl_category`.`category_code` LEFT JOIN `tbl_brand` ON `tbl_product`.`product_brand` = `tbl_brand`.`brand_code` WHERE  `tbl_category`.`category_url` LIKE '%$x%' AND `tbl_brand`.`brand_url` LIKE '%$z%'";
// $sql="SELECT  `tbl_product`.`product_description` AS `prod_desc`,`tbl_product`.`product_name` AS `prod_name`,  `tbl_product`.`product_price` AS `prod_price`,  `tbl_product`.`product_thumb` AS `prod_thumb`, `tbl_product`.`product_url` AS `prod_url`,`tbl_product`.`product_category`,`tbl_category`.`category_name` AS `cat_name`,`tbl_category`.`category_url` AS `cat_url`,`tbl_product`.`product_brand`,`tbl_brand`.`brand_name` AS `brand_name`,`tbl_brand`.`brand_url` AS `brand_url` FROM `tbl_product` LEFT JOIN `tbl_category` ON `tbl_product`.`product_category` = `tbl_category`.`category_code` LEFT JOIN `tbl_brand` ON `tbl_product`.`product_brand` = `tbl_brand`.`brand_code` WHERE  `tbl_category`.`category_url` LIKE '%$x%' AND `tbl_brand`.`brand_url` LIKE '%$y%' AND `tbl_product`.`product_code` IN (SELECT `product_code` FROM `master_filter` WHERE `filter_code` IN ('FIL0000001','FIL0000005','FIL0000008'))";

$result = mysqli_query($dbcon,$sql) or die ('error 404');
		while($row = mysqli_fetch_assoc($result)){
			$i++;
			$product_name = $row['prod_name'];
			$product_category = $row['cat_name'];
			$product_brand = $row['brand_name'];
			$product_price = $row['prod_price'];
			$product_thumb = $row['prod_thumb'];
			$product_description = $row['prod_desc'];
			$product_url = $row['prod_url'];

			$product_description_short = explode(".", $product_description);
			$product_description = $product_description_short[0];
			echo '
			
					<div class="col-4" style="text-align: center;background-color: white">
						<img id="selected_text_image_'.$i.'" src="assets/images/product_thumb/'.$product_thumb.'">
						<p id="selected_text_name_'.$i.'">Product : '.$product_name.'</p>
						<p id="selected_text_price_'.$i.'" value="'.$product_price.'">Price : '.$product_price.' BDT</p>
						<input type="number" id="selected_qty_'.$i.'" name="quantity" min="1" max="10" value="1" style="text-align:center">
						<input style="display:none" type="text" id="y" value="'.$y.'">
						<input style="display:none" type="text" id="selected_name_'.$i.'" value="'.$product_name.'">
						<input style="display:none" type="text" id="selected_uprice_'.$i.'" value="'.$product_price.'">
						<input style="display:none" type="text" id="selected_brand_'.$i.'" value="'.$product_brand.'">
						<input style="display:none" type="text" id="selected_image_'.$i.'" value="assets/images/product_thumb/'.$product_thumb.'">
						<button id="'.$i.'_'.$y.'" onclick="choosedItem(this.id)"  style="background-color: #f16724;color:white;margin:2%">Choose Item</button>
					</div>
			';
		}
?>
	</div>
</div>


			<div class="container" style="margin-top: 15% !important">              
			  <ul class="pagination">
			    <li class="page-item" id=""><a class="page-link" href="javascript:void(0)" id="" onclick="getPage('')">Previous</a></li>
			    <li class="page-item" id="page_1"><a class="page-link" href="javascript:void(0)" onclick="getPage('1')">1</a></li>
			    <li class="page-item" id="page_2"><a class="page-link" href="javascript:void(0)" onclick="getPage('2')">2</a></li>
			    <li class="page-item" id="page_3"><a class="page-link" href="javascript:void(0)" onclick="getPage('3')">3</a></li>
			    <li class="page-item" id=""><a class="page-link" href="javascript:void(0)" id="" onclick="getPage('')">Next</a></li>
			  </ul>
			</div>
		</div>

	</div>
</div>


<script type="text/javascript">
// var type = window.location.hash.substr(1,2);
// alert(type);

// var type = window.location.hash.substr(10);
// alert(type);
// function getPage(value){
// alert(window.location.href+'/page#'+value);
// }

function getPage(value){
var url = new URL(window.location);
var search_params = url.searchParams;

// new value of "id" is set to "101"
search_params.set('page', value);

// change the search property of the main url
url.search = search_params.toString();

// the new url string
var new_url = url.toString();

// output : http://demourl.com/path?id=101&topic=main
alert(new_url);
}
</script>

<script>
// Add active class to the current button (highlight it)
var header = document.getElementByClassName("pagination");
var btns = header.getElementsByClassName("page-item");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("link-active");
  current[0].id = current[0].id.replace("link-active", "");
  this.id += "link-active";
  });
}
</script>



<!--Checkbox - comma - separated value-->
<script type="text/javascript">
function filter(y){
	var output = jQuery.map($(':checkbox[name=filter\\[\\]]:checked'), function (n, i) {
    return n.value;
}).join(',');

var category = document.getElementById('cata').value;
var brand = document.getElementById('bran').value;
	$.ajax({
		      type:"post",
		      url:"ajaxProductDisplayForQuotation.php",
		      data:{keyWord:output,category:category,brand:brand,y:y},
		      success:function(data)
		      {
		        if(!data){
		          document.getElementById('displayDiv').style.display="none";
		        }else{
		          if(data !== ''){
		          	//alert(data);
		          document.getElementById('displayDiv').style.display="block";
		          $('#displayDiv').html(data);
		      	  }else{
		      	  	//alert(data);
		          document.getElementById('displayDiv').style.display="none";
		      	  }
		        }
		            
		      }
		    });
}
</script>


<script type="text/javascript">
	function choosedItem(code){
		//alert(code);
		var fields = code.split('_');

		var code = fields[0];
		var sl = fields[1];

		var tprice = parseInt(document.getElementById("selected_uprice_"+code).value) * parseInt(document.getElementById("selected_qty_"+code).value);
		localStorage.setItem("comp_"+sl+"_name", document.getElementById("selected_name_"+code).value);
		localStorage.setItem("comp_"+sl+"_uprice", document.getElementById("selected_uprice_"+code).value);
		localStorage.setItem("comp_"+sl+"_tprice", tprice);
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