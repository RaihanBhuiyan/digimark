<div class="row row-carousel" id="carouselRow">
  <!-- <div class="container"> -->
      

    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" style="width: 100% !important" data-ride="carousel">
  <!-- <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol><div class="carousel-inner"> -->
  <?php
  include('assets/database/config.php');
        $sql_mtnc = "SELECT * FROM `tbl_img_slider` WHERE `status` = '1' ORDER BY `sort` ASC";
        $result_mtnc = mysqli_query($dbcon,$sql_mtnc) or die ('error 404');
        $i=0;
            while($row_mtnc = mysqli_fetch_assoc($result_mtnc)){
              
              $image = $row_mtnc['image'];
              $url = $row_mtnc['url'];

              $colValOne = $row_mtnc['colValOne'];
              $itemTypeOne = $row_mtnc['itemTypeOne'];
              $itemOneOne = $row_mtnc['itemOneOne'];
              $itemOneTwo = $row_mtnc['itemOneTwo'];

              $colValTwo = $row_mtnc['colValTwo'];
              $itemTypeTwo = $row_mtnc['itemTypeTwo'];
              $itemTwoOne = $row_mtnc['itemTwoOne'];
              $itemTwoTwo = $row_mtnc['itemTwoTwo'];

        if($i==0)
          { echo '
            <div class="carousel-item active">
            <a href="'.$url.'">
              <img class="d-block w-100" id="car-img" draggable="false"  src="assets/images/carousel/'.$image.'" alt="'.$image.'">
              <div class="hero">
                <hgroup>
                  <div class="row row-carousel-inner">
                    <div class="'.$colValOne.' animated zoomInLeft slide-delay-4" style="margin:auto !important">';
                      if($itemTypeOne=='img'){
                        echo '<img class="img img-responsive" draggable="false"  src="assets/images/subcarousel/'.$itemOneOne.'" alt="'.$itemOneOne.'" style="max-width:100%">';
                      }else{
                        echo '<h2 class="WhiteText">'.$itemOneOne.'</h2>
                        <div class="animated bounceInLeft slide-delay-2">
                        <h3 class="WhiteText">'.$itemOneTwo.'</h3>
                        </div>';
                      }
                    echo '</div>
                    <div class="'.$colValTwo.' animated slideInRight slide-delay-4" style="margin:auto !important">';
                        if($itemTypeTwo=='img'){
                        echo '<img class="img img-responsive" draggable="false"  src="assets/images/subcarousel/'.$itemTwoOne.'" alt="'.$itemTwoOne.'" style="max-width:100%">';
                        }else{
                        echo '<h2 class="WhiteText">'.$itemTwoOne.'</h2>
                        <div class="animated bounceInLeft slide-delay-2">
                        <h3 class="WhiteText">'.$itemTwoTwo.'</h3>
                        </div>';
                        }
                    echo '</div>
                  </div> 
                </hgroup>
                <!--a class="btn btn-hero btn-lg animated zoomInUp slide-delay-1" role="button" href="javascript:void(0)">See all features</a-->
              </div></a>
            </div>';$i++;
          }
        else{echo '
            <div class="carousel-item">
            <a href="'.$url.'">
              <img class="d-block w-100" id="car-img" draggable="false"  src="assets/images/carousel/'.$image.'" alt="'.$image.'">
              <div class="hero">
                <hgroup>
                  <div class="row row-carousel-inner">
                    <div class="'.$colValOne.' animated zoomInLeft slide-delay-1" style="margin:auto !important">';
                      if($itemTypeOne=='img'){
                        echo '<img class="img img-responsive" draggable="false"  src="assets/images/subcarousel/'.$itemOneOne.'" alt="'.$itemOneOne.'" style="max-width:100%">';
                      }else{
                        echo '<h2 class="WhiteText">'.$itemOneOne.'</h2>
                        <div class="animated bounceInLeft slide-delay-2">
                        <h3 class="WhiteText">'.$itemOneTwo.'</h3>
                        </div>';
                      }
                    echo '</div>
                    <div class="'.$colValTwo.' animated slideInRight slide-delay-1" style="margin:auto !important">';
                        if($itemTypeTwo=='img'){
                        echo '<img class="img img-responsive" draggable="false"  src="assets/images/subcarousel/'.$itemTwoOne.'" alt="'.$itemTwoOne.'" style="max-width:100%">';
                        }else{
                        echo '<h2 class="WhiteText">'.$itemTwoOne.'</h2>
                        <div class="animated bounceInLeft slide-delay-2">
                        <h3 class="WhiteText">'.$itemTwoTwo.'</h3>
                        </div>';
                        }
                    echo '</div>
                  </div> 
                </hgroup>
                <!--a class="btn btn-hero btn-lg animated zoomInUp slide-delay-1" role="button" href="javascript:void(0)">See all features</a-->
              </div></a>
            </div>';}
      }
  ?>
  </div>
  <div id="other" style="display:block">
  <a class="carousel-control-prev" id="prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <!--<span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
    <!--<span class="sr-only">Previous</span>-->
  </a>
  <a class="carousel-control-next" id="next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <!--<span class="carousel-control-next-icon" aria-hidden="true" style="background-color:red"></span>-->
    <!--<span class="sr-only" style="display:none">Next</span>-->
  </a>
  </div><div id="ie" style="display:none">
  <a class="carousel-control-prev" id="prevIe" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" id="nextIe" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true" style="background-color:red"></span>
    <span class="sr-only" style="display:none">Next</span>
  </a>
  </div>
</div>


<!--   </div> -->
</div>


<style type="text/css">
#car-img{height:90vh;}
.row-carousel{
    margin: 0px !important;
    width: 100% !important;
    background-color: #ffffff;
    margin-top:0% !important;
    }
.row-carousel-inner{
    margin: 0px !important;
    width: 100% !important;
    margin-top:0% !important;
    }

img{
-webkit-user-select: none;
-moz-user-select: none;
-o-user-select: none;
user-select: none;
}

#prev {
    cursor: url("assets/images/prev.png"), auto;
}

