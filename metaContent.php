<?php
include('assets/database/config.php');
$_page = $_GET['x'];

$sql  = "SELECT * FROM `tbl_meta_content` WHERE `page` = '$_page' AND `status` = '1'";
$result = mysqli_query($dbcon,$sql) or die ('error 404');
			while($row = mysqli_fetch_assoc($result)){
			$metaTitle = $row['metaTitle'];
			$metaDesc = $row['metaDesc'];
			$metaKeywords = $row['metaKeyword'];
			}
?>			
	<title><?php echo $metaTitle;?></title>		
    <meta name="title" content="<?php echo $metaTitle;?>" />   
	<meta name="description" content="<?php echo $metaDesc;?>" />    
	<meta name="keywords" content= "<?php echo $metaKeywords;?>" />
