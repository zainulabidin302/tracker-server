<?php 
session_start();
date_default_timezone_set('Asia/Karachi');

header('Access-Control-Allow-Origin: *');  
ini_set('session.cookie_domain', 'localhost' );
// echo phpinfo();
if ( !is_writable(session_save_path()) ) {
    echo 'Session save path "'.session_save_path().'" is not writable!'; 
 }
// error_reporting(-1);
// ini_set('display_errors', true);
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