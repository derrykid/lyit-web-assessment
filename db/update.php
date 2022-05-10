<?php

if (empty($_SESSION)){
 session_start();
}
require('connect.php');
$id = $_GET['propertyid'];

$address = $_GET['address'];
$town = $_GET['town'];
$county = $_GET['county'];
$price = $_GET['price'];
$bedroom = $_GET['bedroom'];
$email = $_GET['email'];
$shortDesc = $_GET['shortDesc'];
$longDesc = $_GET['longDesc'];
$image = $_GET['image'];

$sql = "
UPDATE `property` 
SET `address1` = '$address' ,
    `price` = '$price' , 
    `town` = '$town',
    `county` = '$county',
    `bedrooms` = '$bedroom',
    `vendor_email` = '$email',
    `shortdescription` = '$shortDesc',
    `longdescription` = '$longDesc',
    `image` = '$image'
WHERE `propertyid` = '$id'
";

$result = mysqli_query($conn, $sql);

if ($result) {
    $_SESSION['database-success'] = array('Property updated!');
    header("Location: ../editproperty.php?propertyid=" . $id);
} else {
    $_SESSION['database-error'] = array('Something went wrong, please check your input');
    header("Location: ../editproperty.php?propertyid=" . $id);
}

mysqli_close($conn);
