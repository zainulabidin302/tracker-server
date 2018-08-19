<?php 
require_once('team_connection.php');
$r = q("select * from team where manager = '" .$_POST['manager'] ."' and password = '" . $_POST['password'] . "' ");
if (count($r) > 0) {
    $_SESSION['logged_in'] = true;
    $_SESSION['manager'] = serialize($r);
    echo json_encode(['message' => 'ok', 'data' => $r]);
} else {
    echo json_encode(['message' => 'failed']);
}
exit;