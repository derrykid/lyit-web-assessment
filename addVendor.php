<?php include('template/header.php') ?>
<?php
if (empty($_SESSION)) {
    session_start();
}
?>
<div class="container">
    <div style="padding: 5rem">
        <div style="text-align: right">
            <a href='logout.php' class="red-btn">Logout</a>
        </div>
        <h3 style="text-align: left; padding-left: 5rem">Add Vendor</h3>
        <a class="red-btn" href='admin.php'>Main menu</a>
        <a class="red-btn" href='manageVendor.php'>Back</a>
    </div>
</div>
<div class="backend-form">

    <form action="db/createVendor.php" method="GET" style="width: auto;">

        <label>First name:</label>
        <input type="text" name="firstname" required="required"><br>
        <label>Last name:</label>
        <input type="text" name="surname" required="required"><br>
        <label>New Email:</label>
        <input type="email" name="email" required="required"><br>
        <label>Phone:</label>
        <input type="tel" name="phone" required="required"><br>

        <input style="margin-top: 2rem;" type="submit" id="mysubmit" name="submit" value="Submit" style="cursor:pointer">

    </form>
</div>
<?php include('template/footer.php');
mysqli_close($conn) ?>