<?php $pageTitle = "HousingQuest | Messages"; ?>
<?php require_once("./includes/Header.php"); ?>

<h3 class="header text-xl -mb-4">
    Recent Messages
</h3>

<div class="space-y-8">
    <form class="border border-slate-200 dark:border-slate-700 grid divide-y lg:divide-y-0 lg:divide-x divide-slate-200 dark:divide-slate-700 lg:grid-cols-4 items-center bg-white dark:bg-transparent" action="" method="POST">
        <p class="px-4 hover:bg-slate-100 inline-block py-2 dark:hover:bg-slate-900">
            <i class="fr fi-rr-filter relative top-0.5 pr-2"></i>
            Filter By
        </p>
        <label class="bg-transparent" for="date-added">
            <select class="form-select bg-transparent focus:bg-slate-100 dark:focus:bg-slate-900 border-none focus:ring-transparent w-full" name="date-added" id="date-added">
                <option class="bg-white dark:bg-transparent" value="Date Added">Date Sent</option>
                <option class="bg-white dark:bg-transparent" value="Recently Added">Recently Sent</option>
                <option class="bg-white dark:bg-transparent" value="Older">Older</option>
            </select>
        </label>
        <label class="bg-transparent" for="name-filter">
            <select class="form-select bg-transparent focus:bg-slate-100 dark:focus:bg-slate-900 border-none focus:ring-transparent w-full" name="name-filter" id="name-filter">
                <option class="bg-white dark:bg-transparent" value="Date Added">Sender</option>
                <option class="bg-white dark:bg-transparent" value="Ascending">Ascending</option>
                <option class="bg-white dark:bg-transparent" value="Descending">Descending</option>
            </select>
        </label>
        <button class="text-rose-500 hover:bg-slate-100 py-2 dark:hover:bg-slate-900" type="submit">
            <i class="fr fi-rr-refresh relative top-0.5 pr-2"></i>
            Reset Filter
        </button>
    </form>

    <div class="grid gap-4 grid-cols-1 lg:grid-cols-2 lg:items-start">
        <div class="bg-white p-4 lg:p-8 rounded-xl dark:bg-slate-900 dark:text-slate-100 dark:divide-slate-700 flex flex-col gap-4">
            <a class="flex items-center gap-2 pt-2 px-2 rounded-xl hover:bg-violet-100 dark:hover:bg-violet-500" href="/admin/messages">
                <img class="rounded-full w-10 h-10" src="../assets/img/pic.jpg" alt="Sandra Kush" width="100" height="100">

                <div class="w-full flex flex-wrap flex-col gap-2">
                    <div class="flex items-center justify-between -mb-1.5">
                        <h3 class="header">
                            Sandra Kush
                        </h3>

                        <p class="text-sm">
                            17 Jun, 2022
                        </p>
                    </div>

                    <p>
                        Lorem ipsum dolor sit amet.
                    </p>
                </div>
            </a>

            <a class="flex items-center gap-2 pt-2 px-2 rounded-xl hover:bg-violet-100 dark:hover:bg-violet-500" href="/admin/messages">
                <img class="rounded-full w-10 h-10" src="../assets/img/pic.jpg" alt="Sandra Kush" width="100" height="100">

                <div class="w-full flex flex-wrap flex-col gap-2">
                    <div class="flex items-center justify-between -mb-1.5">
                        <h3 class="header">
                            Sandra Kush
                        </h3>

                        <p class="text-sm">
                            17 Jun, 2022
                        </p>
                    </div>

                    <p>
                        Lorem ipsum dolor sit amet.
                    </p>
                </div>
            </a>

            <a class="flex items-center gap-2 pt-2 px-2 rounded-xl hover:bg-violet-100 hover:dark:bg-violet-500" href="/admin/messages">
                <img class="rounded-full w-10 h-10" src="../assets/img/pic.jpg" alt="Sandra Kush" width="100" height="100">

                <div class="w-full flex flex-wrap flex-col gap-2">
                    <div class="flex items-center justify-between -mb-1.5">
                        <h3 class="header">
                            Sandra Kush
                        </h3>

                        <p class="text-sm">
                            17 Jun, 2022
                        </p>
                    </div>

                    <p>
                        Lorem ipsum dolor sit amet.
                    </p>
                </div>
            </a>

            <a class="flex items-center gap-2 pt-2 px-2 rounded-xl hover:bg-violet-100 hover:dark:bg-violet-500" href="/admin/messages">
                <img class="rounded-full w-10 h-10" src="../assets/img/pic.jpg" alt="Sandra Kush" width="100" height="100">

                <div class="w-full flex flex-wrap flex-col gap-2">
                    <div class="flex items-center justify-between -mb-1.5">
                        <h3 class="header">
                            Sandra Kush
                        </h3>

                        <p class="text-sm">
                            17 Jun, 2022
                        </p>
                    </div>

                    <p>
                        Lorem ipsum dolor sit amet.
                    </p>
                </div>
            </a>

            <a class="flex items-center gap-2 pt-2 px-2 rounded-xl hover:bg-violet-100 hover:dark:bg-violet-500" href="/admin/messages">
                <img class="rounded-full w-10 h-10" src="../assets/img/pic.jpg" alt="Sandra Kush" width="100" height="100">

                <div class="w-full flex flex-wrap flex-col gap-2">
                    <div class="flex items-center justify-between -mb-1.5">
                        <h3 class="header">
                            Sandra Kush
                        </h3>

                        <p class="text-sm">
                            17 Jun, 2022
                        </p>
                    </div>

                    <p>
                        Lorem ipsum dolor sit amet.
                    </p>
                </div>
            </a>
        </div>

        <div class="bg-white p-4 lg:p-8 rounded-xl dark:bg-slate-900 dark:text-slate-100 space-y-8">
            <div class="flex flex-wrap gap-y-2 gap-x-4 items-center border-b border-b-slate-200 pb-2 dark:border-b-slate-700">
                <img class="rounded-full w-10 h-10" src="../assets/img/pic.jpg" alt="Sandra Kush" width="100" height="100">

                <h2 class="header">
                    Sandra Kush
                </h2>
            </div>

            <div class="grid gap-4">
                <div class="grid gap-2 w-1/2">
                    <p class="bg-violet-100 font-medium px-2 py-1 rounded-lg text-rose-500">
                        Lorem ipsum dolor sit amet.
                    </p>

                    <p class="bg-violet-100 font-medium px-2 py-1 rounded-lg text-rose-500">
                        Lorem ipsum dolor sit amet.
                    </p>
                </div>

                <div class="grid gap-2 w-1/2 ml-auto">
                    <p class="bg-emerald-100 font-medium px-2 py-1 rounded-lg text-emerald-500">
                        Lorem ipsum dolor sit amet.
                    </p>

                    <p class="bg-emerald-100 font-medium px-2 py-1 rounded-lg text-emerald-500">
                        Lorem ipsum dolor sit amet.
                    </p>
                </div>
            </div>

            <form class="space-y-2" action="/admin/messages" method="POST">
                <label class="bg-slate-200 text-slate-900 rounded-lg border-1 border-slate-200" for="messageContent">
                    <textarea class="input block  bg-slate-100 text-slate-900 rounded-lg dark:bg-slate-800 dark:text-slate-200" name="messageContent" id="messageContent" rows="4" placeholder="Type your message here..."></textarea>
                </label>

                <button class="bg-sky-500 hover:bg-sky-600 focus:bg-sky-600 py-2 w-auto px-4 text-white rounded-lg dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:bg-sky-700" type="submit">
                    Send Reply
                    <i class="fr fi-rr-paper-plane relative top-0.5"></i>
                </button>
            </form>
        </div>
    </div>
</div>

<script src="../assets/editor/ckeditor.js"></script>
<script src="../assets/js/editor.js"></script>
<script>
    createEditor('messageContent');
</script>
<?php require_once("./includes/Footer.php"); ?>