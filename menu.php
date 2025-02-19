<?php 
include('assets/database/config.php');
?>
<link rel="stylesheet" href="assets/css1/bootnavbar.css">
<!--    <div class="row" style="background-color: #262626;color:#ffffff;font-size: 2vh;">
        <div class="col-md-2 col-sm-12" style="text-align: center;">
            <i class="fas fa-phone"> </i> 09678800078
        </div>
        <div class="col-md-8 col-sm-12 d-none d-md-block" style="text-align: center;">
        28/1/C, Rahmania International Complex (1st Floor), Toyenbee Circular Road, Motijheel,Dhaka-1000
        </div>
        <div class="col-md-2 col-sm-12 d-none d-md-block" style="text-align: center;">
            <i class="fab fa-facebook-f" style="width:10%;text-align:center;padding:1%;background-color: #ffffff;color: #3b5998"></i>
            <i class="fab fa-youtube" style="width:10%;text-align:center;padding:1%;background-color: #ffffff;color: red"></i>
            <i class="fab fa-twitter" style="width:10%;text-align:center;padding:1%;background-color: #ffffff;color: #00acee"> </i>
        </div>
    </div> -->
<?php
$sql  = "SELECT `hotline`,`whatsapp`,`gmail` FROM `master_social` ORDER BY `id` DESC LIMIT 1";
$result = mysqli_query($dbcon,$sql) or die ('error 404');
            while($row = mysqli_fetch_assoc($result)){
            $hotline = $row['hotline'];
            $whatsapp = $row['whatsapp'];
            // $facebook = $row['facebook'];
            // $youtube = $row['youtube'];
            // $linkedin = $row['linkedin'];
            // $pinterest = $row['pinterest'];
            // $instagram = $row['instagram'];
            $gmail = $row['gmail'];
        }
?>
<div class="row menu-head-row d-none d-md-block" style="">
    <div class="row" style="">
        <div class="col-md-6 col-sm-12 col-12" id="top-bar" style="text-align: left;">
        <a href="tel:<?php echo $hotline;?>" style="color: #ffffff;padding-right: 5%"><i class="fas fa-headset"></i> <?php echo $hotline;?></a>
        <a href="<?php echo $whatsapp;?>" target="_blank" style="color: white"><i class="fab fa-facebook-messenger"></i> Live Chat</a>
        </div>
        <div class="col-md-6 col-sm-12 col-12" id="top-bar" style="text-align: right;">
        <a href="mailto:<?php echo $hotline;?>" style="color: #ffffff;"><i class="fas fa-envelope"> </i> <?php echo $gmail;?></a>
        </div>
    </div>
</div>
<div class="row menu-head-row d-md-none" style="background-color: #000000;color:white;margin-left: 0px;margin-right: 0px;font-size: 15px;">
    <div class="row" style="padding-left:5%;padding-right:5%">
        <div class="col-md-6 col-sm-12 col-12" id="top-bar" style="text-align: center;">
        <a href="tel:<?php echo $hotline;?>" style="color: #ffffff;padding-right: 5%"><i class="fas fa-headset"></i> <?php echo $hotline;?></a>
        <a href="<?php echo $whatsapp;?>" target="_blank" style="color: white"><i class="fab fa-facebook-messenger"></i> Live Chat</a>
        </div>
        <div class="col-md-6 col-sm-12 col-12" id="top-bar" style="text-align: center;">
        <a href="mailto:<?php echo $hotline;?>" style="color: #ffffff;"><i class="fas fa-envelope"> </i> <?php echo $gmail;?></a>
        </div>
    </div>
</div>


<nav class="navbar sticky-top navbar-expand-lg navStyle" id="main_navbar"style="padding:0px;padding-bottom:0.5%;background-color: #ffffff;width: 100% !important">


<div class="row d-lg-none" style="box-shadow:rgba(217, 217, 242,0.5);width: 100% !important;margin:0%;box-shadow: 0px 0px 3px rgba(0,0,0,0.2);padding:0% !important;z-index: 1 !important">
    <div class="col-4" style="text-align: left !important;padding-top:0.75%;padding-bottom:0.75%;padding-left:5.25%">
        <a href="Login" style="color:#262626;font-size: 14px;font-weight: bold;"><i class="fas fa-user"></i> Login</a>
    </div>
    <div class="col-6" style="text-align: center !important;padding-top:0.75%;padding-bottom:0.75%">
        <a href="quotation" style="color:#262626;font-size: 14px;font-weight: bold;"><i class="fas fa-gears"></i> Build-Solution</a>
    </div>
    <div class="col-2" style="text-align: right; !important;padding-top:0.75%;padding-bottom:0.75%;padding-right:5%">
        <a href="javascript:void(0)" style="color:#262626;font-size: 15px;font-weight: bold" onclick="myFunction()"><i class="fas fa-search"></i></a>
        <!-- <form class="form-inline">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" style="border-radius:0px;height:30px !important;">
        </form> -->
    </div>
    <div class="col-12" id="searchDiv" style="display: none;padding: 1%">
        
        <?php include('searchTab.php');?>
        <!-- <div id="searchResult" class="form-control" style="display:none;width: 100%;max-height: 20vh">
        </div> -->
    </div>
