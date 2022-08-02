<?php
// Set the correct resource paths based on the current route.
$params = explode("/", $_SERVER["REQUEST_URI"]);
if ($params[1] !== "assets") {
    $cssResourcePath =  "../assets/css/";
    $fontsResourcePath =  "../assets/fonts/";
    $iconsResourcePath =  "../assets/icons/";
    $jsResourcePath =  "../assets/js/";
    $imgResourcePath =  "../assets/img/";
} else {
    $cssResourcePath = "../css/";
    $fontsResourcePath = "../fonts/";
    $iconsResourcePath = "../icons/";
    $jsResourcePath = "../js/";
    $jsResourcePath = "../js/";
    $imgResourcePath = "../img/";
}

// Check if the not found page was encountered in the admin dashboard or not and redirect the user to the appropriate page.
$params = explode("/", $_SERVER["REQUEST_URI"]);
if ($params[1] !== "admin") {
    $routeName =  "/";
} else {
    $routeName = "/admin";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page not found</title>
    <link rel="stylesheet" href="<?= $cssResourcePath ?>/style.css">
    <link rel="stylesheet" href="<?= $fontsResourcePath ?>/fonts.min.css">
    <link rel="stylesheet" href="<?= $iconsResourcePath ?>/uicons-regular-rounded/css/uicons-regular-rounded.min.css">
    <link rel="icon" href="<?= $imgResourcePath ?>/logo.png">
</head>

<body>
    <div class="grid place-content-center min-h-screen dark:bg-slate-900 dark:text-slate-400">

        <div class="text-center space-y-4">

            <p class="text-rose-600 tracking-wider">
                404 ERROR
            </p>

            <div class="space-y-1">

                <h1 class="header text-4xl">
                    Page not found
                </h1>

                <p>
                    Sorry, we couldn't find the page you're looking for.
                </p>

            </div>

            <a class="inline-flex items-center gap-1 font-semibold animate-pulse text-rose-600 active:text-rose-600" href="<?= $routeName; ?>">
                Go back home
                <i class="fr fi-rr-arrow-right relative top-1"></i>
            </a>

        </div>

    </div>

    <script src="<?= $jsResourcePath ?>/main.js" defer="true"></script>
</body>

</html>