<?php 
require_once('connection.php');
$r = q("select * from user where username = '" .$_POST['username'] ."' and password = '" . $_POST['password'] . "' ");
if (count($r) > 0) {
    $_SESSION['logged_in'] = true;
    $_SESSION['user'] = serialize($r);
    echo json_encode(['message' => 'ok', 'data' => $r]);
} else {
    echo json_encode(['message' => 'failed']);
}
exit;