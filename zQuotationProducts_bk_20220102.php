<!DOCTYPE html>
<html>
<head>
<?php 
include('includes.php');
$catgTitle  = ucfirst($litePath[2]);
$branTitle  = ucfirst($litePath[3]);

$sql = "SELECT `category_metaTitle` FROM `tbl_category` WHERE `category_url` = '$catgTitle'";
$result = mysqli_query($dbcon,$sql) or die ('error 4041');
while($row = mysqli_fetch_assoc($result)){
$catgTitle = $row['category_metaTitle'];
}

if($branTitle=='')
echo '<title>'.$catgTitle.'</title>';
else
echo '<title>'.$catgTitle.'/'.$branTitle.'</title>';
?>
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
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
//if($x=='brand'){$x='';$sent_type='brand';}
$y  = $litePath[3];
?>
<div class="row row-product-top">
  	<div class="col-12" style="border:1px solid lightgray">
	    <div class="row row-product-inner-top">
			<div class="col-md-6 col-sm-12 text-md-left text-center" style="width:100%;margin: 0px !important">
					<i class="fas fa-home"></i><i class="fas fa-caret-right" style="margin-left:10px;margin-right:10px"></i>Build System<i class="fas fa-caret-right" style="margin-left:10px;margin-right:10px"></i>
					<a style="color:#f16724;text-decoration:none" href="collections/<?php echo $litePath[2];?>"><?php echo ucfirst($litePath[2]).'</a>';
					if($litePath[3] !== null){
						echo '<i class="fas fa-caret-right" style="margin-left:10px;margin-right:10px"></i>'.$litePath[3];
					}
					?><br>
					<input style="display: none;" type="text" id="baseUrl" value="<?php echo $baseUrl;?>">
					<input style="display: none;" type="text" id="cata" value="<?php echo $x;?>">
					<input style="display: none;" type="text" id="bran" value="<?php echo $y;?>">
			</div>
			<div class="col-md-6 col-sm-12 text-md-right text-center" style="width:100%;margin: 0px !important">
					<label for="showSort" class=" mt-0" style="">Sort By</label>
					<select id="showSort" class="" onchange="make_filter(100)">
						<option value="">Default</option>
						<option value="ASC">Lowest first</option>
						<option value="DESC">Highest first</option>
					</select>
					<label for="showCount" class=" mt-0" style="">Show</label>
					<select id="showCount" class="" onchange="make_filter(100)">
						<option>16</option>
						<option>32</option>
						<option>48</option>
						<option>64</option>
					</select>
			</div>
		</div>
	</div>
