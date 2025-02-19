<?php
//print_r($_SERVER);
//echo "http://" . $_SERVER['SERVER_NAME'];

// echo $_SERVER['REQUEST_URI'];
$baseUrl = 'https://www.digimarkbd.com/adminPanel/';
$path = trim($_SERVER['REQUEST_URI']);
$path = parse_url($path, PHP_URL_PATH);
$litePath = explode('/', $path);
// echo $litePath[0]."--".$litePath[1]."--".$litePath[2]."--".$litePath[3]."--".$litePath[4]."--".$litePath[5];
$routes = [
  '' => 'index.php',
  'Dashboard' => 'index.php',
  'Toggle-Maintanance' => 'toggleMaintanance.php',
  'Category' => 'setupCategory.php',
  'subcategory' => 'setupSubcategory.php',
  'Award' => 'setupAward.php',
  'About' => 'setupAboutSection.php',
  'Brand' => 'setupBrand.php',
  'Create-Product' => 'createProduct.php',
  'List-Product' => 'productList.php',
  'Add-Spec' => 'setupProductSpec.php',
  'Add-Filter' => 'setupProductFilter.php',
  'Product-Image' => 'uploadProductImage.php',
  'Filter-Head' => 'setupFilterHead_new.php',
  'Filter-Tag' => 'tagFilterToCategory.php',
  'Filter-Value' => 'setupFilterValue_new.php',
  'Spec-Head' => 'setupSpecHead.php',
  'Spec-Subhead' => 'setupSpecSubhead.php',
  'Display-Image' => 'dispImage.php',
  'Branch' => 'setupBranch.php',
  'Social-Media' => 'setupSocialMedia.php',
  'Post-Job' => 'postJobOffer.php',
  'Support-Menu' => 'supportMenu.php',
  'Manage-Review' => 'pendingReviews.php',
  'All-Reviews' => 'groupReviewConfirmation.php',
  'View-Reviews' => 'groupReviewConfirmationNew.php',
  'Manage-News' => 'postNews.php',
  'Manage-Newsletter' => 'postNewsletter.php',
  'Manage-CaseStudy' => 'postCaseStudy.php',
  'Manage-Blog' => 'postBlog.php',
  'Manage-Case-Study' => 'postCaseStudy.php',
  'Overlay-Adv' => 'adv.php',
  'Carousel-Control' => 'carouselControl.php',
  'sub-carousel-control' => 'carouselControlInner.php',
  'Manage-Pending-Dealer' => 'pendingDealer.php',
  'Partner-Item-Upload' => 'uploadPartnerItems.php',
  'Manage-Maintenance-User' => 'setupMaintenanceUser.php',
  'Permission' => 'setupPermission.php',
  'Credentials' => 'changeCredential.php',
  'Logout' => 'logout.php',
  'Meta-Content' => 'setupMetaContent.php',
  'Manage-Life-At-Digimark'=>'postLifeAtDigimark.php',
  'Manage-Subcategory-Brand'=>'brandWiseMetaTitle.php'
];
if (array_key_exists($litePath[2], $routes)) {
  require $routes[$litePath[2]];
}else {
  require 'error.php';
}
?>