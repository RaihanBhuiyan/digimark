<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Passsword Reset</title>
    <?php include('includes.php');
    ?>
    <style type="text/css">
        input,select,button{
            border-radius: 0px !important;
        }
        label{
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<?php 
include('menu.php');
?>

<div id="login">
        <div class="container" style="margin-top: 5%;margin-bottom: 5%;border-radius: 0px;box-shadow: 0px 0px 5px rgba(0,0,0,0.7);padding: 2.5%">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="forget-password" method="post">
                            <h1 class="text-left heading" style="color:#f16724"><b>Forget Password</b></h1>
                            <div class="form-group" style="margin-top:2.5%">
                                <label for="email">Registered Email</label><br>
                                <input required type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group" style="text-align: center;margin-top: 10%">
                                <button type="submit" name="submit" class="btn btn-md" style="background-color: #f69c6f;color:#ffffff">Reset <i class="fas fa-refresh"></i></button>
                            </div>
                            <div id="register-link" class="col-md text-center" style="margin-top: 10%">
                                <a href="Registration">Register here</a> <span>|</span> <a href="forget-password">Forget Password</a> <span>|</span> <a href="">Back to website</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php 
include('footer.php');
?>

<?php
include('../assets/database/config.php');
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $en = base64_encode($email);
    $sqlget = "SELECT COUNT(`id`) AS `recordCount` FROM `master_dealer_register` WHERE `dealerEmail` = '$email' and `conStatus` = 1";
        $sqldata = mysqli_query($dbcon,$sqlget) or die ('error 404');
         while($rows = mysqli_fetch_assoc($sqldata)){
            $recordCount =  $rows['recordCount'];
         }
    
    if($recordCount > 0){
        ini_set('SMTP', "digimarkbd.com");
        ini_set('smtp_port', "25");
        ini_set('sendmail_from', "noreply@digimarkbd.com");
         $to = $email;
         $subject = "Password Reset URL";
         
         $message = "<b>Click the following link to reset your password</b>";
         $message .= "<br><h7>https://www.digimarkbd.com/reset-password/129872823/".$en."/0/</h7>";
         
         $header = "From:noreply@digimarkbd.com \r\n";
         //$header .= "Cc:afgh@somedomain.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
        echo "<script>alert('Please Login to your mail ID for password reset URL.');</script>";
    }else{
        echo "<script>alert('Email Not Found');</script>";
    }
  
}
?>
</body>
</html>