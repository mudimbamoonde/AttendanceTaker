<?php
$editID = $_GET["uided"];
//echo $editID;
?>

<?php include "includes/hearder.php"; ?>
<!-- Start feature Area -->
<br>
<br>
<br>
<section class="feature-area" id="service">
    <div class="container">
        <div class="row justify-content-between">
            <!-- Enrolment Form -->
            <?php
             $sql = "SELECT*FROM sysuser WHERE sysID=:id";
             $binder = $connect->prepare($sql);
             $binder->bindParam(":id",$editID);
             $binder->execute();
             $row = $binder->fetch(PDO::FETCH_OBJ);
             /*
              *  sysID
              * firstName
              * surname
              * username
              * email
              * cellphone    | password
              * position
              * */

            ?>
            <h1 class="mb-20">Edit <?php echo $row->firstName." ".$row->surname; ?></h1>
            <div  class="col-lg-12 col-md-12 booking-right" id="usrforms" style="margin-left: 33px;">
                <div id="msg_usr"></div>
                <h6><span><b>Note**</b></span> ALWAYS PUT YOUR PASSWORD ON BOTH NEW/OLD ENTITIES.</h6>
                <form method="post">
                    <div class="row">
                        <div class="col-md-5">
                            <input class="form-control" type="text" name="fname"  id="fname" value="<?php echo $row->firstName ?>" placeholder="First Name" required>
                        </div>
                        <div class="col-md-5">
                            <input class="form-control" type="text" name="lname" id="lname" value="<?php echo $row->surname ?>" placeholder="Last Name" required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-5">
                            <input class="form-control" type="text" name="uname" id="uname" value="<?php echo $row->username ?>"  placeholder="User Name" required>
                        </div>
                        <div class="col-md-5">
                            <input class="form-control" type="email" name="email" id="email" value="<?php echo $row->email ?>" placeholder="Email Address" required>
                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-5">
                            <input class="form-control" type="text" name="phone" id="phone" value="<?php echo $row->cellphone ?>" placeholder="Phone Number">
                        </div>
                        <div class="col-md-5">
                            <div class="default-select" id="default-select">
                                <select name="position" id="position">
                                    <option  selected><?php echo $row->position ?></option>
                                    <option value="teacher">Teacher</option>
                                    <option value="hod">Head Of Department</option>
                                    <option value="standOffice">Standard Officer</option>
                                    <option value="learner">Learner</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-5">
                            <input class="form-control" type="password" name="cpword" id="cpword" placeholder="Old Password" required>
                            <input class="form-control" type="hidden" name="sysID" id="sysID" value="<?php echo $editID ?>" >
                        </div>
                        <div class="col-md-5">
                            <input class="form-control" type="password" name="pword" id="pword" placeholder="New Password" required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-2">
                            <button id="sbt_edit" class="btn btn-default btn-lg btn-block text-center">Submit</button>
                        </div>
                        <div class="col-md-2">
                            <a href="Vuser.php" class="btn btn-secondary btn-block text-center">Cancel</a>
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
