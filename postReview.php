<?php session_start();?>
<?php
if(isset($_POST['submit'])){
    $product_code = $_POST['code'];
    $url = $_POST['url'];
    $review = $_POST['review'];
    $review_rating = $_POST['review_rating'];
    $name = $_POST['login_name'];
    $email = $_POST['login_email'];
    $status = '0';
    $reviewDate = date("F j, Y, g:i a");

    if($url !== ''){
    $sql = "INSERT INTO `tbl_review`(`id`, `review_code`, `product_code`, `review`,`review_rating`, `email`, `name`, `reviewDate`, `status`, `approvedBy`) VALUES ('', '', '$product_code', '$review','$review_rating', '$email', '$name', '$reviewDate', '$status', '')";
        $result = mysqli_query($dbcon,$sql) or die ('error 4041');


        $last_id = mysqli_insert_id($dbcon);
        $n2 = str_pad($last_id, 9, 0, STR_PAD_LEFT);
        $newId =  "R".$n2;

        $sqlget1 = "UPDATE `tbl_review` SET `review_code` = '$newId' WHERE `id` = '$last_id'";
        $sqldata1 = mysqli_query($dbcon,$sqlget1) or die ('error 4042X');
            
            echo "<script>location='product/".$url."/'</script>";
        
    }else{
            echo "<script>location='product/".$url."/'</script>";
    }
}
?>