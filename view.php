<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width,intial-scale=1">
	<title>NEWS</title>
	<link rel="stylesheet" href="css/bootstrap.css"  type="text/css"/>
	<script src="jquery-2.1.4.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="jumbotron">
	<div class="container text-center">
		<h1>NEWS</h1>
		<div class="btn-group">
			<a href="index.html" class="btn btn-lg btn-warning">HOME</a>
			<a href="upload.html" class="btn btn-lg btn-warning">UPLOAD</a>
		</div>
	</div>
</div>
<?php
include("dbconnect.php");
$news=$_GET['news'];
$rslt=mysqli_query($con,"select * from news_tab where news_id =".$news."");
$row=mysqli_fetch_row($rslt);
echo $row[1];
echo "<hr>
<div class='container-fluid container text-center'>
	<div class='col-lg-4'>
<img src='images/".$row[4]."' alt='imge loading failed' height='200' width='200'>
	</div>
	<div id='business'  class='col-lg-8'>
	<p>".$row[3]."
	</div>
</div>";
?>
</html>
