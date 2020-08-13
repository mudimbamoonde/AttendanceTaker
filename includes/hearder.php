<?php
include "includes/config.php";
if(!isset($_SESSION["id"])){
    header("location:logout.php");
}

?>
<!DOCTYPE html>
	<html lang="en" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="School Attendance" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
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
			  <header id="header" id="home">
			    <div class="container">	
			    	<div class="row align-items-center justify-content-center d-flex">
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
                       <?php if($_SERVER["PHP_SELF"]=="/AttendanceTaker/index.php"){ ?>
				          <li class="menu-active"><a href="index.php">Home</a></li>	
						 <?php }else{?>
						      <li><a href="index.php">Home</a></li>
						 <?php }?>
							   <?php if ($_SERVER["PHP_SELF"] == "/AttendanceTaker/appraisalAn.php") { ?>
                                   <li class="menu-active"><a href="learnerScan.php">Take Attendance</a></li>
                                 <?php } else { ?>
                                      <li><a href="learnerScan.php">Take Attendance</a></li>
                               <?php } ?>

                            <?php if ($_SERVER["PHP_SELF"] == "/AttendanceTaker/Vuser.php") { ?>
                                <li class="menu-active"><a href="Vuser.php">System Users</a></li>
                            <?php } else { ?>
                                <li ><a href="Vuser.php">System Users</a></li>
                            <?php } ?>
                            <?php if ($_SERVER["PHP_SELF"] == "/AttendanceTaker/settings.php") { ?>
                                <li class="menu-active"><a href="settings.php">Reports</a></li>
                            <?php } else { ?>
                                <li ><a href="settings.php">Reports</a></li>
                            <?php } ?>

                            <li><a href="logout.php">Logout</a></li>
                            <li><a href="logout.php" class="alert alert-info"> <?php
                                    if (!isset($_SESSION['fname']) || !isset($_SESSION["surname"])){
                                        header("location:logout.php");
                                    }
                                    echo "Hi,".$_SESSION['fname']." ".$_SESSION["surname"];
                                    ?></a></li>
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header><!-- #header -->
              <hr>