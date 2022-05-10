<?php include("template/header.php") ?>

<!-- display last 5 testimonials -->
<h2> Testimonial</h2>
<?php
require 'db/connect.php';
// ex
$sql_statment = 'SELECT title, content, author_name FROM `comment` WHERE STATUS="planned" ORDER BY id DESC LIMIT 5';
$result = mysqli_query($conn, $sql_statment);

while ($rows = mysqli_fetch_array($result)) {
    echo '<div class="testimonial-container">';

    echo "<h2 style='text-align: left;'>";
    echo $rows['title'];
    echo "</h2>";
    echo '<p>';
    echo $rows['content'];
    echo '</p>';
    echo '<i> By ';
    echo $rows['author_name'];
    echo '</i>';
    echo '</div>';
}
mysqli_close($conn);
?>
<!-- end of the testimonial section -->

<!-- new testimonial form -->
<div class="testimonial-submit">

    <form action="newTestimonial.php" method="POST" style="width: auto;">
        <h2>Tell us how you think about Brilliant Home</h2>
        <label>Title: </label>
        <input type="text" name="title" required="required"><br>
        <label>Name:</label>
        <input type="text" name="author_name" required="required"><br>
        <label>Email: </label>
        <input type="email" name="author_email" required="required"><br>
        <label>Content: </label>
        <textarea name="content" rows="8" cols="30" required="required"></textarea><br>
        <input type="submit" id="mysubmit" name="submit" value="Add Comment">

    </form>
</div>
<!-- End form -->

<?php include("template/footer.php") ?>