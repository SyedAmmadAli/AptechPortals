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

			$id = $_GET['id'];

			$getdata = "SELECT * FROM `batches` WHERE batch_id='$id';";

			$result = mysqli_query($connection, $getdata) or die("fail to run query");

			if (mysqli_num_rows($result) == 1) {
				$row = mysqli_fetch_assoc($result);

				$name = $row['batch_name'];
				$start_date = $row['start_date'];
				$end_date = $row['end_date'];
				$selected_batch_timing = $row['batch_timing'];
				$assignedFac = $row['assigned_faculty'];



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
									<h1>Update Batch Details</h1>


									<form action="UpdateBatchData.php" id="fsub" class="mt-5" method="post">

										<div class="form-group">
											<label for="Batch_Name">Enter Batch Name</label>
											<input type="text" name="batch_name" id="batch_name" class="form-control" value="<?php echo $name; ?>" placeholder="Enter Batch Name">
										</div>

										<div class="form-group">
											<input type="hidden" name="user_id" id="user_id" value="<?php echo $assignedFac; ?>">
											<input type="hidden" name="id" id="bth_id" value="<?php echo $id ?>">
										</div>

										<div class="form-group">
											<label for="batch_stDate">Enter Batch Start Date</label>
											<input type="date" name="batch_stDate" id="batch_stDate" class="form-control" value="<?php echo $start_date; ?>" placeholder="Enter Batch Start Date">
										</div>

										<div class="form-group">
											<label for="batch_endDate">Enter Batch End Date</label>
											<input type="date" name="batch_endDate" id="batch_endDate" class="form-control" value="<?php echo $end_date; ?>" placeholder="Enter Batch End Date">
										</div>

										<div class="form-group">
										<label for="batch_Timing">Select Batch Timing</label>
										<select name="batch_Timing" id="batch_Timing" class="form-control  red-input" required>
											<option value="" disabled selected>Select Batch Timing</option>
											<option value="MWF 09:00 AM - 11:00 AM" <?php if ($selected_batch_timing == "MWF 09:00 AM - 11:00 AM") echo "selected"; ?>>MWF 09:00 AM - 11:00 AM</option>
											<option value="MWF 11:00 AM - 01:00 PM" <?php if ($selected_batch_timing == "MWF 11:00 AM - 01:00 PM") echo "selected"; ?>>MWF 11:00 AM - 01:00 PM</option>
											<option value="MWF 02:00 PM - 04:00 PM" <?php if ($selected_batch_timing == "MWF 02:00 PM - 04:00 PM") echo "selected"; ?>>MWF 02:00 PM - 04:00 PM</option>
											<option value="MWF 05:00 PM - 07:00 PM" <?php if ($selected_batch_timing == "MWF 05:00 PM - 07:00 PM") echo "selected"; ?>>MWF 05:00 PM - 07:00 PM</option>
											<option value="TTS 09:00 AM - 11:00 AM" <?php if ($selected_batch_timing == "TTS 09:00 AM - 11:00 AM") echo "selected"; ?>>TTS 09:00 AM - 11:00 AM</option>
											<option value="TTS 11:00 AM - 01:00 PM" <?php if ($selected_batch_timing == "TTS 11:00 AM - 01:00 PM") echo "selected"; ?>>TTS 11:00 AM - 01:00 PM</option>
											<option value="TTS 02:00 PM - 04:00 PM" <?php if ($selected_batch_timing == "TTS 02:00 PM - 04:00 PM") echo "selected"; ?>>TTS 02:00 PM - 04:00 PM</option>
											<option value="TTS 05:00 PM - 07:00 PM" <?php if ($selected_batch_timing == "TTS 05:00 PM - 07:00 PM") echo "selected"; ?>>TTS 05:00 PM - 07:00 PM</option>
										</select></div>

										<?php
										$req = "SELECT `batches`.*, `users`.user_id as faculty_id, `users`.`full_name`
                    							FROM `batches` 
                    							LEFT JOIN `users` ON `batches`.`assigned_faculty` = `users`.`user_id`
                    							WHERE assigned_faculty = '$assignedFac' AND batch_timing = '$selected_batch_timing';";

										$ans = mysqli_query($connection, $req) or die('failed to fetch faculty data');
										?>

<div class="form-group">
										<label for="batch_Timing">Select Batch Faculty</label>
										<select name="faculty_ID" id="faculty_ID" class="form-control">
											<option value="" disabled selected>Select Faculty</option>
											<?php
											while ($fac = mysqli_fetch_assoc($ans)) {
												echo '<option selected value="' . $fac['faculty_id'] . '">' . $fac['full_name'] . '</option>';
											}
											?>
										</select></div>

										<input type="submit" name="Add" id="" class="form-control btn btn-danger my-2 text-light">
									</form>
								</div>

							</div>

							<!-- Footer Starts Here -->
							<?php
							include "./Components/footer.php";
							?>
							<!-- Footer Ends Here -->
						</div>
					</div>


					<script>
						$(document).ready(function() {
							// Set default userID from hidden input
							var userID = $('#user_id').val();

							// Fetch faculty data when batch timing changes
							$('#batch_Timing').on('blur', function() {
								var batch_Tim = $(this).val(); // Get selected batch timing

								// Make an AJAX request to fetch faculty data
								$.ajax({
									url: "FetchBthFacu.php", // Path to the server-side script
									type: 'POST',
									data: {
										userId: userID,
										batch_time: batch_Tim
									},
									success: function(data) {
										// Update the faculty dropdown with the new data
										$('#faculty_ID').html(data);
									},
									error: function() {
										console.log("Error occurred during the AJAX request.");
									}
								});
							});
						});
					</script>



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
}
?>