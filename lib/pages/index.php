<?php require_once("./includes/Header.php"); ?>
<?php

use app\src\Index;

$indexHouses = new Index();
?>

<div class="min-h-[80vh] h-[80vh] grid place-content-center text-center bg-index-banner p-4 bg-fixed bg-center bg-cover text-slate-200">
    <div class="space-y-2.5 lg:w-3/5 lg:mx-auto">
        <h1 class="header text-3xl">
            HousingQuest &mdash; Taking the pain out of seeking accommodation
        </h1>
        <p>
            A smart and easy way to sell and rent properties
        </p>
    </div>
</div>

<main class="dark:bg-slate-900 dark:text-slate-300">
    <section class="space-y-16 lg:space-y-20 px-4 lg:px-[10%] py-12 bg-slate-100 dark:bg-slate-800 scroll-mt-12" id="about">
        <div class="text-center w-[90%] mx-auto lg:w-[70%]">
            <h2 class="header text-xl">
                About Us
            </h2>
            <p class="text-base">
                Who we are & our mission
            </p>

            <p class="mt-2">
                <a class="text-sky-500 hover:underline underline-offset-4 hover:text-sky-600" href="">HousingQuest</a> was born out of the desire to make selling and renting of properties stress-free and convenient. It takes away the pain of going through third parties who sometimes extort propective buyers. With <a class="text-sky-500 hover:underline underline-offset-4 hover:text-sky-600" href="">HousingQuest</a> this process is simplified to just 3 easy steps:
            </p>
        </div>

        <div class="grid gap-12 lg:grid-cols-12">
            <div class="space-y-10 text-center lg:col-span-4">
                <span class="before:border relative before:absolute before:-top-[calc(100%+(calc(1rem/2)))] before:-left-[60%] before:border-green-300 before:bg-green-200 text-green-400 before:rotate-45 before:rounded-xl before:p-8">
                    <i class="fr fi-rr-document text-3xl"></i>
                </span>

                <div class="space-y-1">
                    <h3 class="header text-lg">
                        Review Property
                    </h3>

                    <p>
                        Go through the list of available properties and find one that matches your preferrence.
                    </p>
                </div>
            </div>

            <div class="space-y-10 text-center lg:col-span-4">
                <span class="before:border relative before:absolute before:-top-[calc(100%+(calc(1rem/2)))] before:-left-[60%] before:border-rose-300 before:bg-rose-200 text-rose-400 before:rotate-45 before:rounded-xl before:p-8">
                    <i class="fr fi-rr-bookmark text-3xl"></i>
                </span>

                <div class="space-y-1">
                    <h3 class="header text-lg">
                        Indicate Interest
                    </h3>

                    <p>
                        Fill out a form with your contact information. It doesn't get any easier than that.
                    </p>
                </div>
            </div>

            <div class="space-y-10 text-center lg:col-span-4">
                <span class="before:border relative before:absolute before:-top-[calc(100%+(calc(1rem/2)))] before:-left-[60%] before:border-indigo-300 before:bg-indigo-200 text-indigo-400 before:rotate-45 before:rounded-xl before:p-8">
                    <i class="fr fi-rr-check text-3xl"></i>
                </span>

                <div class="space-y-1">
                    <h3 class="header text-lg">
                        Finalize Arrangements
                    </h3>

                    <p>
                        Get contacted by the owner of the property and finalize agreements.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="space-y-12 py-12 px-4 lg:px-[10%]">
        <div class="text-center w-[90%] mx-auto lg:w-[70%]">
            <h2 class="header text-xl">
                Explore Available Properties
            </h2>
            <p class="text-base">
                Browse our collection of tailor-made deals
            </p>

            <p class="mt-2">
                At <a class="text-sky-500 hover:underline underline-offset-4 hover:text-sky-600" href="">HousingQuest</a>, we provide a wide variety of properties to match your need. This, and many more from the comfort of your
                home.
            </p>
        </div>

        <section class="grid gap-8 lg:grid-cols-12">

            <?php $indexHouses->showIndexHouses() ?>

        </section>

        <p class="grid place-content-center">
            <a class="rounded-lg py-1.5 px-4 bg-sky-500 text-white hover:bg-sky-600 border border-sky-500 hover:ring-1 hover:ring-sky-500 ring-offset-2 active:ring-1 active:ring-sky-500 dark:ring-offset-slate-800" href="/properties">
                Explore more properties
            </a>
        </p>
    </section>

    <section class="space-y-12 py-12 px-4 lg:px-[10%] bg-slate-100 dark:bg-slate-800">
        <div class="text-center w-[90%] mx-auto lg:w-[70%]">
            <h2 class="header text-xl">
                Testimonials
            </h2>
            <p class="text-base">
                Customer reviews
            </p>

            <p class="mt-2">
                Don't just take our word for it. Here's what our customers have to say.
            </p>
        </div>

        <div class="grid gap-8 lg:grid-cols-12 text-base">
            <div class="lg:col-span-4 rounded-xl space-y-8 bg-white text-center py-8 px-4 dark:bg-slate-900">
                <div class="space-y-1.5">
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae similique animi rem commodi reprehenderit numquam,
                        ipsa nostrum vel nesciunt facilis.
                    </p>

                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae similique animi rem commodi reprehenderit numquam,
                        ipsa nostrum vel nesciunt facilis.
                    </p>
                </div>

                <h3 class="header">
                    Wisdom Ojimah
                </h3>
            </div>

            <div class="lg:col-span-4 rounded-xl space-y-8 bg-white text-center py-8 px-4 dark:bg-slate-900">
                <div class="space-y-1.5">
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae similique animi rem commodi reprehenderit
                        numquam,
                        ipsa nostrum vel nesciunt facilis.
                    </p>

                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae similique animi rem commodi reprehenderit
                        numquam,
                        ipsa nostrum vel nesciunt facilis.
                    </p>
                </div>

                <h3 class="header">
                    Temple Precious Soye
                </h3>
            </div>

            <div class="lg:col-span-4 rounded-xl space-y-8 bg-white text-center py-8 px-4 dark:bg-slate-900">
                <div class="space-y-1.5">
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae similique animi rem commodi reprehenderit
                        numquam,
                        ipsa nostrum vel nesciunt facilis.
                    </p>

                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae similique animi rem commodi reprehenderit
                        numquam,
                        ipsa nostrum vel nesciunt facilis.
                    </p>
                </div>

                <h3 class="header">
                    Enyia Promise Ikechukwu
                </h3>
            </div>
        </div>
    </section>
</main>

<!-- <?php
        //ob_get_flush();
        ?> -->

<?php require_once("./includes/Footer.php") ?>