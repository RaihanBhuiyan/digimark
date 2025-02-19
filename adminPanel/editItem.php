<?php

$item = $litePath[2];
$value = $litePath[3];

if(strlen($value)>0)
{
	if($item == 'Category'){
	$sql  = "SELECT * FROM `tbl_category` WHERE `category_code` = '$value'";
	$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
			$category_code = $row['category_code'];
			$category_name = $row['category_name'];
			$category_url = $row['category_url'];
			
			$metaTitle = $row['category_metaTitle'];
			$metaKeyWord = $row['category_metaKeyWord'];
			$metaDesc = $row['category_metaDesc'];
			
			$category_desc = $row['category_desc'];
			$category_image = $row['category_image'];
			$category_status = $row['category_status'];
			$category_sort = $row['category_sort'];
			$menu_sort = $row['menu_sort'];
		}
	}
	else if($item == 'subcategory'){
	$sql  = "SELECT *,`tbl_category`.`category_code` AS `category_code`,`tbl_category`.`category_name` AS `category_name` FROM `tbl_subcategory` 
	JOIN `tbl_category` ON `tbl_category`.`category_code` = `tbl_subcategory`.`category_code` 
	WHERE `subcategory_code` = '$value'";
	$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
			$category_code = $row['category_code'];
			$subcategory_code = $row['subcategory_code'];
			$subcategory_name = $row['subcategory_name'];
			$subcategory_url = $row['subcategory_url'];
			
			$metaTitle = $row['subcategory_metaTitle'];
			$metaKeyWord = $row['subcategory_metaKeyWord'];
			$metaDesc = $row['subcategory_metaDesc'];
			
			$subcategory_desc = $row['subcategory_desc'];
			$subcategory_image = $row['subcategory_image'];
			$subcategory_status = $row['subcategory_status'];
			$subcategory_sort = $row['subcategory_sort'];
			$menu_sort = $row['menu_sort'];
		}
	}
	else if($item == 'Brand'){
	$sql  = "SELECT * FROM `tbl_brand` WHERE `brand_code` = '$value'";
	$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
			$brand_code = $row['brand_code'];
			$brand_name = $row['brand_name'];
			$brand_url = $row['brand_url'];
			
			
			$metaTitle = $row['brand_metaTitle'];
			$metaKeyWord = $row['brand_metaKeyWord'];
			$metaDesc = $row['brand_metaDesc'];
			
			
			$brand_desc = $row['brand_desc'];
			$brand_image = $row['brand_image'];
			$brand_bg_image = $row['brand_bg_image'];
			$brand_status = $row['brand_status'];
			$brand_sort = $row['brand_sort'];
		}
	}
	else if($item == 'Award'){
	$sql  = "SELECT * FROM `tbl_award` WHERE `award_code` = '$value'";
	$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
			$award_code = $row['award_code'];
			$award_name = $row['award_name'];
			
			$award_Url = $row['award_url'];
			$metaTitle = $row['award_metaTitle'];
			$metaDesc = $row['award_metaDesc'];
			$metaKeyWord = $row['award_metaKeyWord'];
			$award_desc = $row['award_desc'];
			
			$award_image = $row['award_image'];
			$award_status = $row['award_status'];
		}
	}
	else if($item == 'About'){
	$sql  = "SELECT * FROM `tbl_about_section` WHERE `about_code` = '$value'";
	$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
			$about_code = $row['about_code'];
			$about_page = $row['about_page'];
			$about_content = $row['about_content'];
			$about_status = $row['about_status'];
		}
	}
	else if($item == 'Meta-Content'){
	$sql  = "SELECT * FROM `tbl_meta_content` WHERE `code` = '$value'";
	$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
			$code = $row['code'];
			$page = $row['page'];
			$metaTitle = $row['metaTitle'];
			$metaDesc = $row['metaDesc'];
			$metaKeyWord = $row['metaKeyWord'];
			$status = $row['status'];
		}
	}
	else if($item == 'Filter-Head'){
	$sql  = "SELECT * FROM `master_filter_head` WHERE `f_head_code` = '$value'";
	$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
			$f_head_code = $row['f_head_code'];
			$f_head_name = $row['f_head_name'];
			$f_head_status = $row['status'];
		}
	}
	else if($item == 'Spec-Head'){
	$sql  = "SELECT * FROM `master_spec_head` WHERE `spec_head_code` = '$value'";
	$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
			$spec_head_code = $row['spec_head_code'];
			$spec_head_name = $row['spec_head_name'];
			$spec_head_status = $row['status'];
		}
	}
	else if($item == 'Spec-Subhead'){
	$sql  = "SELECT * FROM `master_spec_subhead` WHERE `spec_subhead_code` = '$value'";
	$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
			$spec_subhead_code = $row['spec_subhead_code'];
			$spec_subhead_name = $row['spec_subhead_name'];
			$spec_subhead_status = $row['status'];
		}
	}

