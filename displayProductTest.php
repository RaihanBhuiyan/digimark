<?php 
session_start();
$product_url = $litePath[2];
$sql = "SELECT *,`tbl_brand`.`brand_name` AS `brand`,`tbl_category`.`category_name` AS `category`,`tbl_category`.`category_url` AS `category_url`  FROM `tbl_product` LEFT JOIN `tbl_brand` ON `tbl_product`.`product_brand` = `tbl_brand`.`brand_code` 
LEFT JOIN `tbl_category` ON `tbl_product`.`product_category` = `tbl_category`.`category_code` WHERE `tbl_product`.`product_url` = '$product_url'";
$result = mysqli_query($dbcon,$sql) or die ('error 404');
	while($row = mysqli_fetch_assoc($result)){
			$reviewProduct = $product_code = $row['product_code'];
			$product_brand = $row['brand'];
			$product_category = $row['product_category'];
			$category = $row['category'];
			$category_url = $row['category_url'];
			$product_name = $row['product_name'];
			$product_price = $row['product_price'];
			$product_discount = $row['product_discount'];
			$product_remark = $row['product_remark'];
			$product_features = $row['product_features'];
			$product_description = $row['product_description'];
			$product_url = $row['product_url'];
			$product_thumb = $row['product_thumb'];
			$product_brochure = $row['product_brochure'];
			$product_metaTitle = $row['product_metaTitle'];
			$product_metaDescription = $row['product_metaDescription'];
			$product_metaKeywords = $row['product_metaKeywords'];
			$stock_status = $row['stock_status'];
			$product_status = $row['product_status'];
			$product_redirect_url = $row['product_redirect_url'];
			if($product_status == '0' && $product_redirect_url !== ''){
				echo "<script>location='product/".$product_redirect_url."'</script>";
			}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<?php include('includes.php');?>
	<meta name="title" content="<?php echo $product_metaTitle;?>" />   
	<meta name="description" content="<?php echo $product_metaDescription;?>" />    
	<meta name="keywords" content= "<?php echo $product_metaKeywords;?>" />              
        <!--<meta property="fb:app_id" content="1973296469592243" />-->
        <title><?php echo $product_metaTitle;?></title>
         <meta property="fb:app_id" content="" />
        <meta property="og:title" content="<?php echo $product_metaTitle;?>" />
        <meta property="og:type" content="product" />
        <meta property="og:url" content="https://www.digimarkbd.com/product/<?php echo $product_url;?>" />
        <meta property="og:description" content="<?php echo $product_metaDescription;?>" />
        <meta property="og:site_name" content="Digimark Solutions" />
        <meta property="og:image" content="assets/images/product_thumb/<?php echo $product_thumb;?>" />
	<style type="text/css">
	h5{
		color:#f16724;
	}
	.xzoom{width: 100% !important;box-shadow: none !important;}
	.xzoom-thumbs{margin-top: 10px;}
	.xzoom-gallery{width: 15%;margin: 0px !important;padding: 0px !important;}

	body{background-color: #ffffff;}
	/*tr{border-bottom:1px dotted gray;line-height: 30px;}*/
	.feature-box{font-size: 14px;color:black;text-align:left}
    .feature-box > ul{margin:15px !important;padding:0px !important;}
	/*.th-cl-1{background-color: #f16724;color:white;line-height:18px;}*/
	/*.th-cl-2{background-color: #f16724;color:white;}*/
	/*.td-cl-1{background-color: #57595b;color:white;width:20%;line-height:16px;text-align: right;font-size:16px !important;font-weight: bold;}*/
	/*.td-cl-2{background-color: white;color:#000000;width:80%;line-height:16px;text-align: left;font-size:20px !important;}*/

	</style>
<link href="assets/css/zoom.css" rel="stylesheet"/>
<script src="assets/js/zoom.js"></script>

<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=60711f569c00ae0011d41982&product=inline-share-buttons" async="async"></script>
</head>
<body> 
<!--<div id="fb-root"></div>-->
<!--<script>(function(d, s, id) {-->
<!--var js, fjs = d.getElementsByTagName(s)[0];-->
<!--if (d.getElementById(id)) return;-->
<!--js = d.createElement(s); js.id = id;-->
<!--js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";-->
<!--fjs.parentNode.insertBefore(js, fjs);-->
<!--}(document, 'script', 'facebook-jssdk'));</script>-->

<?php 
include('menu.php');

$count = 1;$avgRating = 1;
$sql2 = "SELECT COUNT(`id`) AS `count`, SUM(`review_rating`) AS `total` FROM `tbl_review` WHERE `product_code` = '$product_code' AND `status` = '1' ";
$result2 = mysqli_query($dbcon,$sql2) or die ('error 404');
	while($row2 = mysqli_fetch_assoc($result2)){
			$count = $row2['count'];
			$review_rating = $row2['total'];
		} 
		if($count !== 0){
		$count = intval($count);
		$avgRating = intval($review_rating/$count);
		}
		else{
		$count = 1;
		$avgRating = 1;
		}
?>

<div class="container" style="margin-top:0.5%">
	<div class="row" style="">
		<div class="col-12" style="padding:1% !important;background-color:#ffffff;color:#000000 !important;font-size:1.5vh;">
		    <a href="Home" style="color:#f16724;text-decoration:none"><i class="fas fa-home"></i></a> <i class="fas fa-caret-right" style="margin-left:2px;margin-right:2px"></i> <a href="collections/<?php echo $category_url;?>?item=16&range=%2C&sort=ASC" style="color:#f16724;text-decoration:none"><?php echo $category?></a> <i class="fas fa-caret-right" style="margin-left:2px;margin-right:2px"></i> <?php echo $product_name;?>
		</div>
		<div class="col-md-5 col-sm-12 col-xs-12">
			<div class="row" style="background-color: transparent;">

				<?php
				$sql_mtnc = "SELECT * FROM `tbl_product_image` WHERE `product_code` = '$reviewProduct' AND `status`=1";
				$result_mtnc = mysqli_query($dbcon,$sql_mtnc) or die ('error 404');
						
				if(mysqli_num_rows($result_mtnc) <= 0){
								echo '<img class="xzoom" id="xzoom-default" src="assets/images/products/no_image.jpg" xoriginal="assets/images/products/no_image.jpg" alt="No Image" style="height:100% !important"/>
									<div class="xzoom-thumbs">';
							}
				else
					{$i = 0;
						while($row_mtnc = mysqli_fetch_assoc($result_mtnc)){
							$i++;
							$product_code = $row_mtnc['product_code'];
							$code = $row_mtnc['code'];
							$image = $row_mtnc['image'];
							$status = $row_mtnc['status'];
							
							if($i==1){
								echo '<img itemprop="image" class="xzoom" id="xzoom-default" src="assets/images/products/'.$image.'" xoriginal="assets/images/products/'.$image.'" alt="No Image" style="height:100% !important" />
									<div class="xzoom-thumbs">
										<a href="assets/images/products/'.$image.'"><img itemprop="image" class="xzoom-gallery" src="assets/images/products/'.$image.'" alt="No Image" title="The description goes here" style="height:100% !important"></a>';
							}else{
								echo '<a href="assets/images/products/'.$image.'"><img itemprop="image" class="xzoom-gallery" src="assets/images/products/'.$image.'" alt="No Image" title="The description goes here" style="height:100% !important"></a>';
							}
						}
					}
					

				          	echo 	'</div>';
				    ?>
			</div>
	  	</div>
	<div class="col-md-7 col-sm-12 col-xs-12" style="padding-left: 5%;padding-top: 2% !important;padding-bottom: 2% !important;"  itemscope itemtype="https://schema.org/Product">
		<h5 style=""  itemprop="name"><b><?php echo $product_name;?></b></h5>
    	<meta itemprop="sku" content="<?php echo $product_code;?>" />
    	<meta itemprop="description" content="<?php echo $product_description;?>" />
		<meta itemprop="brand" content="<?php echo $product_brand;?>" />
		<link itemprop="image" href="assets/images/products/<?php echo $image;?>" />

		<div itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating">
		   <label style="display: none;">Rating : <span itemprop="ratingValue"><?php echo $avgRating;?></span>/5; </label>
		   <label style="display: none;">Total Review :<span itemprop="reviewCount"><?php echo $count;?></span></label>
		  </div>

		<table class="product-info-table">
		<tbody style="color:black">
		<tr class="product-info-group" itemprop="offers" itemscope itemtype="https://schema.org/Offer">
		<td class="product-info-label" style="width:25%;font-weight:bold"><b>Price</b></td>
		<td class="product-info-data product-price" style="width: 290px;" >
			<span itemprop="price" content="<?php echo $product_price;?>"><?php echo $product_price;?></span>
			<span itemprop="priceCurrency" content="BDT">৳</span>
			<link itemprop="availability" href="https://schema.org/InStock" />
		</td>
		</tr>
		<tr class="product-info-group">
		<td class="product-info-label" style="width:25%;font-weight:bold"><b>Discount</b></td>
		<td class="product-info-data product-price" style="width: 290px;">
			<span content="<?php echo $product_discount;?>"><?php echo $product_discount;?></span>
			<span>৳</span>
		</tr>
		<tr class="product-info-group">
		<td class="product-info-label" style="width:25%;font-weight:bold"><b>Status</b></td>
		<td class="product-info-data product-status" style="width: 290px;">
			<?php 
				if($stock_status == 1){
				echo '
				<span>In stock</span>';
			    }
			    else if($stock_status == 2){
				echo '
				<span>Pre Order</span>';
			    }	
			    else if($stock_status == 3){
				echo '
				<span>Upcoming</span>';
			    }	
			    else if($stock_status == 4){
				echo '
				<span>Discontinue</span>';
			    }
			    else{echo '<span>Stock Out</span>';}
			    ?>
		</td>
		</tr>
		<tr class="product-info-group">
		<td class="product-info-label" style="width:25%;font-weight:bold"><b>Product Code</b></td>
		<td class="product-info-data product-code" style="width: 290px;">
			
			<?php echo $product_code;?></td>
			<span itemprop="mpn" style="display: none">not inserted</span>
		</tr>
		<tr class="product-info-group">
		<td class="product-info-label" style="width:25%;font-weight:bold"><b>Brand</b></td>
		<td class="product-info-data product-brand" style="width: 290px;">
			<span><?php echo $product_brand;?></span></td>
		</tr>
		</tbody>
		</table>
		
		<table class="product-info-table">
		<tbody>
		<tr class="product-info-group" style="border-bottom: none;">
		<td>
		<h5 style="color:#f16724;margin-top:2.5%"><b>Features</b></h5>
		<ul class="feature-box" style="text-align:left!important;padding-left:0px !important;">
	    	<p>
	    	    <?php echo $product_features?>
	    	</p>
	    </ul>
		</td>
		</tr>
		<tr style="border-bottom: none;">
		<td>
		<h5 style="color:#f16724"><b><?php echo $product_remark;?></b></h5>
		</td>
		</tr>
		<tr style="border-bottom: none;">
		<td>
		<?php 
		if($product_brochure != null){echo '<a class="btn btn-sm btn-dark" href="assets/images/product_brochure/'.$product_brochure.'" download="'.$product_name.'" style="margin-left:2.5%"><i class="fas fa-file-pdf"  style="color:red"></i> Brochure Download</a>';}
		else{echo "No Brochure";}
		?>
		</td>
		</tr>
		<td>
		<h7 style="color:#f16724"><b>Share On :</b></h7>
		<!--<button class="btn btn-xs btn-primary">Facebook <i class="fas fa-share"></i></button>-->
		<!--<div class="fb-share-button" -->
  <!--      data-href="https://www.your-domain.com/your-page.html" -->
  <!--      data-layout="button_count">-->
  <!--      </div>-->
  <div class="sharethis-inline-share-buttons"></div>
		</td>
		</tr>
		
		
		</tbody>
		</table>
	</div>
</div>



<div class="row" style="margin-bottom: 2.5%;">
	<div class="col-12" style="padding: 0px !important">
		<label style="background-color: #000000;color:white;text-align: left;padding: 1%;width: 100%"><b>Description</b></label>
	</div>
	<div class="col-12" style="text-align: left;padding-top: 0.5% !important;padding-bottom: 0.5% !important;" >

		<?php echo $product_description;?>
	</div>
</div>
<div class="row" style="margin-bottom: 2.5%;">
	<!--<div class="col-12" style="padding: 0px !important">-->
	<!--	<label style="background-color: #000000;color:white;text-align: left;padding: 1%;width: 100%"><b>Technical Specification</b></label>-->
	<!--</div>-->
	<div class="col-12" id="features" style="text-align: left;">
		<?php
// 		    $sql2 = "SELECT DISTINCT `spec_head_code` FROM `tbl_product_spec` WHERE `product_code` = '$product_code'";
// 			$result2 = mysqli_query($dbcon,$sql2) or die ('error 4041');
// 			while($row2 = mysqli_fetch_assoc($result2)){
// 			$specHead = $row2['spec_head_code'];
            $sql2 = "SELECT DISTINCT `tbl_product_spec`.`spec_head_code` AS `headCode`,`master_spec_head`.`spec_head_name` AS `headName` FROM `tbl_product_spec` 
		    JOIN `master_spec_head` ON
		    `master_spec_head`.`spec_head_code` = `tbl_product_spec`.`spec_head_code` 
		    WHERE `product_code` = '$product_code' AND `tbl_product_spec`.`status` = '1'";
			$result2 = mysqli_query($dbcon,$sql2) or die ('error 4041');
			while($row2 = mysqli_fetch_assoc($result2)){
			$specHead = $row2['headCode'];
			$headName = $row2['headName'];
			echo '<div class="row" style="margin-bottom: 2.5%;">
			<div class="col-12" style="padding: 0px !important">
				<label style="background-color: #000000;color:white;text-align: left;padding: 1%;width: 100%"><b>'.$headName.'</b></label>
			</div>';		

				// $sql3 = "SELECT `spec_subhead_code`,`details` FROM `tbl_product_spec` WHERE `product_code` = '$product_code' AND `spec_head_code` = '$specHead' AND `status` = '1'";
				
				$sql3 = "SELECT `tbl_product_spec`.`spec_subhead_code` AS `subheadCode`,`tbl_product_spec`.`details` AS `details`,`master_spec_subhead`.`spec_subhead_name` AS `subheadName` 
				FROM `tbl_product_spec` JOIN `master_spec_subhead` ON
		        `master_spec_subhead`.`spec_subhead_code` = `tbl_product_spec`.`spec_subhead_code`
				WHERE `product_code` = '$product_code' AND `spec_head_code` = '$specHead' AND `tbl_product_spec`.`status` = '1'";
				$result3 = mysqli_query($dbcon,$sql3) or die ('error 4042');
							while($row3 = mysqli_fetch_assoc($result3)){
								$specSubhead = $row3['subheadCode'];
								$subheadName = $row3['subheadName'];
								$details = $row3['details'];
								echo '<div class="col-md-3 col-12" style="padding: 0px !important;display:none">
										<label style="background-color: #4c4d4f;color:white;text-align: left;padding: 2.5%;width: 100%"><b>'.$subheadName.'</b></label>
										</div>
										<div class="col-md-12 col-12" id="detailsCol" style="text-align: justify;">
										'.$details.'
										</div>';
							}
			    echo '</div>';
					}
		        ?>
		<!-- <div class="row" style="margin-bottom: 2.5%;">
			<div class="col-12" style="padding: 0px !important">
				<label style="background-color: #4c4d4f;color:white;text-align: left;padding: 1%;width: 100%"><b>Main Features</b></label>
			</div>
			<div class="col-3" style="padding: 0px !important">
				<label style="background-color: #4c4d4f;color:white;text-align: left;padding: 1%;width: 100%"><b>Technical Feat 1</b></label>
			</div>
			<div class="col-9" style="text-align: left;">
				<?php echo $product_description;?>
			</div>
		</div> -->
	</div>
</div>
	<div class="row justify-content-center" style=";margin-bottom: 5%;">
	<div class="col-12" style="padding: 0px !important">
		<label style="background-color: #000000;color:white;text-align: left;padding: 1%;width: 100%"><b>Related Products</b></label>
	</div>
	<?php
	$product_url = $litePath[2];
	    $sql = "SELECT *,`tbl_brand`.`brand_name` AS `brand`  FROM `tbl_product` LEFT JOIN `tbl_brand` ON `tbl_product`.`product_brand` = `tbl_brand`.`brand_code` WHERE `tbl_product`.`product_category` = '$product_category' AND `product_url` != '$product_url' ORDER BY `tbl_product`.`id` DESC LIMIT 4";
        $result = mysqli_query($dbcon,$sql) or die ('error 404');
	        while($row = mysqli_fetch_assoc($result)){
			    $product_code = $row['product_code'];
			    $product_brand = $row['brand'];
			    $product_name = $row['product_name'];
			    $product_price = $row['product_price'];
			    $product_thumb = $row['product_thumb'];
			    $product_url = $row['product_url'];
			
			echo '<a href="product/'.$product_url.'/"><div class="col-lg-3 col-md-6 col-sm-12 col-xs-12" style="text-align: center;">
		<img src="assets/images/product_thumb/'.$product_thumb.'">
		<p>Product : '.$product_name.'<br>Price : '.$product_price.' BDT</p></a>
	</div>';
	        }
	?>
	
	<!--<div class="col-md-4 col-sm-12 col-xs-12" style="text-align: center;">-->
	<!--	<img src="assets/images/1.jpg">-->
	<!--	<p>Product : Intel Pentium Processor<br>Price : 4000 BDT</p>-->
	<!--</div>-->
	<!--<div class="col-md-4 col-sm-12 col-xs-12" style="text-align: center;">-->
	<!--	<img src="assets/images/1.jpg">-->
	<!--	<p>Product : Intel Pentium Processor<br>Price : 4000 BDT</p>-->
	<!--</div>-->
	</div>
<div class="row" style="margin-bottom: 2.5%;">
	<div class="col-12" style="padding: 0px !important">
		<label style="background-color: #000000;color:white;text-align: left;padding: 1%;width: 100%"><b>Review</b></label>
	</div>
	<div class="col-12" style="text-align: left;">
		<form action="Post-Review" method="post">
		        			<!-- <label style="color:#f16724;font-weight: bold;font-size: 20px">Write a review</label> -->
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12 mt-3">
		<label style="color:#f16724;font-weight: bold;font-size: 20px">Give a rating : </label>
		    <span class="fa fa-star checked" id="star1" onclick="add(this,1)"></span>
			<span class="fa fa-star checked" id="star2" onclick="add(this,2)"></span>
			<span class="fa fa-star checked" id="star3" onclick="add(this,3)"></span>
			<span class="fa fa-star checked" id="star4" onclick="add(this,4)"></span>
			<span class="fa fa-star" id="star5" onclick="add(this,5)"></span>
	</div>

	<input type="tetx" name="review_rating" id="rating" style="display: none" value="4">	 
	<input type="text" id="pcode" name="code" value="<?php echo $product_code;?>" style="display:none">
	<input type="text" name="url" value="<?php echo $product_url;?>" style="display:none">


	<div class="col-md-12 col-sm-12 col-xs-12 mt-3">
		<textarea spellcheck="true" id="review" class="form-control" name="review"  placeholder="Write a review*" ></textarea>
	</div>

	<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
	                <input type="text" class="form-control" id="login_name" name="login_name" placeholder="Email**" required="" style="margin-top: 1.5%">
	</div>

	<div class="col-md-6 col-sm-12 col-xs-12 mt-3">
		            <input type="email" class="form-control" id="login_email" name="login_email" placeholder="Name**" required="" style="margin-top: 1.5%">
	</div>

	<div class="col-md-12 col-sm-12 col-xs-12 mt-3 float-right">
		<button class="btn btn-sm btn-success float-right" type="submit" name="submit" style="margin-top:1%"><i class="fas fa-comment"> </i> Post Review</button>
	            <!-- <a class="btn btn-sm btn-success float-right" href="javascript:void(0)" onclick="gmail_login()" style="margin-top:1%"><i class="fas fa-comment"> </i> Login with gmail</a> -->
	</div>
</div>
		</form>

		<div class="col-md-12 col-sm-12" style="margin-top: 2.5%">
		        		<label style="color:#f16724;font-weight: bold;font-size: 20px;margin-bottom: 2.5%">User reviews</label>
		        		<?php
		        		$sql = "SELECT * FROM `tbl_review` WHERE `product_code` = '$reviewProduct' AND `status` = '1'";
						$result = mysqli_query($dbcon,$sql) or die ('error 404');
							while($row = mysqli_fetch_assoc($result)){
							$name = $row['name'];
							$reviewDate = $row['reviewDate'];
							$review = $row['review'];
							$review_rating = $row['review_rating'];

							echo 	'<div class="row" style="border-bottom:1px solid lightgray;margin-bottom:0.5%;margin-top:0.5%" itemprop="itemReviewed" itemtype="https://schema.org/itemReviewed" itemscope>
										<div class="col-md-1 col-4" style="text-align: center;margin:auto">
											<img class="rounded-circle" src="assets/images/user.png" style="width: 75px;">
										</div>
										<div class="col-md-11 col-8 card-body" style="margin:auto;padding-top:2.5%">
											<p style="">
											<span itemprop="author"><b>'.$name.'</b></span><br>
											<meta itemprop="datePublished" content="'.$reviewDate.'"><b>'.$reviewDate.'</b><br>
											<span itemprop="reviewBody">'.$review.'</span><br>';
											for($i=0;$i<=$review_rating;$i++){
											echo '<span class="fa fa-star checked"></span>';
											}
											echo '</p>
										</div>
									</div>';
							}
						?>
		        	</div>
	</div>
</div>

<a href="assets/app-debug3.apk" download>text</a>
</div>



<?php include('footer.php');?>

<script type="text/javascript">
(function ($) {
    $(document).ready(function() {
        $('.xzoom, .xzoom-gallery').xzoom({zoomWidth: 650, title: false, tint: '#333', Xoffset: 15});
        $('.xzoom2, .xzoom-gallery2').xzoom({position: '#xzoom2-id', tint: '#ffa200'});
        $('.xzoom3, .xzoom-gallery3').xzoom({position: 'lens', lensShape: 'circle', sourceClass: 'xzoom-hidden'});
        $('.xzoom4, .xzoom-gallery4').xzoom({tint: '#006699', Xoffset: 15});
        $('.xzoom5, .xzoom-gallery5').xzoom({tint: '#006699', Xoffset: 15});

        //Integration with hammer.js
        var isTouchSupported = 'ontouchstart' in window;

        if (isTouchSupported) {
            //If touch device
            $('.xzoom, .xzoom2, .xzoom3, .xzoom4, .xzoom5').each(function(){
                var xzoom = $(this).data('xzoom');
                xzoom.eventunbind();
            });
            
            $('.xzoom, .xzoom2, .xzoom3').each(function() {
                var xzoom = $(this).data('xzoom');
                $(this).hammer().on("tap", function(event) {
                    event.pageX = event.gesture.center.pageX;
                    event.pageY = event.gesture.center.pageY;
                    var s = 1, ls;
    
                    xzoom.eventmove = function(element) {
                        element.hammer().on('drag', function(event) {
                            event.pageX = event.gesture.center.pageX;
                            event.pageY = event.gesture.center.pageY;
                            xzoom.movezoom(event);
                            event.gesture.preventDefault();
                        });
                    }
    
                    xzoom.eventleave = function(element) {
                        element.hammer().on('tap', function(event) {
                            xzoom.closezoom();
                        });
                    }
                    xzoom.openzoom(event);
                });
            });

        $('.xzoom4').each(function() {
            var xzoom = $(this).data('xzoom');
            $(this).hammer().on("tap", function(event) {
                event.pageX = event.gesture.center.pageX;
                event.pageY = event.gesture.center.pageY;
                var s = 1, ls;

                xzoom.eventmove = function(element) {
                    element.hammer().on('drag', function(event) {
                        event.pageX = event.gesture.center.pageX;
                        event.pageY = event.gesture.center.pageY;
                        xzoom.movezoom(event);
                        event.gesture.preventDefault();
                    });
                }

                var counter = 0;
                xzoom.eventclick = function(element) {
                    element.hammer().on('tap', function() {
                        counter++;
                        if (counter == 1) setTimeout(openfancy,300);
                        event.gesture.preventDefault();
                    });
                }

                function openfancy() {
                    if (counter == 2) {
                        xzoom.closezoom();
                        $.fancybox.open(xzoom.gallery().cgallery);
                    } else {
                        xzoom.closezoom();
                    }
                    counter = 0;
                }
            xzoom.openzoom(event);
            });
        });
        
        $('.xzoom5').each(function() {
            var xzoom = $(this).data('xzoom');
            $(this).hammer().on("tap", function(event) {
                event.pageX = event.gesture.center.pageX;
                event.pageY = event.gesture.center.pageY;
                var s = 1, ls;

                xzoom.eventmove = function(element) {
                    element.hammer().on('drag', function(event) {
                        event.pageX = event.gesture.center.pageX;
                        event.pageY = event.gesture.center.pageY;
                        xzoom.movezoom(event);
                        event.gesture.preventDefault();
                    });
                }

                var counter = 0;
                xzoom.eventclick = function(element) {
                    element.hammer().on('tap', function() {
                        counter++;
                        if (counter == 1) setTimeout(openmagnific,300);
                        event.gesture.preventDefault();
                    });
                }

                function openmagnific() {
                    if (counter == 2) {
                        xzoom.closezoom();
                        var gallery = xzoom.gallery().cgallery;
                        var i, images = new Array();
                        for (i in gallery) {
                            images[i] = {src: gallery[i]};
                        }
                        $.magnificPopup.open({items: images, type:'image', gallery: {enabled: true}});
                    } else {
                        xzoom.closezoom();
                    }
                    counter = 0;
                }
                xzoom.openzoom(event);
            });
        });

        } else {
            //If not touch device

            //Integration with fancybox plugin
            $('#xzoom-fancy').bind('click', function(event) {
                var xzoom = $(this).data('xzoom');
                xzoom.closezoom();
                $.fancybox.open(xzoom.gallery().cgallery, {padding: 0, helpers: {overlay: {locked: false}}});
                event.preventDefault();
            });
           
            //Integration with magnific popup plugin
            $('#xzoom-magnific').bind('click', function(event) {
                var xzoom = $(this).data('xzoom');
                xzoom.closezoom();
                var gallery = xzoom.gallery().cgallery;
                var i, images = new Array();
                for (i in gallery) {
                    images[i] = {src: gallery[i]};
                }
                $.magnificPopup.open({items: images, type:'image', gallery: {enabled: true}});
                event.preventDefault();
            });
        }
    });
})(jQuery);
</script>


<script type="text/javascript">
function gmail_login(){
// alert(value);
// pcode = document.getElementById('pcode').value;
// review = document.getElementById('review').value;
// 	$.ajax({
// 		      type:"post",
// 		      url:"google/login.php",
// 		      data:{pcode:pcode;review:review;},
// 		      success:function(data)
// 		      {
// 		        if(!data){
// 		          //document.getElementById('displayDiv').style.display="none";
// 		        }else{
// 		          if(data !== ''){
// 		          	document.getElementById('review').value = '';
// 		          	alert('success');
// 		          	alert(data);
// 		            //$('#login_name').html(data);
// 		      	  }else{
// 		      	  	alert(data);
// 		          //document.getElementById('displayDiv').style.display="none";
// 		      	  }
// 		        }
		            
// 		      }
// 		    });
// }
</script>

<style>
.checked {
    color: orange;
}
</style>
<script>
function add(ths,sno){
document.getElementById('rating').value = sno;

for (var i=1;i<=5;i++){
var cur=document.getElementById("star"+i)
cur.className="fa fa-star"
}

for (var i=1;i<=sno;i++){
var cur=document.getElementById("star"+i)
if(cur.className=="fa fa-star")
{
cur.className="fa fa-star checked"
}
}

}
</script>

<style type="text/css">
	#features > a > img{
		vertical-align: middle !important;
        display:block;
        max-width: 200px;
        margin-left: auto;
        margin-right: auto;
	}
	p > iframe{
        display:block;
        width:100%;
        height:450px;
        margin-left: auto;
        margin-right: auto;
	}
	
	#detailsCol>table{
	    width:100%;
	}
</style>

<style type="text/css">
.featureTable{
    width: 100% !important;
    max-width: 100% !important;
    color:black !important;
    border:1px solid #cccccc !important;
}
.featureTable td{
    border:1px solid #cccccc !important;
    padding:0.5%;
    word-wrap: break-word;min-width: 160px;max-width: 160px;
}

.table td > p {
    padding-left:2.5% !important;
    text-align: left !important;
}

.table td:first-child > p {
    padding-right:2.5% !important;
    font-weight:bold !important;
    text-align: right !important;
}
</style
  </body>
</html>