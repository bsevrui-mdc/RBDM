<?php
    include('includes/a_config.php');

    //Reset OAuth access token
    $google_client->revokeToken();

    //Destroy entire session data.
    session_destroy();
    session_unset();
    setcookie("PHPSESSID", "", time()-3600, "/");

    //redirect page to index.php
    header('location:index.php');
?>