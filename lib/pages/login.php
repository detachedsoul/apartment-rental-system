<?php

use app\src\Login;

$loginUser = new Login();
?>
<?php $pageTitle = "Login"; ?>
<?php require_once("./includes/Header.php"); ?>

<main class="grid place-items-center w-full min-h-screen py-8 px-4 dark:bg-slate-900 dark:text-slate-400 lg:px-[30%]">
    <form class="bg-slate-100 py-8 px-4 w-full rounded-xl lg:px-12 dark:bg-slate-800" method="POST">
        <div class="text-center mx-auto w-[90%] mb-8">

            <h3 class="text-center header text-2xl">
                Sign In
            </h3>

            <?php $loginUser->loginUser() ?>

        </div>

        <div class="flex flex-col gap-4">

            <label class="flex items-center bg-white rounded-lg text-slate-900 dark:bg-slate-900 dark:text-slate-400 shadow-sm border-1 border-slate-100" for="phoneEmail">

                <span class="rounded-l-lg pl-4">
                    <i class="fr fi-rr-at relative top-0.5"></i>
                </span>

                <input class="rounded-r-lg input pl-2" type="text" placeholder="Phone number or email" name="phoneEmail" id="phoneEmail" value="<?= $loginUser->setPhoneEmail() ?>" required />

            </label>

            <label class="flex items-center bg-white rounded-lg text-slate-900 dark:bg-slate-900 dark:text-slate-400 shadow-sm border-1 border-slate-100" for="password">

                <span class="rounded-l-lg pl-4">
                    <i class="fr fi-rr-lock relative top-0.5"></i>
                </span>

                <input class="rounded-r-lg input pl-2" type="password" placeholder="Password" name="password" id="password" required />

            </label>

            <button class="bg-sky-500 hover:bg-sky-600 focus:bg-sky-600 py-1.5 w-auto px-4 text-white rounded-lg lg:col-span-12 dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:bg-sky-700" type="submit" name="submit">
                Login
            </button>

        </div>

        <div class="flex flex-wrap gap-2 items-center justify-between mt-4 max-w-fit">
            <p>
                Don't have an account yet?
                <a class="text-sky-500 hover:text-sky-600 focus:text-sky-600 hover:underline hover:underline-offset-4 active:underline active:underline-offset-4" href="/registration">
                    Create one
                </a>
            </p>

            <a class="text-rose-500 hover:text-rose-600 focus:text-rose-600 hover:underline hover:underline-offset-4 active:underline active:underline-offset-4" href="/forgot-password">
                Forgot Password
            </a>

        </div>
    </form>
</main>

<?php require_once("./includes/Footer.php"); ?>