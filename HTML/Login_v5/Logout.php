<?php
if (isset($_POST['submit'])) {
     session_destroy();
    session_unset($_SESSION['username']);
    $_SESSION['message'] = "You are now logged out";
    header("Location: login.php");

}

?>
