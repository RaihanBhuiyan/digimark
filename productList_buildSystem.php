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
<body onload="filter()">
<?php 
include('menu.php');
$x  = $litePath[2];
$y  = $litePath[3];
$z  = $litePath[4];
?>
<div class="row row-product-top">
  	<div class="col-12" style="box-shadow: 0px 0px 5px rgba(0,0,0,0.2);">
	    <div class="row row-product-inner-top">
			<div class="col-md-6 col-sm-12 text-md-left text-sm-center" style="width:100%;margin: 0px !important">
					<i class="fas fa-home"></i><i class="fas fa-caret-right" style="margin-left:10px;margin-right:10px"></i>Products<i class="fas fa-caret-right" style="margin-left:10px;margin-right:10px"></i>
					<?php echo $litePath[2];
					// if($litePath[4] !== null){
					// 	echo '<i class="fas fa-caret-right" style="margin-left:10px;margin-right:10px"></i>'.$litePath[4];
					// }
					?><br>
					<input style="display: none;" type="text" id="baseUrl" value="<?php echo $baseUrl;?>">
					<input style="display: none;" type="text" id="cata" value="<?php echo $x;?>">
					<input style="display: none;" type="text" id="itemListCode" value="<?php echo $y;?>">
					<input style="display: none;" type="text" id="bran" value="<?php echo $z;?>">
			</div>
			<div class="col-md-6 col-sm-12 text-md-right text-sm-center" style="width:100%;margin: 0px !important">
					<label for="showSort" class=" mt-0" style="font-weight: bold;color: darkgray">Sort By</label>
					<select id="showSort" class="">
						<option onclick="make_filter(1)" value="ASC">Lowest first</option>
						<option onclick="make_filter(1)" value="DESC">Highest first</option>
					</select>
					<label for="showCount" class=" mt-0" style="font-weight: bold;color: darkgray">Show</label>
					<select id="showCount" class="">
						<option onclick="make_filter(1)">16</option>
						<option onclick="make_filter(1)">32</option>
						<option onclick="make_filter(1)">48</option>
						<option onclick="make_filter(1)">64</option>
					</select>
			</div>
		</div>
	</div>
