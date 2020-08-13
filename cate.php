<?php include "includes/hearder.php"; ?>
<!-- Start feature Area -->
<br>
<br>
<br>

<section class="feature-area" id="service">
    <div class="container">
        <div class="row justify-content-between">
            <!-- Enrolment Form -->

            <div  class="col-lg-6 col-md-6 booking-right" id="cat">
                <table class="table table-bordered">
                    <thead>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Action</th>
                    </thead>
                    <tbody id="viewCat">

                    </tbody>
                </table>
            </div>
            <div  class="col-lg-6 col-md-6 booking-right" id="cat">
                <h2 class="mb-20">Create Category</h2>
                <div id="msg_cat"></div>
                <form method="post">
                    <div class="row">
                        <div class="col-md-4">
                            <input class="form-control" type="text" name="catName"  id="catName"  placeholder="Category Name" required>
                        </div>
                        <div class="col-md-4">
                            <button id="sbt_cat" class="btn btn-default btn-lg btn-block text-center">Submit</button>
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