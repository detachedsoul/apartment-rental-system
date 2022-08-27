
<?php
    $pageTitle = ucwords(str_replace('-', ' ', $_GET['propertyName']));
?>
<?php require_once("./includes/Header.php"); ?>
<?php

use app\src\PropertyDetails;

$house = new PropertyDetails();

$house->showProperty();
?>


<?php require_once("./includes/Footer.php") ?>