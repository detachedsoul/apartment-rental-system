<?php $pageTitle = "HousingQuest | Payment History"; ?>
<?php require_once("./includes/Header.php"); ?>
<?php

use app\src\ViewTransactionHistory;

$tenants = new ViewTransactionHistory();
?>

<h3 class="header text-xl -mb-4">
    Payment History
</h3>

<div class="space-y-8">
    <form class="border border-slate-200 dark:border-slate-700 grid divide-y lg:divide-y-0 lg:divide-x divide-slate-200 dark:divide-slate-700 lg:grid-cols-5 items-center bg-white dark:bg-transparent hidden" action="" method="POST">
        <p class="px-4 hover:bg-slate-100 inline-block py-2 dark:hover:bg-slate-900">
            <i class="fr fi-rr-filter relative top-0.5 pr-2"></i>
            Filter By
        </p>
        <label class="bg-transparent" for="date-added">
            <select class="form-select bg-transparent focus:bg-slate-100 dark:focus:bg-slate-900 border-none focus:ring-transparent w-full" name="date-added" id="date-added">
                <option class="bg-white dark:bg-transparent" value="Date Added">Date Added</option>
                <option class="bg-white dark:bg-transparent" value="Recently Added">Recently Added</option>
                <option class="bg-white dark:bg-transparent" value="Older">Older</option>
            </select>
        </label>
        <label class="bg-transparent" for="name-filter">
            <select class="form-select bg-transparent focus:bg-slate-100 dark:focus:bg-slate-900 border-none focus:ring-transparent w-full" name="name-filter" id="name-filter">
                <option class="bg-white dark:bg-transparent" value="Date Added">Name</option>
                <option class="bg-white dark:bg-transparent" value="Ascending">Ascending</option>
                <option class="bg-white dark:bg-transparent" value="Descending">Descending</option>
            </select>
        </label>
        <label class="bg-transparent" for="price-filter">
            <select class="form-select bg-transparent focus:bg-slate-100 dark:focus:bg-slate-900 border-none focus:ring-transparent w-full" name="price-filter" id="price-filter">
                <option class="bg-white dark:bg-transparent" value="Date Added">Price</option>
                <option class="bg-white dark:bg-transparent" value="Ascending">Ascending</option>
                <option class="bg-white dark:bg-transparent" value="Descending">Descending</option>
            </select>
        </label>
        <button class="text-rose-500 hover:bg-slate-100 py-2 dark:hover:bg-slate-900" type="submit">
            <i class="fr fi-rr-refresh relative top-0.5 pr-2"></i>
            Reset Filter
        </button>
    </form>

    <div class="bg-white p-4 lg:p-8 rounded-xl dark:bg-slate-900 dark:text-slate-100 space-y-8">
        <div class="overflow-x-auto">
            <?= $tenants->showTransactionHistory() ?>
        </div>
    </div>
</div>
<?php require_once("./includes/Footer.php"); ?>