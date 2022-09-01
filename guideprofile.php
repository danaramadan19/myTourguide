<?php

session_start();
if(isset($_SESSION['ToProfile'])) {
    if ($_SESSION['ToProfile'] == 1) {
        $GID = $_GET['Guide_id'];
        $_SESSION['rate'] =1;
        $_SESSION['$GID']= $GID;
        $_SESSION['sndreq']= 1;


        $conn = mysqli_connect("localhost", "root", "", "myguidedb");
        if (!$conn) {
            echo "<script>alert('Connection faild.');</script>";
        } else {
            $Qry = "SELECT * FROM User WHERE User_ID='{$GID}'";
            $result = mysqli_query($conn, $Qry);
            $Obj = $result->fetch_object();
            $GImg = $Obj->User_Img;
            $PPH=$Obj->Guide_Price_Per_Hour;
            $PPD= $Obj->Guide_Price_Per_Day;
            $na = $Obj->User_Nationality;
            $GName = $Obj->User_FName . ' ' . $Obj->User_LName;
            $Qry2 = "SELECT * FROM follow WHERE Guide_ID='{$GID}'";
            $result2 = mysqli_query($conn, $Qry2);
            $Folowcount = mysqli_num_rows($result2);
            $Qry3 = "SELECT * FROM follow WHERE Guide_ID='{$GID}' and Tourist_ID='{$_SESSION['UID']}'";
            $result3 = mysqli_query($conn, $Qry3);
            if (mysqli_num_rows($result3) > 0) {
                $fo = 'FOLLOWING';
                $clr = 'green';
            } else {
                $fo = 'FOLLOW';
                $clr = 'red';
            }
        }
    } else{        header("Location: index.php");
    }
    }else{        header("Location: index.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>your page</title>
    <link
            href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap"
            rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">





    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/normalize2.css">

    <link rel="stylesheet" type="text/css" href="css/guideprofile.css">


    <!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->


</head>
<body>
<div class="wrapper">

    <nav class="nav0">

        <ul class="nav0__list nav " role="menubar">
            <li class="nav0__item nav0__item--isActive">

                <a href="userpage.php"  class="nav0__link focus--box-shadow" role="menuitem" aria-label="Home">
                    <svg class="nav0__icon"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  >
                        <path fill="#6563ff"  d="M20,8h0L14,2.74a3,3,0,0,0-4,0L4,8a3,3,0,0,0-1,2.26V19a3,3,0,0,0,3,3H18a3,3,0,0,0,3-3V10.25A3,3,0,0,0,20,8ZM14,20H10V15a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1Zm5-1a1,1,0,0,1-1,1H16V15a3,3,0,0,0-3-3H11a3,3,0,0,0-3,3v5H6a1,1,0,0,1-1-1V10.25a1,1,0,0,1,.34-.75l6-5.25a1,1,0,0,1,1.32,0l6,5.25a1,1,0,0,1,.34.75Z"/>
                    </svg>
                </a>

            </li>

            <li class="nav0__item">
                <a  href="Favor.php" class="nav0__link focus--box-shadow"role="menuitem" aria-label="Informational messages" >
                    <svg class="nav0__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  >
                        <path
                                d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"
                        /> </svg>
                </a>
            </li>

            <li class="nav0__item">
                <a  href="#" class="nav0__link focus--box-shadow"role="menuitem" aria-label="Informational messages" >
                    <svg class="nav0__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  >
                        <path d="M12,11a1,1,0,0,0-1,1v3a1,1,0,0,0,2,0V12A1,1,0,0,0,12,11Zm0-3a1,1,0,1,0,1,1A1,1,0,0,0,12,8Zm0-6A10,10,0,0,0,2,12a9.89,9.89,0,0,0,2.26,6.33l-2,2a1,1,0,0,0-.21,1.09A1,1,0,0,0,3,22h9A10,10,0,0,0,12,2Zm0,18H5.41l.93-.93a1,1,0,0,0,.3-.71,1,1,0,0,0-.3-.7A8,8,0,1,1,12,20Z"/>
                    </svg>
                </a>
            </li>

            <li class="nav0__item">
                <a href="#"
                   class="nav0__link focus--box-shadow"
                   role="menuitem"
                   aria-label="Collections"  data-bs-toggle="modal" data-bs-target="#ModalForUpdateInfo"
                >
                    <svg
                            class="nav0__icon"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                    >
                        <path
                                d="M2.5,10.56l9,5.2a1,1,0,0,0,1,0l9-5.2a1,1,0,0,0,0-1.73l-9-5.2a1,1,0,0,0-1,0l-9,5.2a1,1,0,0,0,0,1.73ZM12,5.65l7,4-7,4.05L5,9.69Zm8.5,7.79L12,18.35,3.5,13.44a1,1,0,0,0-1.37.36,1,1,0,0,0,.37,1.37l9,5.2a1,1,0,0,0,1,0l9-5.2a1,1,0,0,0,.37-1.37A1,1,0,0,0,20.5,13.44Z"
                        />
                    </svg>
                </a>
            </li>
            <li class="nav0__item">
                <a
                        href="#"
                        class="nav0__link focus--box-shadow"
                        role="menuitem"
                        aria-label="Analytics"
                >
                    <svg
                            class="nav0__icon"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"

                    >
                        <path
                                d="M6,13H2a1,1,0,0,0-1,1v8a1,1,0,0,0,1,1H6a1,1,0,0,0,1-1V14A1,1,0,0,0,6,13ZM5,21H3V15H5ZM22,9H18a1,1,0,0,0-1,1V22a1,1,0,0,0,1,1h4a1,1,0,0,0,1-1V10A1,1,0,0,0,22,9ZM21,21H19V11h2ZM14,1H10A1,1,0,0,0,9,2V22a1,1,0,0,0,1,1h4a1,1,0,0,0,1-1V2A1,1,0,0,0,14,1ZM13,21H11V3h2Z"
                        />
                    </svg>
                </a>
            </li>
        </ul>
    </nav>


        <main class="main">

            <button class="profile__button" style="margin-bottom: 20px;  display: flex;
  flex-wrap: wrap;">
                <a href="#" class="logo" style="margin-top: 10px;">   <i class="fas fa-suitcase-rolling" style="font-size: 1.8rem; margin-top: 20px;">

                </i> <span class="firstspan"  style="font-size: 1.8rem; margin-top: 20px;">My</span><span class="secspan" style="font-size: 1.6rem; margin-top: 20px;">TourGuide</span></a>


            </button>
            <center><h1>Posts </h1></center>
            <div class="box-container">


                <?php

                $QryPost = "SELECT Post_Name,Post_Description,Post_Img,Post_ID FROM post WHERE Guide_ID='{$GID}'";
                $resultPost = mysqli_query($conn,$QryPost);
                for ($i = 0; $i < $resultPost->num_rows; $i++) {
                $rowPost = $resultPost->fetch_array();

                    $_SESSION['Tolove']=1;


                echo '
                <div class="box">
                    <div class="slide-img bigonhov">
                        <img src="UplodedImages/'.$rowPost[2].'">
                        <div class="overlay">
                            <a href="love.php?Post_ID='.$rowPost[3].'&Guide_id='.$GID.'" class="buy-btn onhover" > Love it! </a>
                        </div>
                    </div>
                    <div class="detail-box">

                        <div class="type">
                            <a  class="name">'.$rowPost[0].'</a>
                            <span>'.$rowPost[1].'</span>
                        </div>

                    </div>
                </div>

                ';}?>
                
                

            </div>




        </main>
        <aside class="aside" style="height: 1500px;">
            <section class="section">
                <div class="toggle">
<a style="font-size: 20px;" href="userpage.php">Back</a>
                </div>
                <div class="profile-main">
                    <button
                            class="profile-main__setting focus--box-shadow"
                            type="button"
                    >
                        <img
                                class="profile-main__photo"
                                src="<?php echo $GImg ?>"
                                alt="Profile photo"
                                style="margin: 0px;"
                        />
                    </button>
                    <div>

                        <h3 class="profile-main__name"><?php echo $GName ?></h3>
                        <form method="post" action="rate.php">
                        <div class="container-wrapper0" >
                            <div class="container0 d-flex align-items-center justify-content-center" style="height: 65px;">
                                <div class="row justify-content-center" >

                                    <!-- star rating -->
                                    <div class="rating-wrapper0" >

                                        <!-- star 5 -->
                                        <input type="radio" id="5-star-rating" name="star-rating" value="5">
                                        <label for="5-star-rating" class="star-rating" >
                                            <i class="fas fa-star d-inline-block"></i>
                                        </label>

                                        <!-- star 4 -->
                                        <input type="radio" id="4-star-rating" name="star-rating" value="4">
                                        <label for="4-star-rating" class="star-rating star">
                                            <i class="fas fa-star d-inline-block"></i>
                                        </label>

                                        <!-- star 3 -->
                                        <input type="radio" id="3-star-rating" name="star-rating" value="3">
                                        <label for="3-star-rating" class="star-rating star">
                                            <i class="fas fa-star d-inline-block"></i>
                                        </label>

                                        <!-- star 2 -->
                                        <input type="radio" id="2-star-rating" name="star-rating" value="2">
                                        <label for="2-star-rating" class="star-rating star">
                                            <i class="fas fa-star d-inline-block"></i>
                                        </label>

                                        <!-- star 1 -->
                                        <input type="radio" id="1-star-rating" name="star-rating" value="1">
                                        <label for="1-star-rating" class="star-rating star">
                                            <i class="fas fa-star d-inline-block"></i>
                                        </label>

                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>
                    <button name="rate" style="font-size: 20px; color: #61892f; margin-bottom: 0px;" >Rate me!</button>
                    </form>

                </div>
                <ul class="statistics">
                    <li class="statistics__entry">
                        <form action="follow.php" method="post" >
                            <?php $_SESSION['follow']=1; $_SESSION['IDFotfollow'] = $GID ?>
                        <button type="submit" name="submit" id="follow-button" style="  color: <?php echo $clr ?>;
                        font-size: 20px;
                        background-color: #ffffff;
                        border: 1px solid;
                        border-color: <?php $clr ?>;
                        border-radius: 8px;
                        width: 330px;
                        height: 50px;
                        padding-left: 20px;
                        margin-top: 0px;
                        cursor: hand;" ><?php echo $fo ?></button>
                        </form>
                    </li>
                    <li class="statistics__entry">
                        <button  class="banner__button"  data-bs-toggle="modal" data-bs-target="#ModalForUpdateInfo"  >
                            Send Request
                        </button>
                    </li>

                    <li class="statistics__entry">
                        <a >Followers</a>
                        <span class="statistics__entry-quantity"><?php echo $Folowcount ?></span>
                    </li>

                    <li class="statistics__entry">
                        <a >Price/h</a>
                        <span class="statistics__entry-quantity"><?php echo $PPH ?></span>
                    </li>

                    <li class="statistics__entry">
                        <a >Price/D</a>
                        <span class="statistics__entry-quantity"><?php echo $PPD ?></span>
                    </li>

                    <?php

                    $Qry4 = "SELECT Language_Name FROM guide_languages WHERE Guide_ID='{$GID}'";
                    $result4 = mysqli_query($conn,$Qry4);
                    for ($i = 0; $i < $result4->num_rows; $i++) {
                        $row = $result4->fetch_array();
echo '
                    <li class="statistics__entry statistics__entry-quantity">
                        <a >Lang</a>
                        <span class="statistics__entry-quantity">'.$row[0].'</span>
                    </li>


';

                    }

                    ?>


                </ul>

            </section>
        </aside>
    </div>
</div>


<!--    Modal For send req-->

<div class="modal fade" id="ModalForUpdateInfo" tabindex="-1" aria-labelledby="ModalForUpdateInfo" aria-hidden="true" data-backdrop="static" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Send Request
            </div>
            <div class="modal-body">

                <form class="px-md-2 " style="width: 100%;" action="sndreq.php" method="post">
                    <div class="row justify-content-center">
                        <img src="imgs/Trip-bro.svg" alt="" class="h-50 w-50 ">
                    </div>
                    <div class="form-outline mb-1 row justify-content-center">



                        <div>
                            <p style="margin-top: 3px;font-size: 0.9rem; margin-bottom: 0px;text-align: center">All Your request Info. </p>
                        </div>


                        <div class="row  justify-content-center"style="width: 80%">
                            <div class=" col-lg-5 input-group mb-2 w-50 input-group-sm">
                                <span class="input-group-text" >For hours</span>
                                <input type="number"  name="GPH" class="form-control" value="" required>
                            </div>
                            <div class=" col-lg-5 input-group mb-2 w-50 input-group-sm">
                                <span class="input-group-text" >For days</span>
                                <input type="number"  name="GPD" class="form-control" value="" required>
                            </div>
                        </div>

                        <div style="width: 370px; border-radius: 5px; margin: 5px;">
                                <input id="date" type="date" name="fordate" style="border-radius: 5px; color: #61892f; border-color: grey;">
                        </div>
                        <div style="width: 370px; border-radius: 5px; margin: 5px;">
                            <input id="time" type="time" name="fortime" style="border-radius: 5px; color: #61892f; border-color: grey;">
                        </div>

                        </div>
                    <div class="row justify-content-center ">
                        <div class=" col-lg-5 input-group col-lg-5 input-group mb-2 w-75 input-group-sm j">
                            <span class="input-group-text" >Country</span>
                            <select name="Country" class="selectpicker countrypicker input-box form-control" data-countries="ps,dz,bh,eg,iq,jo,kw,lb,ly,ma,om,qa,sa,sy,tn,ae,ya,fra,alb,and,aut,bih,blr,che,cyp,due,gbr,ita,isl,rou, nor,nld,ukr " required></select>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                    <div class="col-lg-5 input-group mb-3 w-75 input-group-sm">
                        <span class="input-group-text" >Language</span>
                        <select class="form-select"  name="Lang">
                            <option value="Arabic">Arabic</option>
                            <option value="English">English</option>
                            <option value="French">French</option>
                            <option value="Spanish">Spanish</option>
                            <option value="Spanish">Spanish</option>
                        </select>
                    </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" name="submit" class="btn btn-secondary">Send Req</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--   End Modal For ModalForUpdateInfo-->
<script>
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })

</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#datepicker').datepicker();
    ...
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="node_modules/scrollreveal/dist/scrollreveal.js"></script>
<scropt src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></scropt>
<script type="text/javascript" src="js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="//g.tutorialjinni.com/mojoaxel/bootstrap-select-country/dist/js/bootstrap-select-country.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript" src="js/script.js"></script>

</body>
</html>
