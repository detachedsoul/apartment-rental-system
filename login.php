<?php $pageTitle = "Login"; ?>
<?php require_once("./includes/Header.php"); ?>

    <main class="grid place-content-center min-h-screen py-8 px-4 dark:bg-slate-900 dark:text-slate-400">
        <form class="bg-slate-100 py-12 px-4 rounded-xl lg:px-12 dark:bg-slate-800" method="POST">
            <div class="text-center mx-auto w-[90%] mb-8">

                <h3 class="text-center header text-2xl">
                    Sign In
                </h3>

                <p>
                    You need to sign in to access your dashboard
                </p>

            </div>

            <div class="flex flex-col gap-4">

                <label class="flex items-center bg-white rounded-lg text-slate-900 dark:bg-slate-900 dark:text-slate-400 shadow-sm border-1 border-slate-100" for="username">

                    <span class="rounded-l-lg pl-4">
                        <i class="fr fi-rr-user relative top-0.5"></i>
                    </span>

                    <input class="rounded-r-lg input pl-2" type="text" placeholder="Username or email"
                        name="username" id="username" required autocomplete="off" />

                </label>

                <label class="flex items-center bg-white rounded-lg text-slate-900 dark:bg-slate-900 dark:text-slate-400 shadow-sm border-1 border-slate-100" for="password">

                    <span class="rounded-l-lg pl-4">
                        <i class="fr fi-rr-lock relative top-0.5"></i>
                    </span>

                    <input class="rounded-r-lg input pl-2" type="password" placeholder="Password"
                        name="password" id="password" required autocomplete="off" />

                </label>

                <div class="flex flex-wrap gap-2 items-center justify-between lg:gap-8">

                    <label class="flex gap-1.5 items-center cursor-pointer" for="remember-me">

                        <input
                            class="form-checkbox rounded-lg p-2  text-slate-900 cursor-pointer ring-offset-sky-600 ring-offset-2 focus:outline-none focus:ring-1 focus:ring-offset-2 focus:ring-sky-500 focus:bg-sky-700"
                            type="checkbox" name="remember-me" id="remember-me" />

                        Remember me

                    </label>

                    <a class="text-rose-500 hover:text-rose-600 focus:text-rose-600 hover:underline hover:underline-offset-4 active:underline active:underline-offset-4"
                        href="/forgot-password">
                        Forgot Password
                    </a>

                </div>

                <button
                    class="bg-sky-500 hover:bg-sky-600 focus:bg-sky-600 py-1.5 w-auto px-4 text-white rounded-lg lg:col-span-12 dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:bg-sky-700"
                    type="submit">
                    Login
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