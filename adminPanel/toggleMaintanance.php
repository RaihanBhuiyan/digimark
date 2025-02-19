<?php include('../assets/database/config.php');

$query = "SELECT `status` FROM maintenance";
$result = mysqli_query($dbcon,$query) or die ('error1');
      		while($rows = mysqli_fetch_assoc($result)){
            $status = $rows['status'];

            $query1 = "UPDATE `maintenance` SET `status` = !`status`";
			$result1 = mysqli_query($dbcon,$query1);

			echo "<script>location='Dashboard'</script>";
        }

?>