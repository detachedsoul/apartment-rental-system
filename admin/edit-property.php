<?php $pageTitle = "HousingQuest | Edit Property"; ?>
<?php require_once("./includes/Header.php"); ?>
<?php

use app\src\EditProperty;

$house = new EditProperty();
?>

<a class="text-sky-500 hover:text-sky-600 focus:text-sky-600 dark:text-sky-600 dark:hover:text-sky-700" href="/admin/properties">
    <i class="fr fi-rr-arrow-small-left"></i>
    Go back
</a>

<div class="rounded-xl p-4 lg:p-8 lg:gap-8 space-y-4 bg-white dark:bg-slate-900 dark:text-slate-100">
    <h3 class="header text-2xl text-rose-500 dark:text-rose-400">
        <i class="fr fi-rr-megaphone relative top-1.5"></i>
        Important Notice!!!
    </h3>

    <div class="space-y-2.5">
        <p>
            Click on any image below to change the image for that section. Please note that the banner image is the one that appears on the homepage, while others are images for the details page.
        </p>
    </div>
</div>

<form class="grid gap-8" method="POST" enctype="multipart/form-data">
    <?php $house->showProperty(); ?>
</form>

<script src="../assets/editor/ckeditor.js"></script>
<script src="../assets/js/editor.js"></script>
<script>
    createEditor('property-description');
    createEditor('property-summary');
</script>
<?php require_once("./includes/Footer.php"); ?>