</div>
<div class="row row-product-bottom">
<div class="col-12">
	<div class="row row-product-inner-bottom" style="">
		<div class="col-lg-2 col-md-12 col-12" style="box-shadow: 0px 0px 5px rgba(0,0,0,0.2);background-color: transparent;padding: 1.5%;">
			<div style="width: 100%;">
				<h5 class="float-left" style="margin-top: 2%">Filters </h5>
				<button class="btn btn-default d-block d-lg-none float-right" onclick="filter_show()"><i class="fas fa-filter"></i></button>
			</div>
			<div class="clearfix"></div>
			<div id="filter-box" class="d-none d-lg-block" style="width: 100%;">
				<div>
				  <label for="amount"><b>Price range:</b></label><br>
				  <input type="text" id="priceFrom" onkeyup="make_filter(1)" placeholder="Min" style="border:1px solid gray; color:#f6931f; font-weight:bold;width: 100px">
				  <label>To</label>
				  <input type="text" id="priceTo" onkeyup="make_filter(1)" placeholder="Max" style="border:1px solid gray; color:#f6931f; font-weight:bold;width: 100px">
				</div>
				<div id="displayMenuDiv">
				<?php
				// $sql = "SELECT DISTINCT `master_filter_head`.`f_head_name`  AS `filter_head`
				// 	FROM `master_filter_value` 
				// 	LEFT JOIN `master_filter_head_with_category` ON `master_filter_value`.`filter_cat_code` = `master_filter_head_with_category`.`filter_cat_code` 
				// 	LEFT JOIN `tbl_category` ON `master_filter_head_with_category`.`cat_code` = `tbl_category`.`category_code` 
				// 	LEFT JOIN `master_filter_head` ON `master_filter_head_with_category`.`f_head_code` = `master_filter_head`.`f_head_code` 
				// 	WHERE `tbl_category`.`category_url` = '$x' AND `master_filter_head_with_category`.`status` = 1";

				// $result = mysqli_query($dbcon,$sql) or die ('error 4041');
				// 		while($row = mysqli_fetch_assoc($result)){
				// 			$filter_head = $row['filter_head'];
				// 			echo '<b style="font-size:18px;color:#000000;margin-top:2.5%;margin-bottom:2.5%;line-height:6vh">'.$filter_head.'</b><br>';
				// 	$sql_filter = "SELECT `master_filter_value`.`filter_code` AS `filter_code`,`master_filter_value`.`filter_value` AS `filter_value`
				// 	FROM `master_filter_value` 
				// 	LEFT JOIN `master_filter_head_with_category` ON `master_filter_value`.`filter_cat_code` = `master_filter_head_with_category`.`filter_cat_code` 
				// 	LEFT JOIN `master_filter_head` ON `master_filter_head_with_category`.`f_head_code` = `master_filter_head`.`f_head_code` 		
				// 	LEFT JOIN `tbl_category` ON `master_filter_head_with_category`.`cat_code` = `tbl_category`.`category_code` 
				// 	WHERE `master_filter_head`.`f_head_name` = '$filter_head' AND `tbl_category`.`category_url` = '$x' ";
				// 				$result_filter = mysqli_query($dbcon,$sql_filter) or die ('error 4042');
				// 						while($row_filter = mysqli_fetch_assoc($result_filter)){
											
				// 			$filter_code = $row_filter['filter_code'];
				// 			$filter_value = $row_filter['filter_value'];
				// 							echo '<input type="checkbox" name="filter[]" value="'.$filter_code.'" onclick="make_filter(1)" style="margin:auto"/> <label style="font-size:14px;margin:auto;margin-left:10px;color:#000000"><b> '.$filter_value.'</b></label>';
				// 							echo '<br>';
				// 						}
				// 		}
				?>
				</div>
			</div>
		</div>
		<div class="col-lg-10 col-md-12 col-12">
			<div class="row" style="margin-top: 0.25%">
		<div class="col-12" style="display: block">
			<?php 
			if($z == ''){
				$sql = "SELECT DISTINCT `tbl_brand`.`brand_name` AS `brand_name`,`tbl_brand`.`brand_url` AS `brand_url` FROM `tbl_product` LEFT JOIN `tbl_category` ON `tbl_product`.`product_category` = `tbl_category`.`category_code` LEFT JOIN `tbl_brand` ON `tbl_product`.`product_brand` = `tbl_brand`.`brand_code` WHERE  `tbl_category`.`category_url` LIKE '%$x%'";
				$result = mysqli_query($dbcon,$sql) or die ('error 404');
				while($row = mysqli_fetch_assoc($result)){
				$product_brand = $row['brand_name'];//http://infilinkteco.com//Access-Control/11?item=5&range=%2C&sort=ASC
				echo '<a class="btn btn-md" href="ListItem/'.$x.'/'.$y.'/'.$product_brand.'" style="background-color:#4c4d4f;color:#ffffff;border-radius:0px; margin:0.5% !important;font-size:14px !important">'.$product_brand.'</a>';
				}
			}else{
				echo '<a class="btn btn-md" href="ListItem/'.$x.'/'.$y.'" style="background-color:#4c4d4f;color:#ffffff;border-radius:0px; margin:0.5% !important;font-size:14px !important">Show All Brands</a>';
			}
			?>
		</div>
	</div>
			<div id="displayDiv">
				<div class="row" style="min-height: 50vh !important;padding: 5px">
				<?php
				// $i = 0;
				// $sql = "SELECT  `tbl_product`.`product_description` AS `prod_desc`,`tbl_product`.`product_name` AS `prod_name`,  `tbl_product`.`product_price` AS `prod_price`,  `tbl_product`.`product_thumb` AS `prod_thumb`, `tbl_product`.`product_url` AS `prod_url`,`tbl_product`.`product_category`,`tbl_category`.`category_name` AS `cat_name`,`tbl_category`.`category_url` AS `cat_url`,`tbl_product`.`product_brand`,`tbl_brand`.`brand_name` AS `brand_name`,`tbl_brand`.`brand_url` AS `brand_url` FROM `tbl_product` LEFT JOIN `tbl_category` ON `tbl_product`.`product_category` = `tbl_category`.`category_code` LEFT JOIN `tbl_brand` ON `tbl_product`.`product_brand` = `tbl_brand`.`brand_code` WHERE  `tbl_category`.`category_url` LIKE '%$x%' AND `tbl_brand`.`brand_url` LIKE '%$y%'";
				// $result = mysqli_query($dbcon,$sql) or die ('error 404');
				// 		while($row = mysqli_fetch_assoc($result)){
				// 			$i++;
				// 		}
				?>
				</div>
			</div>
		</div>
		</div>
	</div>	
</div>
<div class="row row-product-bottom">
<div class="col-12" style="box-shadow: 0px 0px 5px rgba(0,0,0,0.2);">
	<?php
			$sql = "SELECT  `category_name`,`category_desc` FROM `tbl_category` WHERE `category_url` LIKE '%$x%'";
			$result = mysqli_query($dbcon,$sql) or die ('error 404');
				while($row = mysqli_fetch_assoc($result)){
					$i++;
					$category_name = $row['category_name'];
					$category_desc = $row['category_desc'];
				}

			echo '<h3>About '.$category_name.'</h3>';
			echo $category_desc;
			?>
</div>
</div>
<?php include('footer.php');?>
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
//filter();
window.history.replaceState($baseUrl,'/digimark/',new_url);
filter();
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
// function filter(){
// 	const params1 = new URLSearchParams(window.location.search);
// 	var output1 =  params1.getAll('filter').toString();
// 		if(output1 !== '')
// 		buildmenu();
// 	make_filter();
// 	check_filter();
// 	// make_filter();

// 	//check_page();
// }
</script>
<script type="text/javascript">
function filter(){
check_filter('X1');
make_filter();
}


