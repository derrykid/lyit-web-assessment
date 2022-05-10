<?php include('template/header.php')?>
<?php
//Start the Session
session_start();
require 'db/connect.php';
// If the form is submitted
if (isset($_POST['admin_email']) and isset($_POST['password'])) {
    //function to clean the data entered
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Assigning posted values to variables.
    $username = validate($_POST['admin_email']);
    $password = validate($_POST['password']);
    if (empty($username)) {
        $_SESSION['errors'] = array('User Name is required');
        header("Location: login.php");
        exit();
    } else if (empty($password)) {
        $_SESSION['errors'] = array('Password is required');
        header("Location: login.php");
        exit();
    } else {
        //Checking the values exist in the database or not
        $query = "SELECT * FROM administrator WHERE admin_email='$username' and password='$password'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $count = mysqli_num_rows($result);
        //If the posted values are equal to the database values, then session will be created for the user.
        if ($count == 1) {
            $row = mysqli_fetch_array($result);
            $_SESSION['username'] = $row['firstname'];
            header("Location:admin.php");
            exit;
        } else
        //If the login credentials don't match, show an error message and return to the login page to retry.
        {
            $_SESSION['errors'] = array('Your username or password was incorrect');
            header("Location:login.php");
        }
    }
}
?>

<?php include('template/footer.php')?>