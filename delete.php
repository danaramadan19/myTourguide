<?php

session_start();
if(isset($_GET['Did'])){
        $Did= $_GET['Did'];
        $conn = mysqli_connect("localhost", "root", "", "myguidedb");
        $sql = "UPDATE user SET Tourist_Ban = '1' WHERE User_ID='$Did';
";
        $result = mysqli_query($conn, $sql);
        echo $sql;
        echo $result;
        if($result){

            echo "<script>alert('Done!');</script>";

        header("Location: admin.php");
        }
    }

else {
}

?>