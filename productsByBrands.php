<!DOCTYPE html>
<html>
<head>
<?php include('includes.php');
$brand_title  = $litePath[2];
$sql = "SELECT `brand_metaTitle` FROM `tbl_brand` WHERE `brand_url` = '$brand_title'";
$result = mysqli_query($dbcon,$sql) or die ('error 4041');
while($row = mysqli_fetch_assoc($result)){
$brand_title = $row['brand_metaTitle'];
}

echo '<title>'.$brand_title.'</title>';
?>

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
$x  = $litePath[2];
//if($x=='brand'){$x='';$sent_type='brand';}
$y  = $litePath[3];
?>

<div class="row row-product-top">
  	<div class="col-12" style="box-shadow: 0px 0px 5px rgba(0,0,0,0.2);">
  		<div class="row" style="padding-left: 0px !important">
	    	<?php
                $sql2 = "SELECT * FROM `tbl_brand` WHERE `brand_url` LIKE '%$x%'";
                $result2 = mysqli_query($dbcon,$sql2) or die ('error 404');
                    while($row2 = mysqli_fetch_assoc($result2)){
                        $brand_code = strtoupper($row2['brand_code']);
                        $brand_name = strtoupper($row2['brand_name']);
                        $brand_image = $row2['brand_bg_image'];
                        $brand_url = $row2['brand_url'];

                        echo '<div class="col-md-2 col-sm-4 col-12" style="text-align:center;margin-top:2.5%;margin-bottom:2.5%;">
                            <img src="assets/images/brand/'.$brand_image.'" alt="'.$brand_image.'" style="width:50%;height:100px;"><br>
                            </div><div class="col-md-10 col-sm-4 col-12 text-md-left text-center" style="margin-top:2.5%;margin-bottom:2.5%;border-left:2px solid gray"><label>Available Products</label><br>';
                                        $sql = "SELECT DISTINCT `tbl_category`.`category_name` AS `category_name`,`tbl_category`.`category_url` AS `category_url` FROM `tbl_category` LEFT JOIN `tbl_product` ON `tbl_product`.`product_category` = `tbl_category`.`category_code`  WHERE  `tbl_product`.`product_brand` = '$brand_code'";
                                        $result = mysqli_query($dbcon,$sql) or die ('error 404');
                                        while($row = mysqli_fetch_assoc($result)){
                                        $category_name = $row['category_name'];
                                        $category_url = $row['category_url'];
                                        echo '<a class="btn btn-md" href="collections/'.$category_url.'/'.$brand_url.'" style="background-color:#000000;color:#ffffff;border-radius:0px; margin:0.5% !important;font-size:12px !important">
                                        '.$category_name.' <i class="fas fa-tag" style="margin-left:5%"> </i></a>';
                                    }   
                                echo '</div>';    
                            }  

	    	?>
		</div>
	</div>
</div>


