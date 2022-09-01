<?php
session_start();

$conn = mysqli_connect("localhost","root","","myguidedb");
if(!$conn){
    echo "<script>alert('Connection faild.');</script>";
}
//echo     $IDReq= $_POST['theReqID'];

if(isset($_POST["submit"])){

    $IDReq= $_POST['theReqID'];
//    echo $IDReq;


    $qry = "UPDATE `guidance_request` SET `Request_Status` = '1' WHERE `guidance_request`.`Request_ID`=".$IDReq ;
    $Re= mysqli_query($conn,$qry);
//    $_SESSION['img']= 'imgs/368633.png';
    header("Location: GuidePage.php");




}
else{

    echo 'sssssssss';
}



    ?>


