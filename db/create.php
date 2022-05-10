<?php

if (empty($_SESSION)){
 session_start();
}
require('connect.php');

$address = $_GET['address'];
$town = $_GET['town'];
$county = $_GET['county'];
$price = $_GET['price'];
$bedroom = $_GET['bedroom'];
$email = $_GET['email'];
$shortDesc = $_GET['shortDesc'];
$longDesc = $_GET['longDesc'];
$image = $_GET['image'];
$categoryid = $_GET['categoryid'];

$sql = "
INSERT INTO `property` (
    `propertyid`, 
    `address1`, 
    `town`, 
    `county`, 
    `price`, 
    `bedrooms`, 
    `shortdescription`, 
    `longdescription`, 
    `image`, 
    `categoryid`, 
    `vendor_email`) VALUES (
        NULL, 
        '$address', 
        '$town', 
        '$county', 
        '$price', 
        '$bedroom', 
        '$shortDesc', 
        '$longDesc', 
        '$image', 
        '$categoryid', 
        '$email')
";

$result = mysqli_query($conn, $sql);

if ($result) {
    $_SESSION['create-success'] = array('Property created!');
    header("Location: ../addProperty.php");
} else {
    $_SESSION['create-error'] = array('Something went wrong, please check your input');
    header("Location: ../addProperty.php");
}

mysqli_close($conn);