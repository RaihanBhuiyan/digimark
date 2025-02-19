<?php
session_start();
if(!isset($_SESSION['userCode'])){
echo '<script>window.location="Logout";</script>';
}
?>
<!DOCTYPE html>
<html>
<head>
<?php
include('includes.php');
?>
</head>
<body>
<?php
include('../assets/database/config.php');
include('editItem.php');
?>
<?php include('sidebar.php');?>
<div class="card">
<div class="card-header"><h1>Manage Pending Dealer</h1></div>
<div class="card-body">
		<form action="Manage-Pending-Dealer" method="post">
			<div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">

                                <label for="username">Dealer Name</label>
                                  <input  readonly=""  required type="text" name="dealerName" class="form-control" placeholder="Dealer Name" value="<?php echo $dealerName;?>">


			    				<input type="text" name="code" value="<?php echo $dealerRegCode;?>" class="form-control" style="display: none">
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                <label for="username">Company Name</label>
                                  <input  readonly=""  required type="text" name="dealerCompany" class="form-control" placeholder="Company Name" value="<?php echo $dealerCompany;?>">
                                </div>
                              </div>

                               <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                <label for="username">Phone</label>
                                  <input  readonly=""  required type="text" name="dealerPhone" class="form-control" placeholder="Contact No." value="<?php echo $dealerPhone;?>">
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                <label for="username">Email</label>
                                  <input  readonly=""  required type="email" name="dealerEmail" class="form-control" placeholder="Email" value="<?php echo $dealerEmail;?>">
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                <label for="username">District</label>
                                  <input  readonly=""  required type="text" name="dealerDist" class="form-control" placeholder="Contact No." value="<?php echo $dealerDistCode;?>">
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                <label for="username">Address</label>
                                  <input  readonly=""  required type="text" name="dealerAddress" class="form-control" placeholder="Email" value="<?php echo $dealerAddress;?>">
                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12 mt-3">
              							  		<label>Status</label>
              							  		<select required  name="status" class="form-control">
              							  			<?php
              							  			if($dealerConStatus == '1' || $dealerConStatus == '0' || $dealerConStatus == 'X'){
              							  				if($dealerConStatus == '1'){
                                        echo '<option selected="" value="1">Confirm</option>
                                              <option value="0">Pending</option>
                                              <option value="X">Rejected</option>';
                                        } 
                                        elseif($dealerConStatus == '0'){ 
                                          echo '<option value="1">Confirm</option>
                                                <option selected="" value="0">Pending</option>
                                                <option value="X">Rejected</option>';
                                        } 
                                        elseif($dealerConStatus == 'X'){ 
                                          echo '<option value="1">Confirm</option>
                                                <option value="0">Pending</option>
                                                <option selected="" value="X" >Rejected</option>';
                                        }
              							  			}
                                    else{
              							  	// 		echo '<option selected="" value="1">Confirm</option>
              							  	// 		<option value="0">Pending</option>';
              							  			}
              							  			?>
              							  		</select>
							                 </div>
                            </div>

			<div class="col-md-12 col-sm-12 col-xs-12" style="text-align: right;margin-top: 2.5%">
                <button type="submit" name="submit" id="submit" class="btn btn-dark btn-md">Update <i class="fa fa-check"></i></button>
                
                <a id="showList" onclick="getList('Manage-Pending-Dealer-Active')" class="btn btn-info btn-md">Active List <i class="fa fa-bars"></i></a>
                <a id="showList" onclick="getList('Manage-Pending-Dealer')" class="btn btn-info btn-md">Pending List <i class="fa fa-bars"></i></a>
                <a id="showList" onclick="reload('Manage-Pending-Dealer')" class="btn btn-info btn-md">Clear <i class="fa fa-refresh"></i></a>

            </div>
			</form>
			</div>
</div>	

               
<div id="listResult" style="display: none">
	
</div>
</div>

<?php
 if(isset($_POST['submit'])){
    $code = $_POST['code'];
    $conStatus = $_POST['status'];
    $conDate = date(Ymd); 
    
    
    $dealerEmail = $_POST['dealerEmail'];
    

$cr_date = date(Ymd);
$cr_by = $_SESSION['userCode'];
    
        $sql  = "UPDATE `master_dealer_register` SET `conStatus` = '$conStatus' , `conDate` = '$conDate',`crDate` = '$cr_date',`crBy` = '$cr_by' WHERE `dealerRegCode` = '$code'";
		$result = mysqli_query($dbcon,$sql) or die ('error 404');
		
		
		if($conStatus == 1){
		ini_set('SMTP', "digimarkbd.com");
        ini_set('smtp_port', "25");
        ini_set('sendmail_from', "noreply@digimarkbd.com");
         $to = $dealerEmail;
         $subject = "Successful Partner Registration";
         
         $message = "Thank you for register with Digimark Solution. Your account is successfully verified. Now you can login to your dashboard.";
         
         $header = "From:noreply@digimarkbd.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);    
		}
		
// 		if($conStatus == 'X'){
// 		ini_set('SMTP', "digimarkbd.com");
//         ini_set('smtp_port', "25");
//         ini_set('sendmail_from', "noreply@digimarkbd.com");
//          $to = $dealerEmail;
//          $subject = "Rejected Partner Registration";
         
//          $message = "Sorry your registration has been rejected. Please contact Digimark Solution for further information";
         
//          $header = "From:noreply@digimarkbd.com \r\n";
//          $header .= "MIME-Version: 1.0\r\n";
//          $header .= "Content-type: text/html\r\n";
         
//          $retval = mail ($to,$subject,$message,$header);    
// 		}
        echo "<script>location='Manage-Pending-Dealer'</script>";



}
?>

</body>
</html>