</div>
<div class="row row-product-bottom">
<div class="col-12" style="padding-left: 0px;padding-right: 0px;">
	<div class="row row-product-inner-bottom" style="margin:0px !important">
		<div class="col-lg-2 col-md-3 col-sm-12 col-12" style="border:1px solid lightgray;background-color: transparent;padding: 0.5% !important;padding-top: 1% !important;">
			<div style="width: 100%;">
				<h5 class="float-left" style="margin:0.5%">Filters </h5>
				<button class="btn btn-default d-block d-md-none float-right" style="border-radius:0px;margin:0.5%" onclick="filter_show()"><i class="fas fa-filter"></i></button>
			</div>
			<div class="clearfix"></div>
			<div id="filter-box" class="d-none d-md-block" style="width: 100%;">
				<div>
				  <label for="amount"><b>Price range:</b></label><br>
				  <input type="text" id="priceFrom" onkeyup="make_filter(100)" placeholder="Min" style="border:1px solid gray; color:#f6931f; font-weight:normal;width: 40%">
				  <label>To</label>
				  <input type="text" id="priceTo" onkeyup="make_filter(100)" placeholder="Max" style="border:1px solid gray; color:#f6931f; font-weight:normal;width: 40%">
				</div>
				<div id="displayMenuDiv">
				    <div class="accordion">
			
				<?php
				$sql = "SELECT DISTINCT `master_filter_head`.`f_head_name`  AS `filter_head`
					FROM `master_filter_value` 
					LEFT JOIN `master_filter_head_with_category` ON `master_filter_value`.`filter_cat_code` = `master_filter_head_with_category`.`filter_cat_code` 
					LEFT JOIN `tbl_category` ON `master_filter_head_with_category`.`cat_code` = `tbl_category`.`category_code` 
					LEFT JOIN `master_filter_head` ON `master_filter_head_with_category`.`f_head_code` = `master_filter_head`.`f_head_code` 
					WHERE `tbl_category`.`category_url` = '$x' AND `master_filter_head_with_category`.`status` = 1";

				$result = mysqli_query($dbcon,$sql) or die ('error 4041');
				
				$i = 0;
					while($row = mysqli_fetch_assoc($result)){
						$filter_head = $row['filter_head'];
				// 		echo '<b style="font-size:18px;color:#000000;margin-top:2.5%;margin-bottom:2.5%;line-height:6vh">'.$filter_head.'</b><br>';
					
					if($i==0){
					    echo '<h4 class="accordion-toggle active" style="font-size:14px;color:#f16724;">'.$filter_head.'</h4>
			            <div class="accordion-content" style="display:block">';
					}else{
					    echo '<h4 class="accordion-toggle" style="font-size:14px;color:#f16724;">'.$filter_head.'</h4>
			            <div class="accordion-content">';
					}
					
				
			
					$sql_filter = "SELECT `master_filter_value`.`filter_code` AS `filter_code`,`master_filter_value`.`filter_value` AS `filter_value`
					FROM `master_filter_value` 
					LEFT JOIN `master_filter_head_with_category` ON `master_filter_value`.`filter_cat_code` = `master_filter_head_with_category`.`filter_cat_code` 
					LEFT JOIN `master_filter_head` ON `master_filter_head_with_category`.`f_head_code` = `master_filter_head`.`f_head_code` 		
					LEFT JOIN `tbl_category` ON `master_filter_head_with_category`.`cat_code` = `tbl_category`.`category_code` 
					WHERE `master_filter_head`.`f_head_name` = '$filter_head' AND `tbl_category`.`category_url` = '$x'  AND `master_filter_value`.`status` = 1"; //on 27 may mr ishaq error correction filter value showing even if it is inactive
					$result_filter = mysqli_query($dbcon,$sql_filter) or die ('error 4042');
							$j = 0;
							echo '<p>';
							while($row_filter = mysqli_fetch_assoc($result_filter)){
											
							$filter_code = $row_filter['filter_code'];
							$filter_value = $row_filter['filter_value'];
				// 			$String = 'ThisWasCool';
				            $filter_value = str_replace("&", " & ", $filter_value);
				            $filter_value = str_replace("+", " & ", $filter_value);
                            $filter_value = preg_replace('/(?<!\ )[A-Z]/', ' $0', $filter_value);
				            
			
											echo '<input type="checkbox" name="filter[]" id="filter'.$i.$j.'" value="'.$filter_code.'" onclick="make_filter(100)" style="margin:auto"/> 
											<label for="filter'.$i.$j.'"  style="font-size:12px;margin:auto;margin-left:0px;color:#000000"><b> '.$filter_value.'</b></label>';
											echo '<br>';
											$j++;
										}
										$i++;
						echo '</p>';
						echo '</div>';
						}
				echo '<div class="clearfix"></div>
<a class="btn btn-sm btn-danger" style="border-radius:0px;margin-top:2%" href="qcollections/'.$x.'"> Reset Filter</a>';
				?>
				</div>
				</div>
			</div>
		</div>
		<div class="col-lg-10 col-md-9 col-sm-12 col-12" style="padding:0.5% !important">
			<div class="row" style="margin-top: 0.25%">
		<div class="col-12 text-md-left text-center" style="display: block">
			<?php 
			if($y == ''){
				$sql = "SELECT DISTINCT `tbl_brand`.`brand_name` AS `brand_name`,`tbl_brand`.`brand_url` AS `brand_url` FROM `tbl_product` LEFT JOIN `tbl_category` ON `tbl_product`.`product_category` = `tbl_category`.`category_code` LEFT JOIN `tbl_brand` ON `tbl_product`.`product_brand` = `tbl_brand`.`brand_code` WHERE  `tbl_category`.`category_url` LIKE '%$x%' AND `tbl_brand`.`brand_status` = '1'";
				$result = mysqli_query($dbcon,$sql) or die ('error 404');
				while($row = mysqli_fetch_assoc($result)){
				$product_brand = $row['brand_name'];
				echo '<a id="brand-tabs" class="btn btn-md" href="qcollections/'.$x.'/'.$product_brand.'" style="">'.$product_brand.'</a>';
				}
			}else{
				echo '<a id="brand-tabs" class="btn btn-md" href="qcollections/'.$x.'" style="">Show All Brands</a>';
			}
			?>
		</div>
	</div>
			<div id="displayDiv">
				<!--<div class="row" style="min-height: 50vh !important;padding: 5px">-->
				<?php
				// $i = 0;
				// $sql = "SELECT  `tbl_product`.`product_description` AS `prod_desc`,`tbl_product`.`product_name` AS `prod_name`,  `tbl_product`.`product_price` AS `prod_price`,  `tbl_product`.`product_thumb` AS `prod_thumb`, `tbl_product`.`product_url` AS `prod_url`,`tbl_product`.`product_category`,`tbl_category`.`category_name` AS `cat_name`,`tbl_category`.`category_url` AS `cat_url`,`tbl_product`.`product_brand`,`tbl_brand`.`brand_name` AS `brand_name`,`tbl_brand`.`brand_url` AS `brand_url` FROM `tbl_product` LEFT JOIN `tbl_category` ON `tbl_product`.`product_category` = `tbl_category`.`category_code` LEFT JOIN `tbl_brand` ON `tbl_product`.`product_brand` = `tbl_brand`.`brand_code` WHERE  `tbl_category`.`category_url` LIKE '%$x%' AND `tbl_brand`.`brand_url` LIKE '%$y%'";
				// $result = mysqli_query($dbcon,$sql) or die ('error 404');
				// 		while($row = mysqli_fetch_assoc($result)){
				// 			$i++;
				// 		}
				?>
				<!--</div>-->
			</div>
		</div>
		</div>
	</div>	
