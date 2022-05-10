<?php include('template/header.php') ?>
<?php
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}
?>

<div class="container">
    <div style="padding: 5rem">
    <div style="text-align: right">
        <a href='logout.php' class="red-btn">Logout</a>
    </div>
        <h3 style="text-align: left; padding-left: 5rem">Hello, <?php echo $username ?></h3>
        <p style="padding:1rem"><a class="red-btn" href='manageProperty.php'>Manage Property</a></p>
        <p style="padding:1rem"><a class="red-btn" href='manageComment.php'>Manage Testimonial</a></p>
        <p style="padding:1rem"><a class="red-btn" href='manageVendor.php'>Manage Vendors</a></p>
        <p style="padding:1rem"><a class="red-btn" href='manageNewsletter.php'>Newsletter email list</a></p>
        <p style="padding:1rem"><a class="red-btn" href='manageBooking.php'>Booking requests</a></p>
    </div>
</div>

<?php include('template/footer.php') ?>