<?php
require "../Connection/connection.php";

if (isset($_POST['batch_Timing'])) {
	$batch_timing = $_POST['batch_Timing'];

	$getAvailableFaculty = "SELECT e.*, u.*, u.user_id as faculty_id FROM employees e 
                            INNER JOIN users u ON e.email = u.email 
                            WHERE u.user_id NOT IN (
                                SELECT assigned_faculty FROM batches WHERE batch_timing = '$batch_timing'
                            ) AND e.designation = 'Faculty' AND u.is_approved = 1";

	$getfaculty_run = mysqli_query($connection, $getAvailableFaculty);

	if (mysqli_num_rows($getfaculty_run) > 0) {
		while ($faculty = mysqli_fetch_assoc($getfaculty_run)) {
            
			echo '<option value="' . $faculty['faculty_id'] . '">' . $faculty['full_name'] . '</option>';
		}
	} else {
		echo '<option value="" disabled>No faculty available for this time slot</option>';
	}
}
?>
