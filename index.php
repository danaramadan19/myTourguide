<?php
session_start();
$conn = mysqli_connect("localhost","root","","myguidedb");
if(!$conn){
    echo "<script>alert('Connection faild.');</script>";
}
if(isset($_POST["submit"])){
    $id = mysqli_real_escape_string($conn,$_POST["email"]);
    $fname = mysqli_real_escape_string($conn,$_POST["fname"]);
    $lname = mysqli_real_escape_string($conn,$_POST["lname"]);
    $national = mysqli_real_escape_string($conn,$_POST["natonal"]);
    $gender = mysqli_real_escape_string($conn,$_POST["TGender"]);
    $password = mysqli_real_escape_string($conn,SHA1($_POST["pass"]));
    if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE User_ID='{$id}'"))>0){
        echo "<script>alert('{$id} This email has already taken.');</script>";
    }else{
        $CDate = date("Y-m-d");
        $sql = "INSERT INTO user (User_ID ,User_FName,User_LName,User_Nationality,User_Gender ,User_Pass, Tourist_Date_join, Type ) VALUES ('{$id}','{$fname}','{$lname}','{$national}','{$gender}','{$password}','$CDate','0' )";
        $sql = "INSERT INTO user (User_ID ,User_FName,User_LName,User_Nationality,User_Gender ,User_Pass, Tourist_Date_join, User_Img,Type ) VALUES ('{$id}','{$fname}','{$lname}','{$national}','{$gender}','{$password}','$CDate', 'imgs/368633.png' ,'0' )";
        $result = mysqli_query($conn,$sql);

        if ($result){
            $_SESSION['AfterLoginAsUser']=1;
            $_SESSION['UID']=$id;
            $_SESSION['UFullName']=$fname.' '.$lname;
            $_SESSION['UserType']=0;
            header("Location: userpage.php");
        }else{
            echo "<script>alert('error');</script>";
        }
    }
//
//    if ($result){
//        header("Location: userpage.php");
//    }else {
//        echo "<script>Error: " . $sql . mysqli_error($conn) . "</script>";
//    }
}
else if(isset($_POST["login"])){
    $conn = mysqli_connect("localhost","root","","myguidedb");
    $id = mysqli_real_escape_string($conn,$_POST["id"]);
    $password = mysqli_real_escape_string($conn,SHA1($_POST["pass"]));
    $sql = "SELECT * FROM user WHERE User_ID='{$id}' AND User_Pass='{$password}'";
    $result = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);
$resOb = $result->fetch_object();

if ($count === 1) {
    if ($resOb->Tourist_Ban == 1) {
        echo "<script>alert('You have been blocked');</script>";
        header("Location: index.php");
    } else {
        $UType = $resOb->Type;
        $_SESSION['UID'] = $id;
        $_SESSION['UFullName'] = $resOb->User_FName . ' ' . $resOb->User_LName;
        $_SESSION['UserType'] = $UType;
        if ($UType == 0) { //user
            $_SESSION['AfterLoginAsUser'] = 1;
            header("Location: userpage.php");
        } elseif ($UType == 1) { //Guide
            $_SESSION['AfterLoginAsGuide'] = 1;
            header("Location: GuidePage.php");
        } elseif ($UType == 2) { //admin
            $_SESSION['AfterLoginAsAdmin'] = 1;
            header("Location: Admin.php");
        }

else{
        echo "<script>alert('wrong password or email $id $password ');</script>";
    }
}}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Tour Guide</title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- custom css file link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//g.tutorialjinni.com/mojoaxel/bootstrap-select-country/dist/css/bootstrap-select-country.min.css" />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <div class="menu-btn"></div>
    <a href="#" class="logo"><i class="fas fa-suitcase-rolling"></i> <span class="firstspan">My</span><span class="secspan">TourGuide</span></a>
    <div class="navigation">
        <div class="navigation-items">
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#owners">Owners</a>
            <a href="#start">Start</a>
            <a href="#contact">contact</a>
        </div>
    </div>
    <div class="icons">
<!--        <i class="fas fa-search" id="search-btn"></i>-->
        <i class="fas fa-user" id="login-btn"></i>
    </div>
    <form action="" class="search-bar-container">
        <input type="search" id="search-bar" placeholder="search here...">
        <label for="search-bar" class="fas fa-search"></label>
    </form>
