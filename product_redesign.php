<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body onload="filter()">
<?php  include('includes.php');
include('menu.php');
$x  = $litePath[3];
//if($x=='brand'){$x='';$sent_type='brand';}
$y  = $litePath[4];
?>



<div class="row row-product-top">
  	<div class="col-12" style="box-shadow: 0px 0px 5px rgba(0,0,0,0.2);">
	    <div class="row row-product-inner-top">
			<div class="col-md-6 col-sm-12 text-md-left text-sm-center" style="width:100%;margin: 0px !important">
					<i class="fas fa-home"></i><i class="fas fa-caret-right" style="margin-left:10px;margin-right:10px"></i>Products<i class="fas fa-caret-right" style="margin-left:10px;margin-right:10px"></i><?php echo $litePath[3];
					if($litePath[4] !== null){
						echo '<i class="fas fa-caret-right" style="margin-left:10px;margin-right:10px"></i>'.$litePath[4];
					}
					?><br>
					<input style="display: none;" type="text" id="baseUrl" value="<?php echo $baseUrl;?>">
					<input style="display: none;" type="text" id="cata" value="<?php echo $x;?>">
					<input style="display: none;" type="text" id="bran" value="<?php echo $y;?>">
			</div>
			<div class="col-md-6 col-sm-12 text-md-right text-sm-center" style="width:100%;margin: 0px !important">
					<label for="showSort" class=" mt-0" style="font-weight: bold;color: darkgray">Sort By</label>
					<select id="showSort" class="">
						<option onclick="make_filter(1)" value="ASC">Lowest first</option>
						<option onclick="make_filter(1)" value="DESC">Highest first</option>
					</select>
					<label for="showCount" class=" mt-0" style="font-weight: bold;color: darkgray">Show</label>
					<select id="showCount" class="">
						<option onclick="make_filter(1)">5</option>
						<option onclick="make_filter(1)">10</option>
						<option onclick="make_filter(1)">20</option>
					</select>
			</div>
		</div>
	</div>
</div>
<?php
// include('assets/database/config.php');

echo '<div class="container">
<div class="row">
<div class="col-4">';
//SIDEBAR FILTER CODE
$filter_string =  "'RFID','50000','Plastic'"; //$type_string = "";
$filt1 =  array("RFID","50000","Plastic");

$sql_type_string = "SELECT DISTINCT `type` FROM `test_filter` WHERE `filter` IN ($filter_string)";
$result_type_string = mysqli_query($dbcon,$sql_type_string) or die ('error 4041');
while($row = mysqli_fetch_assoc($result_type_string)){
				$type = $row['type'];
				$type_string = $type_string.', '.$type;
			}

echo "<br><br>";

$sql = "SELECT DISTINCT `type` FROM `test_filter` WHERE `category`= 'CAT000001'  ORDER BY `type` DESC";
$result = mysqli_query($dbcon,$sql) or die ('error 4042');
$i = 0;$piv_col_name = '';$piv_where_clause = '';
			while($row = mysqli_fetch_assoc($result)){
				$type = $row['type'];
				echo "<br>";
				echo '<b>'.$type.'</b>';
					$sql_filter = "SELECT DISTINCT `filter`,`type` FROM `test_filter` WHERE `type` = '$type' AND `category`= 'CAT000001' AND 
					`product` IN ( SELECT `product` FROM `test_filter` WHERE `filter` IN ($filter_string))";
					$result_filter = mysqli_query($dbcon,$sql_filter) or die ('error 4043');
					$j = 0;
						while($row_filter = mysqli_fetch_assoc($result_filter)){
							$hfilter = $row_filter['filter'];
							$htype = $row_filter['type'];
//false - contains , true - not contains							
							if((strpos($type_string, $htype) !== false) && (strpos($filter_string, $hfilter) !== false)){
									echo "<br>";
									echo '<input type="checkbox" id="filter'.$i.$j.'" name="filter[]" value="'.$hfilter.'" onclick="make_filter(1)" style="margin:auto"/> <label for = "filter'.$i.$j.'" style="font-size:14px;margin:auto;margin-left:10px;color:#000000"><b>1 '.$hfilter.'</b></label>';
							}else if((strpos($type_string, $htype) !== false) && (strpos($filter_string, $hfilter) !== true)){
									// echo "<br>".$htype ;
									// echo '<input type="checkbox" id="filter'.$i.$j.'" name="filter[]" value="'.$hfilter.'" onclick="make_filter(1)" style="margin:auto"/> <label for = "filter'.$i.$j.'" style="font-size:14px;margin:auto;margin-left:10px;color:#000000"><b>2 '.$hfilter.'</b></label>';
							}else if((strpos($type_string, $htype) !== true) && (strpos($filter_string, $hfilter) !== true)){
									echo "<br>";
									echo '<input type="checkbox" id="filter'.$i.$j.'" name="filter[]" value="'.$hfilter.'" onclick="make_filter(1)" style="margin:auto"/> <label for = "filter'.$i.$j.'" style="font-size:14px;margin:auto;margin-left:10px;color:#000000"><b>2 '.$hfilter.'</b></label>';
							}

						$j++;
						}


for($x = 0;$x<count($filt1);$x++){
		$check = $filt1[$x];
		$sql_select_filter = "SELECT DISTINCT `type` FROM `test_filter` WHERE `filter` = '$check'"; 
		$result_select_filter = mysqli_query($dbcon,$sql_select_filter) or die ('error 4044');
				while($row_select_filter = mysqli_fetch_assoc($result_select_filter)){
							$filter_type = $row_select_filter['type'];




				if($filter_type == $type){
					// if($i == 0){
					// $piv_col_name = $piv_col_name.",MAX((CASE WHEN `type` = '".$type."' THEN `filter` ELSE NULL END)) AS `".$type."` "; 
					// $piv_where_clause = $piv_where_clause." AND `PTable`.`".$type."` LIKE '%".$filt1[$x]."%' ";
					// }
					// else
					// {
					$piv_col_name = $piv_col_name.",MAX((CASE WHEN `type` = '".$type."' THEN `filter` ELSE NULL END)) AS `".$type."` "; 
					$piv_where_clause = $piv_where_clause." AND `PTable`.`".$type."` LIKE '%".$filt1[$x]."%' ";
					// }
				}
				// else{
				// 	if($i == 0){
				// 	$piv_col_name = $piv_col_name."MAX((CASE WHEN `type` = '".$type."' THEN `filter` ELSE NULL END)) AS `".$type."`"; 
				// 	$piv_where_clause = $piv_where_clause."`PTable`.`".$type."` LIKE '%%'";
				// 	}
				// 	else
				// 	{
				// 	$piv_col_name = $piv_col_name.",MAX((CASE WHEN `type` = '".$type."' THEN `filter` ELSE NULL END)) AS `".$type."`"; 
				// 	$piv_where_clause = $piv_where_clause." OR `PTable`.`".$type."` LIKE '%%'";
				// 	}
				// }
					


				
				

				//echo "<br><br>";
				}
	}
$i++;

}


