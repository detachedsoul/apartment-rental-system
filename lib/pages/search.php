<?php $pageTitle = "Search Results"; ?>
<?php require_once("./includes/Header.php"); ?>
<?php

use app\src\SearchProperty;

$search = new SearchProperty();
?>
<div class="min-h-[60vh] lg:min-h-[70vh] grid place-content-center text-center dark:bg-search-result bg-light-search-result px-4 bg-fixed bg-center bg-cover text-slate-200 p-4 lg:p-8">
    <h1 class="header text-3xl">
        Search Results
    </h1>
</div>

<main class="space-y-12 py-12 px-4 lg:px-[10%] dark:bg-slate-900 dark:text-slate-300">
    <section class="grid gap-8 lg:grid-cols-12">
        <?php $search->searchProperty() ?>
    </section>
</main>
<?php require_once("./includes/Footer.php") ?>