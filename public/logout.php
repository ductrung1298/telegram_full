<?php
    session_start();
    unset($_SESSION["user_token"]);
    header("Location: login.php");
?>