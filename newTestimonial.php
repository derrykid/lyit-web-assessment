<?php
include('template/header.php');
require('db/connect.php');

$title = $_POST['title'];
$author_name = $_POST['author_name'];
$content = $_POST['content'];
$author_email = $_POST['author_email'];


$result = mysqli_query($conn, "INSERT INTO `comment` (`id`, `title`, `content`, `author_name`, `author_email`, `created_at`, `status`) VALUES (NULL, '$title', '$content', '$author_name', '$author_email', current_timestamp(), 'pending')");

if ($result) {
    header('Location: thankyou.php');
} else {
    header('Location: fail.php');
}

mysqli_close($conn);
?>


<?php include('template/footer.php'); ?>