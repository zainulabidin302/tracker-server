<?php
echo exec('whoami');
error_reporting(-1);
ini_set('display_errors', 1);

$filepath = $_FILES["file"]["tmp_name"];
echo  move_uploaded_file($filepath,"images/". $_FILES["file"]["name"]);
?>
