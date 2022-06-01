<?php $pageTitle = "Register" ?>
<?php require_once("./includes/Header.php"); ?>

    <main class="grid place-content-center min-h-screen py-8 px-4 dark:bg-slate-900 dark:text-slate-400">
        <form class="bg-slate-100 py-12 px-4 rounded-xl lg:px-12 dark:bg-slate-800" method="POST">
            <div class="text-center mx-auto w-[90%] mb-8">

                <h3 class="text-center header text-2xl">
                    Sign Up
                </h3>

                <p>
                    Create a free account today
                </p>

            </div>

            <div class="grid gap-4 lg:grid-cols-12">
                <label class="flex items-center bg-white text-slate-900 rounded-lg lg:col-span-6 dark:bg-slate-900 dark:text-slate-400 shadow-sm border-1 border-slate-100" for="name">
                    <span class="rounded-l-lg pl-4">
                        <i class="fr fi-rr-form relative top-0.5"></i>
                    </span>

                    <input class="rounded-r-lg input pl-2" type="text" placeholder="Full name" name="name"
                        id="name" required autocomplete="off" />
                </label>

                <label class="flex items-center bg-white text-slate-900 rounded-lg lg:col-span-6 dark:bg-slate-900 dark:text-slate- shadow-sm border-1 border-slate-100" for="username">
                    <span class="rounded-l-lg pl-4">
                        <i class="fr fi-rr-user relative top-0.5"></i>
                    </span>

                    <input class="rounded-r-lg input pl-2" type="text" placeholder="Username" name="username"
                        id="username" required autocomplete="off" />
                </label>

                <label class="flex items-center bg-white text-slate-900 rounded-lg lg:col-span-6 dark:bg-slate-900 dark:text-slate-400 shadow-sm border-1 border-slate-100" for="email">
                    <span class="rounded-l-lg pl-4">
                        <i class="fr fi-rr-envelope relative top-0.5"></i>
                    </span>

                    <input class="rounded-r-lg input pl-2" type="email" placeholder="Email address" name="email"
                        id="email" required autocomplete="off" />
                </label>

                <label class="flex items-center bg-white text-slate-900 rounded-lg lg:col-span-6 dark:bg-slate-900 dark:text-slate-400 shadow-sm border-1 border-slate-100" for="password">
                    <span class="rounded-l-lg pl-4">
                        <i class="fr fi-rr-lock relative top-0.5"></i>
                    </span>

                    <input class="rounded-r-lg input pl-2 bg-white" type="password" placeholder="Password" name="password"
                        id="password" required autocomplete="off" />
                </label>

                <div class="lg:col-span-12">
                    <label class="flex gap-1.5 items-center cursor-pointer" for="accept-terms">
                        <input
                            class="form-checkbox rounded-lg p-2 text-slate-900 cursor-pointer ring-offset-slate-700 ring-offset-2 focus:outline-none focus:ring-1 focus:ring-offset-2 focus:ring-slate-900"
                            type="checkbox" name="accept-terms" id="accept-terms" required />
                        Accept terms & conditions
                    </label>
                </div>

                <button class="bg-sky-500 hover:bg-sky-600 focus:bg-sky-600 py-1.5 w-auto px-4 text-white rounded-lg lg:col-span-12 dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:bg-sky-700"
                    type="submit">
                    Sign Up
                </button>
            </div>

            <p class="mt-4">
                Already have an account?
                <a class="text-sky-400 hover:text-sky-600 hover:underline hover:underline-offset-4 active:underline active:underline-offset-4 dark:dark:text-sky-600 dark:hover:text-sky-700 dark:focus:text-sky-700 focus:underline" href="/login">
                    Login instead
                </a>
            </p>
        </form>
    </main>

    <?php require_once("./includes/Footer.php"); ?>