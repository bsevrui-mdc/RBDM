<?php
    session_destroy();
    session_unset();
    setcookie("PHPSESSID", "", time()-3600, "/");
    header("Location: login.php");
?>