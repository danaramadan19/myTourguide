<?php

session_start();

$conn = mysqli_connect("localhost","root","","myguidedb");
if(!$conn){
    echo "<script>alert('Connection faild.');</script>";
}
$target_dir = "uploads/";
$Fnm = $_POST["GEmail"].rand(0,900000).'.png';
$target_file = $target_dir. '\\'. $Fnm;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["GImage"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    if (move_uploaded_file($_FILES["GImage"]["tmp_name"], $target_file)) {

        $id = mysqli_real_escape_string($conn, $_POST["GEmail"]);
        $fname = mysqli_real_escape_string($conn, $_POST["GFName"]);
        $lname = mysqli_real_escape_string($conn, $_POST["GLName"]);
        $national = mysqli_real_escape_string($conn, $_POST["GCountry"]);
        $gender = mysqli_real_escape_string($conn, $_POST["GGender"]);
        $password = mysqli_real_escape_string($conn, SHA1($_POST["GPass"]));
        $cpassword = mysqli_real_escape_string($conn, SHA1($_POST["confPass"]));
        $GPH = mysqli_real_escape_string($conn,$_POST["GPH"]);
        $GPD = mysqli_real_escape_string($conn,$_POST["GPD"]);

        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE User_ID='{$id}'")) > 0) {
            echo "<script>alert('{$id} This email has already taken.');</script>";
        } else {
            if ($password === $cpassword) {
            $CDate = date("Y-m-d");
            $sql = "INSERT INTO user (User_ID ,User_FName,User_LName,User_Nationality,User_Img, User_Gender ,User_Pass, Tourist_Date_join, Guide_Price_Per_Hour	, Guide_Price_Per_Day,Type ) VALUES
                                  ('{$id}','{$fname}','{$lname}','{$national}',' $target_file ','{$gender}','{$password}','$CDate','{$GPH}','{$GPD}','1' )";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $_SESSION['AfterLoginAsGuide'] = 1;
                $_SESSION['UID'] = $id;
                $_SESSION['UFullName'] = $fname . ' ' . $lname;
                $_SESSION['UserType'] = 0;


             if($_POST['Arabic'] == 'Arabic'){
                 $sqlToLang0 = "INSERT INTO `guide_languages` (`Guide_ID`, `Language_Name`) VALUES ('{$id}', 'Arabic')";
                 echo "INSERT INTO `guide_languages` (`Guide_ID`, `Language_Name`) VALUES (' {$id} ', 'Arabic')";

                 $resultLang0 = mysqli_query($conn, $sqlToLang0);
             }
                if(isset($_POST['English'])){
                    $sqlToLang1 = "INSERT INTO `guide_languages` (`Guide_ID`, `Language_Name`) VALUES ('{$id}', 'English')";
                    $resultLang1 = mysqli_query($conn, $sqlToLang1);
                }
                if(isset($_POST['Turkish'])){
                    $sqlToLang2 = "INSERT INTO `guide_languages` (`Guide_ID`, `Language_Name`) VALUES ('{$id}', 'Turkish')";
                    $resultLang2 = mysqli_query($conn, $sqlToLang2);
                }
                if(isset($_POST['Spanish'])){
                    $sqlToLang3 = "INSERT INTO `guide_languages` (`Guide_ID`, `Language_Name`) VALUES ('{$id}', 'Spanish')";
                    $resultLang3 = mysqli_query($conn, $sqlToLang3);
                }
                if(isset($_POST['French'])){
                    $sqlToLang4 = "INSERT INTO `guide_languages` (`Guide_ID`, `Language_Name`) VALUES ('{$id}', 'French')";
                    $resultLang4 = mysqli_query($conn, $sqlToLang4);
                }





                header("Location: GuidePage.php");
            } else {
                echo "<script>alert('error');</script>";
            }
        } else{
                echo "<script>alert('Password and confirm password do not match.');</script>";

            }
        }
    }
}

?>
