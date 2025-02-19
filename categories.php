<div class="row row-category">
        <div class="col-12">
            <h2 class="heading"><b>PRODUCTS & SOLUTIONS</b></h2> 
        </div>
        <div  class="col-12">
                <div class="category-img-container">
                    <div class="row d-flex justify-content-center">
                        <?php
                        $sql2 = "SELECT * FROM `tbl_category` WHERE `category_status` = '1' AND `category_sort` != '0' ORDER BY `category_sort` ASC LIMIT 8";
                    	$result2 = mysqli_query($dbcon,$sql2) or die ('error 404');
                        while($row2 = mysqli_fetch_assoc($result2)){
                            $category_code = strtoupper($row2['category_code']);
                            $category_name = ucfirst($row2['category_name']);
                            $category_image = $row2['category_image'];
                            $category_url = $row2['category_url'];

                            echo    
                            '<div class="col-md-3 col-sm-4 col-12">
                                <a href="collections/'.$category_url.'">
                                <div id="pcontainer-category-home">
                                    <img src="assets/images/category/'.$category_image.'" alt="'.$category_image.'"><br>
                                    <h3 style="">'.$category_name.'</h3>
                                </div>
                                </a>
                            </div>';    
                            }  
                        ?>  	
                    </div>
                </div>
        </div>
        <div class="container" style="padding-top:1.5%">
            <a href="products-&-solutions" class="btn btn-xs btn-warning" style="border-radius: 0px">View All <i class="fas fa-arrow-circle-right"></i></a>
        </div>
</div>

<style type="text/css">

.row-category{
    width: 100% !important;
    margin-top: 0% !important;
    margin-bottom: 0% !important;
    margin:auto;
    padding-top: 2.5%;
    padding-bottom: 2.5%;
    text-align: center;
    }

.category-img-container{
    margin-top:2.5% !important;
    margin-right: 5% !important;
    margin-left: 5% !important;
}

.category-img-container > div > div{
    text-align:center;padding:0.25%;
}
.category-img-container > div > div > a{text-decoration:none}
#pcontainer-category-home > img{width:30% !important;transition: transform .2s;   /* smoother zoom */}
#pcontainer-category-home > h3{font-size:2vh;color:#000000!important;margin-top:2% !important;}
#pcontainer-category-home{
    min-height:100%;
    overflow: hidden !important;
    padding: auto !important;position: static; width:100%;
    box-shadow: 0px 0px 5px rgba(102, 102, 153,1);padding-top:5%;padding-bottom:5%;
}
  
#pcontainer-category-home a {
  color:#f16724!important;
  padding: 0.5%;
  display: block;
  transition: transform .1s;
  margin-left: auto;
  margin-right: auto;
}
#pcontainer-category-home:hover img {
color: #f16724;
  transform: scale(1.1);
  transform-origin: 50% 50%;
  text-decoration: none !important;
}


</style>