<?php
include("dbconnect.php");
$rslt=mysqli_query($con,"select * from news_tab ORDER BY news_id DESC");
$latest=mysqli_fetch_row($rslt);
	session_start();
if(!isset($_SESSION['latest']))
	{
	$_SESSION['latest']=$latest[0];
	$_SESSION['sport']=$latest[0];
	$_SESSION['whather']=$latest[0];
	$_SESSION['international']=$latest[0];
	$_SESSION['business']=$latest[0];
	$_SESSION['counts']=1;
	$_SESSION['countb']=1;
	$_SESSION['counti']=1;
	$_SESSION['countw']=1;
	}
else
	{
	if((($_SESSION['latest']!=$latest[0]) && ($latest[2]==4)) || $_SESSION['countw'] > 3 )
        	{
		$_SESSION['countw']=1;
		$_SESSION['whather']=$latest[0];
		}	
	}

$rslt=mysqli_query($con,"select * from news_tab where news_id <= ".$_SESSION['whather']." AND category = 4 ORDER BY news_id DESC");
$row=mysqli_fetch_row($rslt);
$_SESSION['countw']=$_SESSION['countw']+1;
$_SESSION['whather']=$row[0]-1;
echo $row[1]."<br><a href='view.php?news=".$row[0]."'><img src='images/".$row[4]."' alt='imge loading failed' height='200' width='200'><br></a>| Wheather";
?>
