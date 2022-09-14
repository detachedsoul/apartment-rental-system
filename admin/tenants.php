<?php $pageTitle = "HousingQuest | Tenants"; ?>
<?php require_once("./includes/Header.php"); ?>
<?php

use app\src\ViewTenants;

$tenants = new ViewTenants();
?>

<div class="flex items-center gap-x-4 gap-y-2 justify-between flex-wrap -mb-4">
    <h3 class="header text-xl">
        Tenants
    </h3>

    <a class="inline-block rounded-lg py-1.5 px-3 text-white bg-sky-500 hover:bg-sky-600 hover:ring-1 hover:ring-sky-500 ring-offset-2 active:ring-1 active:ring-sky-500 dark:ring-offset-slate-800" href="/admin/add-tenant">
        Add New Tenant
    </a>
</div>

<div class="space-y-8">
    <form class="border border-slate-200 dark:border-slate-700 grid divide-y lg:divide-y-0 lg:divide-x divide-slate-200 dark:divide-slate-700 lg:grid-cols-5 items-center bg-white dark:bg-transparent hidden" action="" method="POST">
        <p class="px-4 hover:bg-slate-100 inline-block py-2 dark:hover:bg-slate-900">
            <i class="fr fi-rr-filter relative top-0.5 pr-2"></i>
            Filter By
        </p>
        <label class="bg-transparent" for="date-added">
            <select class="form-select bg-transparent focus:bg-slate-100 dark:focus:bg-slate-900 border-none focus:ring-transparent w-full" name="date-added" id="date-added">
                <option class="bg-white dark:bg-transparent" value="Date Added">Agreement Date</option>
                <option class="bg-white dark:bg-transparent" value="Recently Added">Recent</option>
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
                <option class="bg-white dark:bg-transparent" value="Date Added">Property ID</option>
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
            <?= $tenants->showTenants() ?>
        </div>
    </div>
</div>
<?php require_once("./includes/Footer.php"); ?>