<?php

session_start();
if(isset($_POST['submit'])){
    $GID = $_SESSION['IDFotfollow'];
    if ($_SESSION['follow']==1) {
        $conn = mysqli_connect("localhost","root","","myguidedb");
        $sql = "INSERT INTO follow (Tourist_ID ,Guide_ID) VALUES ('{$_SESSION['UID']}','{$GID}')";
        $result = mysqli_query($conn,$sql);

        header("Location: guideprofile.php?Guide_id=".$GID);
    }
else echo 'hhh';
}
else {
}

        ?>