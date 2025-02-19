<div class="row row-branches">
        <div class="col-12">
            <h2 class="heading"><b>OUR BRANCHES</b></h2>
        </div>
        <div  class="col-12" style="text-align: left;">
                <div class="branch-details-container">
                <!-- <div class="container"> -->
                    <div class="row d-flex justify-content-center">
                        <?php
                        $sql  = "SELECT * FROM `master_branch` WHERE `status` = '1' ORDER BY `sort` ASC";
			$result = mysqli_query($dbcon,$sql) or die ('error 404');
				while($row = mysqli_fetch_assoc($result)){
				$title = $row['title'];
				$address = $row['address'];
				$contact = $row['contact'];
				$email = strtolower($row['email']);
				$gmap = $row['gmap'];
				$holiday = $row['holiday'];
				$remark = $row['remark'];

                            echo    '<div class="col-lg-3 col-md-6 col-sm-6 col-12" style="padding-bottom:5px !important;padding-left:5px !important;padding-right:5px !important">
			    						<div class="address-container" style="height:100%;box-shadow:0px 2px 2px 2px rgba(217, 217, 242,0.8);">
								    		<div class="col-12 branch-title">
								    			<label>'.$title.'</label>
								    		</div>
								    		<div class="col-12 branch-address">
												<p style="min-height:20vh !important;text-align:left"><b>'.$address.'</b><br>
												Tel/Mob: '.$contact.'<br>
												Email: '.$email.'<br>
												

								    			<b style="color:darkorange;">Closed '.$holiday.'</b><br>
								    			<a class="loc-icon" href="'.$gmap.'" target="_blank"><i class="fas fa-map-marker-alt"> </i> <b>View on map</b></a><br>								    			';
												if($remark !== ''){
													echo '<b style="color:#006622;margin-top:25%">'.$remark.'</b>';
												}
												echo '</p>
				    						</div>
			    						</div>
			    					</div>';  
                            }  
                        ?>  	
                    </div>
                </div>
        </div>
</div>
<style type="text/css">
.row-branches{
	margin: 0px !important;
	width: 100% !important;
	min-height: 100%;
	padding-top: 2.5%;
    padding-bottom: 2.5%;
	/*margin-top: 2.5%;*/
    text-align: center;
    /*background-color: #f16724;*/
    background-image: url('assets/images/background/branch-bg.jpg');
    background-repeat: no-repeat;
    background-size: cover;
	}

.page-title-container{
    box-shadow:0px 2px 2px 2px rgba(217, 217, 242,0.8);
}
.page-title-container > h1
{
    color:#000000;
    padding:0.5%;
    
}
.branch-details-container{
    margin-top:2.5% !important;
    margin-right: 5% !important;
    margin-left: 5% !important;
} 
.address-container{
    /*margin-top:0%;*/
    padding:1.5%;
    /*padding-top:0%;*/
    height:100% !important;
    /*box-shadow: 0px 2px 2px 2px rgba(217, 217, 242,0.8);*/
    display: flex;
    flex-direction: column;
    text-align:left;
  }
.branch-title{
  	/*position: absolute;
	margin-top: 50px;*/
	padding: auto;
	padding-top: 5px;
	/*font-size: 14px;*/
	font-weight: bold !important;
	background-color: #000000;
	color: #ffffff;
	height:auto;
	text-align:center;
	/*transform-origin: center;
  	transform: translateX(-50%) rotate(-90deg);*/
}
.branch-address{
	opacity: 1;
	width: 100% !important;
	padding: 10px !important;
	/*font-size: 12px;*/
	background-color: transparent;
}
.branch-address p{
	padding: 2.5% !important;padding-bottom: 0.5% !important;
	color: #000000;
}
.loc-icon{
	color: #669999;
	/*font-size: 16px;*/
}
.loc-icon:hover{
	text-decoration: none;
}
</style>