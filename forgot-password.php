<?php $pageTitle = "Password Reset"; ?>
<?php require_once("./includes/Header.php"); ?>

    <main class="grid place-content-center min-h-screen py-8 px-4 dark:bg-slate-900 dark:text-slate-400">
        <form class="bg-slate-100 py-12 px-4 rounded-xl lg:px-12 dark:bg-slate-800" method="POST">
            <div class="text-center mx-auto w-[90%] mb-8">

                <h3 class="text-center header text-2xl">
                    Password Reset
                </h3>

                <p>
                    Reset your password
                </p>

            </div>

            <div class="flex flex-col">

                <label class="flex items-center bg-white rounded-lg text-slate-9 dark:bg-slate-900 dark:text-slate-400 shadow-sm border-1 border-slate-100" for="username">

                    <span class="rounded-l-lg pl-4">
                        <i class="fr fi-rr-user relative top-0.5"></i>
                    </span>

                    <input class="rounded-r-lg input pl-2" type="text" placeholder="Username or email"
                        name="username" id="username" required autocomplete="off" />

                </label>

                <button class="bg-sky-500 hover:bg-sky-600 focus:bg-sky-600 py-1.5 w-auto px-4 text-white rounded-lg lg:col-span-12 mt-4 dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:bg-sky-700"
                    type="submit">
                    Reset Password
                </button>

            </div>

            <p class="mt-4">
                Don't have an account yet? <a
                    class="text-sky-500 hover:text-sky-600 focus:text-sky-600 hover:underline hover:underline-offset-4 active:underline active:underline-offset-4"
                    href="/registration">Create one</a>
            </p>
        </form>
    </main>

    <?php require_once("./includes/Footer.php"); ?>