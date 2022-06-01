<?php $pageTitle = "Contact Us"; ?>
<?php require_once("./includes/Header.php") ?>

    <main class="grid place-content-center min-h-screen py-8 px-4 dark:bg-slate-900 dark:text-slate-400">
        <form class="bg-slate-100 py-12 px-4 rounded-xl lg:px-12 dark:bg-slate-800" method="POST">
            <div class="text-center mx-auto w-[90%] mb-8">

                <h3 class="text-center header text-2xl">
                    Get In Touch With Us
                </h3>

                <p>
                    We would love to hear from you
                </p>

            </div>

            <div class="grid gap-y-3 gap-x-4 lg:grid-cols-12">

                <label class="flex items-center bg-white text-slate-900 rounded-lg lg:col-span-6 dark:bg-slate-900 dark:text-slate-400 shadow-sm border-1 border-slate-100" for="name">
                    <span class="rounded-l-lg pl-4">
                        <i class="fr fi-rr-user relative top-0.5"></i>
                    </span>

                    <input class="rounded-r-lg input pl-2 bg-white" type="text" placeholder="Name" name="name" id="name"
                        required autocomplete="off" />
                </label>

                <label class="flex items-center bg-white text-slate-900 rounded-lg lg:col-span-6 dark:bg-slate-900 dark:text-slate-400 shadow-sm border-1 border-slate-100" for="email">
                    <span class="rounded-l-lg pl-4">
                        <i class="fr fi-rr-envelope relative top-0.5"></i>
                    </span>

                    <input class="rounded-r-lg input pl-2 bg-white" type="email" placeholder="Email" name="email" id="email"
                        required autocomplete="off" />
                </label>

                <label class="flex items-center bg-white text-slate-900 rounded-lg lg:col-span-12 dark:bg-slate-900 dark:text-slate-400 shadow-sm border-1 border-slate-100" for="subject">
                    <span class="rounded-l-lg pl-4">
                        <i class="fr fi-rr-edit relative top-0.5"></i>
                    </span>

                    <input class="rounded-r-lg input pl-2 bg-white" type="text" placeholder="Subject" name="subject"
                        id="subject" autocomplete="off" />
                </label>

                <label class="bg-white text-slate-900 rounded-lg lg:col-span-12 shadow-sm border-1 border-slate-100" for="messageContent">
                    <textarea class="input block  bg-white text-slate-900 rounded-lg" name="messageContent"
                        id="messageContent" rows="5" placeholder="Message"></textarea>
                </label>

            </div>

            <button class="bg-sky-500 hover:bg-sky-600 focus:bg-sky-600 py-1.5 w-auto px-4 text-white rounded-lg lg:col-span-12 mt-4 dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:bg-sky-700"
                type="submit">
                Send Message
            </button>
        </form>
    </main>

    <?php require_once("./includes/Footer.php") ?>