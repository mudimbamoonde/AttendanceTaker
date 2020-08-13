<?php include "includes/hearder.php"; ?>
<!-- Start feature Area -->
<br xmlns="http://www.w3.org/1999/html">
<br>
<br>
<section class="feature-area" id="service">
    <div class="container">
        <img src="img/coat.png" width="150" height="150" style="margin-left: 454px"/>
        <h1 style="margin-left: 350px; color:blue">Learners Rating Form</h1>
        <hr>
        <div class="row justify-content-between">
            <!-- Enrolment Form -->
            <div  class="col-lg-12 col-md-12 booking-right" id="cat">
            <?php



//Get teacher ID
             if (isset($_POST["teacher"])) {
                 header('location:LearnersForm.php?tid='.$_POST["teacher"]);
             }
            $id = $_GET["tid"];
            $sql ='SELECT*FROM sysuser WHERE sysID=?';
            $mysql = $connect->prepare($sql);
            $mysql->bindValue(1,$id);
            $mysql->execute();

            $row = $mysql->fetch(PDO::FETCH_OBJ);
            $name = $row->firstName;
            $sname = $row->surname;
            $position = $row->position;
            if ( $position == 'standOffice' || $position == 'hod' || $position == 'learner' ){
                header("location:teacher.php");
            }

            ?>
              <h2 class="mb-20"><?php echo $name." ".$sname; ?></h2>
                <div id="msg_question"></div>
                <p>Kindly rate your teacher’s effectiveness based on the variables shown on the below by ticking on the appropriate fields.
                    Please, be honest, sincere and factual as you complete this rating form in order to provide true information about your teacher.
                    This will help in improving the teacher and pupil performance respectively in our education system.</p>
            <?php
            if(isset($_POST["sbt_eval"])) {
                $sheetID = $_POST["sheetID"];
                $mark = $_POST["mark"];


                $len = count($sheetID);

                for($i=0;$i<$len;$i++) {

                    $inser = "INSERT INTO evaluationsheet VALUES(?,?,?,?,?,CURRENT_DATE())";
                    $ms = $connect->prepare($inser);
                    $ms->bindValue(1, NULL);
                    $ms->bindValue(2,  $sheetID[$i]);
                    $ms->bindValue(3, $mark[$i]);
                    $ms->bindValue(4, $_GET["tid"]);
                    $ms->bindValue(5, "pupil");
                    if ($ms->execute()) {
                        echo "<div class='alert alert-success'>Recorded Successfully</div>";
                    } else {
                        echo "<div class='alert alert-danger'>Failed to record</div>" . $ms->errorInfo();
                    }

                }
//                foreach ($mark as $marks) {
//
//                    echo "$sheetIDx -> $marks" . "<br>";

//                }



//                echo $sID . "" . $mid;
//for ($i=0; $i<10; $i++) {

//            }
                /**evaID,catID,Mark,userid*/

            }
                ?>
                <form method="post">
                <table class="table table-bordered">
                    <thead class="bg-info text-white">
                      <tr>
                          <th>Variables</th>
                          <th>Marks</th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php
                       $sql1 = "SELECT*FROM learnerssheet";
                       $mysql2 = $connect->prepare($sql1);
                       $mysql2->execute();
                       while($row= $mysql2->fetch(PDO::FETCH_OBJ)){
                           $sheetID = $row->sheetID;
                           $VariableName=$row->VariableName;
                           echo "  <tr>
                           <td>$VariableName <input type='hidden' name='sheetID[]' id='sheetID' value='$sheetID' ></td>
                           <td><select name='mark[]' id='mark[]' >
                                    <option disabled selected>SELECT Mark</option>
                                    <option value='5'>5 Marks(Excellent)</option>
                                    <option value='4'>4 Marks(Very Good)</option>
                                    <option value='3'>3 Marks(Good)</option>
                                    <option value='2'>2 Marks(Fair)</option>
                                    <option value='1'>1 Mark 7(Pair)</option>
                            </select></td>
                    </tr>";
                       }

                    ?>
                        <button type="submit" name='sbt_eval' class="btn btn-sm btn-info">Submit</button>


                    </tbody>

                </table>
                </form>

            </div>

        </div>


    </div>
</section>
<!-- End feature Area -->

<!-- start footer Area -->
<?php include "includes/footer.php"; ?>
<!-- End footer Area -->