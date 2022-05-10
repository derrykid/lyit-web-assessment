<?php

if (empty($_SESSION)) {
    session_start();
}
require('connect.php');
$old_email = $_GET['old-email'];
$new_email = $_GET['new-email'];
$firstname = $_GET['firstname'];
$surname = $_GET['surname'];
$phone = $_GET['phone'];

$sql = "
UPDATE `vendor` 
SET `vendor_firstname` = '$firstname',
    `vendor_surname` = '$surname',
    `vendor_phone` = '$phone',
    `vendor_email` = '$new_email'
WHERE `vendor_email` = '$old_email'
";


$result = mysqli_query($conn, $sql);

if ($result) {
    $_SESSION['editVendor-success'] = array('Vendor updated!');
    header("Location: ../editVendor.php?vendor_email=" . $new_email);
} else {
    $_SESSION['editVendor-error'] = array('Something went wrong, please check your input');
    header("Location: ../editVendor.php?vendor_email=" . $new_email);
}

mysqli_close($conn);
