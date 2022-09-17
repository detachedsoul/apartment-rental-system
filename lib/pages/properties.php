<?php $pageTitle = "All Properties" ?>
<?php require_once("./includes/Header.php"); ?>
<?php

use app\src\Properties;

$properties = new Properties();
?>
<div class="min-h-[60vh] lg:min-h-[70vh] grid place-content-center text-center bg-index-banner px-4 bg-fixed bg-center bg-cover text-slate-200 p-4 lg:p-8">
    <h1 class="header text-3xl">
        All Property Listings
    </h1>
</div>

<main class="space-y-12 py-12 px-4 lg:px-[10%] dark:bg-slate-900 dark:text-slate-300">
    <section class="grid gap-8 sm:grid-cols-12">
        <?php $properties->getAllProperties() ?>
    </section>
</main>
<?php require_once("./includes/Footer.php") ?>