function check_filter(value){
	//alert(value);
	const params = new URLSearchParams(window.location.search);
	var filters =  params.getAll('filter').toString();
	//alert(filters);	
	// Filter
	if(filters !== ''){
	var output = filters.split(',');
	var filterParam = "filter";
	var elems = $('input[name^='+filterParam+']');

	output.forEach(function(val){
	 elems.filter("[value="+ val +"]").prop("checked",true);
	});
	}

	//Item Count
	var itemCount =  params.getAll('item').toString();
	if(itemCount == ''){
	itemCount = 16;
	}
	else{
		if(itemCount == 16 ||itemCount == 32 ||itemCount == 48 ||itemCount == 64)
			document.getElementById('showCount').value = itemCount;
		else{
			document.getElementById('showCount').value = 16;
		}
	}

	//Item Sort
	var itemSort =  params.getAll('sort').toString();
	if(itemSort !== ''){
		document.getElementById('showSort').value = itemSort;
	}

	//Price Range
	var priceRange =  params.getAll('range').toString();
	if(priceRange !== ''){
	priceRange = priceRange.split(',');
	document.getElementById('priceFrom').value = priceRange[0];
	document.getElementById('priceTo').value = priceRange[1];
	}
}


function make_filter(value){
//alert(1);

var output = jQuery.map($(':checkbox[name=filter\\[\\]]:checked'), function (n, i) {
    return n.value;
}).join(',');
var showCount = document.getElementById('showCount').value;
var showSort = document.getElementById('showSort').value;


var priceFrom = document.getElementById('priceFrom').value;
var priceTo = document.getElementById('priceTo').value;
var priceRange = priceFrom+","+priceTo;
//alert(priceRange);


$baseUrl = document.getElementById('baseUrl').value;
var url = new URL(window.location);
var search_params = url.searchParams;

//search_params.delete('page');
// search_params.append('filter');

if(output==''){
	search_params.delete('filter');
	search_params.set('item', showCount);
	search_params.set('range', priceRange);
	search_params.set('sort', showSort);
	url.search = search_params.toString();
	var new_url = url.toString();
}
else
{
search_params.set('filter', output);
search_params.set('item', showCount);
search_params.set('range', priceRange);
search_params.set('sort', showSort);
url.search = search_params.toString();
}
var new_url = url.toString();

window.history.replaceState($baseUrl,'/digimark/',new_url);


var category = document.getElementById('cata').value;
var brand = document.getElementById('bran').value;
var itemListCode = document.getElementById('itemListCode').value;

if(value){
	var showPage = 1;
	search_params.set('page', 1);
	url.search = search_params.toString();
	var new_url = url.toString();
	window.history.replaceState($baseUrl,'/digimark/',new_url);
}
else
{const params = new URLSearchParams(window.location.search);
var showPage =  params.getAll('page').toString();}

	$.ajax({
		      type:"post",
		      url:"ajaxProductDisplayForQuotation.php",
		      data:{filter:output,category:category,brand:brand,showCount:showCount,showSort:showSort,showPage:showPage,priceRange:priceRange,y:itemListCode},
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

	if(output !== ''){buildmenu(output);}
	else{buildmenu();}
	
}



</script>

<script type="text/javascript">
function buildmenu(value){
	//alert(2);
var category = document.getElementById('cata').value;
var brand = document.getElementById('bran').value;
	$.ajax({
		      type:"post",
		      url:"ajaxProductSideMenuDisplay.php",
		      data:{filter:value,category:category,brand:brand},
		      success:function(data)
		      {
		        if(!data){
		          document.getElementById('displayMenuDiv').style.display="none";
		        }else{
		          if(data !== ''){
		          	//alert(data);
		          document.getElementById('displayMenuDiv').style.display="block";
		          $('#displayMenuDiv').html(data);
		          check_filter('X2');
		      	  }else{
		      	  	//alert(data);
		          document.getElementById('displayMenuDiv').style.display="none";
		      	  }
		        }
		            
		      }
		    });
	
}
</script>



<style type="text/css">
.ui-slider .ui-slider-handle{z-index: 1;}
</style>

<style type="text/css">
    p > img{
        display:block;
        margin-left: auto;
        margin-right: auto;
    }
    p > iframe{
        display:block;
        width:100%;
        height:650px;
        margin-left: auto;
        margin-right: auto;
    }
    .row-product-top{
  min-height: 5vh;
  background-color: #ffffff;
  margin-top: 1%;
  margin-bottom: 1%;
  margin-right: 5% !important;
  margin-left: 5% !important;
  }
  .row-product-inner-top{
  min-height: 5vh;
  padding-top: 1.5%;
  padding-bottom: 1%;
  }
  .row-product-bottom{
  min-height: 5vh;
  background-color: #ffffff;
  margin-top: 0%;
  margin-bottom: 1%;
  margin-right: 5% !important;
  margin-left: 5% !important;
  }
  .row-product-inner-bottom{
  min-height: 5vh;
  margin-bottom: 0% !important;
  }
</style>


<script type="text/javascript">
function filter_show() {
  var x = document.getElementById("filter-box");
   x.classList.toggle("d-none");
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