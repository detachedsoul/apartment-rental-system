<?php require_once("./includes/Header.php"); ?>
<?php

use app\src\AdminIndex;
use app\src\ViewTransactionHistory;

$adminIndex = new AdminIndex();
$adminIndexHistory = new ViewTransactionHistory();
?>

<div class="rounded-xl p-4 lg:p-8 lg:gap-8 space-y-4 bg-white dark:bg-slate-900 dark:text-slate-100">
    <h3 class="header text-2xl text-rose-500 dark:text-rose-400">
        <i class="fr fi-rr-megaphone relative top-1.5"></i>
        Important Notice!!!
    </h3>

    <div class="space-y-2.5">
        <p>
            Dear <?= $_SESSION['user'] ?>, to enjoy the full benefits of this platform, kindly click on the Add Property link below to advertise unlimited properties free.
        </p>

        <a class="inline-block rounded-lg py-1.5 px-3 text-white bg-sky-500 hover:bg-sky-600 hover:ring-1 hover:ring-sky-500 ring-offset-2 active:ring-1 active:ring-sky-500 dark:ring-offset-slate-800" href="/admin/add-property">
            Add Property
        </a>
    </div>
</div>

<div class="rounded-xl grid gap-8 p-4 lg:p-8 lg:gap-8 md:grid-cols-12 bg-white dark:bg-slate-900 dark:text-slate-100">
    <div class="md:col-span-8 overflow-x-auto">
        <h2 class="header text-2xl">
            Monthly Income
        </h2>

        <canvas class="!h-[200px] !md:h-[inherit]" id="myAreaChart"></canvas>
    </div>

    <div class="md:col-span-4 flex flex-col gap-4 sm:grid sm:grid-cols-2 md:flex">
        <div class="rounded-xl bg-white shadow flex gap-4 items-center py-8 px-4 dark:bg-slate-800 dark:text-slate-100">
            <span class="rounded-full inline-block bg-green-100 text-green-500 py-1.5 px-2.5">
                <i class="fr fi-rr-home"></i>
            </span>

            <div class="-space-y-1">
                <?= $adminIndex->showPropertiesCount() ?>
            </div>
        </div>

        <div class="rounded-xl bg-white shadow flex gap-4 items-center py-8 px-4 dark:bg-slate-800 dark:text-slate-100">
            <span class="rounded-full inline-block bg-amber-100 text-amber-500 py-1.5 px-2.5">
                <i class="fr fi-rr-users"></i>
            </span>

            <div class="-space-y-1">
                <?= $adminIndex->showTenantsCount() ?>
            </div>
        </div>
    </div>
</div>

<div class="grid gap-4 grid-cols-1 sm:grid-cols-2">
    <div class="bg-white p-4 lg:p-8 rounded-xl dark:bg-slate-900 dark:text-slate-100 space-y-8">
        <div class="flex flex-wrap justify-between gap-y-2 gap-x-4 items-center">
            <h2 class="text-2xl header">
                New Tenants
            </h2>

            <a class="text-sky-500 hover:text-sky-600 focus:text-sky-600 dark:text-sky-600 dark:hover:text-sky-700" href="/admin/tenants">
                See All
            </a>
        </div>

        <div class="overflow-x-auto">
            <?= $adminIndexHistory->showIndexTenants() ?>
        </div>
    </div>

    <div class="bg-white p-4 lg:p-8 rounded-xl dark:bg-slate-900 dark:text-slate-100 space-y-8">
        <div class="flex flex-wrap justify-between gap-y-2 gap-x-4 items-center">
            <h2 class="text-2xl header">
                Transaction History
            </h2>

            <a class="text-sky-500 hover:text-sky-600 focus:text-sky-600 dark:text-sky-600 dark:hover:text-sky-700" href="/admin/payment-history">
                See All
            </a>
        </div>

        <div class="overflow-x-auto">
            <?= $adminIndexHistory->showIndexTransactions() ?>
        </div>
    </div>
</div>

<script src="../assets/js/chart.min.js" defer="true"></script>
<?php require_once("./includes/Footer.php"); ?>