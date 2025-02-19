<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Partner Login</title>
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
                        <form id="login-form" class="form" action="Login" method="post">
                            <h1 class="text-left heading" style="color:#f16724"><b>Login</b></h1>
                            <div class="form-group">
                                <label for="email">Email</label><br>
                                <input required type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label><br>
                                <input required type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group" style="text-align: center;margin-top: 10%">
                                <button type="submit" name="submit" class="btn btn-md" style="background-color: #f69c6f;color:#ffffff">Login <i class="fas fa-sign-in-alt"></i></button>
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
    $flag = 0;
    // if($category == "Contributor")
    // {
        $sqlget = "SELECT * FROM `master_dealer_register` WHERE `dealerEmail` = '$email' AND `dealerPassword` = '$password' ORDER BY `id` DESC LIMIT 1";
        $sqldata = mysqli_query($dbcon,$sqlget) or die ('error 404');
            while($rows = mysqli_fetch_assoc($sqldata)){
                $dealerEmail = $rows['dealerEmail'];
                $dealerPassword = $rows['dealerPassword'];
                $dealerStatus = $rows['conStatus'];
                $dealerCode = $rows['dealerRegCode'];
                $dealerName = $rows['dealerName'];
                $dealerCompany = $rows['dealerCompany'];  
            
            if($dealerEmail == $email && $dealerPassword == $password && $dealerStatus == '1'){
                $flag = 1;
                $_SESSION['dealerCode'] = $dealerCode;
                $_SESSION['dealerName'] = $dealerName;
                $_SESSION['dealerCompany'] = $dealerCompany;
                echo "<script>location='partner/Dashboard/'</script>";
                exit;
            }
            
            
        }
        if($flag == 0){
            echo "<script>alert('Wrong username or password.');</script>";
        }
        
        
    }
?>

</body>
</html>