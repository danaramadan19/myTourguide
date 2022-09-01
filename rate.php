<?php

session_start();
if(isset($_POST['rate'])){
    if($_SESSION['rate']==1) {
        $rt= $_POST['star-rating'];
            $conn = mysqli_connect("localhost", "root", "", "myguidedb");
            $sql = "INSERT INTO feed_back (Feedback_Stars,Tourist_ID ,Guide_ID) VALUES ('{$rt}','{$_SESSION['UID']}','{$_SESSION['$GID']}')";
            $result = mysqli_query($conn, $sql);

            header("Location: guideprofile.php?Guide_id=" .$_SESSION['$GID']);
  }}

else {
}

?>