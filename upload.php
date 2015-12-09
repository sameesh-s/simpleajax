 <?php
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
/*if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}*/
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, The news was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The News ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	
	$head=$_POST["head"];
	$story=$_POST["story"];
	$category=$_POST["category"];
	$fname=$_FILES["fileToUpload"]["name"];
	echo $head."<br>";
	echo $story."<br>";
	echo $category."<br>";
	$con = mysqli_connect("localhost","root","mca");
	mysqli_select_db($con,"mcadb") or die(mysqli_error($con));
	$query=mysqli_query($con,"INSERT INTO news_tab(head,category,story,image) VALUES ('$head',$category,'$story','$fname')");
	echo "success";


    } else {
        echo "Sorry, there was an error uploadig the news.";
    }
}
?> 
