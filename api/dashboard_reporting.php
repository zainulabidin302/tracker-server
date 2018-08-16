<?php
include('../connection.php');
print_r($_SESSION);
$r = q('select * from activity where user_id = ' . unserialize($_SESSION['user'])['id'].'');
echo json_encode($r);