<?php

if (empty($_SESSION)){
 session_start();
}
require('connect.php');
$email = $_GET['email'];
$firstname = $_GET['firstname'];
$surname = $_GET['surname'];
$phone = $_GET['phone'];

$sql = "
INSERT INTO `vendor` (
    `vendor_email`, 
    `vendor_firstname`, 
    `vendor_surname`, 
    `vendor_phone`) VALUES (
        '$email', 
        '$firstname', 
        '$surname', 
        '$phone'
)";

$result = mysqli_query($conn, $sql);

if ($result) {
    $_SESSION['vendor-create-success'] = array('Vendor created!');
    header("Location: ../manageVendor.php");
} else {
    $_SESSION['vendor-create-error'] = array('Something went wrong, please check your input');
    header("Location: ../manageVendor.php");
}

mysqli_close($conn);