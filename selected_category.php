<link rel="stylesheet" href="assets/css/about_content.css">
<div class="row row-about-brand">  
<div class="col-12" style="background-image:url('assets/images/background/about_head_bg.jpg');background-size:cover">
<h1 class="heading" style="color: #ffffff;box-shadow: 0px 0px 3px rgba(0,0,0,0.2);padding:1.5%"><b><?php echo $catgTitle;?></b></h1>
</div>
</div>
<div class="row row-about-brand-bottom">  
	<div class="col-12"> 
        <div  class="col-12" style="text-align: left;box-shadow: 0px 0px 3px rgba(0,0,0,0.2);">
                <div class="brand-img-container">
                <!-- <div class="container"> -->
                    <div class="row" style="background-color: rgba(255,255,255,0.2);padding:5px">
	                <?php
					$sql = "SELECT DISTINCT `tbl_subcategory`.`subcategory_name` AS `subcategory_name`,`tbl_subcategory`.`subcategory_url` AS `subcategory_url`, `tbl_subcategory`.`subcategory_image` AS `subcategory_image` FROM `tbl_subcategory`   WHERE  `tbl_subcategory`.`category_code` = '$get_category_code'";
					$result = mysqli_query($dbcon,$sql) or die ('error 404');
					while($row = mysqli_fetch_assoc($result)){
					$subcategory_name = $row['subcategory_name'];
					$subcategory_url = $row['subcategory_url'];
					$subcategory_image = $row['subcategory_image'];
					echo '<div class="col-lg-3 col-md-4 col-sm-4 col-12" style="text-align:center;padding-top:1%;padding-bottom:1%;">
                                        <a href="collections/'.$subcategory_url.'" style="text-decoration:none">
                                        <div id="pcontainer-about-brand">
                                        <img class="img img-responsive" src="assets/images/subcategory/'.$subcategory_image.'" alt="'.$subcategory_image.'" style="width:100px;height:100px;"><br>
											<label>'.$subcategory_name.'</label></a>
                                    </div></a>
                                    </div>';
					}
					?>
					</div>

                </div>
        </div>
   </div> 
</div>   
   
<div class="row row-about-brand">  
<div class="col-12" style="background-image:url('assets/images/background/about_head_bg.jpg');background-size:cover">
<h3 class="heading" style="color: #ffffff;box-shadow: 0px 0px 3px rgba(0,0,0,0.2);padding:1.5%"><b>Quick List</b></h3>
</div>
</div>

<div class="row row-about-brand-bottom">  
   <div class="row m-0" style="box-shadow: 0px 0px 3px rgba(0,0,0,0.2);">  
	<div class="col-12"> 
		<div class="row m-1" style="background-color: rgba(255,255,255,0.2);padding:5px">
	                <?php
					$sql = "SELECT DISTINCT `tbl_subcategory`.`subcategory_name` AS `subcategory_name`,`tbl_subcategory`.`subcategory_url` AS `subcategory_url`, `tbl_subcategory`.`subcategory_code` AS `subcategory_code` FROM `tbl_subcategory`   WHERE  `tbl_subcategory`.`category_code` = '$get_category_code'";
					$result = mysqli_query($dbcon,$sql) or die ('error 404');
					while($row = mysqli_fetch_assoc($result)){
					$subcategory_name = $row['subcategory_name'];
					$subcategory_url = $row['subcategory_url'];
					$subcategory_code = $row['subcategory_code'];
                    
                    echo '<div class="row p-2 m-auto" style="background-color: lightgray;width:100% !important;">
                    <div class="col-lg-6 col-md-6 col-12 pl-1 text-lg-left text-md-left text-center">
                    <h7 class="m-auto text-left">'.$subcategory_name.'</h7>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 pl-1 text-lg-right text-md-right text-center">
                    <a class="btn m-auto text-right ml-0" style="border-radius:0px;background-color:#1c4684;color:#ffffff" href="collections/'.$subcategory_url.'">View All</a>
                    </div>
                    </div>';
                    
                    
					echo '<div class="row p-2 m-auto" style="background-color: rgba(255,255,255,0.2);width:100% !important;">';
					$sql2 = "SELECT  `id`,`product_code`,`product_name`, `product_price`, `product_thumb`, `product_url`  FROM `tbl_product` WHERE `product_subcategory` = '$subcategory_code' ORDER BY `id` DESC LIMIT 6 ";
					$result2 = mysqli_query($dbcon,$sql2) or die ('error 404');
						while($row2 = mysqli_fetch_assoc($result2)){
							$i++;
							$product_code = strtoupper($row2['product_code']);
							$product_name = strtoupper($row2['product_name']);
							if(strlen($product_name) > 20)
							$product_name = substr($product_name, 0, 20)."...";
							$product_price = strtoupper($row2['product_price']);
							$product_thumb = $row2['product_thumb'];
							$product_url = strtoupper($row2['product_url']);


							echo '<div class="col-lg-2 col-md-2 col-sm-4 col-12 p-1" style="text-align: center;">
		                        	<div class="container divLink product-box" style="margin:0.5% !important;min-height:100%;display: flex;flex-direction: column;border:1px solid lightgray">
		                            	<a href="product/'.$product_url.'/" id="pcontainer">
		                            
		                            	<div class="p-3">
		                              		<img class="img img-responsive" src="assets/images/product_thumb/'.$product_thumb.'" alt="'.$product_name.'" style="width:65%">
		                            	</div>
		                            	<div id="pdetails">
		                            		<p style="font-size:12px">'.$product_name.'</p>
		                            	</div>
    		                            <div class="row justify-content-center" style="margin-top:auto;margin-bottom:2.5%">
    		                            Price : '.$product_price.'
    		                            </div>
		                            </a>
		                        	</div>
		                    	</div>';
                       	}
    		 		echo '</div>';
					}
					?>
					</div>
	</div>
</div>
   <div class="col-12" style="border:1px solid lightgray;padding:2%;margin-top:2.5%" itemscope itemtype="https://schema.org/Article">
	<?php
			$sql = "SELECT  `category_name`,`category_desc`,`cr_date` FROM `tbl_category` WHERE `category_url` LIKE '%$x%'";
			$result = mysqli_query($dbcon,$sql) or die ('error 404');
				while($row = mysqli_fetch_assoc($result)){
					$i++;
					$category_name = $row['category_name'];
					$category_desc = $row['category_desc'];
					$category_crDate = $row['cr_date'];
				}

			//echo '<h1 class="heading" style="padding-top:1%">About '.$category_name.'</h1>';

			echo '
			<p style="font-size:18px !important"><span style="color:#f16724">Last Modified On: </span><span itemprop="dateModified">'.date("d-m-Y", strtotime($category_crDate)).'<span>'.$category_desc.'</p>';
			?>
</div>
</div>
<?php include('footer.php');?>

<style type="text/css">
   #view_all{
       color:white;
   }
   #view_all:hover{
       cursor: pointer;
   }
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