</div>
<div class="row row-product-bottom">
<div class="col-12" style="border:1px solid lightgray">
	<?php
			$sql = "SELECT  `category_name`,`category_desc` FROM `tbl_category` WHERE `category_url` LIKE '%$x%'";
			$result = mysqli_query($dbcon,$sql) or die ('error 404');
				while($row = mysqli_fetch_assoc($result)){
					$i++;
					$category_name = $row['category_name'];
					$category_desc = $row['category_desc'];
				}

			echo '<h1 class="heading" style="padding-top:1%">About '.$category_name.'</h1>';
			echo '<p style="font-size:18px !important">'.$category_desc.'</p>';
			?>
</div>
</div>
<?php include('footer.php');?>

<script type="text/javascript">
function filter(){
check_filter();
make_filter(200);
}


function check_filter(){
	//alert(value);
	const params = new URLSearchParams(window.location.search);
	var filters =  params.getAll('filter').toString();
	//alert(filters);	
	// Filter
	if(filters !== ''){
	var output = filters.split('_');
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
	priceRange = priceRange.split('_');
	document.getElementById('priceFrom').value = priceRange[0];
	document.getElementById('priceTo').value = priceRange[1];
	}
}


function make_filter(value){
//alert(value);

var output = jQuery.map($(':checkbox[name=filter\\[\\]]:checked'), function (n, i) {
    return n.value;
}).join('_');
var showCount = document.getElementById('showCount').value;
var showSort = document.getElementById('showSort').value;


var priceFrom = document.getElementById('priceFrom').value;
var priceTo = document.getElementById('priceTo').value;
var priceRange = priceFrom+"_"+priceTo;
//alert(priceRange);




var category = document.getElementById('cata').value;
var brand = document.getElementById('bran').value;

$baseUrl = document.getElementById('baseUrl').value;
var url = new URL(window.location);
var search_params = url.searchParams;

if(value == 100){
	var showPage = 1;
	//document.getElementById('page_1').style.backgroundColor = 'red';
}
else if(value == 200){
    const params = new URLSearchParams(window.location.search);
    var showPage =  params.getAll('page').toString();
    //document.getElementById('page_'+showPage).style.backgroundColor = 'red';
}
else{
    var showPage = value;
    //document.getElementById('page_'+showPage).style.backgroundColor = 'red';
}

// if(output==''){
// 	search_params.delete('filter');
// 	search_params.delete('item');
// 	search_params.delete('range');
// 	search_params.delete('sort');
// 	search_params.delete('page');
// // 	search_params.set('item', showCount);
// // 	search_params.set('range', priceRange);
// // 	search_params.set('sort', showSort);
// // 	search_params.set('page', showPage);
// 	url.search = search_params.toString();
// 	var new_url = url.toString();
// }
// else
// {
    
    if(output == '')
        search_params.delete('filter');
    else
        search_params.set('filter', output);
        
        
    if(showCount == '16')
        search_params.delete('item');
    else
        search_params.set('item', showCount);
        
    if(priceRange == '_')
        search_params.delete('range');
    else
        search_params.set('range', priceRange);
        
        
    if(showSort == '')
        search_params.delete('sort');
    else
        search_params.set('sort', showSort);
        
        
    if(showPage == '1' || showPage == '')
    {    search_params.delete('page');}
    else
    {    search_params.set('page', showPage);}
        
        
url.search = search_params.toString();
var new_url = url.toString();
// }

window.history.replaceState($baseUrl,'/digimark/',new_url);

//alert(output+'-'+category+'-'+brand+'-'+showCount+'-'+showSort+'-'+showPage+'-'+priceRange);

	$.ajax({
		      type:"post",
		      url:"ajaxQuotationProductDisplayTest.php",
		      data:{filter:output,category:category,brand:brand,showCount:showCount,showSort:showSort,showPage:showPage,priceRange:priceRange},
		      success:function(data)
		      {
		        if(!data){
		          document.getElementById('displayDiv').style.display="none";
		        }else{
		          if(data !== ''){
		          	//alert(data);
		          document.getElementById('displayDiv').style.display="block";
		      
		          $('#displayDiv').html(data);
		          
		          //page number focus
		            const params = new URLSearchParams(window.location.search);
                    var showPageX =  params.getAll('page').toString();
                    if(showPageX == ''){showPageX = 1;}
                    document.getElementById("page_"+showPageX).style.backgroundColor = "#f16724";
		      	  
		              
		          }else{
		      	  	//alert(data);
		          document.getElementById('displayDiv').style.display="none";
		      	  }
		        }
		            
		      }
		    });
		    

}



