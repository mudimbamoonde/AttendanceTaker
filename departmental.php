<?php include "includes/hearder.php"; ?>
<!-- Start feature Area -->
<br xmlns="http://www.w3.org/1999/html">
<br>
<br>


<section class="feature-area" id="service">
    <div class="container">
        <img src="img/coat.png" width="150" height="150" style="margin-left: 504px"/>
        <h1 style="margin-left:100px; text-align:center ; color:blue">SUBJECT DEPARTMENTAL LESSON OBSERVATION FORM</h1>
        <hr>
        <div class="row justify-content-between">
            <!-- Enrolment Form -->
            <div  class="col-lg-12 col-md-12 booking-right" id="cat">
                <?php

                if (isset($_POST["teacher"])) {
                    header('location:departmental.php?tid='.$_POST["teacher"]);
                }
                $id = $_GET["tid"];
                $sql ='SELECT*FROM sysuser WHERE sysID=?';
                $mysql = $connect->prepare($sql);
                $mysql->bindValue(1,$id);
                $mysql->execute();

                $row = $mysql->fetch(PDO::FETCH_OBJ);
                $name = $row->firstName;
                $sname = $row->surname;
                @$position = $row->position;
                if (@$position == 'standOffice' || @$position == 'hod' || @$position == 'learner' ){
                    header("location:teacher.php");
                }

                ?>

<!--                Insertion to db-->
                <?php
                if (isset($_POST["sbt_eval"])) {
                    $evaID = $_POST["evaID"];
                    $mark = $_POST["mark"];
                    $grade = $_POST["grade"];
                    $subject = $_POST["subject"];
                    $hod = $_POST["hod"];
                    $topic = $_POST["topic"];
                    $comment = $_POST["comment"];

                    $sql = "INSERT INTO comments(commentID,commentText,userid) VALUES(?,?,?)";
                    $mq = $connect->prepare($sql);
                    $mq->bindValue(1,null);
                    $mq->bindValue(2,$comment);
                    $mq->bindValue(3,$id);
                    if ($mq->execute()) {
                        echo "<div class='alert alert-success'>Recorded Successfully</div>";
                    } else {
                        echo "<div class='alert alert-danger'>Failed to record</div>" . $mq->errorInfo();
                    }

                    /*  id
                                         teacherName
                                         DateTaken
                                         TimeTaken
                                         Topic */

                    $co = $connect->prepare("INSERT INTO 
                                                hodform (id,teacherName,DateTaken,TimeTaken,Topic,userid) VALUES(?,?, CURRENT_DATE(),CURRENT_TIME(),?,?)");
                    $co->bindValue(1,null);
                    $co->bindValue(2, $name." ".$sname);
                    $co->bindValue(3,$topic);
                    $co->bindValue(4,$id);

                    if($co->execute()){
                        echo "<div class='alert alert-success'>Time Taken Successfully</div>";
                    } else {
                        echo "<div class='alert alert-danger'>Failed to Take time</div>" . $co->errorInfo();
                    }
                    $len = count($mark);

                    for ($i = 0; $i < $len; $i++) {
                       //echo $mark[$i];
                    $inser = "INSERT INTO evaluationsheet VALUES(?,?,?,?,?,CURRENT_TIMESTAMP())";
                    $ms = $connect->prepare($inser);
                    $ms->bindValue(1, NULL);
                    $ms->bindValue(2,  $evaID[$i]);
                    $ms->bindValue( 3, $mark[$i]);
                    $ms->bindValue(4, $_GET["tid"]);
                    $ms->bindValue(5, "super");


                    if ($ms->execute()) {
                        echo "<div class='alert alert-success'>Recorded Successfully</div>";
                    } else {
                        echo "<div class='alert alert-danger'>Failed to record</div>" . $ms->errorInfo();
                    }

                    }
                }
                ?>
                <form method="post">
                    <div class="row">
                        <div class="col-md-5">
                            <h3 class="mb-20 text-uppercase text-danger"><?php echo "TEACHER: ".$name." ".$sname; ?></h3>
                            <h3 class="mb-20 text-uppercase text-danger"><?php echo "GRADE: <input type='number' name='grade' >"; ?></h3>
                        </div>
                        <div class="col-md-5">
                            <?php $uname = $_SESSION["fname"]." ".$_SESSION["surname"]; ?>
                            <h3 class="mb-20 text-uppercase text-danger"><?php echo "SUBJECT: <input type='text' name='subject'>"?></h3>
                            <h3 class="mb-20 text-uppercase text-danger"><?php echo "HOD:<input type='text' class='text-uppercase' value='$uname' name='hod'>" ?></h3>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <h3 class="mb-20 text-uppercase text-danger"><?php echo "DATE: ".date("d.m.y"); ?></h3>
                        </div>
                        <div class="col-md-5">
                            <h3 class="mb-20"><?php echo "TOPIC:<input type='text' name='topic'>"; ?></h3>

                        </div>

                    </div>

                    <div id="msg_question"></div>

                    <table class="table table-bordered">
                        <thead class="bg-info text-white">
                        <tr>
                            <th>Variables</th>
                            <th>Marks</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $sql1 = "SELECT*FROM questionsheet";
                       // $collect = $connect->prepare("SELECT VariableName FROM category AS c RIGHT JOIN questionsheet AS q
                         //         ON c.catID = q.catID");


                        $mysql2 = $connect->prepare($sql1);

                        $mysql2->execute();
                       // $collect->execute();


                        while($row = $mysql2->fetch(PDO::FETCH_OBJ)){

                            $evaID = $row->evaID;
                            $VariableName =$row->VariableName;
                            //evaID | catID | VariableName
                            echo "<tr>
                                        <td>$VariableName <input type='hidden' name='evaID[]' value='$evaID'></td>
                                       <td><select name='mark[]' id='mark[]' >
                                    <option disabled selected>SELECT Mark</option>
                                    <option value='5'>5 Marks(Excellent)</option>
                                    <option value='4'>4 Marks(Very Good)</option>
                                    <option value='3'>3 Marks(Good)</option>
                                    <option value='2'>2 Marks(Fair)</option>
                                    <option value='1'>1 Mark 7(Pair)</option>
                            </select></td>
                            
                                    
                                   </tr>";

//                            echo "  <tr>
//                           <td>$VariableName <input type='hidden' name='evaID[]' id='evaID[]' value='$evaID' >
//                           <input type='hidden' name='catID[]' id='catID' value='$catID' ></td>
//                           <td><select name='mark[]' id='mark[]' >
//                                    <option disabled selected>SELECT Mark</option>
//                                    <option value='5'>5 Marks(Excellent)</option>
//                                    <option value='4'>4 Marks(Very Good)</option>
//                                    <option value='3'>3 Marks(Good)</option>
//                                    <option value='2'>2 Marks(Fair)</option>
//                                    <option value='1'>1 Mark 7(Pair)</option>
//                            </select></td>
//
//                    </tr>";
                        }

                        ?>

                        <th><label>Comments</label><br/>
                            <textarea name="comment" cols="50" rows="10"></textarea> <br>
                            <button name='sbt_eval' class="btn-lg btn-sm btn-info">Submit</button></th>
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