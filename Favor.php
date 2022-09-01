<?php
session_start();
if(isset($_SESSION['ForCountry'])){
    if ($_SESSION['ForCountry']==1){

        $conn = mysqli_connect("localhost","root","","myguidedb");



        $qry = "SELECT * FROM follow WHERE Tourist_ID='{$_SESSION['UID']}'";
//        echo "SELECT * FROM follow WHERE Tourist_ID={$_SESSION['UID']}";
        $result2 = mysqli_query($conn, $qry);
        $folow = $result2->num_rows;
//        echo $folow;
        $Qry2 = "SELECT * FROM feed_back WHERE Tourist_ID='{$_SESSION['UID']}'";
        $result2 = mysqli_query($conn,$Qry2);
        $feed = mysqli_num_rows($result2);
        $Qry3 = "SELECT * FROM tourist_likes WHERE Tourist_ID='{$_SESSION['UID']}'";
        $result3 = mysqli_query($conn,$Qry3);
        $favo = mysqli_num_rows($result3);
        $_SESSION['toMap']=1;

    }

    else{
        header("Location: index.php");
    }
} else

    header("Location: index.php");

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
    <link rel="stylesheet" href="css/normalize2.css">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


    <!-- custom css file link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--    <link rel="stylesheet" href="css/style.css">-->
    <!--    <link rel="stylesheet" href="css/style.css.css">-->

    <link rel="stylesheet" type="text/css" href="css/UserPage.css">
    <link rel="stylesheet" href="//g.tutorialjinni.com/mojoaxel/bootstrap-select-country/dist/css/bootstrap-select-country.min.css" />


    <!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->


