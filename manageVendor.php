<?php include('template/header.php')?>
<?php
if (empty($_SESSION)){
    session_start();
}
require 'db/connect.php';
$sql = "SELECT * FROM vendor";
$result = mysqli_query($conn, $sql);
?>


<div class="container">
    <div style="padding: 5rem">
        <div style="text-align: right">
            <a href='logout.php' class="red-btn">Logout</a>
        </div>
        <h2 style="text-align: left; ">Vendor</h2>
        <a class="red-btn" href='admin.php'>Main menu</a>
        <a class="red-btn" href='addVendor.php'>Add vendor</a>
    </div>
</div>

<div class="table">
    <table>
        <tr>
            <td><strong>First name</td>
            <td><strong>Last name</td>
            <td><strong>Email</td>
            <td><strong>Phone</td>
            <td><strong>Edit</td>
            <td><strong>Delete</td>
        </tr>
        <!-- php start -->
        <?php
        while ($rows = mysqli_fetch_array($result)) {
            $email = $rows['vendor_email'];
            $firstname = $rows['vendor_firstname'];
            $surname = $rows['vendor_surname'];
            $phone = $rows['vendor_phone'];

        ?>
            <tr>
                <td><?php echo $firstname ?></td>
                <td><?php echo $surname ?></td>
                <td><?php echo $email ?></td>
                <td><?php echo $phone ?></td>
                <td><a href='editVendor.php?vendor_email=<?php echo $email?>'>Edit</a></td>
                <td><a href='db/deleteVendor.php?vendor_email=<?php echo $email?>' onclick="return confirm('Are you sure you want to delete this vendor?')">Del</a></td>
            </tr>

        <?php } ?>
        <!-- php end -->
    </table>
</div>
<?php include('template/footer.php')?>