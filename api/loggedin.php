<?php 
include('connection.php');
if (isset($_SESSION['logged_in'])) echo json_encode(['message'=> 'ok']);
else echo json_encode(['message'=> 'failed']);