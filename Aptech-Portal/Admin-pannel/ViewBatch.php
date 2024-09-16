<?php

// header Starts here
require "../Connection/connection.php";
include "./Components/header.php";

session_start();
if (isset($_SESSION['username'])) {

	// $profile = "SELECT * from `users`where `email` = '" . $_SESSION['email'] . " ';";
	$profile = "SELECT u.*, a.* FROM users u INNER JOIN admins a ON u.email = a.user_email WHERE u.email = '" . $_SESSION['email'] . " ';";

	$get_Pic = mysqli_query($connection, $profile);


	if (mysqli_num_rows($get_Pic) > 0) {
		while ($data = mysqli_fetch_assoc($get_Pic)) {


			$sql = "SELECT u.*, b.* FROM users u INNER JOIN batches b ON u.user_id = b.assigned_faculty WHERE u.user_id;";
			$result = $connection->query($sql);


			$users = [];

			if ($result->num_rows > 0) {

				while ($rows = $result->fetch_assoc()) {
					$users[] = $rows;
				}
			}


?>


			<body>

				<!-- Pre-loader  Starts-->
				<?php
				// include "./Components/Preloader.php";
				?>
				<!-- Pre-loader  Ends-->


				<!-- top-navbar Starts Here -->
				<?php
				include "./Components/navbar.php";
				?>
				<!-- top-navbar Ends Here -->



				<!-- Right Sidebar starts Here...! -->
				<?php
				include "./Components/rightSidebar.php";
				?>
				<!-- Right Sidebar Ends Here...! -->

				<!-- Left Sidebar starts Here...! -->
				<?php
				include "./Components/leftSidebar.php";
				?>
				<!-- Left Sidebar Ends Here...! -->


				<div class="mobile-menu-overlay"></div>

				<div class="main-container">
					<div class="pd-ltr-20 xs-pd-20-10">

						<div class="min-height-200px">



							<div class="page-header">

								<div class="pd-20">
									<h4 class="text-blue h4">Batches</h4>
								</div>
								<div class="pb-20">
									<table class="data-table table stripe hover nowrap table-bordered">
										<thead>
											<tr>
												<th class="table-plus datatable-nosort">Name</th>
												<th>Start-Date</th>
												<th>End-Date</th>
												<th>Assigned Faculty</th>
												<th>Batch Timings</th>
												<th class="datatable-nosort">Action</th>
											</tr>
										</thead>
										<tbody>

											<?php

											foreach ($users as $user) {
												// if ($user['role'] == 'Student'): 
											?>
												<tr>
													<td class="table-plus"><?php echo htmlspecialchars($user['batch_name']); ?></td>
													<td class="table-plus"><?php echo htmlspecialchars($user['start_date']); ?></td>
													<td class="table-plus"><?php echo htmlspecialchars($user['end_date']); ?></td>
													<td class="table-plus"><?php echo htmlspecialchars($user['full_name']); ?></td>
													<td class="table-plus"><?php echo htmlspecialchars($user['batch_timing']); ?></td>
													<td>
														<a href="UpdBatch.php?id=<?php echo $user['batch_id']; ?>" class="btn btn-warning btn-rounded">Edit</a>
														<a href="Batch-Remove.php?id=<?php echo $user['batch_id']; ?>" class="btn btn-danger btn-rounded">Remove</a>
													</td>
												</tr>
											<?php
												// endif; 
											}
											?>


										</tbody>
									</table>
								</div>

							</div>

						</div>

						<!-- Footer Starts Here -->
						<?php
						include "./Components/footer.php";
						?>
						<!-- Footer Ends Here -->
					</div>
				</div>
				<!-- js -->
				<script src="vendors/scripts/core.js"></script>
				<script src="vendors/scripts/script.min.js"></script>
				<script src="vendors/scripts/process.js"></script>
				<script src="vendors/scripts/layout-settings.js"></script>
			</body>

			</html>

<?php

		}
	}
}

?>