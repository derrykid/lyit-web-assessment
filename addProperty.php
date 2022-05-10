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
        <h3 style="text-align: left; padding-left: 5rem">Add Property</h3>
        <a class="red-btn" href='admin.php'>Main menu</a>
        <a class="red-btn" href='manageProperty.php'>Back</a>
    </div>
</div>
<div>
    <!-- display message -->
    <?php
    $msg = '';
    if (isset($_SESSION['create-error'])) {
        foreach ($_SESSION['create-error'] as $error) {
            $msg =  $error;
        }
    } elseif (isset($_SESSION['create-success'])) {
        foreach ($_SESSION['create-success'] as $success) {
            $msg =  $success;
        }
    }
    ?>
    <!-- end display -->
    <p id="password-error" style="margin-left: 15%; font-size:1.5rem; font-weight: bold;"><?php echo $msg ?></p>
</div>
<div class="backend-form">

    <form action="db/create.php" method="GET" style="width: auto;">

        <label>Address:</label>
        <input type="text" name="address" required="required"><br>
        <label>Town:</label>
        <input type="text" name="town" required="required"><br>
        <label>County:</label>
        <input type="text" name="county" required="required"><br>
        <label>Bedroom:</label>
        <input type="text" name="bedroom" required="required"><br>
        <label>Price:</label>
        <input type="text" name="price" required="required"><br>
        <label>Short description:</label>
        <textarea name="shortDesc" rows="4" cols="30" required="required"></textarea><br>
        <label>Long description:</label>
        <textarea name="longDesc" rows="8" cols="30" required="required"></textarea><br>
        <label>Image:</label>
        <input value="static/images/" type="text" name="image" required="required"><br>

        <label>Category: </label>

        <div>
            <select id="categoryid" name="categoryid">
                <option value="1">Residential</option>
                <option value="2">Commercial</option>
                <option value="3">Site</option>
            </select>
        </div>

        <!-- select email -->
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
        <!--select email end-->

        <input type="submit" id="mysubmit" name="submit" value="Submit" style="cursor:pointer">

    </form>
</div>
<?php include('template/footer.php');
unset($_SESSION['create-success']);
unset($_SESSION['create-error']);
mysqli_close($conn) ?>