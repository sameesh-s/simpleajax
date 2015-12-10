 <?php
include("dbconnect.php");
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if ($uploadOk == 0) {
    echo "Sorry, The news was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The News ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	
	$head=$_POST["head"];
	$story=$_POST["story"];
	$category=$_POST["category"];
	$fname=$_FILES["fileToUpload"]["name"];
	$query=mysqli_query($con,"INSERT INTO news_tab(head,category,story,image) VALUES ('$head',$category,'$story','$fname')");
	header("location:index.html");


    } else {
        echo "Sorry, there was an error uploadig the news.";
    }
}
?> 