#next {
    cursor: url("assets/images/next.png"), auto;
}



.carousel-control-next-icon {
  background-color: #f16724 !important;
  padding: 5% !important;
  height: 30px;
  width: 30px;
  border-radius: 50px;
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='white' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E");
}

.carousel-control-prev-icon {
  background-color: #f16724 !important;
  padding: 5% !important;
  height: 30px;
  width: 30px;
  border-radius: 50px;
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='white' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E");
}

.hero {
    max-width:50%;
    position: absolute;
    top: 50%;
    left: 50%;
    z-index: 3;
    color: #fff;
    text-align: center;
    text-transform: uppercase;
    text-shadow: 1px 1px 0 rgba(0,0,0,.75);
      -webkit-transform: translate3d(-50%,-50%,0);
         -moz-transform: translate3d(-50%,-50%,0);
          -ms-transform: translate3d(-50%,-50%,0);
           -o-transform: translate3d(-50%,-50%,0);
              transform: translate3d(-50%,-50%,0);
}

@media only screen and (max-width: 600px) {
  .hero {
    width:75% !important;
    position: absolute;
    top: 50%;
    left: 40%;
    z-index: 3;
    color: #fff;
    text-align: center;
    text-transform: uppercase;
    text-shadow: 1px 1px 0 rgba(0,0,0,.75);
      -webkit-transform: translate3d(-50%,-50%,0);
         -moz-transform: translate3d(-50%,-50%,0);
          -ms-transform: translate3d(-50%,-50%,0);
           -o-transform: translate3d(-50%,-50%,0);
              transform: translate3d(-50%,-50%,0);
}

.row-carousel-inner{
    width: 75vw !important;
    margin:auto !important;
    }
    #car-img{height:60vh;width:100%;overflow-x:hidden !important;}
}

.hero h2 {
    font-size: 4vw;    
    font-weight: bold;
    margin: 0;
    padding: 0;
    text-align: center;
    color: #f16724;
}
.hero h3 {
    font-size: 3vw;
    text-align: center;
    color: #f16724;
}
.fade-carousel .carousel-inner .item .hero {
    opacity: 0;
    -webkit-transition: 2s all ease-in-out .1s;
       -moz-transition: 2s all ease-in-out .1s; 
        -ms-transition: 2s all ease-in-out .1s; 
         -o-transition: 2s all ease-in-out .1s; 
            transition: 2s all ease-in-out .1s; 
}
.fade-carousel .carousel-inner .item.active .hero {
    opacity: 1;
    -webkit-transition: 2s all ease-in-out .1s;
       -moz-transition: 2s all ease-in-out .1s; 
        -ms-transition: 2s all ease-in-out .1s; 
         -o-transition: 2s all ease-in-out .1s; 
            transition: 2s all ease-in-out .1s;    
}

.WhiteText{
  color: white !important;
}
</style>

<script>
/* Sample function that returns boolean in case the browser is Internet Explorer*/
function isIE() {
  ua = navigator.userAgent;
  /* MSIE used to detect old browsers and Trident used to newer ones*/
  var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;
  
  return is_ie; 
}
/* Create an alert to show if the browser is IE or not */
if (isIE()){
    //alert('It is InternetExplorer');
     document.getElementById("ie").style.display = "block"; 
     document.getElementById("other").style.display = "none"; 
     document.getElementById("prev").style.cursor = "none"; 
     document.getElementById("next").style.cursor = "none"; 
}else{
    //alert('It is NOT InternetExplorer');
}
</script>
