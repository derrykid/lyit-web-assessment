<?php include('template/header.php') ?>
<?php
if (empty($_SESSION)){
    session_start();
}
require 'db/connect.php';
$sql = "SELECT * FROM property order by propertyid desc";
$result = mysqli_query($conn, $sql);
?>


<div class="container">
    <div style="padding: 5rem">
        <div style="text-align: right">
            <a href='logout.php' class="red-btn">Logout</a>
        </div>
        <h2 style="text-align: left;">Property</h2>
        <a class="red-btn" href='admin.php'>Main menu</a>
        <a class="red-btn" href='addProperty.php'>Add property</a>
    </div>
</div>

<div class="table">
    <table>
        <tr>
            <td><strong>Address</td>
            <td><strong>Town</td>
            <td><strong>County</td>
            <td><strong>Price</td>
            <td><strong>Bedroom</td>
            <td><strong>Vendor-email</td>
            <td><strong>Edit</td>
            <td><strong>Delete</td>
        </tr>
        <!-- php start -->
        <?php
        while ($rows = mysqli_fetch_array($result)) {
            $address = $rows['address1'];
            $town = $rows['town'];
            $county = $rows['county'];
            $price = $rows['price'];
            $bedroom = $rows['bedrooms'];
            $email = $rows['vendor_email'];
        ?>
            <tr>
                <td><?php echo $address ?></td>
                <td><?php echo $town ?></td>
                <td><?php echo $county ?></td>
                <td>&euro; <?php echo $price ?></td>
                <td><?php echo $bedroom ?></td>
                <td><?php echo $email ?></td>
                <td><a href='editproperty.php?propertyid=<?php echo $rows['propertyid']?>'>Edit</a></td>
                <td><a href='db/delete.php?propertyid=<?php echo $rows['propertyid']?>' onclick="return confirm('Are you sure you want to delete this property?')">Del</a></td>
            </tr>

        <?php } ?>
        <!-- php end -->
    </table>
</div>

<?php include('template/footer.php') ?>