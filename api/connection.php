<?php 
session_start();
date_default_timezone_set('Asia/Karachi');

header('Access-Control-Allow-Origin: http://localhost:8080');  
header('Access-Control-Allow-Credentials: true');  

error_reporting(-1);
ini_set('display_errors', true);

$con = mysqli_connect('getneural.com', 'tracker', 'tracker@123#', 'tracker');
function q($qry) {
    global $con;
    $result=mysqli_query($con,$qry);
    $data = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $data[] = $row;
    }
    return $data;
}

function getCurrentUser() {
    return unserialize($_SESSION['user'])[0];
}
?>