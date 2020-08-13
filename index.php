<?php include "includes/hearder.php"; ?>
<?php
if(!isset($_SESSION['id'])) {
    unset($_SESSION["id"]);
    header("location:login.php");
}
?>
<p><br></p>
			<!-- start banner Area -->
			<section class="banner-area" id="home">	
				<div class="container-fluid">				
					<div class="row d-flex align-items-center justify-content-start">
						<div class="banner-content col-lg-9">
							<h2 class="text-danger">Take Learners Attendance in Minutes</h2>
							<h1 class="text-white text-capalize">
								A Tool for Effective <br>
                                Attendance Management<br>
							</h1>
                            <?php if ($_SESSION["position"]=='hod'){?>
							<a href="teacher_depart.php" class="genric-btn circle">Start Analyze <?php echo $_SESSION["fname"]." ".$_SESSION["surname"]  ?></a>
                            <?php }?>

                            <?php if ($_SESSION["position"]=='learner'){?>
							<a href="teacher.php" class="genric-btn circle">Start Analyze <?php echo $_SESSION["fname"]." ".$_SESSION["surname"]  ?></a>
                            <?php }?>


                            <?php if ($_SESSION["position"]=='teacher'){?>
							<a href="appraisalAn.php" class="genric-btn circle">View Reports <?php echo $_SESSION["fname"]." ".$_SESSION["surname"]  ?></a>
                            <?php }?>

                            <?php if ($_SESSION["position"]=='master' AND $_SESSION["position"]=='hod'){?>
                            <a href="appraisalAn.php" class="genric-btn circle">Start to Analyze</a>
                            <?php }?>
						</div>

					</div>
				</div>
			</section>
			<!-- End banner Area -->
<section class="top-course-area section-gap">
    <img class="header-img img-fluid align-self-end d-flex" src="img/header-img.png" width="400" height="150" alt="">
    <div class="container"  align="center">
        <a href="learnerScan.php" class="btn-lg btn-info text-lg-center">Take Attendance</a>

</section>

			<!-- End feature Area -->	

			<!-- start footer Area -->		
			<?php include "includes/footer.php"; ?>
			<!-- End footer Area -->




