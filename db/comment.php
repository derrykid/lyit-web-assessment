<?php
if (empty($_SESSION)) {
    session_start();
}
require("connect.php");

$id = $_GET['id'];
$action = $_GET['action'];

if ($action == 'approve') {
    $sql = "UPDATE `comment` SET `status` = 'planned' WHERE `comment`.`id` = $id";
} elseif ($action == 'delete') {
    $sql = "DELETE FROM comment WHERE `comment`.`id` = $id";
}

$result = mysqli_query($conn, $sql);

if ($result){
    header("Location: ../manageComment.php");
}

mysqli_close($conn);