<?php include('template/header.php') ?>
<?php
$msg = '';
if (empty($_SESSION))
    session_start();
if (isset($_SESSION['errors'])) {
    foreach ($_SESSION['errors'] as $error) {
        $msg =  $error;
    }
}
?>
<div class="login">
    <h2 style="margin-top: 9rem; margin-left: 3rem; text-align: left;">Login</h2>
    <!-- error msg -->
    <p id="password-error"><?php echo $msg ?></p>
    <!-- end error -->
    <form action="login_action.php" method="POST" style="width:auto">
        <label>Username: </label>
        <input type="text" name="admin_email" required="required"><br>
        <label>Password: </label>
        <input type="password" name="password" required="required"><br>
        <input type="submit" id="login-btn" name="submit" value="Login">
    </form>
</div>

<?php unset($_SESSION['errors']) ?>
<?php include('template/footer.php') ?>