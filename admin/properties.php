<?php $pageTitle = "HousingQuest | Property List"; ?>
<?php require_once("./includes/Header.php"); ?>

                <div class="flex items-center gap-x-4 gap-y-2 justify-between flex-wrap">
                    <h3 class="header text-xl">
                        Properties List
                    </h3>

                    <a class="inline-block rounded-lg py-1.5 px-3 text-white bg-sky-500 hover:bg-sky-600 hover:ring-1 hover:ring-sky-500 ring-offset-2 active:ring-1 active:ring-sky-500 dark:ring-offset-slate-800" href="/admin/add-property">
                        Add New Property
                    </a>
                </div>

                <div class="space-y-8 -mt-12">
                    <form class="border border-slate-200 dark:border-slate-700 grid divide-y lg:divide-y-0 lg:divide-x divide-slate-200 dark:divide-slate-700 lg:grid-cols-5 items-center bg-white dark:bg-transparent" action="" method="POST">
                        <p class="px-4 hover:bg-slate-100 inline-block py-2 dark:hover:bg-slate-900">
                            <i class="fr fi-rr-filter relative top-0.5 pr-2"></i>
                            Filter By
                        </p>
                        <label class="bg-transparent" for="date-added">
                            <select class="form-select bg-transparent focus:bg-slate-100 dark:focus:bg-slate-900 border-none focus:ring-transparent w-full" name="date-added" id="date-added">
                                <option class="bg-white dark:bg-transparent" value="Date Added">Date Added</option>
                                <option class="bg-white dark:bg-transparent" value="Recently Added">Recently Added</option>
                                <option class="bg-white dark:bg-transparent" value="Older">Older</option>
                            </select>
                        </label>
                        <label class="bg-transparent" for="name-filter">
                            <select class="form-select bg-transparent focus:bg-slate-100 dark:focus:bg-slate-900 border-none focus:ring-transparent w-full" name="name-filter" id="name-filter">
                                <option class="bg-white dark:bg-transparent" value="Date Added">Name</option>
                                <option class="bg-white dark:bg-transparent" value="Ascending">Ascending</option>
                                <option class="bg-white dark:bg-transparent" value="Descending">Descending</option>
                            </select>
                        </label>
                        <label class="bg-transparent" for="price-filter">
                            <select class="form-select bg-transparent focus:bg-slate-100 dark:focus:bg-slate-900 border-none focus:ring-transparent w-full" name="price-filter" id="price-filter">
                                <option class="bg-white dark:bg-transparent" value="Date Added">Price</option>
                                <option class="bg-white dark:bg-transparent" value="Ascending">Ascending</option>
                                <option class="bg-white dark:bg-transparent" value="Descending">Descending</option>
                            </select>
                        </label>
                        <button class="text-rose-500 hover:bg-slate-100 py-2 dark:hover:bg-slate-900" type="submit">
                            <i class="fr fi-rr-refresh relative top-0.5 pr-2"></i>
                            Reset Filter
                        </button>
                    </form>

                    <div class="grid gap-8 lg:grid-cols-12 lg:gap-4">
                        <div class="lg:col-span-4">
                            <img class="property-listing-image" src="../assets/img/pic.jpg" alt="4 Bedroom Flat" title="4 Bedroom Flat" width="100%" height="200">

                            <div class="property-listing-summary p-4 bg-slate-200 space-y-3 dark:bg-slate-900">

                                <div class="flex items-center flex-wrap gap-4 justify-between">
                                    <span class="text-rose-500 dark:text-rose-400">
                                        <i class="fr fi-rr-thumbtack"></i>
                                        For sale
                                    </span>

                                    <span class="text-sky-500 lining-nums font-semibold tracking-widest">
                                        ₦ 200,000.00
                                    </span>
                                </div>

                                <div>
                                    <h2 class="header">
                                        4 Bedroom Flat
                                    </h2>

                                    <p>
                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                    </p>
                                </div>

                                <p>
                                    <i class="fr fi-rr-map-marker-home"></i>
                                    Rivers State University
                                </p>

                                <a class="inline-block rounded-lg py-1.5 px-3 text-white bg-sky-500 hover:bg-sky-600 hover:ring-1 hover:ring-sky-500 ring-offset-2 active:ring-1 active:ring-sky-500 dark:ring-offset-slate-800" href="/admin/view-property">
                                    View Property
                                </a>
                            </div>
                        </div>

                        <div class="lg:col-span-4">
                            <img class="property-listing-image" src="../assets/img/pic.jpg" alt="4 Bedroom Flat" title="4 Bedroom Flat"
                                width="100%" height="200">

                            <div class="property-listing-summary p-4 bg-slate-200 space-y-3 dark:bg-slate-900">

                                <div class="flex items-center flex-wrap gap-4 justify-between">
                                    <span class="text-green-500 dark:text-green-400">
                                        <i class="fr fi-rr-recycle"></i>
                                        For rent
                                    </span>

                                    <span class="text-sky-500 lining-nums font-semibold tracking-widest">
                                        ₦ 200,000.00
                                    </span>
                                </div>

                                <div>
                                    <h2 class="header">
                                        4 Bedroom Flat
                                    </h2>

                                    <p>
                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                    </p>
                                </div>

                                <p>
                                    <i class="fr fi-rr-map-marker-home"></i>
                                    Rivers State University
                                </p>

                                <a class="inline-block rounded-lg py-1.5 px-3 text-white bg-sky-500 hover:bg-sky-600 hover:ring-1 hover:ring-sky-500 ring-offset-2 active:ring-1 active:ring-sky-500 dark:ring-offset-slate-800" href="/admin/view-property">
                                    View Property
                                </a>
                            </div>
                        </div>

                        <div class="lg:col-span-4">
                            <img class="property-listing-image" src="../assets/img/pic.jpg" alt="4 Bedroom Flat" title="4 Bedroom Flat"
                                width="100%" height="200">

                            <div class="property-listing-summary p-4 bg-slate-200 space-y-3 dark:bg-slate-900">

                                <div class="flex items-center flex-wrap gap-4 justify-between">
                                    <span class="text-rose-500 dark:text-rose-400">
                                        <i class="fr fi-rr-thumbtack"></i>
                                        For sale
                                    </span>

                                    <span class="text-sky-500 lining-nums font-semibold tracking-widest">
                                        ₦ 200,000.00
                                    </span>
                                </div>

                                <div>
                                    <h2 class="header">
                                        4 Bedroom Flat
                                    </h2>

                                    <p>
                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                    </p>
                                </div>

                                <p>
                                    <i class="fr fi-rr-map-marker-home"></i>
                                    Rivers State University
                                </p>

                                <a class="inline-block rounded-lg py-1.5 px-3 text-white bg-sky-500 hover:bg-sky-600 hover:ring-1 hover:ring-sky-500 ring-offset-2 active:ring-1 active:ring-sky-500 dark:ring-offset-slate-800" href="/admin/view-property">
                                    View Property
                                </a>
                            </div>
                        </div>

                        <div class="lg:col-span-4">
                            <img class="property-listing-image" src="../assets/img/pic.jpg" alt="4 Bedroom Flat" title="4 Bedroom Flat" width="100%" height="200">

                            <div class="property-listing-summary p-4 bg-slate-200 space-y-3 dark:bg-slate-900">

                                <div class="flex items-center flex-wrap gap-4 justify-between">
                                    <span class="text-rose-500 dark:text-rose-400">
                                        <i class="fr fi-rr-thumbtack"></i>
                                        For sale
                                    </span>

                                    <span class="text-sky-500 lining-nums font-semibold tracking-widest">
                                        ₦ 200,000.00
                                    </span>
                                </div>

                                <div>
                                    <h2 class="header">
                                        4 Bedroom Flat
                                    </h2>

                                    <p>
                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                    </p>
                                </div>

                                <p>
                                    <i class="fr fi-rr-map-marker-home"></i>
                                    Rivers State University
                                </p>

                                <a class="inline-block rounded-lg py-1.5 px-3 text-white bg-sky-500 hover:bg-sky-600 hover:ring-1 hover:ring-sky-500 ring-offset-2 active:ring-1 active:ring-sky-500 dark:ring-offset-slate-800" href="/admin/view-property">
                                    View Property
                                </a>
                            </div>
                        </div>

                        <div class="lg:col-span-4">
                            <img class="property-listing-image" src="../assets/img/pic.jpg" alt="4 Bedroom Flat" title="4 Bedroom Flat"
                                width="100%" height="200">

                            <div class="property-listing-summary p-4 bg-slate-200 space-y-3 dark:bg-slate-900">

                                <div class="flex items-center flex-wrap gap-4 justify-between">
                                    <span class="text-green-500 dark:text-green-400">
                                        <i class="fr fi-rr-recycle"></i>
                                        For rent
                                    </span>

                                    <span class="text-sky-500 lining-nums font-semibold tracking-widest">
                                        ₦ 200,000.00
                                    </span>
                                </div>

                                <div>
                                    <h2 class="header">
                                        4 Bedroom Flat
                                    </h2>

                                    <p>
                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                    </p>
                                </div>

                                <p>
                                    <i class="fr fi-rr-map-marker-home"></i>
                                    Rivers State University
                                </p>

                                <a class="inline-block rounded-lg py-1.5 px-3 text-white bg-sky-500 hover:bg-sky-600 hover:ring-1 hover:ring-sky-500 ring-offset-2 active:ring-1 active:ring-sky-500 dark:ring-offset-slate-800" href="/admin/view-property">
                                    View Property
                                </a>
                            </div>
                        </div>

                        <div class="lg:col-span-4">
                            <img class="property-listing-image" src="../assets/img/pic.jpg" alt="4 Bedroom Flat" title="4 Bedroom Flat"
                                width="100%" height="200">

                            <div class="property-listing-summary p-4 bg-slate-200 space-y-3 dark:bg-slate-900">

                                <div class="flex items-center flex-wrap gap-4 justify-between">
                                    <span class="text-rose-500 dark:text-rose-400">
                                        <i class="fr fi-rr-thumbtack"></i>
                                        For sale
                                    </span>

                                    <span class="text-sky-500 lining-nums font-semibold tracking-widest">
                                        ₦ 200,000.00
                                    </span>
                                </div>

                                <div>
                                    <h2 class="header">
                                        4 Bedroom Flat
                                    </h2>

                                    <p>
                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                    </p>
                                </div>

                                <p>
                                    <i class="fr fi-rr-map-marker-home"></i>
                                    Rivers State University
                                </p>

                                <a class="inline-block rounded-lg py-1.5 px-3 text-white bg-sky-500 hover:bg-sky-600 hover:ring-1 hover:ring-sky-500 ring-offset-2 active:ring-1 active:ring-sky-500 dark:ring-offset-slate-800" href="/admin/view-property">
                                    View Property
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
    <?php require_once("./includes/Footer.php"); ?>