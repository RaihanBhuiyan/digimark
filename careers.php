<!DOCTYPE html>
<html>
<head>
<?php include('includes.php');
$_GET['x'] = 'Careers';
include('metaContent.php');
?>
</head>
<body>
<?php 
include('menu.php');
?>

<div class="container" style="min-height: 65vh">
    <div class="row" style="margin-top: 2.5%">
        <div class="col-12">
             <h1 class="heading" style="color: #4c4d4f">Career Opportunities</h1><br>

<p style="text-align: left;">
<b>Join Us</b><br>

At Digi-Mark Solutions, we foster and inspire innovative ideas to support growth and value addition. We are passionate about the work we do. Following a transparent system and keeping the communication channels open, we commute ideas and suggestions within the team. We invest in our people and offer them numerous learning and development opportunities. Join us to be a part of a visionary team.</p>

        </div>
        <div class="col-12">
        <?php
        $i = 0;
        $sql  = "SELECT * FROM `tbl_career` WHERE `status` = '1'";
        $result = mysqli_query($dbcon,$sql) or die ('error 404');
            while($row = mysqli_fetch_assoc($result)){
                
            $job_code = $row['job_code'];
            $title = $row['title'];
            $description = $row['description'];
            $experience = $row['experience'];
            $qualification = $row['qualification'];
            $instructions = $row['instructions'];
            $link = $row['link'];
            $deadline = $row['deadline'];
            $job_status = $row['status'];
    
    $checkPoint = date("Ymd",strtotime($deadline));
    if($checkPoint >= date(Ymd))
    { $i++;
    echo '<div class="row"  style="margin-top: 2.5%">
    <div class="col-md-6 col-sm-12 col-12">
    <h1 class="heading">'.$i.'. '.$title.'</h1>
    </div><div class="col-md-6 col-sm-12 col-12" style="text-align:right">
    <a href="Career/'.$job_code.'/'.$title.'/0/" class="btn btn-sm" style="background-color:#f16724;color:#ffffff">View Details</a>
    </div>
    </div>';  }  
    }  
    ?>
    </div>
</div>
</div>

<?php include('footer.php');?>
</body>
</html>

