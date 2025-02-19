<?php
session_start();
?>
<!DOCTYPE html>
<html>
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
            <!-- <div class="col-md text-center" style="">
                <img src="assets/images/logo.png">
            </div> -->
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="admin-panel-login" method="post">
                            <h1 class="text-left heading" style="color:#f16724"><b>Admin Login</b></h1>
                            <div class="form-group">
                                <label for="email">Email</label><br>
                                <input required type="email" name="email" id="email" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label><br>
                                <input required type="password" name="password" id="password" value="" class="form-control">
                            </div>
                            <div class="form-group" style="text-align: center;margin-top: 10%">
                                
                                <button type="submit" name="submit" class="btn btn-md" style="background-color: #f69c6f;color:#ffffff">Login <i class="fas fa-sign-in-alt"></i></button>
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
        echo $sqlget = "SELECT * FROM `master_user` WHERE `userEmail` = '$email' AND `userPassword` = '$password' AND `status` = 1";
        $sqldata = mysqli_query($dbcon,$sqlget) or die ('error 404');
         while($rows = mysqli_fetch_assoc($sqldata)){
            $_SESSION['userCode'] = $userCode = $rows['userCode'];
            $_SESSION['userName'] = $userName = $rows['userName'];
            $_SESSION['userDesignation'] = $userDesignation = $rows['userDesignation'];
        }

        echo "<script>location='adminPanel/'</script>";
        exit;
    }
?>

</body>
</html>