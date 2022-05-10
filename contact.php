<?php include "template/header.php"; ?>
<?php
$contact_address = $_GET['address'];
$contact_town = $_GET['town'];
$contact_county = $_GET['county'];
$contact_title = $_GET['title'];

$request = $contact_address . ' ' . $contact_town . $contact_county;
?>

<div class="contact">

    <form action="booking.php" method="GET" style="width: auto;">
        <h2>Contact us</h2>
        <label>Date: </label>
        <input type="date" name="date" required="required"><br>
        <label>Time: </label>
        <input type="time" name="time" required="required"><br>
        <label>Title: </label>
        <input type="text" name="title" required="required" value="<?php echo $contact_title?>"><br>
        <label>Name:</label>
        <input type="text" name="author_name" required="required"><br>
        <label>Email: </label>
        <input type="email" name="author_email" required="required"><br>
        <label>Mobile: </label>
        <input type="tel" name="mobile" required="required"><br>
        <label>Content: </label>
        <textarea name="content" rows="8" cols="30" required="required"><?php echo $request?></textarea><br>
        <input type="submit" id="mysubmit" name="submit" value="Book appointment" style="cursor:pointer">

    </form>
</div>

<?php include "template/footer.php"; ?>