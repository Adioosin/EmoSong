<?php


$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".<br>";
        $uploadOk = 1;
    } else {
        echo "File is not an image.<br>";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.<br>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.<br>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.<br>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.<br>";
    }
}
//parallel dots
require(__DIR__ . '/vendor/paralleldots/apis/autoload.php');
set_api_key("5HnUQAC6vRXc7tlJJ35EVUXJZ6HGIieavEdpiM8mn4I");
echo"<br>";
$pic_name = $_FILES["fileToUpload"]["name"];
$path_pic = "C:\\xampp\htdocs\sentiment\uploads\\".$pic_name;
//echo $path_pic;
echo "<img url=".$path_pic;
$result = facial_emotion($path_pic);
$result1 = json_decode($result,true);
print_r($result1);
echo"<br>";
echo $result1['facial_emotion'][0]['tag'];
echo"<br>";
?>
<img src="uploads/<?php echo $_FILES["fileToUpload"]["name"]; ?>" style="width:250px;height:250px;">