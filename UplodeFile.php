<?php
session_start();


$target_dir = 'C:\xampp\htdocs\WebPro-Tasbeh+Dana\UplodedImages';
$Fnm = $_SESSION['UID'].rand(0,900000).'.png';
$target_file = $target_dir. '\\'. $Fnm;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["UPNewPost"]) && $FirstUp = 1) {

    $check = getimagesize($_FILES["PostImage"]["tmp_name"]);
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
if ($_FILES["PostImage"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["PostImage"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["PostImage"]["name"])). " has been uploaded.";

        $conn = mysqli_connect("localhost","root","","myguidedb");
        if(!$conn){
            echo "<script>alert('Connection faild.');</script>";
        }

        $sql =  "INSERT INTO `post` ( `Post_ID`,`Post_Name`, `Post_Img`, `Guide_Id`, `Post_Description`) VALUES ( NULL, '{$_POST['PName']}', '{$Fnm}', '{$_SESSION['UID']}', '{$_POST['PDescription']}');" ;
        echo $sql;
        $result = mysqli_query($conn,$sql);
        $FirstUp = 0;
        header("Location: GuidePage.php");

    } else {
        echo " <script> alert('Sorry, there was an error uploading your file.');</script>";
    }
}


?>
