<?php
session_start();
session_destroy();
$ref = "Student_Login.php";
echo '<script>window.location = "'.$ref.'";</script>';
exit;
?>