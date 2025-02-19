<div style="width:100%">
<?php 
$img = $_GET['image'];
$item = $_GET['item'];
if($item == 'product-image'){
	echo '<img src="../assets/images/product_thumb/'.$img.'">';
}elseif($item == 'product-brochure'){
	echo '<object data="../assets/images/product_brochure/'.$img.'" type="application/pdf" style="width:100%;height:100%">
		        alt : <a href="../assets/images/product_brochure/'.$img.'">'.$img.'</a>
		    </object>';
}elseif($item == 'product-all'){
	if($img == ''){echo '<img src="../assets/images/products/no_image.jpg">';}
	else {echo '<img src="../assets/images/products/'.$img.'">';}
}elseif($item == 'brand'){
	echo '<img src="../assets/images/brand/'.$img.'">';
}elseif($item == 'category'){
	echo '<img src="../assets/images/category/'.$img.'">';
}elseif($item == 'subcategory'){
	echo '<img src="../assets/images/subcategory/'.$img.'">';
}elseif($item == 'award'){
	echo '<img src="../assets/images/award/'.$img.'">';
}elseif($item == 'news'){
	echo '<img src="../assets/images/news/'.$img.'">';
}elseif($item == 'newsletter'){
	echo '<img src="../assets/images/newsletter/'.$img.'">';
}elseif($item == 'blog'){
	echo '<img src="../assets/images/blog/'.$img.'">';
}elseif($item == 'case_study'){
	echo '<img src="../assets/images/case_study/'.$img.'">';
}elseif($item == 'life-at-digimark'){
	echo '<img src="../assets/images/life_at_digimark/'.$img.'">';
}elseif($item == 'adv'){
	echo '<img src="../assets/images/adv/'.$img.'">';
}elseif($item == 'carousel'){
	echo '<img src="../assets/images/carousel/'.$img.'">';
}

?>
</div>
<style type="text/css">
	img{
		width: 100%;
	}
</style>