//echo "<br>";
echo '</div>';
//MAIN DIV PRODUCT FETCH CODE
echo '<div class="col-8">';
$sql_product = "
SELECT * FROM 
		(SELECT `product` AS `product`,`category` AS `category`"
		.$piv_col_name.
     	"FROM `test_filter` GROUP BY `product`) AS `PTable` 
		WHERE `PTable`.`category` = 'CAT000001' ".$piv_where_clause."
";
$result_product = mysqli_query($dbcon,$sql_product) or die ('error 4045');
			while($row = mysqli_fetch_assoc($result_product)){echo "<br>";
			echo	$product = $row['product'];
			echo	$Type = $row['Type'];
			echo	$Storage = $row['Storage'];
			echo	$Material = $row['Material'];
			
	}
echo '</div>
</div></div>';
			?>


<script type="text/javascript">
function check(){
	//var filters =  "'RFID','50000','Plastic'";
	const params = new URLSearchParams(window.location.search);
	var filters =  params.getAll('filter').toString();
	alert(filters);
	// Filter
	if(filters !== ''){
	var output = filters.split(',');
	var filterParam = "filter";
	var elems = $('input[name^='+filterParam+']');

	output.forEach(function(val){
	 elems.filter("[value="+ val +"]").prop("checked",true);
	});
	}
}
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
function filter(){
	check_filter();
	make_filter();
	//check_page();
}


function check_filter(){
	const params = new URLSearchParams(window.location.search);
	var filters =  params.getAll('filter').toString();
		
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
	itemCount = 5;
	}
	else{
		if(itemCount == 5 ||itemCount == 10 ||itemCount == 20)
			document.getElementById('showCount').value = itemCount;
		else{
			document.getElementById('showCount').value = 10;
		}
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


var output = jQuery.map($(':checkbox[name=filter\\[\\]]:checked'), function (n, i) {
    return n.value;
}).join(',');
var showCount = document.getElementById('showCount').value;
var showSort = document.getElementById('showSort').value;


var priceFrom = 0;//document.getElementById('priceFrom').value;
var priceTo = 9000;//document.getElementById('priceTo').value;
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
	url.search = search_params.toString();
	var new_url = url.toString();
}
else
{
search_params.set('filter', output);
search_params.set('item', showCount);
search_params.set('range', priceRange);
url.search = search_params.toString();
}
var new_url = url.toString();

window.history.replaceState($baseUrl,'/digimark/',new_url);


var category = document.getElementById('cata').value;
var brand = document.getElementById('bran').value;

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

	// $.ajax({
	// 	      type:"post",
	// 	      url:"ajaxProductDisplay.php",
	// 	      data:{filter:output,category:category,brand:brand,showCount:showCount,showSort:showSort,showPage:showPage,priceRange:priceRange},
	// 	      success:function(data)
	// 	      {
	// 	        if(!data){
	// 	          document.getElementById('displayDiv').style.display="none";
	// 	        }else{
	// 	          if(data !== ''){
	// 	          	//alert(data);
	// 	          document.getElementById('displayDiv').style.display="block";
	// 	          $('#displayDiv').html(data);
	// 	      	  }else{
	// 	      	  	//alert(data);
	// 	          document.getElementById('displayDiv').style.display="none";
	// 	      	  }
	// 	        }
		            
	// 	      }
	// 	    });
}

</script>


</body>
</html>
