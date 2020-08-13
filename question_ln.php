<?php include "includes/hearder.php"; ?>
<!-- Start feature Area -->
<br>
<br>
<br>

<section class="feature-area" id="service">
    <div class="container">
        <h1>Learners Variable Configuration</h1>
        <div class="row justify-content-between">
            <!-- Enrolment Form -->
            <div  class="col-lg-6 col-md-6 booking-right" id="cat">
                <table class="table table-bordered">
                    <thead class="bg-dark text-white">
                    <th>ID</th>
                    <th>Question </th>
                    <th>Rate (0/5)</th>
                    <th>Action</th>
                    </thead>
                    <tbody id="viewLearnersQuestion">

                    </tbody>
                </table>
            </div>
            <div  class="col-lg-6 col-md-6 booking-right" id="cat">
                <h2 class="mb-20">Create Variables</h2>
                <div id="msg_question"></div>
                <form method="post">
                    <div class="row">
                        <div class="col-md-5">
                            <input class="form-control" type="text" name="qu"  id="qu"  placeholder="Question Name" required>
                        </div>
                        <div class="col-md-5">
                            <input class="form-control" type="number" name="mark"  id="mark"  placeholder="Mark Name" required>
                        </div>

                    </div>
                    <br>
                    <div class="row">

                        <div class="col-md-5">
                            <button id="sbt_lque" class="btn btn-default btn-lg btn-block text-center">Submit</button>
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