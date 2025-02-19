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
<?php
$job_code = $litePath[2];
$sql  = "SELECT * FROM `tbl_career` WHERE `job_code` = '$job_code'";
$result = mysqli_query($dbcon,$sql) or die ('error 404');
    while($row = mysqli_fetch_assoc($result)){
        $i++;
        $job_code = $row['job_code'];
        $title = $row['title'];
        $description = nl2br($row['description']);
        $experience = nl2br($row['experience']);
        $qualification = nl2br($row['qualification']);
        $instructions = nl2br($row['instructions']);
        $link = $row['link'];
        $deadline = date_create($row['deadline']);
        $deadline = date_format($deadline, "d F, Y");
        $job_status = $row['status'];
    }
?>
<div class="container" style="min-height: 50vh">
    <div class="row" style="margin: 2.5%">
        <div class="col-12">
            <h1 class="heading" style="color: #f16724"><?php echo $title;?></h1><br>
            <b><label>Deadline : <?php echo $deadline;?></label></b>
        </div>
        <div class="col-12">
            <p style="text-align: left;">
            <b>Major Duties & Responsibilities</b><br>
            <?php echo $description;?>
            </p>
        </div>
        <div class="col-12">
            <p style="text-align: left;">
            <b>Experience Requirements</b><br>
            <?php echo $experience;?>
            </p>
        </div>
        <div class="col-12">
            <p style="text-align: left;">
            <b>Qualifications & Requirements</b><br>
            <?php echo $qualification;?>
            </p>
        </div>
        <div class="col-12">
            <p style="text-align: left;">
            <b>Application Instructions</b><br>
            <?php echo $instructions;?>

            <?php if($link){echo '<br><a class="btn btn-warning" href="'.$link.'" target="_blank" style="border-radius:0px">Apply Here</a>';}?>
            </p>
        </div>
    </div>
</div>

<?php include('footer.php');?>
</body>
</html>

