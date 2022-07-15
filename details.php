<?php $pageTitle = "Details"; ?>
<?php require_once("./includes/Header.php"); ?>

    <div class="min-h-[80vh] h-[80vh] grid place-content-center text-center bg-details-banner px-4 bg-fixed bg-center bg-cover text-slate-200 p-4 lg:p-8">
        <h1 class="header text-3xl">
            Details Page
        </h1>
    </div>

    <main class="px-4 py-12 lg:px-[10%] bg-slate-200 dark:bg-slate-900">
        <a class="text-sky-500 hover:text-sky-600 focus:text-sky-600 dark:text-sky-600 dark:hover:text-sky-700" href="/">
            <i class="fr fi-rr-arrow-small-left"></i>
            Go back
        </a>

        <div class="grid gap-4 lg:grid-rows-4 grid-cols-12 mt-8 mb-8">
            <img class="h-[200px] col-span-12 rounded-xl lg:row-start-1 lg:row-end-5 lg:h-[400px] lg:col-span-6" src="./assets/img/pic.jpg" alt="" />

            <img class="h-[200px] col-span-12 rounded-xl lg:h-full lg:row-span-2 lg:col-span-3" src="./assets/img/pic.jpg" alt="" />

            <img class="h-[200px] col-span-12 rounded-xl lg:h-full lg:row-span-2 lg:col-span-3" src="./assets/img/pic.jpg" alt="" />

            <img class="h-[200px] col-span-12 rounded-xl lg:h-full lg:row-span-2 lg:col-span-3" src="./assets/img/pic.jpg" alt="" />

            <img class="h-[200px] col-span-12 rounded-xl lg:h-full lg:row-span-2 lg:col-span-3" src="./assets/img/pic.jpg" alt="" />
        </div>

        <div class="grid gap-8 lg:grid-cols-12">
            <div class="lg:col-span-8 space-y-4">
                <div class="bg-white space-y-1.5 rounded-xl p-4 dark:bg-slate-800 dark:text-slate-300">
                    <span class="text-rose-500 dark:text-rose-400 inline-block">
                        <i class="fr fi-rr-thumbtack"></i>
                        For sale
                    </span>
                    <h3 class="header text-3xl">
                        Details of building
                    </h3>
                    <p>
                        <i class="fr fi-rr-map-marker-home"></i>
                        Rivers State University
                    </p>
                    <span class="text-sky-500 lining-nums font-semibold tracking-widest text-xl inline-block">
                        ₦ 200,000.00
                    </span>
                </div>

                <div class="bg-white rounded-xl p-4 space-y-2 dark:bg-slate-800 dark:text-slate-300">
                    <h3 class="header text-2xl">
                        Description
                    </h3>
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Porro explicabo illum omnis expedita ratione sint laborum laudantium voluptatibus? Molestiae, a.
                    </p>
                </div>
            </div>

            <div class="lg:col-span-4">
                <div class="rounded-t-xl bg-emerald-500 text-white p-4">
                    <h4 class="header text-xl">
                        Signify Interest
                    </h4>
                    <p>
                        Fill out the form below and the owner of the apartment would reach out to you.
                    </p>
                </div>
                <form class="bg-white grid gap-4 rounded-b-xl p-4 dark:bg-slate-800" action="" method="POST">
                    <label class="flex items-center bg-slate-200 text-slate-900 rounded-lg dark:bg-slate-900 dark:text-slate-400 border-1 border-slate-100" for="name">
                        <span class="rounded-l-lg pl-4">
                            <i class="fr fi-rr-user relative top-0.5"></i>
                        </span>

                        <input class="rounded-r-lg input pl-2 bg-slate-200" type="text" placeholder="Name" name="name" id="name"
                            required autocomplete="off" />
                    </label>

                    <label class="flex items-center bg-slate-200 text-slate-900 rounded-lg dark:bg-slate-900 dark:text-slate-400 border-1 border-slate-100" for="email">
                        <span class="rounded-l-lg pl-4">
                            <i class="fr fi-rr-envelope relative top-0.5"></i>
                        </span>

                        <input class="rounded-r-lg input pl-2 bg-slate-200" type="email" placeholder="Email" name="email" id="email"
                            required autocomplete="off" />
                    </label>

                    <label class="flex items-center bg-slate-200 text-slate-900 rounded-lg dark:bg-slate-900 dark:text-slate-400 border-1 border-slate-100" for="subject">
                        <span class="rounded-l-lg pl-4">
                            <i class="fr fi-rr-edit relative top-0.5"></i>
                        </span>

                        <input class="rounded-r-lg input pl-2 bg-slate-200" type="subject" placeholder="Subject" name="subject" id="subject"
                            required autocomplete="off" />
                    </label>

                    <label class="bg-slate-200 text-slate-900 rounded-lg border-1 border-slate-100" for="messageContent">
                        <textarea class="input block  bg-slate-200 text-slate-900 rounded-lg" name="messageContent"
                            id="messageContent" rows="4" placeholder="Message"></textarea>
                    </label>

                    <button
                    class="bg-sky-500 hover:bg-sky-600 focus:bg-sky-600 py-2 w-auto px-4 text-white rounded-lg dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:bg-sky-700"
                    type="submit">
                        Submit Request
                    </button>
                </form>
            </div>
        </div>
    </main>

    <?php require_once("./includes/Footer.php"); ?>