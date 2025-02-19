<!DOCTYPE html>
<html>
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
<body onload="check()">

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
                        <form id="Registration-form" class="form" action="basic-info" method="post">
                            <h1 class="heading text-left" style="margin-bottom: 2.5%"><b>Ask For Quotation</b></h1>
                              <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                <label for="username">Name</label>
                                  <input required type="text" name="visitorName" class="form-control" placeholder="Name">
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                <label for="username">Company Name (Optional)</label>
                                  <input type="text" name="visitorCompany" class="form-control" placeholder="Company Name">
                                </div>
                              </div>

                               <div class="row" style="margin-top:1%">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                <label for="username">Phone</label>
                                  <input required type="text" name="visitorPhone" class="form-control" placeholder="Contact No.">
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                <label for="username">Email</label>
                                  <input required type="email" name="visitorEmail" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            </div>
                            
                            <div class="form-group" style="text-align: center;margin-top: 2.5%">
                                <!--label for="remember-me"><span>Remember me</span><span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br-->
                                <button type="submit" name="submit" id="submit" class="btn btn-md"  style="background-color: #f69c6f;color:#ffffff">Send Me Quotation <i class="fas fa-envelope"></i></button>
                            </div>
                            <div id="register-link" class="col-md text-center" style="margin-top: 2.5%;margin-bottom: 2.5%">
                                <a href="quotation">Back to Build System</a>
                            </div>
                            <input type="text" name="rx" id="rx" style="display:none" value="<tr><td><b>Category</b></td><td><b>Name</b></td><td><b>Quantity</b></td></tr>"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div id='product-container'></div>
<?php 
include('footer.php');
?>
<?php
if(isset($_POST['submit'])){
    $rx = addslashes($_POST['rx']);
    $visitorName = $_POST['visitorName'];
    $visitorCompany = $_POST['visitorCompany'];
    $visitorPhone = $_POST['visitorPhone'];
    $visitorEmail = $_POST['visitorEmail'];
    
    
    ini_set('SMTP', "digimarkbd.com");
        ini_set('smtp_port', "25");
        ini_set('sendmail_from', "noreply@digimarkbd.com");
         $to = $visitorEmail;
         $subject = "Asking Quotation";
         
         $message = "Thank you for asking quotation. Digimark team will get back to you as soon as possible.</b><br>Asking Quotation for:<br>".$rx;
         
         $header = "From:noreply@digimarkbd.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         
         
         
    ini_set('SMTP', "digimarkbd.com");
        ini_set('smtp_port', "25");
        ini_set('sendmail_from', "noreply@digimarkbd.com");
         $to = 'tech@digimarkbd.com';
         //$to = 'singlebititsolutions@gmail.com';
         $subject = "Asking Quotation : ".$visitorEmail;
         
         $message = "Name : ".$visitorName."<br>Comapny : ".$visitorCompany."<br>Phone : ".$visitorPhone."<br>Email : ".$visitorEmail."<br>Asking Quotation for:<br>".$rx;
         
         $header = "From:noreply@digimarkbd.com \r\n";
         $header .= "Cc:sales2@digimarkbd.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
    
}

?>


<script>
function check(){
    var i;
    locItem = parseInt(localStorage.getItem("getID"));
            for(i=1;i<=locItem;i++){

                if(localStorage.getItem("row_"+i+"_category")!== 'Empty')
                {
                    // $('#rx').val($('#rx').val() + '<div class="row" id="row_'+i+'" style="margin-top:1%">Category : '+localStorage.getItem("row_"+i+"_category")+'<br>Product : '+localStorage.getItem("row_"+i+"_name")+', Quantity : '+localStorage.getItem("row_"+i+"_qty")+'</div></div>');
                    
                    // $('#rx').val($('#rx').val() + '<tr><td>Category : '+localStorage.getItem("row_"+i+"_category")+'</td><td>Product : '+localStorage.getItem("row_"+i+"_name")+'</td><td>Quantity : '+localStorage.getItem("row_"+i+"_qty")+'</td></tr>');
                    $('#rx').val($('#rx').val() + '<tr><td>'+localStorage.getItem("row_"+i+"_category")+'</td><td>'+localStorage.getItem("row_"+i+"_name")+'</td><td>'+localStorage.getItem("row_"+i+"_qty")+'</td></tr>');
                 
                }
            }
            
}
</script>

<style>
    .qtb{
        border:1px solid black !important;
    }
</style>
</body>
</html>