// 	else if($item == 'Create-Product'){
// 	$sql  = "SELECT *,`tbl_category`.`category_name` AS `product_category_name`, `tbl_brand`.`brand_name`  AS `product_brand_name` FROM `tbl_product` 
// 				LEFT JOIN  `tbl_category` ON `tbl_product`.`product_category` =  `tbl_category`.`category_code`
// 				LEFT JOIN  `tbl_brand` ON  `tbl_product`.`product_brand` = `tbl_brand`.`brand_code`
// 				WHERE `product_code` = '$value'";
// 	$result = mysqli_query($dbcon,$sql) or die ('error 404');
// 			while($row = mysqli_fetch_assoc($result)){
// 			$product_code = $row['product_code'];
// 			$product_name = $row['product_name'];
// 			$product_category_code = $row['product_category'];
// 			$product_brand_code = $row['product_brand'];
// 			$product_category_name = $row['product_category_name'];
// 			$product_brand_name = $row['product_brand_name'];
// 			$product_price = $row['product_price'];
// 			$product_discount = $row['product_discount'];
// 			$product_remark = $row['product_remark'];
// 			$product_features = $row['product_features'];
// 			$product_description = $row['product_description'];


// 			$product_metaTitle = $row['product_metaTitle'];
// 			$product_metaDescription = $row['product_metaDescription'];
// 			$product_metaKeywords = $row['product_metaKeywords'];
// 			$product_brochure = $row['product_brochure'];

