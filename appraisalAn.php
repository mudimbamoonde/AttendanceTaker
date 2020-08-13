<?php include "includes/hearder.php"; ?>
					<!-- Start top-course Area -->
			<section class="top-course-area section-gap">
				<div class="container">
                    <?php if ($_SESSION["position"]=='teacher') {?>
                        <div class="row justify-content-between" style="margin-left: 350px;">
                            <!-- Enrolment Form -->
                            <div  class="col-lg-12 col-md-12 booking-right" id="cat">
                                <form method="post" action="report_stu.php">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <select name="teacher" id="teacher" class="form-control">
                                                <?php
                                                $sql = "SELECT*FROM sysuser WHERE sysID=?";
                                                $my = $connect->prepare($sql);
                                                $my->bindValue(1, $_SESSION["id"]);
                                                $my->execute();
                                                while ($row = $my->fetch(PDO::FETCH_OBJ)) {
                                                    echo  "<option value='".htmlentities($row->sysID)."'>$row->firstName $row->surname </option>";
                                                }
                                                ?>
                                            </select>
                                            <select name="user" class="form-control" title="UserSelect">
                                                <option value="pupil">Pupil</option>
                                                <option value="super">Admin</option>
                                            </select>
                                        </div>
                                        <div class="col-md-5">
                                            <button type="submit" class="btn btn-default btn-lg btn-block text-center">Submit</button>
                                        </div>
                                    </div>

                                </form>
                            </div>

                        </div>
                    <?php }?>

                    <?php if ($_SESSION["position"]=='master'){?>
                    <div class="row d-flex justify-content-center">
                        <div class="menu-content pb-60 col-lg-9">
                            <div class="title text-center">
                                <h1 class="mb-10">Select Options below to Analyze.</h1>
                            </div>
                        </div>
                    </div>

					<div class="row">
						<div class="col-lg-4 col-md-6">
							<div class="single-top-course">
								<div class="thumbs relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="img/pages/tc1.jpg" alt="">
									<a class="thumb-btn" href="teacher.php">Per Class</a>
								</div>

							</div>
						</div>
                        <?php } if ( $_SESSION["position"]=='hod' OR $_SESSION["position"]=='master'){ ?>
						<div class="col-lg-4 col-md-6">
							<div class="single-top-course">
								<div class="thumbs relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="img/pages/tc2.jpg" alt="">
									<a class="thumb-btn" href="teacher_depart.php">Per Department</a>
								</div>

							</div>
						</div>
                        <?php }?>

                        <?php if ($_SESSION["position"]=='standOffice' OR $_SESSION["position"]=='master') { ?>
						<div class="col-lg-4 col-md-6">
							<div class="single-top-course">
								<div class="thumbs relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="img/pages/tc3.jpg" alt="">
									<a class="thumb-btn" href="report_t.php">Standard Officer</a>
								</div>
						</div>
					</div>

                    <?php } ?>

				</div>
			</section>
			<!-- End top-course Area -->
			<!-- start footer Area -->
			<?php include "includes/footer.php"; ?>
			<!-- End footer Area -->