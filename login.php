<?php
include "includes/config.php";
if (isset($_SESSION["id"])){
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="School Attendance" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>School Attendance</title>
    <!--
    CSS
    ============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<!-- Start feature Area -->
<section class="feature-area " id="service">
    <div class="container">
        <div class="row justify-content-between">
            <!-- Enrolment Form -->
            <div  class="col-lg-12 col-md-12 booking-right" id="usrforms" align="center">
                <form method="post" action="login.php">
                    <img src="img/coat.png" width="150" height="150" />
                    <h1 class="mb-20 text-danger" s>Learner Attendance Taker</h1>
                    <h1 class="mb-20 text-primary">Login</h1>

                    <div id="mesg_usr" class="col-md-5">
                        <?php
                        if (isset($_POST["login"])) {
                            $uname = $_POST["uname"];
                            $pword = $_POST["pword"];
                            $hashedPassword = md5($pword);
                            $sql  = "SELECT*FROM sysuser WHERE username=:usr AND  password=:pwd";
                            $mysql = $connect->prepare($sql);
                            $mysql->bindParam(":usr",$uname);
                            $mysql->bindParam(":pwd" ,$hashedPassword);
                            $mysql->execute();
                            $users = $mysql->fetch(PDO::FETCH_OBJ);

                            if (@$hashedPassword == @$users->password) {
                                if ( $uname == $users->username) {
                                   if ($hashedPassword==$users->password || $uname == $users->username){
                                       // sysID
                                       //  firstName | surname | username
                                       //  email
                                       // cellphone    | password
                                       // position status
                                       $_SESSION['id'] = $users->sysID;
                                       $_SESSION['fname'] = $users->firstName;
                                       $_SESSION['surname'] = $users->surname;
                                       $_SESSION['email'] = $users->email;
                                       $_SESSION['position'] = $users->position;
                                       if ($_SESSION['position']=="learner"){
                                           header("location:learnersForm.php");
                                       }

                                       if ($_SESSION["position"]=='standOffice'){
                                           header("location:report_t.php");
                                       }

                                       header("location:index.php");
                                   }else{
                                       echo "<div class='alert alert-danger'>incorrect Username and Password !</div>";
                                   }
                                }else{
                                    echo "<div class='alert alert-danger'>incorrect Username!-> $uname</div>";
                                }

                            }else{
                                echo "<div class='alert alert-danger'>incorrect Password!-> $pword</div>";
                            }

                        }
                        ?>
                    </div>
                    <div class="col-md-5">
                        <input class="form-control" type="text" name="uname" id="uname"  placeholder="User Name" required>
                    </div>
                    <br>
                    <div class="col-md-5">
                        <input class="form-control" type="password" name="pword" id="pword" placeholder="Password" required>
                    </div>
                    <br>
                    <div class="col-md-5">
                        <button type="submit" name="login" class="btn btn-danger btn-lg btn-block text-center">Login</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
</section>
<!-- End feature Area -->
<div class="col-md-12" align="center">
    <p>Copyright &copy;<?php date("Y") ?>. Designed and Developed By Bridget SIN:#. All Rights Reserved</p>
</div>
<!-- End footer Area -->