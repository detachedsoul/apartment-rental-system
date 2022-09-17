<?php $pageTitle = "HousingQuest | Add Tenant"; ?>
<?php require_once("./includes/Header.php"); ?>
<?php

use app\src\AddTenant;

$addTenant = new AddTenant();
?>


<form class="grid place-content-center lg:w-1/2 lg:mx-auto" method="POST">
    <div class="grid gap-y-3 gap-x-4 lg:grid-cols-12">

        <?php $addTenant->addNewTenant() ?>

</form>

<?php require_once("./includes/Footer.php"); ?>