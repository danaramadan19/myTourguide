<?php

session_start();
if(isset($_SESSION['AfterLoginAsGuide'])){
    if ($_SESSION['AfterLoginAsGuide']==1){

        $conn = mysqli_connect("localhost","root","","myguidedb");
        if(!$conn){
            echo "<script>alert('Connection faild.');</script>";
        }else{
            $Qry = "SELECT * FROM follow WHERE Guide_ID='{$_SESSION['UID']}'";
            $result = mysqli_query($conn,$Qry);
            $Folowcount = mysqli_num_rows($result);
            $Qry2 = "SELECT * FROM feed_back WHERE Guide_ID='{$_SESSION['UID']}'";
            $result2 = mysqli_query($conn,$Qry2);
            $Feedcount = mysqli_num_rows($result2);
            $Qry3 = "SELECT * FROM user WHERE User_ID='{$_SESSION['UID']}'";
            $result3 = mysqli_query($conn,$Qry3);
            $allInfo= $result3->fetch_object();
            $FName= $allInfo->User_FName;
            $LName= $allInfo->User_LName;
            $UNatio= $allInfo->User_Nationality;
            $UImg= $allInfo->User_Img;
            $Acc= $allInfo->Guide_Acceptance;
            $PPH= $allInfo->Guide_Price_Per_Hour;
            $PPD= $allInfo->Guide_Price_Per_Day;
            $UG= $allInfo->User_Gender;
            $TheGImg= $allInfo->User_Img;
            $Qry4 = "SELECT Language_Name FROM guide_languages WHERE Guide_ID='{$_SESSION['UID']}'";
            $result4 = mysqli_query($conn,$Qry4);
//            $LangRow = mysqli_fetch_row($result4);
            $Arabic ='';
            $English='';
            $French='';
            $Spanish='';
            $Turkish='';

            for ($i = 0; $i < $result4->num_rows; $i++) {
                $row = $result4->fetch_array();
                if ($row[0] == 'Arabic'){
                $Arabic ='checked';
            }
                if ($row[0] == 'English'){
                    $English ='checked';
                }
                if ($row[0] == 'French'){
                    $French ='checked';
                }
                if ($row[0] == 'Spanish'){
                    $Spanish ='checked';
                }
                if ($row[0] == 'Turkish'){
                    $Turkish ='checked';
                } }
        }






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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>MyGuide</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


    <!-- custom css file link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//g.tutorialjinni.com/mojoaxel/bootstrap-select-country/dist/css/bootstrap-select-country.min.css" />

    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/GuidePage.css" />

  </head>


  <body>
    <div class="wrapper">
      <nav class="nav0">
        <ul class="nav0__list nav " role="menubar">
          <li class="nav0__item nav0__item--isActive">

            <a href="#"  class="nav0__link focus--box-shadow" role="menuitem" aria-label="Home">
              <svg class="nav0__icon"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  >
                <path fill="#6563ff"  d="M20,8h0L14,2.74a3,3,0,0,0-4,0L4,8a3,3,0,0,0-1,2.26V19a3,3,0,0,0,3,3H18a3,3,0,0,0,3-3V10.25A3,3,0,0,0,20,8ZM14,20H10V15a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1Zm5-1a1,1,0,0,1-1,1H16V15a3,3,0,0,0-3-3H11a3,3,0,0,0-3,3v5H6a1,1,0,0,1-1-1V10.25a1,1,0,0,1,.34-.75l6-5.25a1,1,0,0,1,1.32,0l6,5.25a1,1,0,0,1,.34.75Z"/>
              </svg>
            </a>

          </li>
          
          <li class="nav0__item">
            <a  href="#" class="nav0__link focus--box-shadow"role="menuitem" aria-label="Informational messages" data-bs-toggle="modal" data-bs-target="#ModalForFeedBack">
              <svg class="nav0__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  >
                <path d="M12,11a1,1,0,0,0-1,1v3a1,1,0,0,0,2,0V12A1,1,0,0,0,12,11Zm0-3a1,1,0,1,0,1,1A1,1,0,0,0,12,8Zm0-6A10,10,0,0,0,2,12a9.89,9.89,0,0,0,2.26,6.33l-2,2a1,1,0,0,0-.21,1.09A1,1,0,0,0,3,22h9A10,10,0,0,0,12,2Zm0,18H5.41l.93-.93a1,1,0,0,0,.3-.71,1,1,0,0,0-.3-.7A8,8,0,1,1,12,20Z"/>
              </svg>
            </a>
          </li>

          <li class="nav0__item">
            <a href="#"   data-bs-toggle="modal" data-bs-target="#ModalForGuideReq"
              class="nav0__link focus--box-shadow"
              role="menuitem"
              aria-label="Collections"
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
        <header class="header">
          <div class="header__wrapper">

            <div class="profile">
              <button class="profile__button">
                <a href="#" class="logo">   <i class="fas fa-suitcase-rolling"></i> <span class="firstspan">My</span><span class="secspan">TourGuide</span></a>
              </button>
            </div>

          </div>
        </header>
        <section class="section">

          <header class="section__header">
            <h2 class="section__title">     Have a nice day!</h2>
            <!-- <a href="#" class="section__link">View all</a> -->
          </header>


          <ul class="team">
            <li class="team__item">
              <a class="team__link focus--box-shadow" href="#" data-bs-toggle="modal" data-bs-target="#ModalForGuideReq">
                <div class="team__header">


                </div>
                <div class="team__inform">
                  <p class="team__name">Guidance requests</p>
                  <p class="team__name" style="font-size: 0.8rem; font-weight: unset;">You can accept or decline requests.</p>
                </div>
              </a>
            </li>
            <li class="team__item">
              <a class="team__link focus--box-shadow" href="#" data-bs-toggle="modal" data-bs-target="#ModalForGuideAcc" >
                <div class="team__header">

                  </button>
                </div>
                <div class="team__inform">
                  <p class="team__name">Upcoming guiding works</p>
                    <p class="team__name" style="font-size: 0.8rem; font-weight: unset;">You can find all your upcoming appointments.</p>

                </div>
              </a>
            </li>
            <li class="team__item">
              <a class="team__link focus--box-shadow" href="#">
                <div class="team__header">
                  <ul class="photo">
                    <li class="photo__item">
                      <img
                        src="./imgs/seth-doyle-uJ8LNVCBjFQ-unsplash.jpg"
                        alt="Jessica's photo"
                      />
                    </li>
                  </ul>
                  <button
                    class="setting setting--absolute focus--box-shadow"
                    type="button"
                  >
                    <svg
                      enable-background="new 0 0 515.555 515.555"
                      height="512"
                      viewBox="0 0 515.555 515.555"
                      width="512"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="m303.347 18.875c25.167 25.167 25.167 65.971 0 91.138s-65.971 25.167-91.138 0-25.167-65.971 0-91.138c25.166-25.167 65.97-25.167 91.138 0"
                      />
                      <path
                        d="m303.347 212.209c25.167 25.167 25.167 65.971 0 91.138s-65.971 25.167-91.138 0-25.167-65.971 0-91.138c25.166-25.167 65.97-25.167 91.138 0"
                      />
                      <path
                        d="m303.347 405.541c25.167 25.167 25.167 65.971 0 91.138s-65.971 25.167-91.138 0-25.167-65.971 0-91.138c25.166-25.167 65.97-25.167 91.138 0"
                      />
                    </svg>
                  </button>
                </div>
                <div class="team__inform">
                  <p class="team__name">Design development</p>
                  <time class="date" datetime="2020-01-10T10:00:00"
                    >10 January, 2020</time
                  >
                </div>
              </a>
            </li>
          </ul>
        </section>

        <!-- ************************ -->
<section class="section">
          <header class="section__header">
            <h2 class="section__title">My posts</h2>
            <div class="section__control">
              <button
                class="section__button focus--box-shadow"
                type="button"
                aria-label="Filter projects"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 24 24"

                >
                  <path
                    d="M20,8.18V3a1,1,0,0,0-2,0V8.18a3,3,0,0,0,0,5.64V21a1,1,0,0,0,2,0V13.82a3,3,0,0,0,0-5.64ZM19,12a1,1,0,1,1,1-1A1,1,0,0,1,19,12Zm-6,2.18V3a1,1,0,0,0-2,0V14.18a3,3,0,0,0,0,5.64V21a1,1,0,0,0,2,0V19.82a3,3,0,0,0,0-5.64ZM12,18a1,1,0,1,1,1-1A1,1,0,0,1,12,18ZM6,6.18V3A1,1,0,0,0,4,3V6.18a3,3,0,0,0,0,5.64V21a1,1,0,0,0,2,0V11.82A3,3,0,0,0,6,6.18ZM5,10A1,1,0,1,1,6,9,1,1,0,0,1,5,10Z"
                  />
                </svg>
              </button>
              <button
                class="btn btn-primary section__button section__button--painted focus--box-shadow "
                type="button"
                aria-label="Add New project"
                data-bs-toggle="modal" data-bs-target="#exampleModal"

              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 24 24"

                >
                  <path
                    d="M19,11H13V5a1,1,0,0,0-2,0v6H5a1,1,0,0,0,0,2h6v6a1,1,0,0,0,2,0V13h6a1,1,0,0,0,0-2Z"
                  />
                </svg>


              </button>
            </div>
          </header>

<div class="GuideImages">
<div class=" row ">

    <?php

    $QryPost = "SELECT Post_Name,Post_Description,Post_Img FROM post WHERE Guide_ID='{$_SESSION['UID']}'";
    $resultPost = mysqli_query($conn,$QryPost);
//    echo $resultPost->num_rows;

    for ($i = 0; $i < $resultPost->num_rows; $i++) {
        $rowPost = $resultPost->fetch_array();

        echo'      
  <div class="col-lg-4">
  <div class="card" >
    <img src="UplodedImages/'.$rowPost[2].'" class="card-img-top " alt="..." style="height: 200px; width: 100%;" >
    <div class="card-body">
      <h5 class="card-title"  style="height: 50px; width: 100%;">'.$rowPost[0].'</h5>
      <p class="card-text"  style="height: 60px; width: 100%;">'.$rowPost[1].'</p>
      
   
   
    </div>
  </div>
</div> ';
//
//        echo $rowPost[0];
//        echo $rowPost[1];
//        echo $rowPost[2];

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

        <!-- ************END************ -->

      </main>
      <aside class="aside">
        <section class="section">
          <div class="aside__control">
<!--            <button class="aside__button focus--box-shadow"   type="button" aria-label="Close profile settings" >-->
<!--              <svg-->
<!--                xmlns="http://www.w3.org/2000/svg"-->
<!--                viewBox="0 0 24 24"-->
<!--              >-->
<!--                <path-->
<!--                  d="M17,11H9.41l3.3-3.29a1,1,0,1,0-1.42-1.42l-5,5a1,1,0,0,0-.21.33,1,1,0,0,0,0,.76,1,1,0,0,0,.21.33l5,5a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L9.41,13H17a1,1,0,0,0,0-2Z"-->
<!--                />-->
<!--              </svg>-->
<!--            </button>-->
            <button
              class="aside__button aside__button--notification focus--box-shadow"
              type="button"
              aria-label="You have new feedback"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
              >
                <path
                  d="M18,13.18V10a6,6,0,0,0-5-5.91V3a1,1,0,0,0-2,0V4.09A6,6,0,0,0,6,10v3.18A3,3,0,0,0,4,16v2a1,1,0,0,0,1,1H8.14a4,4,0,0,0,7.72,0H19a1,1,0,0,0,1-1V16A3,3,0,0,0,18,13.18ZM8,10a4,4,0,0,1,8,0v3H8Zm4,10a2,2,0,0,1-1.72-1h3.44A2,2,0,0,1,12,20Zm6-3H6V16a1,1,0,0,1,1-1H17a1,1,0,0,1,1,1Z"
                />
              </svg>
            </button>
          </div>
          <div class="profile-main">
            <button
              class="profile-main__setting focus--box-shadow"
              type="button"
            >
              <img
                class="profile-main__photo"
                src="<?php echo $TheGImg ?>"
                alt="Profile photo"
              />
            </button>
            <h1 class="profile-main__name"><?php echo $_SESSION['UFullName'] ?></h1>


            <div class="Starcontainer">
              <span class="fa fa-star fa-2x Starchecked"></span>
              <span class="fa fa-star fa-2x Starchecked"></span>
              <span class="fa fa-star fa-2x Starchecked"></span>
              <span class="fa fa-star fa-2x Starchecked"></span>
              <span class="fa fa-star fa-2x Starchecked"></span>
            </div>
  


          </div>


          <ul class="statistics">
            <li class="statistics__entry">
              <a class="statistics__entry-description" href="#">Followers</a
              ><span class="statistics__entry-quantity"><?php echo $Folowcount ?></span>
            </li>
            <li class="statistics__entry">
              <a class="statistics__entry-description" href="#">Feedback</a
              ><span class="statistics__entry-quantity"><?php echo $Feedcount ?></span>
            </li>
          </ul>
          <div class="banner">
            <h4 class="banner__title">Keep your information updated!</h4>
            <p class="banner__description">Updating the information helps to bring in more tourist guide requests.</p>
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

<!--    Modal For ModalForUpdateInfo-->

    <div class="modal fade" id="ModalForUpdateInfo" tabindex="-1" aria-labelledby="ModalForUpdateInfo" aria-hidden="true" data-backdrop="static" role="dialog" >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            Update My Info
          </div>
          <div class="modal-body">

                <form class="px-md-2 " style="width: 100%;">
                  <div class="row justify-content-center">
                  <img src="imgs/Trip-bro.svg" alt="" class="h-50 w-50 ">
                  </div>
                  <div class="form-outline mb-1 row justify-content-center">

                    <div class="row justify-content-center mb-2" style="width: 80%">
                      <div class=" col-lg-5 input-group mb-1 w-50 input-group-sm">
                        <span class="input-group-text" >F. Name</span>
                        <input type="text"  name="GFName" class="form-control" value="<?php echo  $FName ?>" required>
                      </div>
                      <div class=" col-lg-5 input-group mb-1 w-50 input-group-sm">
                        <span class="input-group-text" >L. Name</span>
                        <input type="text"  name="GLName" class="form-control" value="<?php echo  $LName ?>" required>
                      </div>
                    </div>

                    <div class="input-group mb-2 w-75 input-group-sm">
                      <span class="input-group-text" >Email</span>
                      <input type="email"  name="GEmail" class="form-control" value="<?php echo  $_SESSION['UID'] ?>" required>
                    </div>


                    <div class="input-group mb-2 w-75 input-group-sm">
                      <span class="input-group-text" >country of work</span>
                      <select name="GCountry" class="selectpicker countrypicker input-box form-control" data-countries="ps,fr,sp ,dz,bh,eg,iq,jo,kw,lb,ly,ma,om,qa,sa,sy,tn,ae,ya" value="<?php echo  $UNatio ?>" required></select>
                    </div>


                    <div class="input-group mb-2 w-75 input-group-sm">
                      <span class="input-group-text" >New Password</span>
                      <input type="password"  name="GPass" class="form-control" required>
                    </div>
                    <div class="input-group mb-2 w-75 input-group-sm">
                      <span class="input-group-text" >Confirm Password</span>
                      <input type="password"  name="GCPass" class="form-control" required>
                    </div>

                    <div>
                      <p style="margin-top: 2px;font-size: 0.9rem; margin-bottom: 0px; text-align: center">Upload your profile picture</p>
                    </div>

                    <div class="input-group mb-2 w-75 input-group-sm">
                      <input type="file"  name="GImage" class="form-control"  accept="image/*"  required>
                    </div>

                    <div>
                      <p style="margin-top: 3px;font-size: 0.9rem; margin-bottom: 0px;text-align: center">Tourist guide price $ </p>
                    </div>


                    <div class="row  justify-content-center"style="width: 80%">
                      <div class=" col-lg-5 input-group mb-2 w-50 input-group-sm">
                        <span class="input-group-text" >per hour</span>
                        <input type="number"  name="GPH" class="form-control" value="<?php echo $PPH ?>" required>
                      </div>
                      <div class=" col-lg-5 input-group mb-2 w-50 input-group-sm">
                        <span class="input-group-text" >per day</span>
                        <input type="number"  name="GPD" class="form-control" value="<?php echo $PPD ?>" required>
                      </div>
                    </div>

                    <hr style="height:1px;border-width:0;color:gray;background-color:gray; width: 50%; margin-top: 4px; margin-bottom: 2px;">


                    <!--      Language that know-->
                    <p style="font-size: 1.0rem; text-align: center; margin: 0;">Lang</p>

                    <div class="row" style=" width: 80%; height: 30px;">

                      <div  class=" col-lg-1  mb-2">
                      </div>
                      <div class=" col-lg-2 ">
                        <input class="form-check-input" type="checkbox" name="" value="Arabic" id="Arabic" <?php echo $Arabic; ?> style="height: 0.9rem; width: 0.9rem;">
                        <label for="Arabic" style="padding-left: 0px; font-size: 0.9rem; margin-top: 0px;">
                          ar
                        </label>
                      </div>
                      <div class=" col-lg-2 ">
                        <input class="form-check-input" type="checkbox" value="" id="English" style="height:  0.9rem; width: 0.9rem;" <?php echo $English ?>>
                        <label for="English" style="padding: 0px; font-size: 0.9rem; margin:0px;">
                          en
                        </label>
                      </div>
                      <div class=" col-lg-2 ">
                        <input class="form-check-input" type="checkbox" value="" id="Turkish" style="height:  0.9rem; width: 0.9rem;" <?php echo $Turkish  ?>>
                        <label for="Turkish" style="padding: 0px; font-size: 0.9rem; margin: 0px;">
                          tr
                        </label>
                      </div>
                      <div class=" col-lg-2 ">
                        <input class="form-check-input" type="checkbox" value="" id="Spanish" style="height:  0.9rem; width: 0.9rem;" <?php echo $Spanish  ?>>
                        <label for="Spanish" style="padding: 0px; font-size: 0.9rem; margin:0;">
                          es
                        </label>
                      </div>
                      <div class=" col-lg-2 ">
                        <input class="form-check-input" type="checkbox" value="" id="French" style="height:  0.9rem; width: 0.9rem;" <?php echo $French  ?>>
                        <label for="French" style="padding-left: 0px; font-size: 1rem; margin-top: 2px;">
                          fr
                        </label>
                      </div>

                    </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-secondary">Update Info</button>
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
          </div>
          </form>
        </div>
        </div>
      </div>
    </div>

<!--   End Modal For ModalForUpdateInfo-->





<!--    Modal For Guide Req.-->
    <div class="modal fade" id="ModalForGuideReq" tabindex="-1" aria-labelledby="ModalForGuideReq" aria-hidden="true" data-backdrop="static" role="dialog"  >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            Guidance Requests
          </div>
          <div class="modal-body">


             <?php
             $QryForFeedback = "SELECT * FROM guidance_request INNER JOIN  User on guidance_request.Tourist_ID=User.User_ID  WHERE guidance_request.Guide_ID='{$_SESSION['UID']}' and Request_Status=0";
             $resultFB = mysqli_query($conn,$QryForFeedback);
              for ($i = 0; $i < $resultFB->num_rows; $i++) {

              $roww = $resultFB->fetch_object();

              if(!isset($_SESSION['img'])){
                 $imgg=$roww->User_Img;
              }
              else{
//                  $imgg=$_SESSION['img'];
////                  $QryForsetimg = "UPDATE User SET User_Img= 'imgs/368633.png' WHERE User_ID= '$roww->Tourist_ID'";
////                  echo "UPDATE User SET User_Img= 'imgs/368633.png' WHERE User_ID= '$roww->Tourist_ID'";
////                  $Re= mysqli_query($conn,$QryForsetimg);
////                  echo $Re;

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
                    >From: '.$roww->Tourist_ID.'</span
                    >
                  <time class="date" datetime="2020-05-05T10:00:00" style="font-size: 0.8rem; width: 100%; display: inline-block;"
                  >sent at:  '.$roww->Request_Required_Time.'</time  >
                  <time class="date" datetime="2020-05-05T10:00:00" style="font-size: 0.8rem; width: 100%; display: inline-block;"
                  >Required date: '.$roww->Request_Required_date.'</time  >
                  <time class="date" datetime="2020-05-05T10:00:00" style="font-size: 0.8rem; width: 100%; display: inline-block;"
                  >Required time: '.$roww->Request_Required_Time.'</time  >
                  <span class="project__inform-name" style="font-size: 0.8rem; width: 100%; display: inline-block;"
                  >Required Days&Hours: '.$roww->Request_Required_Dayes	.' & '.$roww->Request_Required_Hours.'.</span>
                </div>

                <div class="col-lg-3 justify-content-start" >
                 <form action="Accept.php" method="post" >
                  <input type="hidden" value="'.$roww->Request_ID.'" name="theReqID">
                  <button type="submit" class="btn btn-primary btn-success" name="submit" value="" style="background-color: transparent; border-color: #61892f; color: #61892f; width: 5rem; margin-bottom: 2px;">Accept</button>
                </form>

                  <button type="button" class="btn btn-primary"   style="background-color: transparent; border-color: darkred; color: darkred;width: 5rem;">Reject</button>
                </div>
              </div>
  </a>

 ';}?>


          </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
              </div>
        </div>
      </div>
    </div>

    <!--   End Modal For Guide. Req.-->


    <!--    Modal For Guide Acc.-->
    <div class="modal fade" id="ModalForGuideAcc" tabindex="-1" aria-labelledby="ModalForGuideAcc" aria-hidden="true" data-backdrop="static" role="dialog"  >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            Accepted Guidance Requests
          </div>
          <div class="modal-body">

              <?php
              $QryForFeedback = "SELECT * FROM guidance_request INNER JOIN  User on guidance_request.Tourist_ID=User.User_ID  WHERE guidance_request.Guide_ID='{$_SESSION['UID']}' and Request_Status=1";
              $resultFB = mysqli_query($conn,$QryForFeedback);
              for ($i = 0; $i < $resultFB->num_rows; $i++) {

                  $roww = $resultFB->fetch_object();

//                  if(!isset($_SESSION['img'])){
//                      $imgg=$roww->User_Img;
//                  }
//                  else{
//                      $imgg=$_SESSION['img'];
//
//                  }

                  echo '   

            <a href="#" class="project__link focus&#45;&#45;box-shadow" style="width: 100%; height: 20%;margin-bottom: 4px;">
              <div class="project__wrapper row w-100 justify-content-start">

                <div class="col-lg-3" >

                      <img
                              src="imgs/368633.png" class="rounded-circle float-start border"
                      />

                </div>

                <div class="col-lg-6 justify-content-center"  >
                    <span class="project__inform-name" style="font-size: 0.8rem; width: 100%; display: inline-block;"
                    >From: '.$roww->Tourist_ID.'</span
                    >
                  <time class="date" datetime="2020-05-05T10:00:00" style="font-size: 0.8rem; width: 100%; display: inline-block;"
                  >sent at:  '.$roww->Request_Required_Time.'</time  >
                  <time class="date" datetime="2020-05-05T10:00:00" style="font-size: 0.8rem; width: 100%; display: inline-block;"
                  >Required date: '.$roww->Request_Required_date.'</time  >
                  <time class="date" datetime="2020-05-05T10:00:00" style="font-size: 0.8rem; width: 100%; display: inline-block;"
                  >Required time: '.$roww->Request_Required_Time.'</time  >
                  <span class="project__inform-name" style="font-size: 0.8rem; width: 100%; display: inline-block;"
                  >Required Days&Hours: '.$roww->Request_Required_Dayes	.' & '.$roww->Request_Required_Hours.'.</span>
                </div>

                <div class="col-lg-3 justify-content-start" >
                   <button type="button" class="btn btn-primary"   style="background-color: transparent; border-color: #61892f; color: #61892f; width: 5rem; margin-bottom: 2px;">Email</button>
                  <button type="button" class="btn btn-primary"   style="background-color: transparent; border-color: darkred; color: darkred;width: 5rem;">Reject</button>

                </div>
              </div>
  </a>

 ';}?>



          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!--   End Modal For Guide. Acc.-->

    <!--    Modal For Guide Feedback.-->
    <div class="modal fade" id="ModalForFeedBack" tabindex="-1" aria-labelledby="ModalForFeedBack" aria-hidden="true" data-backdrop="static" role="dialog"  >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            Feedbacks

          </div>
          <div class="modal-body">


             <?php
             $QryForFeedback = "SELECT * FROM feed_back INNER JOIN  User on feed_back.Tourist_ID=User.User_ID  WHERE feed_back.Guide_ID='{$_SESSION['UID']}'";
             $resultFB = mysqli_query($conn,$QryForFeedback);
              for ($i = 0; $i < $resultFB->num_rows; $i++) {
              $roww = $resultFB->fetch_object();
              $imgU ='imgs/account.png';
              $st = $roww->Feedback_Stars;



                  echo '
                          <div href="#" class="project__link focus&#45;&#45;box-shadow" style="width: 100%; height: 20%;margin-bottom: 4px;">
              <div class="project__wrapper row w-100 justify-content-start">

                <div class="col-lg-3" >
                  <img src="'.$imgU.'" class="rounded-circle float-start border"/>
                </div>
                    
                <div class="col-lg-9 justify-content-center"  >
                  <div class="Starcontainer">
                    <span class="fa fa-star fa-2x '; if($st>=1){ echo "Starchecked";} echo'"></span>
                    <span class="fa fa-star fa-2x '; if($st>=2){ echo "Starchecked";} echo'"></span>
                    <span class="fa fa-star fa-2x '; if($st>=3){ echo "Starchecked";} echo'"></span>
                    <span class="fa fa-star fa-2x '; if($st>=4){ echo "Starchecked";} echo'"></span>
                    <span class="fa fa-star fa-2x '; if($st>=5){ echo "Starchecked";} echo'"></span>
                  </div>
                    <span class="project__inform-name" style="font-size: 0.8rem; width: 100%; display: inline-block;"
                    >From:'. $roww->Tourist_ID .'</span
                    >
                            </div>

              </div>
            </div>
  ';


              }
              ?>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!--   End Modal For Guide. Feedback.-->




    <script type="text/javascript">

      var card =document.getElementById("cardi");
      function openRegister(){
        card.style.transform = "rotateY(-180deg)";
      }

      function openLogin(){
        card.style.transform = "rotateY(0deg)";
      }


    </script>



    <script>
      $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
      })

    </script>

<!--    <script>-->
<!--      $('#ModalForUpdateInfo').modal({-->
<!--    backdrop: 'static',-->
<!--    keyboard: false-->
<!--    })-->
<!--      </script>-->


      <!--    <script src="js/Guidejavascript.js"></script>-->

<!--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>-->
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>-->
<!--    <script src="node_modules/scrollreveal/dist/scrollreveal.js"></script>-->
<!--    <script src="//g.tutorialjinni.com/mojoaxel/bootstrap-select-country/dist/js/bootstrap-select-country.min.js"></script>-->
<!--        <script type="text/javascript" src="js/script.js"></script>-->
<!--        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="node_modules/scrollreveal/dist/scrollreveal.js"></script>
    <scropt src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></scropt>
    <script type="text/javascript" src="js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="//g.tutorialjinni.com/mojoaxel/bootstrap-select-country/dist/js/bootstrap-select-country.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


  </body>
</html>
