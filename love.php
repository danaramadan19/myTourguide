<?php

session_start();
if(isset($_SESSION['Tolove'])) {
    if ($_SESSION['Tolove'] == 1) {
        $PID = $_GET['Post_ID'];
        $GID = $_GET['Guide_id'];


        $conn = mysqli_connect("localhost","root","","myguidedb");
        $sql = "INSERT INTO tourist_likes (Tourist_ID ,Post_ID) VALUES ('{$_SESSION['UID']}','{$PID}')";
        $result = mysqli_query($conn,$sql);

        header("Location: guideprofile.php?Guide_id=".$GID);
    }
    else echo 'hhh';
}
else {
}

?>