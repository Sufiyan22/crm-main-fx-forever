<?php
// session_start();
// include('function.inc.php');
// unset($_SESSION['IS_LOGIN']);
// unset($_SESSION['ADMIN_USER']);
// unset($_SESSION['ROLE']);
// redirect('login.php');
// die();
?>

<?php
    session_start();
    include('function.inc.php');
    session_destroy();

    redirect('login.php'); //Redirecting to the form
?>