<div class="row row-product-bottom">
	<div class="col-12" style="box-shadow: 0px 0px 5px rgba(0,0,0,0.2);">
		<div class="row row-product-inner-bottom">
			<div class="col-12">
				<div id="displayDiv">
					<h1 class="heading" style="margin-left:0.5% !important;padding-top:2.5%;padding-bottom:1.5%;">All <?php echo ucfirst(strtolower($brand_name));?> Product List</h1>
					<div class="row" style="min-height: 50vh !important;">
						<?php
						$i = 0;
						$sql = "SELECT  `tbl_product`.`product_description` AS `prod_desc`,`tbl_product`.`product_name` AS `prod_name`,  `tbl_product`.`product_price` AS `prod_price`,  `tbl_product`.`product_thumb` AS `prod_thumb`, `tbl_product`.`product_url` AS `prod_url`,`tbl_product`.`product_category`,`tbl_category`.`category_name` AS `cat_name`,`tbl_category`.`category_url` AS `cat_url`,`tbl_product`.`product_brand`,`tbl_brand`.`brand_name` AS `brand_name`,`tbl_brand`.`brand_url` AS `brand_url` FROM `tbl_product` LEFT JOIN `tbl_category` ON `tbl_product`.`product_category` = `tbl_category`.`category_code` LEFT JOIN `tbl_brand` ON `tbl_product`.`product_brand` = `tbl_brand`.`brand_code` WHERE `tbl_brand`.`brand_url` LIKE '%$x%' AND `tbl_product`.`product_status` = 1";

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
									
										<div class="col-lg-2 col-md-3 col-sm-4 col-12 pr_box" style="text-align: center;margin-top:1%;margin-bottom:1%">
                  <div class="divLink" style="margin:auto !important;border:1px solid lightgray;height:100%;">
                    <a href="product/'.$product_url.'/">
                        <div id="pcontainer" style="background-color:lightgray;margin:0px !important;height:100% !important;font-size:14px;">
                            <img class="img img-responsive" src="assets/images/product_thumb/'.$product_thumb.'" alt="'.$product_thumb.'"><br>
                            <label style="margin-top:-5% !important">'.$product_name.'</label>
                        </div>
                    </a>
                  </div>
                </div>
									';
								}
						?>
					</div>
				</div>
			</div>
			<div class="col-12" style="text-align:center;padding:2%;"><a href="#" id="load">Load More</a></div>
		</div>
	</div>
</div>

<div class="row row-product-bottom">
	<div class="col-12" style="box-shadow: 0px 0px 5px rgba(0,0,0,0.2);">
		<div class="row row-product-inner-bottom" style="background-color:black;color:white" itemscope itemtype="https://schema.org/Article">
			<?php
			$sql = "SELECT  `brand_name`,`brand_desc`,`cr_date` FROM `tbl_brand` WHERE `brand_url` LIKE '%$x%'";
			$result = mysqli_query($dbcon,$sql) or die ('error 404');
				while($row = mysqli_fetch_assoc($result)){
					$i++;
					$brand_name = $row['brand_name'];
					$brand_desc = $row['brand_desc'];
					$brand_crDate = $row['cr_date'];
				}

			echo '<label class="col-12" style="margin-left:0.5% !important;padding-top:1.5%">
			<span style="color:#f16724">Last Modified On: </span><span itemprop="dateModified">'.date("d-m-Y", strtotime($brand_crDate)).'<span>
			'.$brand_desc.'
			</label>';
			?>
		</div>
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
filter();
window.history.replaceState($baseUrl,'/digimark/',new_url);
}
</script>

<script>
// Add active class to the current button (highlight it)
// var header = document.getElementByClassName("pagination");
// var btns = header.getElementsByClassName("page-item");
// for (var i = 0; i < btns.length; i++) {
//   btns[i].addEventListener("click", function() {
//   var current = document.getElementsByClassName("link-active");
//   current[0].id = current[0].id.replace("link-active", "");
//   this.id += "link-active";
//   });
// }
</script>



<style type="text/css">
  #pcontainer{
    overflow: hidden !important;
    background-color:transparent;
    position: static; width:100%;
  }
  #pcontainer img {
  display: block;
  width:100% !important;
  margin-right: auto;
    background-color:transparent;
}
/*#pcontainer:hover img {*/
/*  transform: scale(1.3);*/
/*  transform-origin: 50% 50%;*/
/*}*/


</style>
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
        margin-top:2.5%;
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
<style>
    .pr_box{display:none;}
    #load{background-color:#ef6624 !important; color:#ffffff !important;font-weight:bold;padding:1% !important;margin:2% !important;}
</style>
<script>
$(function(){
    $(".pr_box").slice(0, 12).show(); // select the first ten
    $("#load").click(function(e){ // click event for load more
        e.preventDefault();
        if($(".pr_box:hidden").length == 0){ // check if any hidden divs still exist
            alert("No item to display"); // alert if there are none left
        }else{
        $(".pr_box:hidden").slice(0, 12).show(); // select next 10 hidden divs and show them
        }
    });
});
</script>
</body>
</html>