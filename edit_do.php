<?php
$evalID = $_GET["evalID"];
?>

<?php include "includes/hearder.php"; ?>
<!-- Start feature Area -->
<br>
<br>
<br>

<section class="feature-area" id="service">
    <div class="container">
        <?php

        $sql = "SELECT*FROM questionsheet AS q INNER JOIN category AS c ON q.catID = c.catID WHERE evaID=?";
        $binder = $connect->prepare($sql);
        $binder->bindValue(1,$evalID);
        $binder->execute();
        $row = $binder->fetch(PDO::FETCH_OBJ);
        $m = $row->Mark;
        ?>
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

                    </thead>
                    <tbody>
                    <th><?php echo $evalID ?></th>
                    <th><?php echo $row->catName ?></th>
                    <th><?php echo $row->VariableName ?> </th>
                    <th><?php echo  $row->Mark ?></th>
                    </tbody>
                </table>
            </div>
            <div  class="col-lg-6 col-md-6 booking-right" id="cat">
                <h2 class="mb-20">Edit Question(<?php echo $row->VariableName ?>)</h2>
                <div id="msg_question"></div>
                <form method="post">
                    <div class="row">
                        <div class="col-md-5">
                            <input class="form-control" type="hidden" name="evalID"  id="evalID"  value="<?php echo $evalID ?>" placeholder="Question Name" required>
                            <input class="form-control" type="text" name="qu"  id="qu"  value="<?php echo $row->VariableName ?>" placeholder="Question Name" required>
                        </div>
                        <div class="col-md-5">
                            <select class="form-control" name="catID"  id="catID"  required>
                                <option><?php echo $row->catName ?></option>

                                <?php

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
                            <input class="form-control" type="number" name="mark" value="<?php echo  $m;?>"  id="mark"  placeholder="mark Name" required>
                        </div>

                        <div class="col-md-5">
                            <button id="sbt_update" class="btn btn-default btn-lg btn-block text-center">Submit</button>
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
