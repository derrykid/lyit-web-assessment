<?php include "template/header.php"; ?>


<?php require "./db/connect.php";

$page_type = $_GET['property'];
$page_type = strtolower($page_type);

if ($page_type == "all") {
    $sql_statement = 'SELECT * FROM property';
    $page_type = "All properties";
} elseif ($page_type == "commercial") {
    $sql_statement = 'SELECT * FROM property where categoryid = 2 ORDER BY propertyid desc';
} elseif ($page_type == "residential") {
    $sql_statement = 'SELECT * FROM property where categoryid = 1 ORDER BY propertyid desc';
} elseif ($page_type == "site") {
    $sql_statement = 'SELECT * FROM property where categoryid = 3 ORDER BY propertyid desc';
}
?>

    <div class="container">
        <h2 style="margin-top: 9rem; margin-left: 3rem; text-align: left;"><?php echo ucwords($page_type)?></h2>
    </div>


<?php


$result = mysqli_query($conn, $sql_statement);

while ($rows = mysqli_fetch_array($result)) {
    $catID = $rows['categoryid'];
    // switch select the property type
    $propertyType = '';
    switch ($catID) {
        case 1:
            $propertyType = 'Residential';
            break;
        case 2:
            $propertyType = 'Commercial';
            break;
        case 3:
            $propertyType = 'Site';
            break;
        default:
            $proertyType = 'New property to decide!';
    }
    $address = $rows['address1'];
    $price = $rows['price'];
    $shortDesc = $rows['shortdescription'];
    $image = $rows['image'];
    $detailLink = $rows['propertyid'];
?>



<?php
    echo '
<div class="property-flex">
    <img class="property-img" src="' . $image . '">';
    echo '
    <figcaption>
        <h3 style="text-align: left;">' . $propertyType . '</h3> ';
    echo '
        <address>Address: ' . $address . '</address>
        <p>Price: €' . $price . '</p>
        ';
    echo '
        <p class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
            molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
            numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium
            optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis
            obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam
            nihil, eveniet aliquid culpa officia aut!</p>
        <button class="property-btn"><a class="property-btn" href="detail.php?propertyid=' . $detailLink . '">Detail</a></button>
    </figcaption>
    </div>
    ';
}
mysqli_close($conn);
?>
<!-- the template -->
<!-- <div class="container">
    <h2 style="margin-top: 9rem; margin-left: 3rem; text-align: left;">All Properties</h2>
</div>
<div class="property-flex">
    <img class="property-img" src="static/images/commercial.jpg">
    <figcaption>
        <h3 style="text-align: left;">Residential</h3>
        <address>Address: Oak road</address>
        <p>Price: 000000</p>
        <p class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
            molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
            numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium
            optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis
            obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam
            nihil, eveniet aliquid culpa officia aut!</p>
        <button class="property-btn"><a class="property-btn" href="./index.php">Detail</a></button>
    </figcaption>
</div>
<div class="container">
    <h2 style="margin-top: 9rem; margin-left: 3rem; text-align: left;">All Properties</h2>
</div>
<div class="property-flex">
    <img class="property-img" src="static/images/commercial.jpg">
    <figcaption>
        <h3 style="text-align: left;">Residential</h3>
        <address>Address: Oak road</address>
        <p>Price: 000000</p>
        <p class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
            molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
            numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium
            optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis
            obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam
            nihil, eveniet aliquid culpa officia aut!</p>
        <button class="property-btn"><a class="property-btn" href="./index.php">Detail</a></button>
    </figcaption>
</div>
<div class="container">
    <h2 style="margin-top: 9rem; margin-left: 3rem; text-align: left;">All Properties</h2>
</div>
<div class="property-flex">
    <img class="property-img" src="static/images/commercial.jpg">
    <figcaption>
        <h3 style="text-align: left;">Residential</h3>
        <address>Address: Oak road</address>
        <p>Price: 000000</p>
        <p class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
            molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
            numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium
            optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis
            obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam
            nihil, eveniet aliquid culpa officia aut!</p>
        <button class="property-btn"><a class="property-btn" href="./index.php">Detail</a></button>
    </figcaption>
</div> -->

<?php include "template/footer.php"; ?>