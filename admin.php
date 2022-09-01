<?php
session_start();
if(isset($_SESSION['AfterLoginAsAdmin'])) {
if ($_SESSION['AfterLoginAsAdmin']==1) {

    $conn = mysqli_connect("localhost", "root", "", "myguidedb");
    $query = "SELECT * FROM user";
    $result = mysqli_query($conn, $query);
}else{        header("Location: index.php");


}
}else{
    header("Location: index.php");

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
    <link rel="stylesheet" href="css/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


    <!-- custom css file link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//g.tutorialjinni.com/mojoaxel/bootstrap-select-country/dist/css/bootstrap-select-country.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="homework.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">


   <link rel="stylesheet" type="text/css" href="css/admin.css">
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #61892f;
            color: white;
        }
    </style>

</head>
<body>
<div class="wrapper">
        <main class="main">
            <button class="profile__button" style="margin-bottom: 20px;  display: flex;
  flex-wrap: wrap;">
                <a href="#" class="logo" style="margin-top: 10px;">   <i class="fas fa-suitcase-rolling" style="font-size: 1.8rem; margin-top: 20px;">

                </i> <span class="firstspan"  style="font-size: 1.8rem; margin-top: 20px;">My</span><span class="secspan" style="font-size: 1.6rem; margin-top: 20px;">TourGuide</span></a>


            </button>



            <h1>Manage Users</h1>
<h6 style="color: #61892f">0 = User || 1 = Guide <br></h6>
            <table id="customers">
                <tr>
                    <th>Fisrt Name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Statues</th>

                    <th>Ban</th>
                </tr>
                <?php
                while ($rows=mysqli_fetch_assoc($result))
                {
                ?>
                    <tr>
                        <td><?php echo $rows['User_FName']; ?></td>
                        <td><?php echo $rows['User_LName']; ?></td>
                        <td><?php echo $rows['User_ID']; ?></td>
                        <td><?php echo $rows['Type']; ?></td>
                     <?php   echo"<td>";
                            echo' <a href="delete.php?Did='.$rows['User_ID'].'" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>';
                            echo"    </td>";?>
                    </tr>
            <?php    }
?>

            </table>

            <div id="deleteEmployeeModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="delete.php" method="post">
                            <div class="modal-header">
                                <h4 class="modal-title">Ban User</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>

                            <div class="modal-body">

                                <p>Are you sure you want to delete these Records?</p>
                                <!-- <p class="text-warning"><small>This action cannot be undone.</small></p>-->
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                <input type="submit" name="deletedata" class="btn btn-danger" value="Delete">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <aside class="aside">
            <section class="section">
                <div class="toggle">
<h1>Admin</h1>
                </div>
                <div class="profile-main">
                    <button
                            class="profile-main__setting focus--box-shadow"
                            type="button"
                            style="margin-top: 20px"
                    >
                        <img
                                class="profile-main__photo"

                                src="./imgs/Dana.jpg"
                                alt="Profile photo"
                        />
                    </button>
                    <div>

                        <h3 class="profile-main__name" style="margin-top: 20px">Dana Ramadan</h3>
                    </div>

                </div>
                <div class="banner">
                    <h4 class="banner__title">Welcome Admin!</h4>
                    <p class="banner__description">Your job is very important to spread peace and love among the members of the site and to prevent fraudsters.</p>

                    </button>
                </div>
                <div class="logOut" style="margin: 10px; text-align: center">
                    <a href="index.php">Log Out</a>
                </div>

            </section>
        </aside>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript" src="js/script.js"></script>

</body>
</html>
