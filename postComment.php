<?php session_start();?>
<?php
if(isset($_POST['submit'])){
    $article_code = $_POST['article_code'];
    $url = $_POST['url'];
    $comment = $_POST['comment'];
    $section = $_POST['section'];
    $name = $_POST['login_name'];
    $email = $_POST['login_email'];
    $status = '0';
    $reviewDate = date("F j, Y, g:i a");

    if($url !== ''){
    $sql = "INSERT INTO `tbl_comment`(`id`,`comment_code`,`section`,  `article_code`, `comment`, `email`, `name`, `reviewDate`, `status`, `approvedBy`) VALUES ('', '','$section', '$article_code', '$comment', '$email', '$name', '$reviewDate', '$status', '')";
        $result = mysqli_query($dbcon,$sql) or die ('error 4041');


        $last_id = mysqli_insert_id($dbcon);
        $n2 = str_pad($last_id, 9, 0, STR_PAD_LEFT);
        $newId =  "CM".$n2;

        $sqlget1 = "UPDATE `tbl_comment` SET `comment_code` = '$newId' WHERE `id` = '$last_id'";
        $sqldata1 = mysqli_query($dbcon,$sqlget1) or die ('error 4042X');
            
            echo "<script>location='".$section."/".$url."/'</script>";
        
    }else{
            echo "<script>location='".$section."/".$url."/'</script>";
    }
}
?>