</head>
<body>
<div class="wrapper">

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
            <!--        < class="header">-->

            <div class="profile" style=" ">
                <button class="profile__button" style="margin-bottom: 20px;  display: flex;
  flex-wrap: wrap;">
                    <a href="#" class="logo" style="margin-top: 10px;">   <i class="fas fa-suitcase-rolling" style="font-size: 1.8rem; margin-top: 20px;">

                        </i> <span class="firstspan"  style="font-size: 1.8rem; margin-top: 20px;">My</span><span class="secspan" style="font-size: 1.6rem; margin-top: 20px;">TourGuide</span></a>


                </button>
                <div class="input-group mb-3 w-75 input-group-lg">
                    <span class="" style="font-size: 30px;" >Your favorite posts!</span>
                </div>


                <section class="section">

                    <div class="GuideImages m-lg-5">
                        <div class=" row ">

                            <?php

                            $QryForFeedback = "SELECT Post_Name,Post_Img,Post_Description,Guide_Id FROM tourist_likes INNER JOIN  Post on tourist_likes.Post_ID=Post.Post_ID  WHERE Tourist_ID='{$_SESSION['UID']}'";
                            $resultPost = mysqli_query($conn,$QryForFeedback);
                            for ($i = 0; $i < $resultPost->num_rows; $i++) {
                                $rowPost = $resultPost->fetch_array();

                                echo'      
  <div class="col-lg-4 mb-5 ml-5" >
  <div class="card"  style="height: 350px;">
    <img src="UplodedImages/'.$rowPost[1].'" class="card-img-top " alt="" style="height: 200px; width: 100%;" >
    <div class="card-body">
      <a class="card-title fw-bold"  href="guideprofile.php?Guide_id='.$rowPost[3].'" style="height: 30px; width: 100%; font-size= 50px;">'.$rowPost[0].'</a>
      <p class="card-text"  style="height: 60px; width: 100%;">'.$rowPost[2].'</p>
    </div>
  </div>
</div> ';

                            }


                            ?>





                            <!-- ####################################### -->


                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                                Uploading a new Post</h5> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="body-desc">
                                                Posting photos helps to increase the confidence of tourists in you, share the best photos you took! </p>
                                            <form action="UplodeFile.php" method="post" enctype="multipart/form-data" >
                                                <div class="row justify-content-center">
                                                    <div class="col-lg-6 input-group mb-3 w-75 input-group-sm" style="">
                                                        <span class="input-group-text" >Position Name</span>
                                                        <input type="text"  name="PName" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-center">
                                                    <div class="col-lg-6 input-group mb-3 w-75 input-group-sm" style="">
                                                        <span class="input-group-text" >Post Description</span>
                                                        <input type="text"  name="PDescription" class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="row justify-content-center">
                                                    <div class="col-lg-6 input-group mb-3 w-75 ">
                                                        <!--                <label for="formFile" class="form-label">Image</label>-->
                                                        <input class="form-control form-control-sm" type="file" id="formFile" name="PostImage" accept="image/*">
                                                    </div>
                                                </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-secondary" name="UPNewPost" >Publish</button>
                                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                                            <?php $FirstUp=1 ?>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>





                            <!-- Modal For Delete Post -->
                            <div class="modal fade" id="exampleModal1" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel1">Delete Post</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete your post? <br>
                                                <span style="color: red;">You cannot undo it.</span></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Delete Post</button>
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>

                                var myModal = document.getElementById('myModal')
                                var myInput = document.getElementById('myInput')

                                myModal.addEventListener('shown.bs.modal', function () {
                                    myInput.focus()
                                })


                            </script>


                            <!-- ####################################### -->


                        </div>


                </section>


            </div>




        <section class="map_section " id="map">


            <div class="modal fade" id="ModalForUpdateInfo" tabindex="-1" aria-labelledby="ModalForUpdateInfo" aria-hidden="true" data-backdrop="static" role="dialog" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            Send Request
                        </div>
                        <div class="modal-body">
                            <?php
                            $QryForFeedback = "SELECT * FROM guidance_request  WHERE guidance_request.Tourist_ID='{$_SESSION['UID']}'";
                            $resultFB = mysqli_query($conn,$QryForFeedback);
                            for ($i = 0; $i < $resultFB->num_rows; $i++) {

                                $roww = $resultFB->fetch_object();

                                    $imgg=".\imgs\dana.gif";
                                    if($roww->Request_Status ==0){
                                        $sta= "pending";
                                    }elseif ($roww->Request_Status ==1){
                                        $sta= "approved";
                                    }else{
                                        $sta= "unacceptable";

                                    }

                                echo '   

            <a href="#" class="project__link focus&#45;&#45;box-shadow" style="width: 100%; height: 20%;margin-bottom: 4px;">
              <div class="project__wrapper row w-100 justify-content-start">

                <div class="col-lg-3" >

                      <img
                              src="'.$imgg.'" class="rounded-circle float-start border"
                      />

                </div>

                <div class="col-lg-6 justify-content-center"  >
                    <span class="project__inform-name" style="font-size: 0.8rem; width: 100%; display: inline-block;"
                    >To: '.$roww->Guide_ID.'</span
                    >
                  <time class="date" datetime="2020-05-05T10:00:00" style="font-size: 0.8rem; width: 100%; display: inline-block;"
                  >sent at:  '.$roww->Request_Required_Time.'</time  >
                  <time class="date" datetime="2020-05-05T10:00:00" style="font-size: 0.8rem; width: 100%; display: inline-block;"
                  >Required date: '.$roww->Request_Required_date.'</time  >
                  <time class="date" datetime="2020-05-05T10:00:00" style="font-size: 0.8rem; width: 100%; display: inline-block;"
                  >Required time: '.$roww->Request_Required_Time.'</time  >
                  <span class="project__inform-name" style="font-size: 0.8rem; width: 100%; display: inline-block;"
                  >Required Days&Hours: '.$roww->Request_Required_Dayes	.' & '.$roww->Request_Required_Hours.'</span>
                  <span class="project__inform-name" style="font-size: 0.8rem; width: 100%; display: inline-block;"
                  >Status: '.$sta.'</span>
                </div>

                <div class="col-lg-3 justify-content-start" >

                </div>
              </div>
  </a>

 ';}?>



                            <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>



        </section>


        </main>

        <aside class="aside">
            <section class="section">
                <div class="toggle">
                    <a style="font-size: 20px;" href="userpage.php">Back</a>



                </div>
                <div class="profile-main" style="margin-top: 100px;">
                    <button
                            class="profile-main__setting focus--box-shadow"
                            type="button"
                    >
                        <img
                                class="profile-main__photo"
                                src="./imgs/People%20sightseeing%20outdoors-bro.svg"
                                alt="Profile photo"
                        />
                    </button>
                    <div>

                        <h3 class="profile-main__name"><?php echo $_SESSION['UFullName']?></h3>
                    </div>
                </div>
                <ul class="statistics">
                    <li class="statistics__entry">
                        <a class="statistics__entry-description" href="#">Favourite</a
                        ><span class="statistics__entry-quantity"><?php echo $favo ?></span>
                    </li>
                    <li class="statistics__entry">
                        <a class="statistics__entry-description" href="#">Following</a
                        ><span class="statistics__entry-quantity"><?php echo $folow ?></span>
                    </li>
                    <li class="statistics__entry">
                        <a class="statistics__entry-description" href="#">Feedback</a
                        ><span class="statistics__entry-quantity"><?php echo $feed ?></span>
                    </li>
                </ul>
                <div class="banner">
                    <h4 class="banner__title">Life is Short!Keep Traveling</h4>
                    <button  class="banner__button"  data-bs-toggle="modal" data-bs-target="#ModalForUpdateInfo"  >
                        Update my info
                    </button>
                </div>
                <div class="logOut" style="margin: 10px; text-align: center">
                    <a href="index.php">Log Out</a>
                </div>
            </section>
        </aside>
    </div>
</div>


<!--==================== FOOTER ====================-->
<footer class="footer section">


    <div class="box-container">

        <div class="box">
            <h3>branch locations</h3>
            <a href="#">Palestine</a>
            <a href="#">USA</a>
            <a href="#">Korea</a>
            <a href="#">China</a>
            <a href="#">Germany</a>
        </div>

        <div class="box">
            <h3>quick links</h3>
            <a href="#">home</a>
            <a href="#">post</a>
            <a href="#">fine now</a>
            <a href="#">map</a>
            <a href="#">contact</a>
        </div>

        <div class="box">
            <h3>follow us</h3>
            <a href="#">facebook</a>
            <a href="#">instagram</a>
            <a href="#">twitter</a>
            <a href="#">linkedin</a>
            <a href="#">Pinterest</a>
        </div>

    </div>

    <h1 class="credit"> created by <strong> Dana And Tasbeh </strong> | all rights reserved! </h1>

</footer>

<!--End Owners-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="node_modules/scrollreveal/dist/scrollreveal.js"></script>
<scropt src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></scropt>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="//g.tutorialjinni.com/mojoaxel/bootstrap-select-country/dist/js/bootstrap-select-country.min.js"></script>

<script>
    AOS.init();
</script>
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


<script type="text/javascript" src="js/script.js"></script>

</body>
</html>