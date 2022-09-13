<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($pageTitle) ? $pageTitle : "HousingQuest | Home" ?></title>
    <link rel="icon" href="./assets/img/logo-light.png">

    <!-- Preload stylesheets and JavaScript files -->
    <link rel="preload" href="./assets/css/style.css" as="style">
    <link rel="preload" href="./assets/fonts/fonts.min.css" as="style">
    <link rel="preload" href="./assets/icons/uicons-brands/css/uicons-brands.min.css" as="style">
    <link rel="preload" href="./assets/icons/uicons-regular-rounded/css/uicons-regular-rounded.min.css" as="style">
    <link rel="preload" href="./assets/js/main.js" as="script">

    <!-- Important stylesheets -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/fonts/fonts.min.css">
    <link rel="stylesheet" href="./assets/icons/uicons-brands/css/uicons-brands.min.css">
    <link rel="stylesheet" href="./assets/icons/uicons-regular-rounded/css/uicons-regular-rounded.min.css">
</head>

<body>

    <header>
        <a href="/" aria-label="HousingQuest logo">
            <img class="w-20 lg:w-24 logo" src="./assets/img/logo.png" alt="HousingQuest" width="100" height="100">
        </a>

        <nav class="scale-0 lg:scale-100">
            <ul class="flex flex-col gap-8 lg:gap-8 lg:flex-row">
                <li>
                    <a class="hover:text-sky-500" href="/">
                        <i class="fr fi-rr-home pr-1.5"></i>
                        Home
                    </a>
                </li>
                <li>
                    <a class="hover:text-sky-500" href="/#about">
                        <i class="fr fi-rr-info pr-1.5"></i>
                        About Us
                    </a>
                </li>
                <li>
                    <a class="hover:text-sky-500" href="/contact">
                        <i class="fr fi-rr-envelope pr-1.5"></i>
                        Contact
                    </a>
                </li>
                <li>
                    <a class="hover:text-sky-500" href="/registration">
                        <i class="fr fi-rr-lock pr-1.5"></i>
                        Registration
                    </a>
                </li>
                <li>
                    <a class="hover:text-sky-500" href="/login">
                        <i class="fr fi-rr-key pr-1.5"></i>
                        Login
                    </a>
                </li>
            </ul>
        </nav>

        <div class="flex items-center gap-4">
            <button class="mode-toggle text-xl" type="button" aria-label="Theme toggle button">
                <i class="fr fi-rr-moon"></i>
            </button>

            <button class="text-xl searchbar-toggle" type="button" aria-label="Mobile search form togle button">
                <i class="fr fi-rr-search"></i>
            </button>

            <button class="menu-toggle text-xl lg:hidden" type="button" aria-label="Mobile menu toggle button">
                <i class="fr fi-rr-apps"></i>
            </button>
        </div>

        <form class="min-h-screen left-0 right-0 top-0 lg:top-16 overscroll-contain fixed bottom-0 overflow-y-auto z-50 bg-white dark:bg-slate-800 scale-0 px-4 pt-20 pb-8 lg:pt-12 transition-transform duration-700 search-input-container ease-in" method="GET" action="/search">
            <button class="border border-gray-200 inline-block rounded-lg px-2 py-1.5 absolute right-4 top-4 hover:bg-gray-200 hover:text-slate-800 lg:hidden searchbar-toggle" type="button" aria-label="Mobile search form togle button">
                <i class="fr fi-rr-cross"></i>
            </button>

            <div class="grid place-content-center">
                <div class="grid gap-4 lg:grid-cols-12 min-h-full">
                    <label class="space-y-1.5 lg:col-span-12" for="search-input">
                        <span class="block w-full">
                            Property Name
                        </span>

                        <input class="input bg-slate-300 rounded-lg" type="search" name="search-input" id="search-input" placeholder="Property name">
                    </label>

                    <div class="grid gap-2 lg:gap-4 items-center lg:grid-cols-12 lg:col-span-12" for="date-added">
                        <label class="lg:col-span-5 space-y-1.5" for="min-price">
                            <span class="block w-full">
                                Minimum Price
                            </span>

                            <input class="input bg-slate-300 rounded-lg" type="number" name="min-price" id="min-price" placeholder="Minimum price" min="0">
                        </label>

                        <span class="lg:col-span-2 text-center lg:mt-6">
                            to
                        </span>

                        <label class="lg:col-span-5 space-y-1.5" for="max-price">
                            <span class="block w-full">
                                Maximum Price
                            </span>

                            <input class="input bg-slate-300 rounded-lg" type="number" name="max-price" id="max-price" placeholder="Maximum price" min="1">
                        </label>
                    </div>

                    <label class="lg:col-span-6 space-y-1.5" for="property-type">
                        <span>
                            Property Type
                        </span>

                        <select class="form-select rounded-lg bg-slate-300 dark:bg-slate-900 border-none focus:ring-transparent w-full" name="property-type" id="property-type">
                            <option class="bg-white dark:bg-transparent" value="For Rent">For Rent</option>
                            <option class="bg-white dark:bg-transparent" value="For Sale">For Sale</option>
                        </select>
                    </label>

                    <label class="space-y-1.5 lg:col-span-6" for="property-location">
                        <span class="block w-full">
                            Property Location
                        </span>

                        <input class="input bg-slate-300 rounded-lg" type="text" name="property-location" id="property-location" placeholder="Property Location">
                    </label>

                    <label class="lg:col-span-12 flex gap-2 items-center cursor-pointer" for="strict-search">
                        <input class="form-radio cursor-pointer" type="radio" name="strict-search" id="strict-search">
                        <span>
                            Enable strict search
                        </span>
                    </label>

                    <button class="bg-sky-500 hover:bg-sky-600 focus:bg-sky-600 py-2 w-auto px-4 text-white rounded-lg dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:bg-sky-700 hover:ring-1 hover:ring-sky-500 ring-offset-2 active:ring-1 active:ring-sky-500 dark:ring-offset-slate-800 lg:col-span-12 lg:mx-auto mb-20" type="submit">
                        Search
                    </button>
                </div>
            </div>
        </form>
    </header>