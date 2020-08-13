<?php include "includes/hearder.php"; ?>
<!-- Start feature Area -->
<br>
<br>
<br>
<section class="feature-area" id="service">
    <div class="container">
        <div class="row justify-content-between">
            <!-- Enrolment Form -->
            <h1 class="mb-20">CREATE USER ACCOUNT</h1>
            <div  class="col-lg-12 col-md-12 booking-right" id="usrforms" style="margin-left: 33px;">
                <div id="msg_usr"></div>
                <form method="post">
                    <div class="row">
                        <div class="col-md-5">
                            <input class="form-control" type="text" name="fname"  id="fname"  placeholder="First Name" required>
                        </div>
                        <div class="col-md-5">
                            <input class="form-control" type="text" name="lname" id="lname"  placeholder="Last Name" required>
                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-5">
                            <input class="form-control" type="text" name="uname" id="uname"  placeholder="User Name" required>
                        </div>
                        <div class="col-md-5">
                            <input class="form-control" type="email" name="email" id="email" placeholder="Email Address" required>
                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-5">
                            <input class="form-control" type="text" name="phone" id="phone" placeholder="Phone Number">
                        </div>
                        <div class="col-md-5">
                            <div class="default-select" id="default-select">
                                <select name="position" id="position">
                                    <option value="" disabled selected hidden>Select Position</option>
                                    <option value="teacher">master</option>
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
                            <input class="form-control" type="password" name="cpword" id="cpword" placeholder="Password" required>
                        </div>
                        <div class="col-md-5">
                            <input class="form-control" type="password" name="pword" id="pword" placeholder="Comfirm Password" required>
                        </div>
                    </div>
                        <br>
                    <div class="row">
                        <div class="col-md-2">
                                <button id="sbt_usr" class="btn btn-default btn-lg btn-block text-center">Submit</button>

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