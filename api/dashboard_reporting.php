<?php
include('connection.php');
$user = getCurrentUser();


if (isset($_POST['date'])) {
    $date = 'DATE(`time`) BETWEEN \'' . $_POST['date_end'] .'\' AND \'' . $_POST['date_end'] .'\'';
} else {
    $date = 'DATE(`time`) BETWEEN CURDATE() - INTERVAL 7 DAY AND CURDATE() ';
}

$activity = q('select * from activity where user_id = ' . $user['id'] .' and ' . $date);




$timing   = q('select * from timing where user_id = ' . $user['id'] .' and '. $date);
$screenshots = q('select * from screenshots where user_id = ' . $user['id'] .' and '. $date);
echo json_encode(['activity' => $activity, 'timing' => $timing, 'screenshots' => $screenshots]);