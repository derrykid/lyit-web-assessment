<?php include('template/header.php') ?>
<?php
if (empty($_SESSION)) {
    session_start();
}
$id = $_GET['propertyid'];

require('db/connect.php');

$sql = "SELECT * FROM `property` where propertyid = $id";
$result = mysqli_query($conn, $sql);

if ($rows = mysqli_fetch_array($result)) {
    $address = $rows['address1'];
    $town = $rows['town'];
    $county = $rows['county'];
    $price = $rows['price'];
    $bedroom = $rows['bedrooms'];
    $email = $rows['vendor_email'];
    $shortDesc = $rows['shortdescription'];
    $longDesc = $rows['longdescription'];
    $image = $rows['image'];
}
?>
<div class="container">
    <div style="padding: 5rem">
        <div style="text-align: right">
            <a href='logout.php' class="red-btn">Logout</a>
        </div>
        <h3 style="text-align: left; padding-left: 5rem">Edit Property</h3>
        <a class="red-btn" href='admin.php'>Main menu</a>
        <a class="red-btn" href='manageProperty.php'>Back</a>
    </div>
</div>
<div>
    <?php
    $msg = '';
    if (isset($_SESSION['database-error'])) {
        foreach ($_SESSION['database-error'] as $error) {
            $msg =  $error;
        }
    } elseif (isset($_SESSION['database-success'])) {
        foreach ($_SESSION['database-success'] as $success) {
            $msg =  $success;
        }
    }
    ?>
    <p id="password-error" style="margin-left: 15%; font-size:1.5rem; font-weight: bold;"><?php echo $msg ?></p>
</div>
<div class="backend-form">

    <form action="db/update.php" method="GET" style="width: auto;">

        <label>id:</label>
        <input value="(Read only) <?php echo $id ?>" name="propertyid" readonly style="color: grey"><br>
        <label>Address:</label>
        <input value="<?php echo $address ?>" type="text" name="address" required="required"><br>
        <label>Town:</label>
        <input value="<?php echo $town ?>" type="text" name="town" required="required"><br>
        <label>County:</label>
        <input value="<?php echo $county ?>" type="text" name="county" required="required"><br>
        <label>Bedroom:</label>
        <input value="<?php echo $bedroom ?>" type="text" name="bedroom" required="required"><br>
        <label>Price:</label>
        <input value="<?php echo $price ?>" type="text" name="price" required="required"><br>
        <label>Short description:</label>
        <textarea name="shortDesc" rows="4" cols="30" required="required"><?php echo $shortDesc ?></textarea><br>
        <label>Long description:</label>
        <textarea name="longDesc" rows="8" cols="30" required="required"><?php echo $longDesc ?></textarea><br>
        <label>Image:</label>
        <input value="<?php echo $image ?>" type="text" name="image" required="required"><br>

        <label>Category: </label>

        <div>
            <select id="categoryid" name="categoryid">
                <option value="1">Residential</option>
                <option value="2">Commercial</option>
                <option value="3">Site</option>
            </select>
        </div>

        <!-- Select email -->
        <label>Email: </label>
        <select id="categoryid" name="email">
            <?php
            require 'db/connect.php';
            $sql_all_vendor_email = "SELECT vendor_email from vendor";
            $result = mysqli_query($conn, $sql_all_vendor_email);
            $i = 1;
            while ($rows = mysqli_fetch_array($result)) {
                echo "<option value='$i'>";
                echo  $rows['vendor_email'];
                echo "</option>";
                $i = $i + 1;
            }
            ?>
        </select>
        <!-- End select vendor email -->

        <input type="submit" id="mysubmit" name="submit" value="Submit" style="cursor:pointer">

    </form>
</div>
<?php include('template/footer.php');
unset($_SESSION['database-success']);
unset($_SESSION['database-error']);
mysqli_close($conn) ?>