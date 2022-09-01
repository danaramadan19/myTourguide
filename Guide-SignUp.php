
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Tour Guide</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


    <!-- custom css file link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--    <link rel="stylesheet" href="css/style.css">-->
    <!--    <link rel="stylesheet" href="css/style.css.css">-->
    <link rel="stylesheet" href="css/Guide-SignUp.css">
    <link rel="stylesheet" href="//g.tutorialjinni.com/mojoaxel/bootstrap-select-country/dist/css/bootstrap-select-country.min.css" />

</head>
<body>



<header>
    <a href="#" class="logo"><i class="fas fa-suitcase-rolling"></i> <span class="firstspan">My</span><span class="secspan">TourGuide</span></a>
    <div class="navigation">
        <div class="navigation-items">
            <a href="index.php">Home</a>
        </div>
    </div>
</header>


<div style="height: 90vh; position: fixed">

    <div class="row justify-content-center" >
        <div class="col-lg-12 " >
            <h1  style="margin-top: 150px; color: darkred; font-weight: bold; font-size: 3.5rem;" >You are here because you chose to be a tour guide with us!</h1>
        </div>
    </div>

    <br>
    <br>


    <div class="row justify-content-center" >
        <div class="col-lg-9 " >
            <h2  style=" font-size: 2rem;">Before you start working with us, you should read the following instructions carefully, because we make sure that everyone with us is a responsible person.</h2>
        </div>
    </div>

    <br>
    <div class="row justify-content-center" >
        <div class="col-lg-6 " >
            <ul class="list-group" style="padding:20px;">
                <li class="list-group-item" style="font-size: 1.5rem; padding:13px; margin: 2px;  ">1. Respect the site administration.
                </li>
                <li class="list-group-item" style="font-size: 1.5rem; padding:13px; margin: 2px;  ">2. Respect the tourists and respond to their requests by accepting or rejecting them within three days of sending the request.</li>
                <li class="list-group-item" style="font-size: 1.5rem; padding:13px; margin: 2px; ">3. Do not publish any post that contains violence, nudity, or deepens hatred.</li>
                <li class="list-group-item" style="font-size: 1.5rem; padding:13px; margin: 2px;  ">4. Enter correct information regarding the languages you master and the regions you know.</li>
            </ul>        </div>
    </div>

    <h3  style=" color: darkred; font-weight: bold; font-size: 1.5rem;" >If you accept scroll down!</h3>
    <div class=" row justify-content-center">
        <img src="imgs/dana22.gif" class="col-lg-5  " style="border-top-left-radius: .3rem; border-top-right-radius: .3rem; width: 8%;" alt="Sample photo">
    </div>

    <br>
    <br>
    <br>
</div>

<!--####################-->

