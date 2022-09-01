<?php

session_start();
if(isset($_SESSION['toMap'])){
    if ($_SESSION['toMap']==1){
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

                    <a href="#"  class="nav0__link focus--box-shadow" role="menuitem" aria-label="Home">
                        <svg class="nav0__icon"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  >
                            <path fill="#6563ff"  d="M20,8h0L14,2.74a3,3,0,0,0-4,0L4,8a3,3,0,0,0-1,2.26V19a3,3,0,0,0,3,3H18a3,3,0,0,0,3-3V10.25A3,3,0,0,0,20,8ZM14,20H10V15a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1Zm5-1a1,1,0,0,1-1,1H16V15a3,3,0,0,0-3-3H11a3,3,0,0,0-3,3v5H6a1,1,0,0,1-1-1V10.25a1,1,0,0,1,.34-.75l6-5.25a1,1,0,0,1,1.32,0l6,5.25a1,1,0,0,1,.34.75Z"/>
                        </svg>
                    </a>

                </li>

                <li class="nav0__item">
                    <a  href="#" class="nav0__link focus--box-shadow"role="menuitem" aria-label="Informational messages" >
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
            <!--        < class="header">-->

            <div class="profile" style=" ">
                <button class="profile__button" style="margin-bottom: 20px;  display: flex;
  flex-wrap: wrap;">
                    <a href="#" class="logo" style="margin-top: 10px;">   <i class="fas fa-suitcase-rolling" style="font-size: 1.8rem; margin-top: 20px;">

                        </i> <span class="firstspan"  style="font-size: 1.8rem; margin-top: 20px;">My</span><span class="secspan" style="font-size: 1.6rem; margin-top: 20px;">TourGuide</span></a>

                </button>


            </div>




        <section class="map_section " id="map">


        </section>


        </main>

        <aside class="aside">
            <section class="section">
                <div class="toggle">



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