<?php include "includes/hearder.php"; ?>
<?php
if(!isset($_SESSION['id'])) {
    unset($_SESSION["id"]);
    header("location:login.php");
}
?>
<p><br></p>
<!-- start banner Area -->

<!-- End banner Area -->
<section class="top-course-area section-gap">
    <img class="header-img img-fluid align-self-end d-flex" src="img/attend.png" width="500" height="150" alt="">
    <div class="container"  align="center">
        <div class="row">
            <div class="col-md-8">
                <form method="post">
                    <h1 class="text-danger"><span class="fa fa-barcode"></span></h1>
                    <label for="learnerID" class="text-danger ">Scan the ID of the Learner to Get the
                        Learner Identification Number or Enter The Number Manually.</label>
                    <input type="text" onblur="BarCodeValue()" name="learnerID" id="learnerID" class="form-control">
                    <span id="msg"></span>
                </form>
            </div>
        </div>
</section>
<script type="text/javascript">
    function BarCodeValue() {
        const learnerID = $("#learnerID").val();
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{barCode:1,learnerID:learnerID},
            success:function (data) {
              $("#msg").html(data);
            }
        });
    }
</script>
<!-- End feature Area -->

<!-- start footer Area -->
<?php include "includes/footer.php"; ?>
<!-- End footer Area -->