<div class="row SignUpFormOut" style="position: relative; top: 100vh;">
    <div class="SignUpFormin col-lg-12 w-100">

        <section class=" w-100 h-custom h-75" style="background-image: url(imgs/map.png);width: 100%; padding: 0; margin: 0" >
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-8 col-xl-6" style="height: 80%">
                        <div class="card rounded-3">

                            <div class="card-body p-4 p-md-5">
                                <!--                                <h3 class="mt-5 mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Registration Info</h3>-->
                                <h1 class="heading">
                                    <span>R</span>
                                    <span>E</span>
                                    <span>G</span>
                                    <span>I</span>
                                    <span>S</span>
                                    <span>T</span>
                                    <span>E</span>
                                    <span>R</span>
                                </h1>
                                <form class="px-md-2" action="upload.php" method="post" enctype="multipart/form-data" >

                                <div class="form-outline mb-4 row justify-content-center">

                                        <div class="row  justify-content-center mb-2" style="width: 78%">
                                            <div class=" col-lg-5 input-group mb-3 w-50 input-group-lg">
                                                <span class="input-group-text" >First Name</span>
                                                <input type="text"  name="GFName" class="form-control" required>
                                            </div>
                                            <div class=" col-lg-5 input-group mb-3 w-50 input-group-lg">
                                                <span class="input-group-text" >Last Name</span>
                                                <input type="text"  name="GLName" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="input-group mb-3 w-75 input-group-lg">
                                            <span class="input-group-text" >Email</span>
                                            <input type="email"  name="GEmail" class="form-control" required>
                                        </div>


                                    <div class="input-group mb-3 w-75 input-group-lg">
                                        <span class="input-group-text" >Country</span>
                                        <select name="GCountry" class="selectpicker countrypicker input-box form-control" data-countries="ps,dz,bh,eg,iq,jo,kw,lb,ly,ma,om,qa,sa,sy,tn,ae,ya,fra,alb,and,aut,bih,blr,che,cyp,due,gbr,ita,isl,rou, nor,nld,ukr " required></select>
                                    </div>

                                        <div class="input-group mb-3 w-75 input-group-lg">
                                            <span class="input-group-text" >Gender</span>
                                            <select class="form-select"  name="GGender">
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                            </select>
                                        </div>


                                        <!--      Language that know-->
                                        <div class="row w-75">
                                            <div  style="height: 4rem; width: 6rem;" class=" col-lg-2 input-group-text mb-2">
                                                <p style="font-size: 1.5rem; padding-top: 2px; margin-bottom: 5px;">Lang</p>
                                            </div>
                                            <div class=" col-lg-2 ">
                                                <input class="form-check-input" type="checkbox" name="Arabic" value="Arabic" id="Arabic" style="height: 1.5rem; width: 1.5rem;">
                                                <label for="Arabic" style="padding-left: 0px; font-size: 1.4rem; margin-top: 2px;">
                                                    Arabic
                                                </label>
                                            </div>
                                            <div class=" col-lg-2 ">
                                                <input class="form-check-input" type="checkbox" name="English" value="English" id="English" style="height: 1.5rem; width: 1.5rem;">
                                                <label for="English" style="padding-left: 0px; font-size: 1.4rem; margin-top: 2px;">
                                                    English
                                                </label>
                                            </div>
                                            <div class=" col-lg-2 ">
                                                <input class="form-check-input" type="checkbox" name="Turkish" value="Turkish" id="Turkish" style="height: 1.8rem; width: 1.8rem;">
                                                <label for="Turkish" style="padding-left: 0px; font-size: 1.4rem; margin-top: 2px;">
                                                    Turkish
                                                </label>
                                            </div>
                                            <div class=" col-lg-2 ">
                                                <input class="form-check-input" type="checkbox" name="Spanish" value="Spanish" id="Spanish" style="height: 1.8rem; width: 1.8rem;">
                                                <label for="Spanish" style="padding-left: 0px; font-size: 1.4rem; margin-top: 2px;">
                                                    Spanish
                                                </label>
                                            </div>
                                            <div class=" col-lg-2 ">
                                                <input class="form-check-input" type="checkbox" name="French" value="French"  id="French" style="height: 1.8rem; width: 1.8rem;">
                                                <label for="French" style="padding-left: 0px; font-size: 1.4rem; margin-top: 2px;">
                                                    French
                                                </label>
                                            </div>

                                        </div>


                                        <div class="input-group mb-3 w-75 input-group-lg">
                                            <span class="input-group-text" >   Password </span>
                                            <input type="password"  name="GPass" class="form-control" required>
                                        </div>


                                        <div class="input-group mb-3 w-75 input-group-lg">
                                            <span class="input-group-text" >Confirm Password</span>
                                            <input type="password"  class="form-control"  name="confPass" required>
                                        </div>

                                        <div>
                                            <p style="margin-top: 10px;font-size: 1.3rem; margin-bottom: 0px;">Upload your profile picture</p>
                                        </div>

                                        <div class="input-group mb-2 w-75 input-group-lg">
                                            <input type="file"  name="GImage" class="form-control"  accept="image/*"  required>
                                        </div>

                                        <div>
                                            <p style="margin-top: 10px;font-size: 1.3rem; margin-bottom: 0px;">Tourist guide price $ </p>
                                        </div>


                                        <div class="row w-75 justify-content-center">
                                            <div class=" col-lg-5 input-group mb-2 w-50 input-group-lg">
                                                <span class="input-group-text" >per hour</span>
                                                <input type="number"  name="GPH" class="form-control" required>
                                            </div>
                                            <div class=" col-lg-5 input-group mb-2 w-50 input-group-lg">
                                                <span class="input-group-text" >per day</span>
                                                <input type="number"  name="GPD" class="form-control" required>
                                            </div>
                                        </div>





                                        <div>
                                            <button type="submit" name="submit" class="btn btn-success btn-lg mt-3 mb-0" style=" background-color: #61892f; border-color: #61892f;  width: 30%; ">Submit</button>
                                        </div>


                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



    </div>
</div>


<!--####################-->



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

<script type="text/javascript" src="./js/Guide-SignUp.js"></script>




</body>
</html>