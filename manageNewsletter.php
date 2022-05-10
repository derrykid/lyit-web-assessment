<?php include('template/header.php')?>
<?php
if (empty($_SESSION)){
    session_start();
}
require 'db/connect.php';
$sql = "SELECT * FROM `newletter`";
$result = mysqli_query($conn, $sql);
?>


<div class="container">
    <div style="padding: 5rem">
        <div style="text-align: right">
            <a href='logout.php' class="red-btn">Logout</a>
        </div>
        <h2 style="text-align: left;">Newsletter</h2>
        <a class="red-btn" href='admin.php'>Main menu</a>
    </div>
</div>

<div class="table">
    <table>
        <tr>
            <td><strong>Created</td>
            <td><strong>Email</td>
        </tr>
        <!-- php start -->
        <?php
        while ($rows = mysqli_fetch_array($result)) {
            $created = $rows['Created'];
            $email = $rows['email'];
        ?>
            <tr>
                <td><?php echo $created ?></td>
                <td><?php echo $email ?></td>
            </tr>

        <?php } ?>
        <!-- php end -->
    </table>
        <div style="text-align: right; margin: 2rem">
            <a href='db/exportCSV.php' class="red-btn">export as CSV</a>
        </div>
</div>
<?php include('template/footer.php')?>