</header>
<!-- login form container  -->
<div class="login-form-container">
    <!----لتفعيل كبسة الاغلاق لا تلمس!--->
    <i class="fas fa-times" id="form-close"></i>
    <!---------------------------------------------->
    <div class="cardi">
        <div class="inner-box" id="cardi">
            <div class="card-front">
                <h2><strong><i class="fas fa-suitcase-rolling"></i>LOGIN</strong></h2>
                <form action="" method="post">
                    <input type="email" name="id" class="input-box" style=" font-size: small; "  placeholder="Enter your email" required>
                    <input type="password" class="input-box" name="pass" style=" font-size: small; "  placeholder="Password" required>
                    <input type="checkbox" style=" font-size: small; " ><span>Remember Me</span>
                    <button  name="login" class="submit-btn">Submit</button>
                </form>
                <button type="button" class="btn" onclick="openRegister()"><span>I'm New Here</span></button>
                <a href="">Forget Password</a>
            </div>
            <div class="card-back">
                <h2><strong><i class="fas fa-suitcase-rolling"></i>REGISTER</strong></h2>
                <form action="" method="post">
                    <a href="Guide-SignUp.php" class="text-danger">Are you a Guide? click here to join us.</a>
                    <input type="text" class="input-box" name ="fname" placeholder="First Name" style="width: 49%; font-size: small; flex: auto;"  required>
                    <input type="text" class="input-box" name ="lname" placeholder="Last Name" style="width: 49%; font-size: small; flex: auto;" required>
                    <input type="email" class="input-box" name ="email" placeholder="Email" style=" font-size: small; " required>
                    <select class="selectpicker countrypicker input-box" name="natonal" style=" font-size: small; "  data-countries="ps,dz,bh,eg,iq,jo,kw,lb,ly,ma,om,qa,sa,sy,tn,ae,ya,fr, sp, alb,aut,bih,blr,che,cyp,due,gbr,ita,isl,rou, nor,nld,ukr " required ></select>
                    <select class="input-box"  style=" font-size: small; "  name="TGender" required >
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                    <input type="password" class="input-box" name="pass" style=" font-size: small; " placeholder="Password" required>
                    <button name="submit" class="submit-btn" style=" font-size: small; margin-top: 5px; margin-bottom: 20px;" ><b>Submit</b></button>
                </form>
                <button type="button" class="btn" onclick="openLogin()"  style="margin-top: 2px;" ><span>I've an account</span></button>
            </div>
        </div>
    </div>
</div>
<div class="home">
    <!--From bootstrab-->
    <!--this code from bootstrab-->
    <div id="carouselExampleCaptions" class="carousel slide tochange" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active " aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner ">
            <div class="carousel-item active" >
                <video class="img-fluid myvideo" autoplay loop muted  width="100%" >
                    <source src="video/production ID_4922982.mp4" type="video/mp4" />
                </video>
            </div>
            <div class="carousel-item  ">
                <video class="img-fluid myvideo" autoplay loop muted  width="100%" height="100%">
                    <source src="video/pexels-cottonbro-9940827.mp4" type="video/mp4" />
                </video>
            </div>
            <div class="carousel-item  ">
                <video class="img-fluid myvideo" autoplay loop muted height="100%" width="100%">
                    <source src="video/video.mp4"type="video/mp4" />
                </video>
            </div>
        </div>
        <div class="carousel-caption">
            <div class="overlay">
                <div class="header-content-items">
                    <h1 class="main-title  d-none d-md-block">A good trip needs a good tour guide!</h1>
                    <span class="line"></span>
                    <p class="main-description">Find the best tour guides for your next trip.</p>
                    <a class="link" href="#about">Learn more</a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel wrapper -->
<!--AboutSection-->
<div class="about" id="about">
    <div  class="row justify-content-center align-items-center">
        <div data-aos="fade-up"
             data-aos-offset="200"
             data-aos-delay="10"
             data-aos-duration="500"
             data-aos-easing="ease-in-out"
             data-aos-mirror="true"
             data-aos-once="false"
             data-aos-anchor-placement="top-center"   class="col-lg-5 col-md-12 col-sm-12 aboutImage  img-fluid " >
            <img src="imgs/JungleExplorers2.jpg" >
        </div>
        <div  data-aos="fade-left" class="col-lg-5 col-md-12 col-sm-12 aboutPara d-flex justify-content-center col-md-offset-5" >
            <div><p><span class="lineInAbout">A good trip needs a good tour guide!</span><br><br>
                    Through <i class="fas fa-suitcase-rolling"></i> <span class="firstspaninAbout">My</span><span class="secspaninAbout">TourGuide</span> website, you can reach the best tour guides.
                    <br> what are you waiting for! Every new day is a good day for adventure and exploration.</p>
            </div>
        </div>
    </div>
