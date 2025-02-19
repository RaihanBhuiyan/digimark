<?php 
$sql  = "SELECT * FROM `master_social` ORDER BY `id` DESC LIMIT 1";
$result = mysqli_query($dbcon,$sql) or die ('error 404');
      while($row = mysqli_fetch_assoc($result)){
      $hotline = $row['hotline'];
      $whatsapp = $row['whatsapp'];
      $facebook = $row['facebook'];
      $youtube = $row['youtube'];
      $linkedin = $row['linkedin'];
      $pinterest = $row['pinterest'];
      $instagram = $row['instagram'];
      $twitter = $row['twitter'];
      $gmail = $row['gmail'];
    }
?>

<div class="row row-footer">
  <div class="row-footer-inner" style="border-bottom: 1px solid gray">
  <div class="col-12">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-12 col-12" style="text-align: left;padding-left: 2vw;padding-right: 2vw;padding-top: 0%">
          <img class="img img-responsive" alt="No Image" src="assets/images/footer_white_logo.svg" style="width: 50%;margin:5%;margin-left:0px">
          <p class="p-footer" style="font-size:14px">Rahmania International Complex (1st Floor), 28/1/C, Toyenbee Circular Road, Motijheel, Dhaka-1000</p>
          <p class="p-footer">
            <i class="fa fa-phone text-theme-color-2 mr-2"></i> <a class="text-gray" href="#">+880 96788 000 78</a><br>
            <i class="fa fa-envelope text-theme-color-2 mr-2"></i> <a class="text-gray" href="#">info@digimarkbd.com</a><br>
            <i class="fa fa-globe text-theme-color-2 mr-2"></i> <a class="text-gray" href="#">www.digimarkbd.com</a>
          </p>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-6 col-6"style="padding-left: 2vw;padding-right: 2vw;padding-top: 1vw;">
                <table>
                  <tr style='text-align:left'> <th>Information</th></th></tr>
                  <tr> <td><a class="text-gray" href="Careers">Career</a></td></tr>
                  <tr> <td><a class="text-gray" href="news">News</a></td></tr>
                  <tr> <td><a class="text-gray" href="blog">Blogs</a></td></tr>
                  <tr> <td><a class="text-gray" href="case-study">Case Studies</a></td></tr>
                  <tr> <td><a class="text-gray" href="press-release">Press Release</a></td></tr>
                </table>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-6 col-6"style="padding-left: 2vw;padding-right: 2vw;padding-top: 1vw;">
                <table>
                  <tr style='text-align:left'> <th>Quick Links</th></tr>
                  <tr> <td><a class="text-gray" href="ceo-speech">CEO Speech</a></td></tr>
                  <tr> <td><a class="text-gray" href="products-&-solutions">Products & Solutions</a></td></tr>
                  <tr> <td><a class="text-gray" href="brands-we-represent">Brands</a></td></tr>
                  <tr> <td><a class="text-gray" href="quotation">Build Solution</a></td></tr>
                  <tr> <td><a class="text-gray" href="Login">Partner Login</a></td></tr>
                </table>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12 col-12"style="padding-left: 2vw;padding-right: 2vw;padding-top: 1vw;"><table>
                <table class="footer-contact">
                  <tr style="border-bottom:none;text-align:left"> <th><b>Contact Us</b></th></tr>
                  
                  <tr style="border-bottom:none"> <td><input  id="Name" class="form-control lightgray" placeholder="Name**" type="text" name="conName" style="border-radius:0px;"></td></tr>
                  <tr style="border-bottom:none"> <td><input type="email" id="Email"  class="form-control lightgray" placeholder="Email**" required name="conEmail" style="border-radius:0px;"></td></tr>
                  <tr style="border-bottom:none"> <td><textarea id="Message"  class="form-control lightgray" placeholder="Message**" name="text" style="border-radius:0px"></textarea></td></tr>
                  <tr style="border-bottom:none"> 
                    <td>
                    <div class="input-group">
                        <input type="text" class="form-control lightgray" id="capValue" readonly name="capValue" data-cap="" style="border-radius:0px;font-weight:bold;text-align: center;font-size: 20px;color:#f69c6f;" />
                        <input type="text" class="form-control lightgray" placeholder="Enter The Result**" id="entryValue" name="entryValue" style="border-radius:0px;"/>
                    </div>

                    </td>
                  </tr>
                  <tr style="border-bottom:none"> <td colspan="2" class="text-md-right text-center"><input class="btn btn-md btn-success" type="button" name="send" value="send" style="margin-top:10px;width:50%;background-color:#f69c6f !important;
                  border-radius:0px;border:1px solid transparent" disabled="true" id="btnCaptcha" onclick="sendMessage()"></td></tr> 
                </table>               
        </div>
      </div>
    </div>
  </div>

      <div class="row-footer-inner">
  <div class="col-12">
        <div class="row">
         <div class="col-12" style="text-align: center;padding-bottom: 1%;font-size:20px">
          <a href="<?php echo $facebook;?>"><i class="fab fa-facebook-f" style="width:auto;text-align:center;padding:0.5%;color: gray;padding: 1%;color:rgba(255,255,255,0.8) !important"></i></a>
          <a href="<?php echo $youtube;?>"><i class="fab fa-youtube" style="width:auto;text-align:center;padding:0.5%;color:gray;padding: 1%;color:rgba(255,255,255,0.8) !important"></i></a>
          <a href="<?php echo $linkedin;?>"><i class="fab fa-linkedin" style="width:auto;text-align:center;padding:0.5%;color: gray;padding: 1%;color:rgba(255,255,255,0.8) !important"> </i></a>
          <a href="<?php echo $pinterest;?>"><i class="fab fa-pinterest" style="width:auto;text-align:center;padding:0.5%;color:gray;padding: 1%;color:rgba(255,255,255,0.8) !important"> </i></a>
          <a href="<?php echo $instagram;?>"><i class="fab fa-instagram" style="width:auto;text-align:center;padding:0.5%;color: gray;padding: 1%;color:rgba(255,255,255,0.8) !important"> </i></a>
          <a href="<?php echo $twitter;?>"><i class="fab fa-twitter" style="width:auto;text-align:center;padding:0.5%;color: gray;padding: 1%;color:rgba(255,255,255,0.8) !important"> </i></a>
        </div>
      

        <div class="col-12" style="text-align: center;">
          <label style="color:gray"><b>&copy; Digi-Mark Solution</b>, 2006 - <?php echo date('Y');?></label>
          <label style="color:gray">Design & Developed By, <a href="https://sbitsbd.com" style="color:green"><b>SBITS</b></a></label>
        </div>
        </div>
      </div>
  </div>