// 			$product_url = $row['product_url'];
// 			$product_redirect_url = $row['product_redirect_url'];
// 			$product_thumb = $row['product_thumb'];
// 			$product_status = $row['product_status'];
// 			$stock_status = $row['stock_status'];
// 		}
// 	}
    else if($item == 'Create-Product'){
	$sql  = "SELECT *,`tbl_category`.`category_name` AS `product_category_name`, `tbl_brand`.`brand_name`  AS `product_brand_name` FROM `tbl_product` 
				LEFT JOIN  `tbl_category` ON `tbl_product`.`product_category` =  `tbl_category`.`category_code`
				LEFT JOIN  `tbl_brand` ON  `tbl_product`.`product_brand` = `tbl_brand`.`brand_code`
				WHERE `product_code` = '$value'";
	$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
			$product_code = $row['product_code'];
			$product_name = $row['product_name'];
			$product_category_code = $row['product_category'];
			$product_subcategory = $row['product_subcategory'];
			$product_brand_code = $row['product_brand'];
			$product_category_name = $row['product_category_name'];
			$product_brand_name = $row['product_brand_name'];
			$product_price = $row['product_price'];
			$product_discount = $row['product_discount'];
			$product_remark = $row['product_remark'];
			$product_features = $row['product_features'];
			$product_description = $row['product_description'];


			$product_metaTitle = $row['product_metaTitle'];
			$product_metaDescription = $row['product_metaDescription'];
			$product_metaKeywords = $row['product_metaKeywords'];
			$product_brochure = $row['product_brochure'];

			$product_url = $row['product_url'];
			$product_redirect_url = $row['product_redirect_url'];
			$product_thumb = $row['product_thumb'];
			$product_status = $row['product_status'];
			$stock_status = $row['stock_status'];
		}
	}

	else if($item == 'Add-Spec'){
	$spec_code = $litePath[4];
		$sql  = "SELECT * FROM `tbl_product_spec` WHERE `spec_code` = '$spec_code' ORDER BY `spec_head_code`, `spec_subhead_code` ASC";
		$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
			$spec_code = $row['spec_code'];
			$product_code = $row['product_code'];
			$product_spec_head_code = $row['spec_head_code'];
			$product_spec_subhead_code = $row['spec_subhead_code'];
			$details = $row['details'];
			$spec_status = $row['status'];
			}
	}



	else if($item == 'Branch'){
	$sql  = "SELECT * FROM `master_branch` WHERE `branch_code` = '$value'";
	$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
			$branch_code = $row['branch_code'];
			$title = $row['title'];
			$address = $row['address'];
			$contact = $row['contact'];
			$email = $row['email'];
			$gmap = $row['gmap'];
			$holiday = $row['holiday'];
			$remark = $row['remark'];
			$sort = $row['sort'];
			$branch_status = $row['status'];
		}
	}


	else if($item == 'Social-Media'){
	$sql  = "SELECT * FROM `master_social` ORDER BY `id` DESC LIMIT 1";
	$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
			$hotline = $row['hotline'];
			$whatsapp = $row['whatsapp'];
			$facebook = $row['facebook'];
			$youtube = $row['youtube'];
			$linkedin = $row['linkedin'];
			$pinterest = $row['pinterest'];
			$instagram = $row['instagram'];
			$twitter = $row['twitter'];
			$gmail = $row['gmail'];
		}
	}


	else if($item == 'Post-Job'){
	$sql  = "SELECT * FROM `tbl_career` WHERE `job_code` = '$value'";
	$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
			$job_code = $row['job_code'];
			$title = $row['title'];
			$description = $row['description'];
			$experience = $row['experience'];
			$qualification = $row['qualification'];
			$instructions = $row['instructions'];
			$link = $row['link'];
			$deadline = $row['deadline'];
			$job_status = $row['status'];
		}
	}


	else if($item == 'Manage-Review'){
	$sql  = "SELECT *,`tbl_product`.`product_name` AS `product_name` FROM `tbl_review` 
		LEFT JOIN `tbl_product` ON `tbl_product`.`product_code`  = `tbl_review`.`product_code`
		WHERE  `tbl_review`.`review_code` = '$value'";
	$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
			$review_code = $row['review_code'];
			$product_code = $row['product_code'];
			$product_name = $row['product_name'];
			$review = $row['review'];
			$review_rating = $row['review_rating'];
			$email = $row['email'];
			$name = $row['name'];
			$posted = $row['reviewDate'];
			$review_status = $row['status'];
		}
	}

	else if($item == 'Manage-Pending-Dealer'){
	$sql  = "SELECT * FROM `master_dealer_register` WHERE  `dealerRegCode` = '$value'";
	$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
			$dealerRegCode = $row['dealerRegCode'];
			$dealerCompany = $row['dealerCompany'];
			$dealerName = $row['dealerName'];
			$dealerPhone = $row['dealerPhone'];
			$dealerEmail = $row['dealerEmail'];
			$dealerAddress = $row['dealerAddress'];
			$dealerDistCode = $row['dealerDistCode'];
			$dealerConStatus = $row['conStatus'];
			$regDate = $row['regDate'];
		}
	}

	else if($item == 'Manage-Life-At-Digimark'){
	$sql  = "SELECT * FROM `tbl_life_at_digimark` WHERE `code` = '$value'";
	$result = mysqli_query($dbcon,$sql) or die ('error 404z');
			while($row = mysqli_fetch_assoc($result)){
			$life_code = $row['code'];
// 			$news_title = $row['title'];
// 			$news_details = $row['details'];
// 			$metaTitle = $row['metaTitle'];
// 			$metaDesc = $row['metaDesc'];
// 			$metaKeyWord = $row['metaKeyWord'];
			$life_image = $row['thumbnail'];
			$life_status = $row['status'];
		}
	}


	else if($item == 'Manage-News'){
	$sql  = "SELECT * FROM `tbl_news` WHERE `code` = '$value'";
	$result = mysqli_query($dbcon,$sql) or die ('error 404z');
			while($row = mysqli_fetch_assoc($result)){
			$news_code = $row['code'];
			$news_title = $row['title'];
			$news_url = $row['url'];
			$news_details = $row['details'];
			$metaTitle = $row['metaTitle'];
			$metaDesc = $row['metaDesc'];
			$metaKeyWord = $row['metaKeyWord'];
			$news_image = $row['thumbnail'];
			$news_status = $row['status'];
		}
	}
	
	else if($item == 'Manage-Newsletter'){
	$sql  = "SELECT * FROM `tbl_newsletter` WHERE `code` = '$value'";
	$result = mysqli_query($dbcon,$sql) or die ('error 404z');
			while($row = mysqli_fetch_assoc($result)){
			$news_code = $row['code'];
			$news_title = $row['title'];
			$news_url = $row['url'];
			$news_details = $row['details'];
			$news_link = $row['link'];
			$metaTitle = $row['metaTitle'];
			$metaDesc = $row['metaDesc'];
			$metaKeyWord = $row['metaKeyWord'];
			$news_image = $row['thumbnail'];
			$news_status = $row['status'];
		}
	}
	else if($item == 'Manage-Blog'){
	$sql  = "SELECT * FROM `tbl_blog` WHERE `code` = '$value'";
	$result = mysqli_query($dbcon,$sql) or die ('error 404z');
			while($row = mysqli_fetch_assoc($result)){
			$blog_code = $row['code'];
			$blog_title = $row['title'];
			$blog_url = $row['url'];
			$blog_details = $row['details'];
			$metaTitle = $row['metaTitle'];
			$metaDesc = $row['metaDesc'];
			$metaKeyWord = $row['metaKeyWord'];
			$blog_image = $row['thumbnail'];
			$blog_status = $row['status'];
		}
	}
	else if($item == 'Manage-Case-Study'){
	$sql  = "SELECT * FROM `tbl_case_study` WHERE `code` = '$value'";
	$result = mysqli_query($dbcon,$sql) or die ('error 404z');
			while($row = mysqli_fetch_assoc($result)){
			$cs_code = $row['code'];
			$cs_title = $row['title'];
			$cs_url = $row['url'];
			$cs_details = $row['details'];
			$metaTitle = $row['metaTitle'];
			$metaDesc = $row['metaDesc'];
			$metaKeyWord = $row['metaKeyWord'];
			$cs_image = $row['thumbnail'];
			$cs_status = $row['status'];
		}
	}


	else if($item == 'Partner-Item-Upload'){
	$sql  = "SELECT * FROM `tbl_partner_items` WHERE `item_code` = '$value'";
	$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
			$item_code = $row['item_code'];
			$item_type = $row['item_type'];
			$item_name = $row['item_name'];
			$item_file = $row['item_file'];
			$item_logo = $row['item_logo'];
			$item_external_link = $row['item_external_link'];
			$item_status = $row['item_status'];
		}
	}


	else if($item == 'Manage-Maintenance-User'){
	$sql  = "SELECT * FROM `master_user` WHERE `userCode` = '$value'";
	$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
			$userMCode = $row['userCode'];
			$userName = $row['userName'];
			$userDesignation = $row['userDesignation'];
			$userEmail = $row['userEmail'];
			$userPassword = $row['userPassword'];
			$userStatus = $row['status'];
		}
	}
	else if($item == 'Support-Menu'){
	$sql  = "SELECT * FROM `tbl_support_menu` WHERE `menuCode` = '$value'";
	$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
			$menuName = $row['menuName'];
			$menuCode = $row['menuCode'];
			$menuUrl = $row['menuUrl'];
			$menuSort = $row['menuSort'];
			$menuStatus = $row['status'];
		}
	}
	else if($item == 'Manage-Subcategory-Brand'){
	$sql  = "SELECT * FROM `tbl_brand_wise_subcategory_content` WHERE `code` = '$value'";
	$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
			$code = $row['code'];
			$select_subcategory_code = $row['subcategoryCode'];
			$select_brand_code = $row['brandCode'];
			$sub_url = $row['sub_url'];
			$brand_url = $row['brand_url'];
			$metaTitle = $row['metaTitle'];
			$metaKeyWords = $row['metaKeyWords'];
			$metaDescription = $row['metaDescription'];
			$contentDescription = $row['contentDescription'];
		}
	}
}
?>