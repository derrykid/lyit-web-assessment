<?php
require './db/connect.php';

$sql_statment = 'SELECT author_name, content FROM `comment` WHERE STATUS="planned" ORDER BY id DESC LIMIT 3';
$result = mysqli_query($conn, $sql_statment);

while ($rows=mysqli_fetch_array($result)){
    echo '<div class="testimonial">';

    echo "<h2>";
    echo $rows['author_name'];
    echo "</h2>";
    echo '<p>';
    echo $rows['content'];
    echo '</p>';
    echo '</div>';
}
mysqli_close($conn);
