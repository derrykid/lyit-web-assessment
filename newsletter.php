<?php
require 'db/connect.php';

$email= $_POST['email'];

$result = mysqli_query($conn, "INSERT INTO `newletter` (`EID`, `Email`, `Created`) VALUES (NULL, '$email', current_timestamp());");

mysqli_close($conn);
?>
<?php include('template/header.php'); ?>

<div class="container" style="height: 10rem; padding-top: 10rem; padding-bottom: 20rem; text-align: center; ">
    <h2> Thank you!</h2>

    <p style="font-size: 20px; text-align:center;">Thanks for subscription!</p>
    <button id="thankyou"><a href="./index.php" style="color: white; text-align: center; text-decoration: none;">Home</a></button>
</div>

<?php include('template/footer.php'); ?>