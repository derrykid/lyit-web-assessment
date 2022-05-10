<?php include('template/header.php')?>
<?php
if (empty($_SESSION)){
    session_start();
}
require 'db/connect.php';
$sql = "SELECT * FROM `booking`";
$result = mysqli_query($conn, $sql);
?>


<div class="container">
    <div style="padding: 5rem">
        <div style="text-align: right">
            <a href='logout.php' class="red-btn">Logout</a>
        </div>
        <h2 style="text-align: left;">Client booking</h2>
        <a class="red-btn" href='admin.php'>Main menu</a>
    </div>
</div>

<div class="table">
    <table>
        <tr>
            <td><strong>Title</td>
            <td><strong>Name</td>
            <td><strong>Email</td>
            <td><strong>Mobile</td>
            <td><strong>Content</td>
            <td><strong>Book time</td>
        </tr>
        <!-- php start -->
        <?php
        while ($rows = mysqli_fetch_array($result)) {
            $title = $rows['title'];
            $name = $rows['name'];
            $email = $rows['email'];
            $mobile = $rows['mobile'];
            $content = $rows['content'];
            $time = $rows['datetime'];
        ?>
            <tr>
                <td><?php echo $title ?></td>
                <td><?php echo $name ?></td>
                <td><?php echo $email ?></td>
                <td><?php echo $mobile ?></td>
                <td><?php echo $content ?></td>
                <td><?php echo $time ?></td>
            </tr>

        <?php } ?>
        <!-- php end -->
    </table>
</div>
<?php include('template/footer.php')?>