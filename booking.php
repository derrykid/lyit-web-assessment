<?php
include('template/header.php');
require('db/connect.php');

$date = $_GET['date'];
$time = $_GET['time'];
$title = $_GET['title'];
$name = $_GET['author_name'];
$author_email = $_GET['author_email'];
$mobile = $_GET['mobile'];
$content = $_GET['content'];

$datetime = $date." ".$time;

$result = mysqli_query($conn, "INSERT INTO `booking` (`bid`, `title`, `name`, `email`, `mobile`, `content`, `datetime`) VALUES (NULL, '$title', '$name', '$author_email', '$mobile', '$content', '$datetime');");

if ($result) {
    header('Location: thankyoubooking.php');
} else {
    header('Location: fail.php');
}

mysqli_close($conn);
?>


<?php include('template/footer.php'); ?>