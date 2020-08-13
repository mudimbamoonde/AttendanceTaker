<?php include "includes/hearder.php"; ?>
<?php
if(!isset($_SESSION['id'])) {
    unset($_SESSION["id"]);
    header("location:login.php");
}
?>
<!-- Start feature Area -->
<section class="feature-area" id="service">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <a href="report_t.php"><h4><span class="lnr lnr-users"></span>Learners/Departmental Rate Evaluation Sheets</h4></a>
                    <p>
                        Collect forms and details after an evaluation is take.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <h4><span class="lnr lnr-star-half"></span>Standard Officer Comments</h4>
                    <p>
                        Evaluate and Comment on teacher progress and monitor the working progress.
                    </p>
                </div>
            </div>




        </div>
    </div>
</section>
<!-- End feature Area -->

<!-- start footer Area -->
<?php include "includes/footer.php"; ?>
<!-- End footer Area -->




