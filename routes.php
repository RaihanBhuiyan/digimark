<?php
//print_r($_SERVER);
//echo "http://" . $_SERVER['SERVER_NAME'];

		include('assets/database/config.php');
    	$sql_mtnc = "SELECT `status`,`advImg`,`adv` FROM `maintenance`";
		  $result_mtnc = mysqli_query($dbcon,$sql_mtnc) or die ('error 404');
        while($row_mtnc = mysqli_fetch_assoc($result_mtnc)){
            $status = $row_mtnc['status'];
            $advImg = $row_mtnc['advImg'];
            $adv = $row_mtnc['adv'];
        }
		


$baseUrl = 'https://www.digimarkbd.com/';
$path = trim($_SERVER['REQUEST_URI']);
$path = parse_url($path, PHP_URL_PATH);
$litePath = explode('/', $path);
//echo $litePath[0]."--".$litePath[1]."--".$litePath[2]."--".$litePath[3]."--".$litePath[4]."--".$litePath[5];
//echo $litePath[1];
$routes = [
  '' => 'index.php',
  'home' => 'index.php',
  'page-not-found' => '404.php',
  '404' => 'error.php',
  'Maintenance' => 'maintenance.php',
//  'Login' => 'login.php',
  'login' => 'login.php',
//  'Registration' => 'registration.php',
  'registration' => 'registration.php',
//   'collections_jmf' => 'products2.php',
  'collections' => 'products.php',
  'qcollections' => 'zQuotationProducts.php',
  'brand-collections' => 'productsByBrands.php',
  'product' => 'displayProduct.php',
  'productt' => 'displayProductTest.php',
//   'quotation' => 'createList2.php',
'quotation' => 'zQuotation.php',
//   'Send-Query' => 'emailQuotation.php',
//   'Save-Quotation' => 'saveQuotation.php',
//   'ListItem' => 'productList3.php',
//   'Post-Review' => 'postReview.php',
//   'Careers' => 'careers.php',
//   'Career' => 'career.php',
     'send-query' => 'emailQuotation.php',
      'save-quotation' => 'saveQuotation.php',
      'listItem' => 'productList3.php',
      'post-review' => 'postReview.php',
      'careers' => 'careers.php',
      'career' => 'career.php',
  'brand-story' => 'brandHistory.php',
  'mission-and-vision' => 'missionandvision.php',
  'awards' => 'awards.php',
  'award-details' => 'awardDetails.php',
  'why-digimark-solution' => 'whyDigimark.php',
  'brands-we-represent' => 'about_brand.php',
  'products-&-solutions' => 'about_category.php',
//  'Result-All' => 'searchResult.php',
  'result-all' => 'searchResult.php',
  'press-release' => 'newsletter.php',
  'Read' => 'readSingleItem.php',
  'blog' => 'blogsNew.php',
  'BlogTest990' => 'blogTest.php',
  'news' => 'newsNew.php',
  'case-study' => 'caseStudiesNew.php',
  'collections2' => 'product_redesign.php',
  'ceo-speech' => 'ceoSpeech.php',
  'team-digimark' => 'ourTeam.php',
  'basic-info' => 'getBasicInformation.php',
  'admin-panel-login' => 'aLogin.php',
  'life-at-digimark' => 'lifeAtDigimark.php',
  'forget-password' => 'passForget.php',
  'reset-password' => 'passReset.php',
//  'Post-Comment' => 'postComment.php'
  'post-comment' => 'postComment.php'
  
];

if (array_key_exists(strtolower($litePath[1]), $routes) && $status == '0') {
    
  require $routes[strtolower($litePath[1])];
}else if(array_key_exists($litePath[1], $routes) && $status == '1'){
	require 'maintenance.php';
}else {
  require 'error.php';
}

// 'News' => 'news.php',
//   'Press-Release' => 'newsletter.php',
//   'Blog' => 'blogs.php',
//   'Case-Study' => 'caseStudies.php',
?>


<script>
 var baseUrl = 'https://www.digimarkbd.com';
 
 const url = new URL( window.location.href);
 //alert(url.search.toString());
  var oldpath = url.pathname.toString();
  var newpath = oldpath.toLowerCase();
  var newUrl = baseUrl+newpath+url.search.toString();
 window.history.replaceState(baseUrl,'/digimark/',newUrl);

</script>