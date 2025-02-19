<div class="row row-about" id="aboutRow">
    <div class="col-12">
        <div class="about-item-container">
            <div class="row d-none d-md-block overlay-about">
		        <div class="container">
			        <h2 class="heading" style="color:white"><b>DIGI-MARK SOLUTION</b></h2>
		            <p>
            		<?php
            		include('assets/database/config.php');
            		$sql2 = "SELECT `about_content` FROM `tbl_about_section` WHERE `about_code` = 'PG0001' AND `about_status` = 1";
                                	$result2 = mysqli_query($dbcon,$sql2) or die ('error 404');
                                    while($row2 = mysqli_fetch_assoc($result2)){
                                        $about_content = strip_tags($row2['about_content']);
                                        echo substr($about_content, 0, 500).'...';
                                    }
            		?>
		            </p>
		        </div>
		        <div class="container">
			        <a href="brand-story" class="btn btn-xs btn-warning" style="border-radius: 0px">Read more <i class="fas fa-arrow-circle-right"></i></a>
		        </div>
            </div>

            <div class="row d-md-none overlay-about">
        	    <div class="container">
        			<h1 class="heading" style="color:white"><b>DIGI-MARK SOLUTION</b></h1>
        		<p>
        		<?php
        		include('assets/database/config.php');
        		$sql2 = "SELECT `about_content` FROM `tbl_about_section` WHERE `about_code` = 'PG0001' AND `about_status` = 1";
                            	$result2 = mysqli_query($dbcon,$sql2) or die ('error 404');
                                while($row2 = mysqli_fetch_assoc($result2)){
                                    $about_content = strip_tags($row2['about_content']);
                                    echo substr($about_content, 0, 200).'...';
                                }
        		?>
        		</p>
		    </div>
    		<div class="container">
    			<a href="brand-story" class="btn btn-xs btn-warning" style="border-radius: 0px">Read more <i class="fas fa-arrow-circle-right"></i></a>
    		</div>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
.row-about{
    width: 100% !important;
    padding-top: 1.5% !important;
    padding-bottom: 1.5% !important;
    margin:auto;
    background-color: #000000;
	background-image: url('assets/images/background/home-brand-bg-2.jpg');
	background-size: cover;
	background-repeat: no-repeat;
    text-align: center;
    }

.overlay-about{
    background-color: rgba(102, 102, 102,0);min-height: 20vh;
    text-align: center;padding-top: 1%;padding-bottom: 1%;
}
.overlay-about > .container > p{
    margin-top: 1.5%;color: #ffffff;text-align: justify;
}
.about-item-container{
    margin-right: 5% !important;
    margin-left: 5% !important;
}
</style>