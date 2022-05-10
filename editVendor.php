<?php include('template/header.php') ?>
<?php
if (empty($_SESSION)) {
    session_start();
}
$req_email = $_GET['vendor_email'];

require('db/connect.php');

$sql = "SELECT * FROM vendor where vendor_email = '$req_email'";
$result = mysqli_query($conn, $sql);

if ($rows = mysqli_fetch_array($result)) {
    $old_email = $rows['vendor_email'];
    $firstname = $rows['vendor_firstname'];
    $surname = $rows['vendor_surname'];
    $phone = $rows['vendor_phone'];
}
?>
<div class="container">
    <div style="padding: 5rem">
        <div style="text-align: right">
            <a href='logout.php' class="red-btn">Logout</a>
        </div>
        <h3 style="text-align: left; padding-left: 5rem">Edit Vendor</h3>
        <a class="red-btn" href='admin.php'>Main menu</a>
        <a class="red-btn" href='manageVendor.php'>Back</a>
    </div>
</div>
<div>
    <?php
    $msg = '';
    if (isset($_SESSION['editVendor-error'])) {
        foreach ($_SESSION['editVendor-error'] as $error) {
            $msg =  $error;
        }
    } elseif (isset($_SESSION['editVendor-success'])) {
        foreach ($_SESSION['editVendor-success'] as $success) {
            $msg =  $success;
        }
    }
    ?>
    <p id="password-error" style="margin-left: 15%; font-size:1.5rem; font-weight: bold;"><?php echo $msg ?></p>
</div>
<div class="backend-form">

    <form action="db/updateVendor.php" method="GET" style="width: auto;">

        <label>Old email:</label>
        <input style="color:gray" value="(Read only) <?php echo $old_email ?>" type="text" name="old-email" readonly ><br>
        <label>First name:</label>
        <input value="<?php echo $firstname ?>" type="text" name="firstname" required="required"><br>
        <label>Last name:</label>
        <input value="<?php echo $surname ?>" type="text" name="surname" required="required"><br>
        <label>New Email:</label>
        <input value="<?php echo $old_email ?>" type="email" name="new-email" required="required"><br>
        <label>Phone:</label>
        <input value="<?php echo $phone ?>" type="tel" name="phone" required="required"><br>

        <input style="margin-top: 2rem;"type="submit" id="mysubmit" name="submit" value="Submit" style="cursor:pointer">

    </form>
</div>
<?php include('template/footer.php');
unset($_SESSION['editVendor-success']);
unset($_SESSION['editVendor-error']);
mysqli_close($conn) ?>