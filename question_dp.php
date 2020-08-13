<?php include "includes/hearder.php"; ?>
<!-- Start feature Area -->
<br>
<br>
<br>

<section class="feature-area" id="service">
    <div class="container">
        <div class="row justify-content-between">
            <!-- Enrolment Form -->
            <h1>Departmental Variable Configuration</h1>
            <div  class="col-lg-6 col-md-6 booking-right" id="cat">
                <table class="table table-bordered">
                    <thead class="bg-dark text-white">
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Question </th>
                    <th>Rate (0/5)</th>
                    <th>Action</th>
                    </thead>
                    <tbody id="viewQuestion">

                    </tbody>
                </table>
            </div>
            <div  class="col-lg-6 col-md-6 booking-right" id="cat">
                <h2 class="mb-20">Create Question</h2>
                <div id="msg_question"></div>
                <form method="post">
                    <div class="row">
                        <div class="col-md-5">
                            <input class="form-control" type="text" name="qu"  id="qu"  placeholder="Question Name" required>
                        </div>
                        <div class="col-md-5">
                            <select class="form-control" name="catID"  id="catID"  required>
                                <option>SELECT CATEGORY</option>
                                <?php
                                   include "includes/config.php";
                                   $sql = "SELECT*FROM category";
                                   $mysql = $connect->prepare($sql);
                                     $mysql->execute();
                                   if($mysql->rowCount()){
                                            while($row = $mysql->fetch(PDO::FETCH_OBJ)){
                                                $catID =$row->catID;
                                                $catName =$row->catName;
                                                echo "<option value='$catID'>$catName</option>";
                                            }
                                        }
                                ?>

                            </select>
                        </div>


                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-5">
                            <input class="form-control" type="number" name="mark"  id="mark"  placeholder="mark Name" required>
                        </div>

                        <div class="col-md-5">
                            <button id="sbt_que" class="btn btn-default btn-lg btn-block text-center">Submit</button>
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