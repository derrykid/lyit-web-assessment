<?php

if (empty($_SESSION)) {
    session_start();
}
require('connect.php');

$id = $_GET['propertyid'];

$sql = "DELETE FROM `property` WHERE propertyid = $id";

$result = mysqli_query($conn, $sql);

if ($result) {
    header("Location: ../manageProperty.php");
}


mysqli_close($conn);
