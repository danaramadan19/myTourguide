<?php

session_start();
if(isset($_POST['submit'])) {
    if ($_SESSION['sndreq'] == 1) {
        $GID= $_SESSION['$GID'];
        $UID= $_SESSION['UID'];
        $Hor = $_POST['GPH'];
        $day = $_POST['GPD'];
        $date = $_POST['fordate'];
        $time = $_POST['fortime'];
        $Country = $_POST['Country'];
        $Lang = $_POST['Lang'];
        $CDate = date("Y-m-d");


        $conn = mysqli_connect("localhost","root","","myguidedb");
        $sql = "INSERT INTO guidance_request (Request_Status, Request_Send_date, Request_Required_date, Request_Required_Time,
                              Request_Required_Hours, Request_Required_Dayes, Tourist_ID, Region_ID, Language_ID, Guide_ID)
                               VALUES ('0','{$CDate}','{$date}','{$time}','{$Hor}','{$day}','{$UID}','{$Country}','{$Lang}','{$GID}')";

        echo $sql;
        $result = mysqli_query($conn,$sql);

        header("Location: guideprofile.php?Guide_id=".$GID);
    }
    else echo 'hhh';
}
else {
}

?>