</script>

<!--box-shadow: 0px 0px 5px rgba(0,0,0,0.2);box-shadow: 0px 0px 5px rgba(0,0,0,0.2);box-shadow: 0px 0px 5px rgba(0,0,0,0.2);-->


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
  min-height: 2vh;
  background-color: #ffffff;
  margin-top: 0.5%;
  margin-bottom: 0.5%;
  margin-right: 5% !important;
  margin-left: 5% !important;
  }
  .row-product-inner-top{
  min-height: 5vh;
  /*padding-top: 1.5%;*/
  /*padding-bottom: 1%;*/
  
  padding-top: 0.5%;
  padding-bottom: 0%;
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



<style>
    		.accordion{width:auto; margin: 0 auto;}
			.accordion-toggle {cursor: pointer;margin: 0;padding: 10px 0;position: relative;}
			.accordion-toggle.active:after{content:"";position:absolute;right:0;top:17px;width:0;height:0;border-bottom:5px solid #f00;border-left:5px solid rgba(0,0,0,0);border-right:5px solid rgba(0,0,0,0);}
			.accordion-toggle:before{content:"";position:absolute;right:0;top:17px;width:0;height:0;border-top:5px solid #000;border-left:5px solid rgba(0,0,0,0);border-right:5px solid rgba(0,0,0,0);}
			.accordion-toggle.active:before{display:none;}
			.accordion-content {display: none;}
			.accordion-toggle.active {color: #ff0000;}
</style>
<script>
$(document).ready(function() {
	$('.accordion').find('.accordion-toggle').click(function() {
		$(this).next().slideToggle('600');
		$(".accordion-content").not($(this).next()).slideUp('600');
	});
	$('.accordion-toggle').on('click', function() {
		$(this).toggleClass('active').siblings().removeClass('active');
	});
});
	
</script> 


<script type="text/javascript">
function choosedItem(code){
        var rowSelected = localStorage.getItem("currentRow");
        //alert(document.getElementById("category").value);
        var tprice = parseInt(document.getElementById("selected_price_"+code).innerHTML) * parseInt(document.getElementById("selected_qty_"+code).value);
		
		localStorage.setItem("row_"+rowSelected+"_category", document.getElementById("cata").value);
		localStorage.setItem("row_"+rowSelected+"_name", document.getElementById("selected_name_"+code).innerHTML);
		localStorage.setItem("row_"+rowSelected+"_price", document.getElementById("selected_price_"+code).innerHTML);
		localStorage.setItem("row_"+rowSelected+"_tprice", tprice);
		localStorage.setItem("row_"+rowSelected+"_qty", document.getElementById("selected_qty_"+code).value);
		localStorage.setItem("row_"+rowSelected+"_image", document.getElementById("selected_image_"+code).src);
		localStorage.setItem("load", 2);



        
		window.opener.location.reload(false);
		window.close();
	}
</script>
<style>
	    #brand-tabs{
	        border:1px solid black;margin:0.5%;padding:0.5%;font-size:small;border-radius:0px;width:120px;color:white;background-color:black;font-weight:bold;
	    }
	    #brand-tabs:hover{
	        background-color: rgba(0,0,0,0,0.7);
            color: #f69c6f;
	    }
	</style>
</body>
</html>