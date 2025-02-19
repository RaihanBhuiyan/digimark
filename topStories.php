<div class="row row-top-stories">
        <div class="col-12">
            <h2 class="heading" style="color:#000000"><b>Top Stories</b></h2> 
        </div>
        <div  class="col-12">
            <div class="top-stories-container">
                <!-- NEWS -->
                    <div class="row d-flex justify-content-center">
                        <?php
                        $sql  = "SELECT * FROM `tbl_news` WHERE `status` = '2' ORDER BY `id` DESC LIMIT 1";
                        $result = mysqli_query($dbcon,$sql) or die ('error 404z');
                        while($row = mysqli_fetch_assoc($result)){
                        $news_code = $row['code'];
                        $news_title = $row['title'];
                        $news_url = $row['url'];
                        $news_details = $row['details'];
                        $news_title_sub = substr($news_title, 0, 200);
                        $news_crDate = date( "d-m-Y", strtotime($row['crDate']));
                        $news_image = $row['thumbnail'];
                        $news_status = $row['status'];

                            echo    
                            '<div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="item-container">
                                <a href="news/'.$news_url.'">
                                <img src="assets/images/news/'.$news_image.'" alt="'.$news_image.'">
                                <label class="top-story-label">NEWS</label>
                                <h3 class="top-story-title">'.$news_title_sub.'</h3>
                                </a>
                                <a class="btn btn-dark btn-sm" href="https://www.digimarkbd.com/news">All News</a>
                                </div>
                           
                            </div>
                            ';    
                            }  
                        ?>  	
                    
                    <!-- NEWSletter -->
                        <?php
                        $sql  = "SELECT * FROM `tbl_newsletter` WHERE `status` = '2' ORDER BY `id` DESC LIMIT 1";
                        $result = mysqli_query($dbcon,$sql) or die ('error 404z');
                        while($row = mysqli_fetch_assoc($result)){
                        $news_code = $row['code'];
                        $news_title = $row['title'];
                        $news_details = $row['details'];
                        $news_link = $row['link'];
                        $news_title_sub = substr($news_title, 0, 200);
                        $news_crDate = date( "d-m-Y", strtotime($row['crDate']));
                        $news_image = $row['thumbnail'];
                        $news_status = $row['status'];

                            echo    
                            '<div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="item-container">
                                <a href="'.$news_link.'" target="blank">
                                <img src="assets/images/newsletter/'.$news_image.'" alt="'.$news_image.'">
                                <label class="top-story-label">Press-Release</label>
                                <h3 class="top-story-title">'.$news_title_sub.'</h3>
                                </a>
                                <a class="btn btn-dark btn-sm" href="https://www.digimarkbd.com/press-release">All Press Release</a>
                                </div>
                            </div>';    
                            }  
                        ?>  	
                    

                <!-- BLOG -->
                    
                        <?php
                        $sql  = "SELECT * FROM `tbl_blog` WHERE `status` = '2' ORDER BY `id` DESC LIMIT 1";
                        $result = mysqli_query($dbcon,$sql) or die ('error 404z');
                        while($row = mysqli_fetch_assoc($result)){
                        $blog_code = $row['code'];
                        $blog_title = $row['title'];
                        $blog_url = $row['url'];
                        $blog_details = $row['details'];
                        $blog_title_sub = substr($blog_title, 0, 200);
                        $blog_crDate = date( "d-m-Y", strtotime($row['crDate']));
                        $blog_image = $row['thumbnail'];
                        $blog_status = $row['status'];

                            echo    
                            '<div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="item-container">
                                <a href="blog/'.$blog_url.'">
                                <img src="assets/images/blog/'.$blog_image.'" alt="'.$blog_image.'">
                                <label class="top-story-label">BLOGS</label>
                                <h3 class="top-story-title">'.$blog_title_sub.'</h3>
                                </a>
                                <a class="btn btn-dark btn-sm" href="https://www.digimarkbd.com/blog">All Blogs</a>
                                </div>
                            </div>';    
                            }  
                        ?>  	
                    

                <!-- CS -->
                    
                        <?php
                        $sql  = "SELECT * FROM `tbl_case_study` WHERE `status` = '2' ORDER BY `id` DESC LIMIT 1";
                        $result = mysqli_query($dbcon,$sql) or die ('error 404z');
                        while($row = mysqli_fetch_assoc($result)){
                        $case_study_code = $row['code'];
                        $case_study_title = $row['title'];
                        $case_study_url = $row['url'];
                        $case_title_sub = substr($case_study_title, 0, 200);
                        $case_study_crDate = date( "d-m-Y", strtotime($row['crDate']));
                        $case_study_details = $row['details'];
                        $case_study_image = $row['thumbnail'];
                        $case_study_status = $row['status'];


                            echo    
                            '<div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="item-container">
                                <a href="case-study/'.$case_study_url.'">
                                <img src="assets/images/case_study/'.$case_study_image.'" alt="'.$case_study_image.'">
                                <label class="top-story-label">CASE-STUDY</label>
                                <h3 class="top-story-title">'.$case_title_sub.'</h3>
                                </a>
                                <a class="btn btn-dark btn-sm" href="https://www.digimarkbd.com/case-study">All Case-Studies</a>
                                </div>
                            </div>';    
                            }  
                        ?>  	
                    </div>
            </div>
        </div>
</div>

<style type="text/css">
  .row-top-stories{
    width: 100% !important;
    margin-top: 0% !important;
    margin-bottom: 0% !important;
    margin:auto;
    padding-top: 1.5%;
    padding-bottom: 2.5%;
    padding-top: 2.5%;
    padding-bottom: 2.5%;
    text-align: center;
    box-shadow:0px 2px 2px 2px rgba(217, 217, 242,0.8);
    color: #ffffff;
    background-image: url('assets/images/background/home-categories-bg.jpg');
    background-size: cover;
    }
.top-stories-container{
    margin-top:2.5% !important;
    margin-right: 5% !important;
    margin-left: 5% !important;
}    

.top-stories-container  > div > div{
    text-align:center;padding:0px !important;padding-left:5px !important;padding-right:5px !important;
}
    .item-container{
    margin:0.5%;
    padding:1.5%;
    height:100% !important;
    box-shadow: 0px 2px 2px 2px rgba(217, 217, 242,0.8);
    display: flex;
    flex-direction: column;
    text-align:left;
  }
  .item-container > a{border-radius:0px;margin-top: auto;}
  .item-container > a > img{
      width:100% !important;
  }
 .top-story-label{
     margin-top:1.5%;
     margin-bottom:1.5%;
     font-size:18px;
     color:#000000;
 }
 .top-story-title{
     margin-top:1.5%;
     margin-bottom:1.5%;
     font-size:16px;
     color:#000000;
 }
</style>