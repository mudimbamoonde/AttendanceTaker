<?php include "includes/hearder.php"; ?>
<!-- Start feature Area -->
<br>
<br>
<br>
<section class="feature-area" id="service" >
    <div class="container" >
        <h1 style="margin-left: 250px;">SELECT TEACHER TO EVALUATE</h1>
        <div class="row justify-content-between" style="margin-left: 350px;">
            <!-- Enrolment Form -->
            <div  class="col-lg-12 col-md-12 booking-right" id="cat">
                <form method="post" action="LearnersForm.php">
                    <div class="row">
                        <div class="col-md-5">
                            <select name="teacher" id="teacher" class="form-control">
                                <option value="" disabled selected>Select Teacher Name</option>
                                <?php
                                $sql = "SELECT*FROM sysuser WHERE position=?";
                                $my = $connect->prepare($sql);
                                $my->bindValue(1, "teacher");
                                $my->execute();
                                while ($row = $my->fetch(PDO::FETCH_OBJ)) {
                                    echo  "<option value='".htmlentities($row->sysID)."'>$row->firstName $row->surname </option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-5">
                            <button type="submit" class="btn btn-default btn-lg btn-block text-center">Submit</button>
                        </div>
                    </div>

                </form>
            </div>

        </div>


    </div>
</section>
<!-- End feature Area -->

<!-- start footer Area -->
<?php include "includes/footer.php"; ?>
<!-- End footer Area -->