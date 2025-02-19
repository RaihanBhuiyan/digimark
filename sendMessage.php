<?php
include('assets/database/config.php');
$name = $_POST['name'];
$email = $_POST['email'];
$text_message = $_POST['message'];
$msgDate = date("d/m/y");
// $sql = "INSERT INTO `table_message`(`id`, `name`, `email`, `message`, `msgDate`) VALUES ('$id', '$name', '$email', '$message', '$msgDate')";
// $result = mysqli_query($dbcon,$sql) or die ('error 4041');

ini_set('SMTP', "digimarkbd.com");
        ini_set('smtp_port', "25");
        ini_set('sendmail_from', "noreply@digimarkbd.com");
         $to = $email;
         $subject = "General Query";
         
         $message = "Thank you for quaries. Digimark team will get back to you as soon as possible.";
         
         $header = "From:noreply@digimarkbd.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);



ini_set('SMTP', "digimarkbd.com");
        ini_set('smtp_port', "25");
        ini_set('sendmail_from', "noreply@digimarkbd.com");
         $to = 'info@digimark.com.bd';
         //$to = 'info@digimarkbd.com';
        //  $to = 'singlebititsolutions@gmail.com';
         $subject = "General Query : ".$email;
         
         $message = "Name : ".$name."<br>Email : ".$email."<br>Message: <br>".$text_message;
         
         $header = "From:noreply@digimarkbd.com \r\n";
         $header .= "Cc:info@digimark.com.bd \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
?>