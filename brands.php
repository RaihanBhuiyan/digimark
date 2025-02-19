<div class="row row-brand">
        <div class="col-12">
            <h2 class="heading" style="color:#ffffff"><b>BRANDS</b></h2>
        </div>
        <div class="col-12" style="text-align:center">
                <div class="brand-img-container">
                    <div class="row d-flex justify-content-center">
                        <?php
                        $sql2 = "SELECT * FROM `tbl_brand` WHERE `brand_status` = '1'AND `brand_sort` != '0' ORDER BY `brand_sort` ASC LIMIT 4";
                    	$result2 = mysqli_query($dbcon,$sql2) or die ('error 404');
                        while($row2 = mysqli_fetch_assoc($result2)){
                            $brand_code = strtoupper($row2['brand_code']);
                            $brand_name = strtoupper($row2['brand_name']);
                            $brand_image = $row2['brand_image'];
                            $brand_url = $row2['brand_url'];

                            echo    '<div class="col-md-3 col-sm-4 col-12">
                                        <div id="pcontainer-brand-home" style="">
                                        <a href="brand-collections/'.$brand_url.'">
                                        <img src="assets/images/brand/'.$brand_image.'" alt="'.$brand_image.'" style="">
                                        </a>
                                    </div>
                                    </div>';    
                            }  
                        ?>  	
                    </div>

                </div>
        </div>
        <div class="container" style="padding-top:1.5%">
            <a href="brands-we-represent" class="btn btn-xs btn-warning" style="border-radius: 0px">View All <i class="fas fa-arrow-circle-right"></i></a>
        </div>
</div>

<style type="text/css">
   .row-brand{
    width: 100% !important;
    margin-top: 0% !important;
    margin-bottom: 0% !important;
    margin:auto;
    padding-top: 2.5%;
    padding-bottom: 2.5%;
    text-align: center;
    background-image: url('assets/images/background/home-brand-bg-2.jpg');
    }

.brand-img-container{
    margin-top:2.5% !important;
    margin-right: 5% !important;
    margin-left: 5% !important;
}
.brand-img-container > div > div{
    text-align:center;padding:0.25%;
}
    #pcontainer-brand-home{
    overflow: hidden !important;
    padding: auto !important;position: static; width:100%;
    box-shadow: 0px 0px 5px rgba(102, 102, 153,1);padding-top:7%;padding-bottom:7%;
  }
  #pcontainer-brand-home img {
    padding: 5%;
  display: block;
  transition: transform .4s;   /* smoother zoom */margin-left: auto;
  margin-right: auto;
  width:50%;height:100px;
}
#pcontainer-brand-home:hover img {
  transform: scale(1.3);
  transform-origin: 50% 50%;
}
 
</style>

