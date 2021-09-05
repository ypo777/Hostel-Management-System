<?php
if(!isset($_SESSION))
{
    session_start();
}
session_destroy();
$ref = "Admin_Login.php";
echo '<script>window.location = "'.$ref.'";</script>';
exit;
?>