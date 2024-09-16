<?php

$user_id = $_POST['userId'];
$timing = $_POST['batch_time'];
$output = '';

$conn = mysqli_connect('localhost', 'root', '', 'vision') or die('failed to connect');

$sql = "SELECT `users`.*,users.user_id as faculty_id, `employees`.*
        FROM `users`
        INNER JOIN `employees` ON `employees`.`email` = `users`.`email`
        WHERE (`users`.`user_id` = {$user_id} or `users`.`user_id` NOT IN (
                                SELECT assigned_faculty 
                                FROM batches 
                                WHERE batch_timing = '{$timing}'
                            ))
        AND `employees`.`designation` = 'Faculty'
        AND `users`.`is_approved` = 1;";

$result = mysqli_query($conn, $sql) or die('failed to connect');

while ($fac = mysqli_fetch_assoc($result)) {
    $output .= '<option value="' . $fac['faculty_id'] . '">' . $fac['full_name'] . '</option>';
}


?>



<select name="sad" id="">
    <?php echo $output ?>
</select>