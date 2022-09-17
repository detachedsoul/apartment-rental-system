<?php $pageTitle = "HousingQuest | View Property Details"; ?>
<?php require_once("./includes/Header.php"); ?>
<?php

use app\src\AdminViewProperty;

$house = new AdminViewProperty();
?>

<div class="flex items-center gap-x-4 gap-y-2 justify-between flex-wrap">
    <a class="text-sky-500 hover:text-sky-600 focus:text-sky-600 dark:text-sky-600 dark:hover:text-sky-700" href="/admin/properties">
        <i class="fr fi-rr-arrow-small-left"></i>
        Go back
    </a>

    <div class="flex items-center gap-2 flex-wrap">
        <a class="inline-block rounded-lg py-1.5 px-3 text-emerald-600 bg-emerald-200 hover:bg-emerald-300 hover:text-emerald-700 hover:ring-1 hover:ring-emerald-500 ring-offset-2 active:ring-1 active:ring-emerald-500 dark:ring-offset-slate-800 font-medium" href="/admin/edit-property?propertyID=<?= $house->getpropertyID() ?>&propertyName=<?= $house->getpropertyName() ?>">
            <i class="fr fi-rr-edit relative top-0.5 pr-0.5"></i>
            Edit Property
        </a>

        <button class="inline-block rounded-lg py-1.5 px-3 text-rose-500 bg-rose-200 hover:bg-rose-300 hover:ring-1 hover:ring-rose-500 ring-offset-2 active:ring-1 active:ring-rose-500 dark:ring-offset-slate-800 font-medium delete-property" type="button">
            <i class="fr fi-rr-trash relative top-0.5 pr-0.5"></i>
            Delete Property
        </button>
    </div>
</div>

<?php
$house->deleteProperty();
$house->showProperty();
?>

<dialog class="grid place-content-center text-center fixed backdrop:bg-transparent top-[5%] lg:top-[15%] right-2 left-2 lg:right-[calc(85%/2)] lg:left-[calc(85%/2)] z-50 lg:w-[40%] mb-12 scale-0 confirm-delete bg-transparent">
    <form class="flex flex-col gap-2.5 w-full p-4 rounded-xl bg-white dark:bg-slate-900 dark:text-slate-300 lg:p-12 shadow-xl drop-shadow-xl" method="POST">
        <div class="mb-2">
            <span class="before:border relative before:absolute before:-top-[90%] before:-left-[calc(100%-(calc(1.9rem/2)))] before:border-rose-300 before:bg-rose-200 text-rose-400 before:rotate-45 before:rounded-xl before:p-6 before:mb-12">
                <i class="fr fi-rr-trash text-2xl relative left-[0.3rem]"></i>
            </span>
        </div>

        <h3 class="header text-2xl text-rose-500 dark:text-rose-500 -mb-2">
            Confirmation
        </h3>

        <p>
            Are you sure you want to delete this property? It would be removed from future listings and search results.
        </p>

        <button class="bg-rose-500 text-white text-center py-2 px-4 rounded-lg block hover:ring-1 hover:ring-rose-500 ring-offset-2 active:ring-1 active:ring-rose-500 dark:ring-offset-slate-800 w-full delete-property" type="submit" name="delete-property">
            Delete
        </button>

        <button class="text-sky-500 hover:text-sky-600 focus:text-sky-600 dark:text-sky-600 dark:hover:text-sky-700 cancel-delete" type="button">
            <i class="fr fi-rr-arrow-small-left"></i>
            Go back
        </button>
    </form>
</dialog>
<?php require_once("./includes/Footer.php"); ?>