<?php

// header Starts here
require "../Connection/connection.php";
include "./Components/header.php";

session_start();
if (isset($_SESSION['username'])) {

	$profile = "SELECT u.*, a.* FROM users u INNER JOIN admins a ON u.email = a.user_email WHERE u.email = '" . $_SESSION['email'] . " ';";
	$get_Pic = mysqli_query($connection, $profile);

	if (mysqli_num_rows($get_Pic) > 0) {
		while ($data = mysqli_fetch_assoc($get_Pic)) {

			// Inserting the batch details
			if (isset($_POST['stddata'])) {
				$batch_name = $_POST['Batch_Name'];
				$start_date = $_POST['Start_Date'];
				$end_date = $_POST['End_Date'];
				$ass_faculty = $_POST['faculty_ID'];
				$batch_timing = $_POST['batch_Timing'];

				$insert = "INSERT INTO `batches`(`batch_name`, `start_date`, `end_date`, `assigned_faculty`, `batch_timing`) 
						   VALUES ('$batch_name', '$start_date', '$end_date', '$ass_faculty', '$batch_timing');";

				$result = mysqli_query($connection, $insert) or die("Failed to insert query");

				if ($result) {
					echo "<script>alert('Batch details added successfully...')</script>";
					header("location: ViewBatch.php");
				} else {
					echo "<script>alert('Failed to insert data.. ')</script>";
				}
			}

?>

			<body>
				<link rel="stylesheet" href="./src/styles/style1.css">

				<!-- top-navbar Starts Here -->
				<?php include "./Components/navbar.php"; ?>
				<!-- top-navbar Ends Here -->

				<!-- Right Sidebar Starts Here -->
				<?php include "./Components/rightSidebar.php"; ?>
				<!-- Right Sidebar Ends Here -->

				<!-- Left Sidebar Starts Here -->
				<?php include "./Components/leftSidebar.php"; ?>
				<!-- Left Sidebar Ends Here -->

				<div class="mobile-menu-overlay"></div>

				<div class="main-container">
					<div class="pd-ltr-20 xs-pd-20-10">

						<div class="min-height-200px">
							<div class="page-header">
								<div class="container">
									<h1 class="text-center">Add Batches</h1>

									<form action="" method="post" class="form-group">

										<div class="form-group">
											<label for="Batch_Name">Enter Batch Name</label>
											<input type="text" name="Batch_Name" class="form-control my-2 red-input" placeholder="Enter Batch Name" required>
										</div>

										<div class="form-group">
											<label for="Start_Date">Enter Batch Start Date</label>
											<input type="date" name="Start_Date" class="form-control my-2 red-input" placeholder="Enter Start Date" required>
										</div>

										<div class="form-group">
											<label for="End_Date">Enter Batch End Date</label>
											<input type="date" name="End_Date" class="form-control my-2 red-input" placeholder="Enter End Date" required>
										</div>

										<div class="form-group">
											<label for="batch_Timing">Select Batch Timing</label>
											<select name="batch_Timing" id="batch_Timing" class="form-control my-3 red-input" required>
												<option value="" disabled selected>Select Batch Timing</option>
												<option value="MWF 09:00 AM - 11:00 AM">MWF 09:00 AM - 11:00 AM</option>
												<option value="MWF 11:00 AM - 01:00 PM">MWF 11:00 AM - 01:00 PM</option>
												<option value="MWF 02:00 PM - 04:00 PM">MWF 02:00 PM - 04:00 PM</option>
												<option value="MWF 05:00 PM - 07:00 PM">MWF 05:00 PM - 07:00 PM</option>
												<option value="TTS 09:00 AM - 11:00 AM">TTS 09:00 AM - 11:00 AM</option>
												<option value="TTS 11:00 AM - 01:00 PM">TTS 11:00 AM - 01:00 PM</option>
												<option value="TTS 02:00 PM - 04:00 PM">TTS 02:00 PM - 04:00 PM</option>
												<option value="TTS 05:00 PM - 07:00 PM">TTS 05:00 PM - 07:00 PM</option>
											</select>
										</div>

										<div class="form-group">
											<label for="faculty_ID">Choose Faculty (Available for Selected Timing)</label>
											<select name="faculty_ID" id="faculty_ID" class="form-control my-3 red-input" required>
												<option value="" disabled selected>Choose Faculty</option>
											</select>
										</div>

										<input type="submit" value="Submit Form" name="stddata" class="form-control btn btn-danger my-2 text-light">

									</form>
								</div>
							</div>
						</div>

						<!-- Footer Starts Here -->
						<?php include "./Components/footer.php"; ?>
						<!-- Footer Ends Here -->
					</div>
				</div>

				<script>
					// Get today's date in YYYY-MM-DD format
					let today = new Date().toISOString().split('T')[0];

					// Set the minimum date for the "Batch Start Date" and "Batch End Date"
					document.querySelector('input[name="Start_Date"]').setAttribute("min", today);
					document.querySelector('input[name="End_Date"]').setAttribute("min", today);

					// Fetch available faculty based on selected batch timing
					document.getElementById('batch_Timing').addEventListener('change', function() {
						var batchTiming = this.value;

						// Make an AJAX call to get available faculty
						var xhr = new XMLHttpRequest();
						xhr.open('POST', 'getAvailableFaculty.php', true);
						xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
						xhr.onreadystatechange = function() {
							if (this.readyState == 4 && this.status == 200) {
								// Update faculty dropdown with the available options
								document.getElementById('faculty_ID').innerHTML = this.responseText;
							}
						};
						xhr.send('batch_Timing=' + batchTiming);
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
?>