</div>



    <a class="brand-navbar" href="Home" style="height: 100% !important">
      <img src="assets/images/logo.png" alt="Responsive image" id="navImg" style="max-width: 40%;margin-left: 5vw;margin-top:2.5%;margin-bottom:2%">
    </a>
        <button class="navbar-toggler" data-toggle="collapse" role="button" data-target="#navbarSupportedContent" style="padding-right:5%">
            <span><i class="fas fa-align-right iconStyle"></i></span>
        </button>
        <!-- <button class="navbar-toggler" data-toggle="collapse" data-target="#mainMenu">
        <span><i class="fas fa-align-right iconStyle"></i></span></button> -->

        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="padding-left:5% !important;">
           <ul class="navbar-nav ml-auto" style="margin-right: 4.90vw">
             <!--<ul class="navbar-nav ml-auto" style="margin-right: 6.25%">-->
                <!-- <li class="nav-item active">
                    <a class="nav-link" href="Home"><i class="fas fa-home"></i> Home</a>
                </li> -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        ABOUT
                    </a>
                    <ul class="dropdown-menu" id="sub1" aria-labelledby="navbarDropdown">
                <?php
                $sql1 = "SELECT `about_code`,`about_status` FROM `tbl_about_section`";
                $result1 = mysqli_query($dbcon,$sql1) or die ('error 404');
                        while($row1 = mysqli_fetch_assoc($result1)){
                            $about_code = $row1['about_code'];
                            $about_status = $row1['about_status'];
                    
                    if($about_code == 'PG0001' && $about_status == 1)
                    echo '<li><a class="dropdown-item" href="brand-story">Brand Story</a></li>';
                    elseif($about_code == 'PG0002' && $about_status == 1)
                    echo '<li><a class="dropdown-item" href="mission-and-vision">Mission & Vision</a></li>';
                    elseif($about_code == 'PG0003' && $about_status == 1)
                    echo '<li><a class="dropdown-item" href="why-digimark-solution">Why Us</a></li>';
                    elseif($about_code == 'PG0004' && $about_status == 1)
                    echo '<li><li><a class="dropdown-item" href="awards">Award & Certificates</a></li>';
                    elseif($about_code == 'PG0005' && $about_status == 1)
                    echo '<li><a class="dropdown-item" href="ceo-speech">CEO\'s Speech</a></li>';
                    elseif($about_code == 'PG0006' && $about_status == 1)
                    echo '<li><a class="dropdown-item" href="team-digimark">Our Team</a></li>';
                    elseif($about_code == 'PG0007' && $about_status == 1)
                    echo '<li><a class="dropdown-item" href="life-at-digimark">Life at Digimark</a></li>';
                    }
                    ?>
                    </ul>
                </li>

                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PRODUCTS</a>
                    <ul class="dropdown-menu" id="sub1" aria-labelledby="navbarDropdown">
                <?php
                // $sql1 = "SELECT DISTINCT `tbl_product`.`product_category` AS `cat_code`,`tbl_category`.`category_name` AS `cat_name`,`tbl_category`.`category_url` AS `cat_url` FROM `tbl_product` LEFT JOIN `tbl_category` ON `tbl_product`.`product_category` = `tbl_category`.`category_code` WHERE `tbl_product`.`product_category` IN (SELECT DISTINCT `tbl_product`.`product_category` FROM `tbl_product`) AND `category_status` = '1' AND `menu_sort` > 0 ORDER BY `menu_sort` ASC";
                // $result1 = mysqli_query($dbcon,$sql1) or die ('error 404');
                //         while($row1 = mysqli_fetch_assoc($result1)){
                //             $cat_code = $row1['cat_code'];
                //             $cat_name = $row1['cat_name'];
                //             $cat_url = $row1['cat_url'];

                //             echo '<li><a class="dropdown-item" href="collections/'.$cat_url.'">'.ucfirst($cat_name).'</a></li>';
                //         }echo '<li><a class="dropdown-item" href="products-&-solutions" style="color:#f16724 !important"><b>Show All Products & Solutions</b></a></li>';
                
                ?>

                                            
                    </ul>
                </li> -->

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PRODUCTS</a>
                    <ul class="dropdown-menu" id="sub1" aria-labelledby="navbarDropdown">
                <?php
                $i=0;
                $sql1 = "SELECT DISTINCT `tbl_product`.`product_category` AS `cat_code`,`tbl_category`.`category_name` AS `cat_name`,`tbl_category`.`category_url` AS `cat_url` FROM `tbl_product` LEFT JOIN `tbl_category` ON `tbl_product`.`product_category` = `tbl_category`.`category_code` WHERE `tbl_product`.`product_category` IN (SELECT DISTINCT `tbl_product`.`product_category` FROM `tbl_product`) AND `category_status` = '1'";
                $result1 = mysqli_query($dbcon,$sql1) or die ('error 404');
                        while($row1 = mysqli_fetch_assoc($result1)){
                            $i++;
                            $cat_code = $row1['cat_code'];
                            $cat_name = $row1['cat_name'];
                            $cat_url = $row1['cat_url'];

                  echo '<li class="nav-item dropdown">
                        <a class="dropdown-item dropdown-toggle d-none d-md-block" id="navbarDropdown'.$i.'" data-url="'.$cat_url.'" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$cat_name.'</a>

                        <a class="dropdown-item dropdown-toggle d-sm-none" id="navbarDropdown'.$i.'" data-url="'.$cat_url.'" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$cat_name.'</a>
                                            <ul class="dropdown-menu" id="sub2" aria-labelledby="navbarDropdown'.$i.'">';
                

                                    
                                    $sql2 = "SELECT DISTINCT `tbl_subcategory`.`subcategory_name` AS `subcategory_name`,`tbl_subcategory`.`subcategory_url` AS `subcategory_url` FROM  `tbl_subcategory` WHERE `tbl_subcategory`.`category_code` = '$cat_code' AND `tbl_subcategory`.`subcategory_status` = '1'";
                                    $result2 = mysqli_query($dbcon,$sql2) or die ('error 404');
                                            while($row2 = mysqli_fetch_assoc($result2)){
                                                $subcategory_name = $row2['subcategory_name'];
                                                $subcategory_url = $row2['subcategory_url'];
                                                    echo '<li><a class="dropdown-item" href="collections/'.$subcategory_url.'">'.$subcategory_name.'</a></li>';
                                            }       
                                            echo '<li><a class="dropdown-item d-sm-none" href="collections/'.$cat_url.'" style="font-weight:bold;color:#f16724 !important">View All</a></li>';

                                        echo'</ul>
                                    </li>';
                        }
                ?>
                                 
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="brands-we-represent">BRANDS</a>
                </li>
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Read
                    </a>
                    <ul class="dropdown-menu" id="sub1" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="Read-News">News</a></li>
                    <li><a class="dropdown-item" href="Blogs">Blogs</a></li>
                    <li><a class="dropdown-item" href="Case-Study">Case Studies</a></li>
                    </ul>
                </li> -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">SUPPORT</a>
                    <ul class="dropdown-menu" id="sub1" aria-labelledby="navbarDropdown">
                    <?php
                    $sql2 = "SELECT * FROM `tbl_support_menu` WHERE `status`='1' ORDER BY `menuSort` ASC";
                    $result2 = mysqli_query($dbcon,$sql2) or die ('error 404');
                            while($row2 = mysqli_fetch_assoc($result2)){
                                $menuName = $row2['menuName'];
                                $menuUrl = $row2['menuUrl'];
    
                                echo '<li><a class="dropdown-item" href="'.$menuUrl.'" target="_blank">'.$menuName.'</a></li>';
                            }
                        ?>
                    </ul>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link" href="Login"><i class="fas fa-user"></i> PARTNER LOGIN</a>
                </li>

                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link" id="build" href="quotation" style=""><i class="fas fa-gears"></i> Build Solution</a>
                </li>

                <li class="nav-item d-none d-lg-block" style="border-left:1px solid white">
                    <a class="nav-link" id="build" href="javascript:void(0)" onclick="searchControl()" style="color:transparent !important">s<i class="fas fa-search" style="color:white !important"></i>s</a>
                </li>
            </ul>
    </nav>

