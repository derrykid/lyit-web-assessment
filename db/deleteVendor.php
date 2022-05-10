<?php

if (empty($_SESSION)) {
    session_start();
}
require('connect.php');

$email = $_GET['vendor_email'];

$sql = "DELETE FROM vendor WHERE `vendor`.`vendor_email` = '$email'";

$result = mysqli_query($conn, $sql);

if ($result) {
    header("Location: ../manageVendor.php");
}


mysqli_close($conn);
