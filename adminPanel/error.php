<!DOCTYPE html>
<html>
<head>
	<title>Error</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>

<div class="container" style="padding: 17.5%">
	<img src="../assets/images/logo.png" style="margin: auto;width: 25%">
	<h1 style="margin-left: 1.5%;margin-top:2.5%">Oopps, Page Not Found... </h1>
	<?php 
	if(!isset($_SESSION['userCode'])){
	echo '<a style="margin-left: 1.5%;margin-top:2.5%" href="../Home">Back to home</a>';
	}else{
	echo '<a style="margin-left: 1.5%;margin-top:2.5%" href="Dashboard">Back to Dashboard</a>';
	}
	?>
	
</div>
</body>
</html>