<div id="overlay" style="display: none;">
    <div id="searchBox2">

            <div class="col-12">
                <button class="btn btn-sm float-right" style="font-size:25px;font-weight:bold;color:rgba(255, 0, 0,0.6);z-index:9999;position: absolute;right: 0px;top: 0px;border: none;background-color: white;border-radius: 0px" 
                onclick="searchControl()">X</button>
            </div>
    <h2 style="color:#ffffff">Search...</h2>
    <!--action="Result-All" method="post"-->
    <!--<form class="form-inline"> -->
        <input class="form-control" id="search2" type="text" placeholder="Search" aria-label="Search2" autocomplete="off" name="keyWord" onkeyup="getResult(this.id)">
    <!--</form>-->
    <div id="searchResult2" class="form-control" style="margin-top:1vh;"></div>
    </div>
</div>



<button onclick="topFunction()" id="myBackToTopBtn" title="Go to top"><b><i class="fas fa-chevron-up"></i></b></button>

<script>
// $(document).ready(function() {
//     $(".dropdown-toggle").dropdown();
// });

// $(".navbar-toggler").click(function(event) {
//     $(".navbar-collapse").toggle();
//   });
</script>


<script type="text/javascript">
//Get the button
var mybutton = document.getElementById("myBackToTopBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction(), 1000};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

<script type="text/javascript">
function searchControl() {
  var x = document.getElementById("overlay");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
} 
</script>




<script type="text/javascript">
function myFunction() {
  var x = document.getElementById("searchDiv");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
} 
</script>
<style type="text/css">
.menu-head-row{
    margin-left:0px !important;
    margin-right:0px !important;
    padding-left:5%;
    padding-right:5%;
    background-color: #000000;
    color:white;font-size: 15px;
}
nav{
/*box-shadow: 0px 3px 3px 3px rgba(230, 230, 230,0.25);*/
/*box-shadow: 0px 2px 2px 2px rgba(217, 217, 242,0.5);*/
box-shadow: 0px 0px 0px 2px rgba(242, 242, 242,0.5);
/*padding-top: 0px !important;6/4*/
/*    padding-top: 0px !important;
    padding-bottom: 0px !important;*/
}

#sub1{border-left:1px solid #262626;min-width: 300px;}
#sub2{border-left:1px solid #4c4d4f;min-width: 300px;}
#sub3{border-top:3px solid #262626;}
#build{color: #ffffff;background-color:#000000;}
#build:hover{background-color: #4c4d4f;color:#f69c6f;}

.navbar-nav{
    margin-top: 9px !important;
}
.nav-link{
        /*font-family: 'Arial', Sans Sarif;*/
        color:  #000000;
        /*font-size: 1.95vh;*/
        /*font-weight: bold;*/
        padding-left: 5px;
        padding-right: 5px;
        font-size: 14px;
        /*height: 100% !important;
        margin-top:9px !important;*/
    }
.nav-link:focus {
  outline: 1px solid #f69c6f;
}
@media only screen and (max-width: 600px) {
    .nav-link{
        padding-left:2% !important;
    }
}
.nav-link:hover{
        background-color: #000000;
        color: #f69c6f;
    }

.dropdown-menu{
    margin: 0px !important;
    padding: 0px !important;
    background-color: #000000 !important;
    border-radius: 0px !important;
    }
.dropdown-item{
    font-size: 14px;
    color: #ffffff !important;
    /*font-weight: bold;*/
    border-bottom: 1px solid rgba(241, 103, 36, 0.1);/*#4c4d4f;*/
  }
.dropdown-item:hover{
    color: #000000 !important;
    background-color: #ffffff !important;
  }

.blink_me_top {
  animation: blinker 1s linear infinite;
  color: #ffffff;
  font-size: 20px !important;
  padding: 0.5%;
}

#top-bar > a:hover{
    text-decoration: none;
}


</style>
    <script type="text/javascript">
        // $(function () {
        //     $('#main_navbar').bootnavbar();
        // });

        // $('.nav-item .dropdown > a:not(a[href="#"])').on('click', function() {
        //     self.location = $(this).attr('href');
        // });
        
    </script>

<script>
$('#search2').keypress(function (e) {
  if (e.which == 13) {
        var keyWord = document.getElementById('search2').value;
        location="Result-All/"+keyWord;
  }
});
</script>



<!--sub_cat version-->
<script type="text/javascript"> 
$(function () {
    $('#main_navbar').bootnavbar();
});
</script>


<script type="text/javascript">
for(i=0;i<=99;i++){
        jQuery("#navbarDropdown"+i).click(function(e){
        var loc= $(this).attr("data-url");
        window.location.replace('collections/'+loc);
        e.preventDefault();
        });
}
</script>
<style type="text/css">
    .dropdown-item{
        cursor: pointer;
    }
</style>
<!--sub_cat version-->
<script src="assets/js1/bootnavbar.js" ></script>

<!--sub_cat version-->

    <!--<script src="assets/js1/bootnavbar.js" ></script>-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>-->
    <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>-->
    <!--<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>-->
    <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->




