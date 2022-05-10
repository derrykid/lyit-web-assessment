<?php include "template/header.php"; ?>
<?php
require 'db/connect.php';
$propertyID = $_GET['propertyid'];

$sql_statement = 'SELECT * FROM property WHERE propertyid =' . $propertyID;
$result = mysqli_query($conn, $sql_statement);

$rows = mysqli_fetch_array($result);
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
        $propertyType = 'New property to decide!';
}
$address = $rows['address1'];
$town = $rows['town'];
$county = $rows['county'];
$price = $rows['price'];
$shortDesc = $rows['shortdescription'];
$longDesc = $rows['longdescription'];
$bedroom = $rows['bedrooms'];
$image = $rows['image'];

$contactInfo = "address=$address&town=$town&county=$county&title=See the property" ;

?>

<!-- breadcrumb start -->
<ol class="breadcrumb">
    <li class="breadcrumb-item"> <a href="property.php?property=<?php echo$propertyType?>"><?php echo $propertyType ?></a></li>
    <li class="breadcrumb-item"> <a href="#"><?php echo $address ?></a></li>
</ol>
<!-- End breadcrumb -->

<!-- Detail -->
<div class="property-flex">
    <img class="property-img" src="<?php echo $image?>">
    <figcaption class="detail-fig">
        <h3 style="text-align: left;"><?php echo "$address, $town, $county" ?></h3>
        <p>Bedroom: <?php echo $bedroom ?></p>
        <p>Price: €<?php echo $price ?></p>
        <p class="desc"><?php echo $longDesc ?></p>
        <button class="property-btn"><a class="detail-btn" href="./contact.php?<?php echo $contactInfo?>">Reservation</a></button>
    </figcaption>
</div>
<!-- End detail -->

<!-- Start you may also like -->
<div style="padding-top: 5rem;">
    <h2>You may also like...</h2>

    <div class="detail-flex">
        <?php

        // recommend properties
        $also_like_property = 'SELECT * FROM property WHERE NOT propertyid =  ' . $propertyID . ' ORDER BY propertyid DESC LIMIT 2';
        $also_like_result = mysqli_query($conn, $also_like_property);

        while ($also_rows = mysqli_fetch_array($also_like_result)) {
            $also_catID = $also_rows['categoryid'];
            // switch select the property type
            $also_propertyType = '';
            switch ($also_catID) {
                case 1:
                    $also_propertyType = 'Residential';
                    break;
                case 2:
                    $also_propertyType = 'Commercial';
                    break;
                case 3:
                    $also_propertyType = 'Site';
                    break;
                default:
                    $also_propertyType = 'New property to decide!';
            }
            $also_shortDesc = $also_rows['shortdescription'];
            $also_image = $also_rows['image'];
            $also_detailLink = $also_rows['propertyid'];

        ?>

            <a href="<?php echo "detail.php?propertyid=$also_detailLink" ?>"><img class="detail-img" src="<?php echo $also_image ?>"></a>
            <figcaption>
                <h3 style="text-align: left;"><?php echo $also_propertyType ?></h3>
                <p class="short-desc">Description: <?php echo $also_shortDesc ?></p>
                <button class="property-btn"><a class="property-btn" href="detail.php?propertyid=<?php echo $also_detailLink?>">Detail</a></button>
            </figcaption>

        <?php } ?>
    </div>

</div>
<!-- End like part -->

<?php include "template/footer.php";
mysqli_close($conn); ?>