<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Passsword Reset</title>
    <?php include('includes.php');
    $email = base64_decode($litePath[3]);
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
                        <form id="login-form" class="form" action="reset-password" method="post">
                            <h2 class="text-center"><b>Reset Password</b></h2>
                            <div class="form-group">
                                <label for="password">New Password</label><br>
                                <input required type="password" name="password" id="pass" class="form-control" onkeyup="matchString()">
                            </div>
                            <div class="form-group">
                                <label for="rePassword">Retype Password</label><br>
                                <input required type="password" name="retypePassword" id="rePass" class="form-control" onkeyup="matchString()">
                                <input type="text" style="display:none" value="<?php echo $email;?>" name="email"/>
                                <h7 id="status" style="display:none">Test</h7>
                            </div>
                            <div class="form-group" style="text-align: center;margin-top: 10%">
                                
                                <button type="submit" name="submit" class="btn btn-md" style="background-color: #f69c6f;color:#ffffff">Reset <i class="fa fa-refresh"> </i></button>
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
    $password = $_POST['password'];
    
    $sqlget = "UPDATE `master_dealer_register` SET `dealerPassword` = '$password' WHERE `dealerEmail` = '$email'";
    $sqldata = mysqli_query($dbcon,$sqlget) or die ('error 404');
    
    echo "<script>location='Login'</script>";    
  
}
?>


<script>
    function matchString(){
        var pass = document.getElementById('pass').value;
        var rePass = document.getElementById('rePass').value;
        
        if(rePass !== '' && pass!=rePass){
            //alert(pass+" "+rePass);
            document.getElementById('status').style.display = 'block';
            document.getElementById('status').style.color = 'red';
            document.getElementById('status').innerHTML= 'Password Mismatched';
        }else if(rePass !== '' && pass==rePass){
            //alert(pass+" "+rePass);
            document.getElementById('status').style.display = 'block';
            document.getElementById('status').style.color = 'green';
            document.getElementById('status').innerHTML= 'Password Matched';
        }else{
            document.getElementById('status').style.display = 'none';
        }
    }
</script>
</body>
</html>