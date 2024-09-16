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

            if ($_GET['id']) {
                $id = $_GET['id'];

                $getdata = "SELECT * FROM `batches` WHERE batch_id='$id';";
                $result = mysqli_query($connection, $getdata) or die("fail to run query");

                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_assoc($result);

                    $name = $row['batch_name'];
                    $start_date = $row['start_date'];
                    $end_date = $row['end_date'];
                    $selected_batch_timing = $row['batch_timing'];
?>

                    <body>
                        <link rel="stylesheet" href="./src/styles/style1.css">

                        <!-- top-navbar Starts Here -->
                        <?php include "./Components/navbar.php"; ?>
                        <!-- top-navbar Ends Here -->

                        <!-- Right Sidebar starts Here...! -->
                        <?php include "./Components/rightSidebar.php"; ?>
                        <!-- Right Sidebar Ends Here...! -->

                        <!-- Left Sidebar starts Here...! -->
                        <?php include "./Components/leftSidebar.php"; ?>
                        <!-- Left Sidebar Ends Here...! -->

                        <div class="mobile-menu-overlay"></div>

                        <div class="main-container">
                            <div class="pd-ltr-20 xs-pd-20-10">
                                <div class="min-height-200px">

                                    <div class="page-header">
                                        <div class="container my-4">
                                            <h1 class="text-center">Enter Batch Details</h1>

                                            <form id="updateBatchForm" method="post" class="form-group">
                                                <input type="hidden" name="id" id="id" class="form-control my-2 red-input" value="<?php echo $id ?>">

                                                <div class="form-group">
                                                    <label for="Batch_Name">Enter Batch Name</label>
                                                    <input type="text" name="batch_name" id="Batch_Name" class="form-control my-2 red-input" placeholder="Enter batch name" value="<?php echo $name ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label for="Batch_Sdate">Enter Batch Start Date</label>
                                                    <input type="date" name="start_date" id="Batch_Sdate" class="form-control my-2 red-input" placeholder="Enter Start Date" value="<?php echo $start_date ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label for="Batch_Edate">Enter Batch End Date</label>
                                                    <input type="date" name="end_date" id="Batch_Edate" class="form-control my-2 red-input" placeholder="Enter End Date" value="<?php echo $end_date ?>">
                                                </div>

                                                <!-- Batch Timing Selection -->
                                                <div class="form-group">
                                                    <label for="batch_Timing">Select Batch Timing</label>
                                                    <select name="batch_Timing" id="batch_Timing" class="form-control my-3 red-input" required>
                                                        <option value="" disabled selected>Select Batch Timing</option>
                                                        <option value="MWF 09:00 AM - 11:00 AM" <?php if ($selected_batch_timing == "MWF 09:00 AM - 11:00 AM") echo "selected"; ?>>MWF 09:00 AM - 11:00 AM</option>
                                                        <option value="MWF 11:00 AM - 01:00 PM" <?php if ($selected_batch_timing == "MWF 11:00 AM - 01:00 PM") echo "selected"; ?>>MWF 11:00 AM - 01:00 PM</option>
                                                        <option value="MWF 02:00 PM - 04:00 PM" <?php if ($selected_batch_timing == "MWF 02:00 PM - 04:00 PM") echo "selected"; ?>>MWF 02:00 PM - 04:00 PM</option>
                                                        <option value="MWF 05:00 PM - 07:00 PM" <?php if ($selected_batch_timing == "MWF 05:00 PM - 07:00 PM") echo "selected"; ?>>MWF 05:00 PM - 07:00 PM</option>
                                                        <option value="TTS 09:00 AM - 11:00 AM" <?php if ($selected_batch_timing == "TTS 09:00 AM - 11:00 AM") echo "selected"; ?>>TTS 09:00 AM - 11:00 AM</option>
                                                        <option value="TTS 11:00 AM - 01:00 PM" <?php if ($selected_batch_timing == "TTS 11:00 AM - 01:00 PM") echo "selected"; ?>>TTS 11:00 AM - 01:00 PM</option>
                                                        <option value="TTS 02:00 PM - 04:00 PM" <?php if ($selected_batch_timing == "TTS 02:00 PM - 04:00 PM") echo "selected"; ?>>TTS 02:00 PM - 04:00 PM</option>
                                                        <option value="TTS 05:00 PM - 07:00 PM" <?php if ($selected_batch_timing == "TTS 05:00 PM - 07:00 PM") echo "selected"; ?>>TTS 05:00 PM - 07:00 PM</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="faculty_ID">Choose Faculty (Available for Selected Timing)</label>
                                                    <select name="faculty_ID" id="faculty_ID" class="form-control my-3 red-input" required>
                                                        <option value="" disabled selected>Choose Faculty</option>
                                                    </select>
                                                </div>

                                                <!-- Submit Button -->
                                                <input type="submit" name="Add" id="submitBtn" class="form-control btn btn-danger my-2 text-light">
                                            </form>

                                            <!-- AJAX Response Placeholder -->
                                            <div id="responseMessage" class="alert alert-info mt-3" style="display: none;"></div>
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
                            document.querySelector('input[name="start_date"]').setAttribute("min", today);
                            document.querySelector('input[name="end_date"]').setAttribute("min", today);

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
    }
} else {
    echo "id not found";
}
?>
