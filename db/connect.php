<?php
$server = "localhost";
$dbuser = "root";
$password = "root";
$conn = mysqli_connect($server, $dbuser, $password);
mysqli_select_db($conn, "property");

// $result = mysqli_query($conn, "Select * from vendor");

// while ($rows=mysqli_fetch_array($result)){
//     echo $rows['vendor_email'] . '<br>';

// }

