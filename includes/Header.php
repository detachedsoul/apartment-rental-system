<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($pageTitle) ? $pageTitle : "HousingQuest | Home" ?></title>
    <link rel="icon" href="./assets/img/logo.png">

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

    <header class="flex items-center justify-between gap-4 bg-white text-slate-900 z-50 drop-shadow-xl p-4 lg:px-[5%] sticky top-0 dark:bg-slate-900 dark:text-white dark:border-b dark:border-slate-800">
        <a class="dark:text-white dark:fill-white" href="/">
            <img class="w-20 lg:w-24 logo dark:text-white dark:fill-white" src="./assets/img/logo.svg" alt="HousingQuest" width="100" height="auto">
        </a>

        <nav
            class="absolute drop-shadow-xl min-h-screen lg:min-h-full bg-white transition-transform ease-in-out duration-500 scale-0 top-full left-0 p-4 w-full lg:static lg:p-0 lg:w-auto lg:scale-100 lg:bg-transparent lg:drop-shadow-none dark:bg-slate-900 dark:text-slate-100 dark:border-t dark:border-slate-800 dark:lg:bg-transparent dark:lg:border-t-0">
            <ul class="flex flex-col gap-6 lg:gap-8 lg:flex-row">
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
            <button class="mode-toggle" type="button" aria-label="Theme toggle button">
                <i class="fr fi-rr-moon"></i>
            </button>

            <button type="button" aria-label="Mobile search form togle button">
                <i class="fr fi-rr-search"></i>
            </button>

            <button class="menu-toggle lg:hidden" type="button" aria-label="Mobile menu toggle button">
                <i class="fr fi-rr-apps"></i>
            </button>
        </div>
    </header>