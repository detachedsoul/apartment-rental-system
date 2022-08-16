<?php
    ob_start();
    session_start();
    unset($_SESSION['loggedUser']);
    unset($_SESSION['id']);
    unset($_SESSION['user']);

    session_destroy();

    header("Location: ../", true, 301);