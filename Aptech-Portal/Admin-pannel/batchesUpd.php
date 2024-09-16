<?php

$conn = mysqli_connect('localhost', 'root', '', 'vision') or die('failed to connect');

$id = $_GET['id'];

$getdata = "SELECT * FROM `batches` WHERE batch_id='$id';";

$result = mysqli_query($conn, $getdata) or die("fail to run query");

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);

    $name = $row['batch_name'];
    $start_date = $row['start_date'];
    $end_date = $row['end_date'];
    $selected_batch_timing = $row['batch_timing'];
    $assignedFac = $row['assigned_faculty'];
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Batch</title>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    </head>

    <body>

        <form action="UpdateBatchData.php" id="fsub">

            <input type="text" name="batch_name" id="batch_name" value="<?php echo $name; ?>" placeholder="Enter Batch Name">
            <input type="hidden" name="user_id" id="user_id" value="<?php echo $assignedFac; ?>">
            <input type="date" name="batch_stDate" id="batch_stDate" value="<?php echo $start_date; ?>" placeholder="Enter Batch Start Date">
            <input type="date" name="batch_endDate" id="batch_endDate" value="<?php echo $end_date; ?>" placeholder="Enter Batch End Date">

            <select name="batch_Timing" id="batch_Timing" class="form-control my-3 red-input" required>
                <option value="" disabled>Select Batch Timing</option>
                <option value="MWF 09:00 AM - 11:00 AM" <?php if ($selected_batch_timing == "MWF 09:00 AM - 11:00 AM") echo "selected"; ?>>MWF 09:00 AM - 11:00 AM</option>
                <option value="MWF 11:00 AM - 01:00 PM" <?php if ($selected_batch_timing == "MWF 11:00 AM - 01:00 PM") echo "selected"; ?>>MWF 11:00 AM - 01:00 PM</option>
                <option value="MWF 02:00 PM - 04:00 PM" <?php if ($selected_batch_timing == "MWF 02:00 PM - 04:00 PM") echo "selected"; ?>>MWF 02:00 PM - 04:00 PM</option>
                <option value="MWF 05:00 PM - 07:00 PM" <?php if ($selected_batch_timing == "MWF 05:00 PM - 07:00 PM") echo "selected"; ?>>MWF 05:00 PM - 07:00 PM</option>
                <option value="TTS 09:00 AM - 11:00 AM" <?php if ($selected_batch_timing == "TTS 09:00 AM - 11:00 AM") echo "selected"; ?>>TTS 09:00 AM - 11:00 AM</option>
                <option value="TTS 11:00 AM - 01:00 PM" <?php if ($selected_batch_timing == "TTS 11:00 AM - 01:00 PM") echo "selected"; ?>>TTS 11:00 AM - 01:00 PM</option>
                <option value="TTS 02:00 PM - 04:00 PM" <?php if ($selected_batch_timing == "TTS 02:00 PM - 04:00 PM") echo "selected"; ?>>TTS 02:00 PM - 04:00 PM</option>
                <option value="TTS 05:00 PM - 07:00 PM" <?php if ($selected_batch_timing == "TTS 05:00 PM - 07:00 PM") echo "selected"; ?>>TTS 05:00 PM - 07:00 PM</option>
            </select>

            <?php
            $req = "SELECT `batches`.*, `users`.user_id as faculty_id, `users`.`full_name`
                    FROM `batches` 
                    LEFT JOIN `users` ON `batches`.`assigned_faculty` = `users`.`user_id`
                    WHERE assigned_faculty = '$assignedFac' AND batch_timing = '$selected_batch_timing';";

            $ans = mysqli_query($conn, $req) or die('failed to fetch faculty data');
            ?>

            <select name="faculty_ID" id="faculty_ID" class="form-control my-3">
                <option value="" disabled selected>Select Faculty</option>
                <?php
                while ($fac = mysqli_fetch_assoc($ans)) {
                    echo '<option selected value="' . $fac['faculty_id'] . '">' . $fac['full_name'] . '</option>';
                }
                ?>
            </select>

        </form>

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

    </body>

    </html>

<?php
}
?>