</div>
  <style type="text/css">
  .row-footer{
  margin: 0px !important;
  width: 100% !important;
  min-height: 5vh;
  padding-top: 1%;
  padding-bottom: 1.5%;
  margin-top: 2.5%;
  /*background-image: url('assets/images/background/home-footer-bg.jpg');*/
  background-color: rgba(0,0,0,1);
  background-size: cover;
  background-repeat: no-repeat;
  }
  .row-footer-inner{
  margin: 0px !important;
  width: 100% !important;
  min-height: 5vh;
  padding-top: 1%;
  padding-bottom: 1.5%;
  margin-top: 2.5%;
  /*background-color: rgba(0,0,0,0.2);*/
  margin-right: 5% !important;
  margin-left: 5% !important;
  }
  .text-gray{
    color: rgba(255,255,255,0.8);
  }.text-gray:hover{
    text-decoration: none;
    color: white;
  }
  .p-footer{color: #ffffff;margin-top: 2%}
  table{color: rgba(255,255,255,0.8);table-layout: fixed;
    width: 100%;}
  .footer-contact th{line-height: 5vh;font-weight: bold;font-size: 20px;width: 100% !important;margin:auto}
  .footer-contact tr{border-bottom: 0px dashed gray;line-height: 3vh;width: 100% !important;margin:auto}

  .lightgray{background-color: black;margin-bottom: 5px;border:none;border-bottom:1px solid rgba(255,255,255,0.8);}
  </style>

  <script type="text/javascript">
    document.getElementById('entryValue').value = '';
    var val1 = Math.floor(Math.random() * 10);
    var val2 = Math.floor(Math.random() * 10);
    document.getElementById('capValue').value = val1+'+'+val2+'=';

    document.getElementById('capValue').setAttribute('data-cap',(val1+val2));
    $("#entryValue").keyup(function(){
      var g1 = document.getElementById('capValue').getAttribute('data-cap'); 
      var g2 = document.getElementById('entryValue').value;
      
      if(g1 == g2){document.getElementById('btnCaptcha').removeAttribute("disabled");}
      else{document.getElementById('btnCaptcha').setAttribute("disabled", ""); }
    });
  </script>
  
  <script type="text/javascript">
    function sendMessage(){
    var name = document.getElementById('Name').value;
    var email = document.getElementById('Email').value;
    var vrf = email.includes("@");
    var message = document.getElementById('Message').value;
    
    if(vrf == true){
        $.ajax({
          type:"post",
          url:"sendMessage.php",
          data:{name:name,email:email,message:message},
          success:function(data)
          {
            if(!data){
              // document.getElementById('listResult').style.display="none";
            }else{
              if(data !== ''){
              alert('message sent successfully');
              }else{
                //alert(data);
              // document.getElementById('listResult').style.display="none";
              }
            }
                
          }
        });
    }else{
        alert('Provide Correct Email Address');
    }
    }
  </script>
<style type="text/css">
      input:read-only {
  background-color: black !important;
}
  </style>
  
  <script>
/* To Disable Inspect Element */
// $(document).bind("contextmenu",function(e) {
//  e.preventDefault();
// });

// $(document).keydown(function(e){
//     if(e.which === 123){
//       return false;
//     }
// });
</script>

<script>
// document.onkeydown = function(e) {
// if(event.keyCode == 123) {
// return false;
// }
// if(e.ctrlKey && e.keyCode == 'E'.charCodeAt(0)){
// return false;
// }
// if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
// return false;
// }
// if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
// return false;
// }
// if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
// return false;
// }
// if(e.ctrlKey && e.keyCode == 'S'.charCodeAt(0)){
// return false;
// }
// if(e.ctrlKey && e.keyCode == 'H'.charCodeAt(0)){
// return false;
// }
// if(e.ctrlKey && e.keyCode == 'A'.charCodeAt(0)){
// return false;
// }
// if(e.ctrlKey && e.keyCode == 'F'.charCodeAt(0)){
// return false;
// }
// if(e.ctrlKey && e.keyCode == 'E'.charCodeAt(0)){
// return false;
// }
// }
</script>

<script>
// Object.defineProperty(window, "console", {
//     value: console,
//     writable: false,
//     configurable: false
// });    
</script>