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

    <header>
        <a href="/">
            <img class="w-20 lg:w-24 logo" src="./assets/img/logo.png" alt="HousingQuest" width="100" height="auto">
        </a>

        <nav class="scale-0 lg:scale-100">
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
            <button class="mode-toggle text-xl" type="button" aria-label="Theme toggle button">
                <i class="fr fi-rr-moon"></i>
            </button>

            <button class="text-xl" type="button" aria-label="Mobile search form togle button">
                <i class="fr fi-rr-search"></i>
            </button>

            <button class="menu-toggle text-xl lg:hidden" type="button" aria-label="Mobile menu toggle button">
                <i class="fr fi-rr-apps"></i>
            </button>
        </div>
    </header>