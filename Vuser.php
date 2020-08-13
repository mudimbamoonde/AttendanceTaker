<?php include "includes/hearder.php"; ?>		
			<!-- Start feature Area -->
            <br>
            <br>
            <br>
			<section class="feature-area" id="service">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-12 col-md-12 booking-left" style="margin-right:14px;">
                        <a href="addUser.php" class="btn btn-success btn-sm">Add User</a>
                            <br>
                            <br>
                            <?php if (isset($_GET["success"])){
                            echo "<div class='alert alert-success'>Successfully Deleted</div>";
                            }elseif (isset($_GET["failed"])){
                                echo "<div class='alert alert-danger'>Failed to delete</div>";
                            }
                             ?>
							<table style="font-size:20px;" class="table table-hover table-striped table-bordered text-black">
                                <thead class="bg-danger text-white">
                                <tr>
                                    <th bgcolor="#ff8c00">SysID</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Position</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="users_all">
                                </tbody>
                            </table>
                        </div>
					</div>
				</div>	
			</section>
			<!-- End feature Area -->

			<!-- start footer Area -->		
			<?php include "includes/footer.php"; ?>
			<!-- End footer Area -->