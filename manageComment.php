<?php include('template/header.php') ?>
<?php
if (empty($_SESSION)) {
    session_start();
}
require 'db/connect.php';
$sql = "SELECT * FROM `comment` order by status asc, id";
$result = mysqli_query($conn, $sql);
?>


<div class="container">
    <div style="padding: 5rem">
        <div style="text-align: right">
            <a href='logout.php' class="red-btn">Logout</a>
        </div>
        <h2 style="text-align: left; ">Testimonial</h3>
        <a class="red-btn" href='admin.php'>Main menu</a>
    </div>
</div>

<div class="table">
    <table>
        <tr>
            <td><strong>Id</td>
            <td><strong>Title</td>
            <td><strong>Content</td>
            <td><strong>Author</td>
            <td><strong>Email</td>
            <td><strong>Created</td>
            <td><strong>Status</td>
            <td><strong>Approve</td>
            <td><strong>Delete</td>
        </tr>
        <!-- php start -->
        <?php
        while ($rows = mysqli_fetch_array($result)) {
            $id = $rows['id'];
            $title = $rows['title'];
            $content = $rows['content'];
            $author = $rows['author_name'];
            $email = $rows['author_email'];
            $created = $rows['created_at'];
            $status = $rows['status'];
        ?>
            <tr>
                <td><?php echo $id ?></td>
                <td><?php echo $title ?></td>
                <td><?php echo $content ?></td>
                <td><?php echo $author ?></td>
                <td><?php echo $email ?></td>
                <td><?php echo $created ?></td>
                <td><?php echo $status ?></td>
                <?php
                if ($status == "planned") {
                    echo "
                    <td>Displayed</td>
                    ";
                } else {
                    echo "
                    <td><a href='db/comment.php?id=$id&action=approve'>Approve</a></td>
                    ";
                }
                ?>
                <!-- <td><a href='db/comment.php?id=$id&action=approve'>Approve</a></td> -->
                <td><a href='db/comment.php?id=<?php echo $rows['id'] ?>&action=delete' onclick="return confirm('Are you sure you want to delete this comment?')">Del</a></td>
            </tr>

        <?php } ?>
        <!-- php end -->
    </table>
</div>

<?php include('template/footer.php') ?>