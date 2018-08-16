<?php 
include('../connection.php');
$r = q("select * from user where username = '" .$_POST['username'] ."' and password = '" . $_POST['password'] . "' ");
if (count($r) > 0) {
    // print_r('setting session');
    // print_r($_SESSION);
    $_SESSION['logged_in'] = true;
    $_SESSION['user'] = serialize($r);
    // print_r($_SESSION);
    // print_r($_SESSION);
    echo json_encode(['message' => 'ok', 'data' => $r]);
} else {
    echo json_encode(['message' => 'failed']);
}