</div>
<!-- End AboutSection-->
<!--Owners  https://bootsnipp.com/snippets/xrD7X -->
<div class="Ownersection" data-aos="flip-left"
     data-aos-offset="200"
     data-aos-delay="20"
     data-aos-duration="5000"
     data-aos-easing="ease-in-out"
     data-aos-mirror="true"
     data-aos-once="false"
     data-aos-anchor-placement="top-center" id="owners">
    <div class="row" id="owners">
        <h1 class="heading">
            <span>o</span>
            <span>w</span>
            <span>n</span>
            <span>e</span>
            <span>r</span>
            <span>s</span>
        </h1>
    </div>
    <div  class="row  justify-content-center align-items-center gx-5">
        <div class="card col-lg-6 col-md-6 col-sm-12">
            <div class="box">
                <div class="img">
                    <img src="imgs/photo5220107937823961954.jpg">
                </div>
                <h2>Tasbeh Takrore<br><span>Full Stack Developer</span></h2>
                <p class="h4">She studies at An-Najah National University, interested in science, art, Arabic, and blogging.</p>
                <br>
                <br>
                <span>
            <ul>
                <li><a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
        </span>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 card ">
            <div class="box">
                <div class="img">
                    <img src="imgs/Dana.jpg">
                </div>
                <h2>Dana Ramadan<br><span>Full Stack Developer</span></h2>
                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et.</p>
                <span>
            <ul>
                <li><a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
        </span>
            </div>
        </div>
    </div>
</div>
<div class="row start  h-auto gx-5 mh-100" id="start">
    <div class="col-md-3 col-sm-6 p-5" data-aos="fade-right"  data-aos-delay="10" data-aos-duration="5000">
        <img src="imgs/Mobile login-bro.svg" alt="" class="img-fluid">
        <p class="text-center heading" style="font-size: 300%;"> <span style="background-color:#474b4f;  color: white">1</span> Sign Up</p>
    </div>
    <div class="col-md-3 col-sm-6 p-5" data-aos="fade-right"  data-aos-delay="500" data-aos-duration="5000">
        <img src="imgs/Online world-rafiki.svg" alt="" class="img-fluid">
        <p class="text-center heading" style="font-size: 300%;"> <span style="background-color:#474b4f;  color: white">2</span> Choose location</p>
    </div>
    <div class="col-md-3 col-sm-6 p-5" data-aos="fade-right" data-aos-delay="1000" data-aos-duration="5000">
        <img src="imgs/Connected world-amico.svg" alt="" class="img-fluid">
        <p class="text-center heading" style="font-size: 300%;"> <span style="background-color:#474b4f;  color: white">3</span> Find a guide</p>
    </div>
    <div class="col-md-3 col-sm-6 p-5" data-aos="fade-right" data-aos-delay="1500" data-aos-duration="5000">
        <img src="imgs/People sightseeing outdoors-bro.svg" alt="" class="img-fluid">
        <p class="text-center heading" style="font-size: 300%;"> <span style="background-color:#474b4f;  color: white">4</span> Start exploring!</p>
    </div>
</div>
<div class="contact" id="contact">
    <div class="container contact-form">
        <div class="contact-image">
            <img src="imgs/football_field100_82_generated.jpg" alt="rocket_contact"/>
        </div>
        <form method="post">
            <h3>Leave us your opinion and suggestions!</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="txtName" class="form-control" placeholder="Your Name *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="txtEmail" class="form-control" placeholder="Your Email *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="txtPhone" class="form-control" placeholder="Your Phone Number *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="submit" name="btnSubmit" class="btnContact" value="Send Message" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <textarea name="txtMsg" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!--</div>-->
<!--End Owners-->
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
<script>
    AOS.init();
</script>
<script type="text/javascript">
    var card =document.getElementById("cardi");
    function openRegister(){
        card.style.transform = "rotateY(-180deg)";
    }
    function openLogin(){
        card.style.transform = "rotateY(0deg)";
    }
</script>
</body>
</html>