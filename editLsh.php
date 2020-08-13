<?php
$id = $_GET["id"];
?>
<?php include "includes/hearder.php"; ?>
<!-- Start feature Area -->
<br>
<br>
<br>

<section class="feature-area" id="service">
    <div class="container">
        <h1>Learners Variable Edit</h1>
        <div class="row justify-content-between">
<!--            <!-- Enrolment Form -->
<!--            <div  class="col-lg-6 col-md-6 booking-right" id="cat">-->
<!--                <table class="table table-bordered">-->
<!--                    <thead class="bg-dark text-white">-->
<!--                    <th>ID</th>-->
<!--                    <th>Question </th>-->
<!--                    <th>Rate (0/5)</th>-->
<!--                    <th>Action</th>-->
<!--                    </thead>-->
<!--                    <tbody id="viewLearnersQuestion">-->
<!---->
<!--                    </tbody>-->
<!--                </table>-->
<!--            </div>-->
            <div  class="col-lg-6 col-md-6 booking-right" id="cat">
                <h2 class="mb-20">Edit Variable</h2>
                <div id="msg_question"></div>
                <form method="post">
                    <div class="row">
                        <?php
                        $sql = "SELECT*FROM learnersSheet WHERE sheetID=?";
                        $mysql = $connect->prepare($sql);
                        $mysql->bindValue(1,$id);
                        $mysql->execute();
                        //sheetID | VariableName                                   | Mark
                        $row = $mysql->fetch(PDO::FETCH_OBJ);
                        ?>
                        <div class="col-md-10">
                            <input class="form-control" type="hidden" name="sheetID" value="<?php echo $row->sheetID ?>"  id="sheetID"  placeholder="Sheet ID" required>
                            <input class="form-control" type="text" name="qu" value="<?php echo $row->VariableName ?>"  id="qu"  placeholder="Question Name" required>
                            <br>
                        </div>

                        <div class="col-md-10">
                            <input class="form-control" type="number" name="mark" value="<?php echo $row->Mark ?>"  id="mark"  placeholder="Mark Name" required>
                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-5">
                            <button id="sbt_ledit" class="btn btn-default btn-lg btn-block text-center">Submit</button>
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
