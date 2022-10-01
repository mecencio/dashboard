<?php 

session_start();
if(session_destroy()) {
    header('Location: /dashboard/pages/login.php');
}

?>