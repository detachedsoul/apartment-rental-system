<?php
// Set the correct resource paths based on the current route.
$params = explode("/", $_SERVER["REQUEST_URI"]);

$cssResourcePath =  "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['SERVER_NAME']}/assets/css";
$fontsResourcePath =  "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['SERVER_NAME']}/assets/fonts";
$iconsResourcePath =  "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['SERVER_NAME']}/assets/icons";
$jsResourcePath =  "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['SERVER_NAME']}/assets/js";
$imgResourcePath =  "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['SERVER_NAME']}/assets/img";

// Check if the not found page was encountered in the admin dashboard or not and redirect the user to the appropriate page.
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
    <title>Access denied</title>
    <link rel="stylesheet" href="<?= $cssResourcePath ?>/style.css">
    <link rel="stylesheet" href="<?= $fontsResourcePath ?>/fonts.min.css">
    <link rel="stylesheet" href="<?= $iconsResourcePath ?>/uicons-regular-rounded/css/uicons-regular-rounded.min.css">
    <link rel="icon" href="<?= $imgResourcePath ?>/logo.png">
</head>

<body>
    <div class="grid place-content-center min-h-screen dark:bg-slate-900 dark:text-slate-400">

        <div class="text-center space-y-4">

            <p class="text-rose-600 tracking-wider">
                403 ERROR
            </p>

            <div class="space-y-1">

                <h1 class="header text-4xl">
                    Access denied
                </h1>

                <p>
                    Sorry, you don't have permission to access the specified resource.
                </p>

            </div>

            <a class="inline-flex items-center gap-1 font-semibold animate-pulse text-rose-600 active:text-rose-600" href="<?= $routeName; ?>">
                Go back home
                <i class="fr fi-rr-arrow-right relative top-1"></i>
            </a>

        </div>

    </div>

    <script src="<?= $jsResourcePath ?>/main.min.js" defer="true"></script>
</body>

</html>