<?php
/*if(!isset($_SEESSION))
	{
	}
else
	{
	}

*/
$con = mysqli_connect("localhost","root","mca");
mysqli_select_db($con,"mcadb") or die(mysqli_error($con));
$rslt=mysqli_query($con,"select * from news_tab where news_id < 8 AND category = 1");

$row=mysqli_fetch_row($rslt);

echo $row[1]."<br><img src='images/".$row[4]."' alt='imge loading failed' height='200' width='200'><br>|International<hr>";
?>
