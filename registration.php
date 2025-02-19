<!DOCTYPE html>
<html>
<head>
 <?php
   include('includes.php');
   include('../assets/database/config.php');
   
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
<div id="Registration">
        <div class="container" style="margin-top: 2.5%;margin-bottom: 2.5%;border-radius: 0px;box-shadow: 0px 0px 5px rgba(0,0,0,0.7);padding: 2.5%">
            <!-- <div class="col-md text-center" style="">
                <img src="assets/images/logo.png">
            </div> -->
            
            <?php
            
            ?>

            <div id="Registration-row" class="row">
                <div id="Registration-column" class="col-md-12">
                    <div id="Registration-box" class="col-md-12">
                        <form id="Registration-form" class="form" action="Registration" method="post">
                            <h1 class="text-left heading" style="margin-bottom: 2.5%;color:#f16724"><b>Registration</b></h1>
                              <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                <label for="username">Dealer Name</label>
                                  <input required type="text" name="dealerName" class="form-control" placeholder="Dealer Name">
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                <label for="username">Company Name</label>
                                  <input required type="text" name="dealerCompany" class="form-control" placeholder="Company Name">
                                </div>
                              </div>

                               <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                <label for="username">Phone</label>
                                  <input required type="text" name="dealerPhone" class="form-control" placeholder="Contact No.">
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                <label for="username">Email</label>
                                  <input required type="email" name="dealerEmail" class="form-control" placeholder="Email">
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                <label for="username">Select Your District</label>
                                  <select required type="Text" name="dealerDistCode" class="form-control" placeholder="Select District">
                                    <option value="">--Select District--</option>
                                    
                                    <?php
                                      $distItemQuery = "SELECT `tempDistCode`, `distName` FROM `table_district`";
                                      $distItemData = mysqli_query($dbcon,$distItemQuery) or die ('error 4042');
                                          while($distItemRows = mysqli_fetch_assoc($distItemData)){
                                          $menuDistCode = $distItemRows['tempDistCode'];
                                          $menuDistName = $distItemRows['distName'];
                                          echo '<option value="'.$menuDistName.'">'.$menuDistName.'</option>';
                                        }
                                    ?>
                                  </select>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                <label for="username">Address</label>
                                  <input required type="text" name="dealerAddress" class="form-control" placeholder="Address">
                                </div>
                            </div>

                               <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                <label for="username">Password</label>
                                  <input required type="password" name="dealerPassword" id="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                <label for="username">Confirm Password</label>
                                  <input required type="password" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="Confirm Password">
                                  <span id='message'></span>
                                </div>
                              </div>
                            </div>
                            
                            <div class="form-group" style="text-align: center;margin-top: 2.5%">
                                <!--label for="remember-me"><span>Remember me</span><span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br-->
                                <button type="submit" name="submit" id="submit" class="btn btn-md"  style="background-color: #f69c6f;color:#ffffff">Register <i class="fas fa-sign-in-alt"></i></button>
                            </div>
                            <div id="register-link" class="col-md text-center" style="margin-top: 2.5%;margin-bottom: 2.5%">
                                <a href="Login">Sign In</a> <span>|</span> <a href="">Back to website</a>
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
if(isset($_POST['submit'])){
    $dealerName = $_POST['dealerName'];
    $dealerCompany = $_POST['dealerCompany'];
    $dealerPhone = $_POST['dealerPhone'];
    $dealerEmail = $_POST['dealerEmail'];
    $dealerDistCode = $_POST['dealerDistCode'];
    $dealerAddress = $_POST['dealerAddress'];
    $dealerPassword = $_POST['dealerPassword'];
    $status = '0';
    // $regDate = date("F j, Y, g:i a");
    $regDate = date(Ymd);
    
    $flag = 0;
$sqlChq = "SELECT `dealerEmail` FROM `master_dealer_register` WHERE `dealerEmail` = '$dealerEmail'";
$resultChq = mysqli_query($dbcon,$sqlChq) or die ('error 4042');
$rowcount=mysqli_num_rows($resultChq);

if($rowcount == 0)
{
        $sql = "INSERT INTO `master_dealer_register`(`id`, `dealerRegCode`, `dealerCompany`, `dealerName`, `dealerPhone`, `dealerEmail`, `dealerAddress`, `dealerPassword`, `dealerDistCode`, `regDate`, `conDate`, `conStatus`, `crDate`, `crBy`) VALUES ('','', '$dealerCompany','$dealerName','$dealerPhone', '$dealerEmail',  '$dealerAddress', '$dealerPassword','$dealerDistCode', '$regDate', '', '$status','','')";
        $result = mysqli_query($dbcon,$sql) or die ('error 4041');


        $last_id = mysqli_insert_id($dbcon);
        $n2 = str_pad($last_id, 9, 0, STR_PAD_LEFT);
        $newId =  "DR".$n2;

        $sqlget1 = "UPDATE `master_dealer_register` SET `dealerRegCode` = '$newId' WHERE `id` = '$last_id'";
        $sqldata1 = mysqli_query($dbcon,$sqlget1) or die ('error 4042X');
        
        
        ini_set('SMTP', "digimarkbd.com");
        ini_set('smtp_port', "25");
        ini_set('sendmail_from', "noreply@digimarkbd.com");
         $to = $dealerEmail;
         $subject = "New Partner Registration";
         
         $message = "Thank you for register with Digimark Solution. Please wait until your account is verified. Once it is verified youu will get notification in you given email address.";
         
         $header = "From:noreply@digimarkbd.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         
         
         
         ini_set('SMTP', "digimarkbd.com");
         ini_set('smtp_port', "25");
         ini_set('sendmail_from', "noreply@digimarkbd.com");
         $to = 'info@digimark.com.bd';
         $subject = "New Partner Registration. $newId";
         
         $message = "New Partner Registration : ". $newId;
         
         $header = "From:noreply@digimarkbd.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
            echo "<script>alert('Thank you for register with us. Digimark team will contact you soon.');</script>";
            echo "<script>location='Registration'</script>";
    }
else{
     echo "<script>alert('This email has already been used for registration. Digimark team will contact you soon.');</script>";
            echo "<script>location='Registration'</script>";
}
}

?>

<script type="text/javascript">
$('#password, #confirmPassword').on('keyup', function () {
  if ($('#password').val() == $('#confirmPassword').val()) {
    $('#message').html('Password Matched').css('color', 'green');
    document.getElementById("submit").disabled = false; 
  } else {
    $('#message').html('Password Does not Matched').css('color', 'red');
    document.getElementById("submit").disabled = true; 
  }
});
</script>

<script type="text/javascript">
    function remSuccessHistory(){   
         window.location.replace('http://shadhona.org/ich/cms/Registration');
        return false;
    }
    function remFailHistory(){   
         window.location.replace('http://shadhona.org/ich/cms/Registration');
        return false;
    }
   </script>

</body>
</html>