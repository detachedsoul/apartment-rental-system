<?php
$pageTitle = ucwords(str_replace('-', ' ', $_GET['propertyName']));
?>
<?php require_once("./includes/Header.php"); ?>
<?php

use app\src\PropertyDetails;

$house = new PropertyDetails();

$house->showProperty();
?>

<script src="assets/editor/ckeditor.js"></script>
<script src="assets/js/editor.js"></script>
<script>
    createEditor('messageContent');
</script>
<?php require_once("./includes/Footer.php") ?>