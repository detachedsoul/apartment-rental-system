<?php $pageTitle = "HousingQuest | Property"; ?>
<?php require_once("./includes/Header.php"); ?>

                <div class="flex items-center gap-x-4 gap-y-2 justify-between flex-wrap">
                    <a class="text-sky-500 hover:text-sky-600 focus:text-sky-600 dark:text-sky-600 dark:hover:text-sky-700" href="/admin/properties">
                        <i class="fr fi-rr-arrow-small-left"></i>
                        Go back
                    </a>

                    <div class="flex items-center gap-2 flex-wrap">
                        <a class="inline-block rounded-lg py-1.5 px-3 text-emerald-600 bg-emerald-200 hover:bg-emerald-300 hover:text-emerald-700 hover:ring-1 hover:ring-emerald-500 ring-offset-2 active:ring-1 active:ring-emerald-500 dark:ring-offset-slate-800 font-medium" href="/admin/edit-property">
                            <i class="fr fi-rr-edit relative top-0.5 pr-0.5"></i>
                            Edit Property
                        </a>

                        <button class="inline-block rounded-lg py-1.5 px-3 text-rose-500 bg-rose-200 hover:bg-rose-300 hover:ring-1 hover:ring-rose-500 ring-offset-2 active:ring-1 active:ring-rose-500 dark:ring-offset-slate-800 font-medium delete-property" type="button">
                            <i class="fr fi-rr-trash relative top-0.5 pr-0.5"></i>
                            Delete Property
                        </button>
                    </div>
                </div>

                <div class="grid gap-4 lg:grid-rows-4 grid-cols-12 mt-8 mb-8">
                    <img class="h-[200px] col-span-12 rounded-xl lg:row-start-1 lg:row-end-5 lg:h-[400px] lg:col-span-6" src="../assets/img/pic.jpg" alt="" />

                    <img class="h-[200px] col-span-12 rounded-xl lg:h-full lg:row-span-2 lg:col-span-3" src="../assets/img/pic.jpg" alt="" />

                    <img class="h-[200px] col-span-12 rounded-xl lg:h-full lg:row-span-2 lg:col-span-3" src="../assets/img/pic.jpg" alt="" />

                    <img class="h-[200px] col-span-12 rounded-xl lg:h-full lg:row-span-2 lg:col-span-3" src="../assets/img/pic.jpg" alt="" />

                    <img class="h-[200px] col-span-12 rounded-xl lg:h-full lg:row-span-2 lg:col-span-3" src="../assets/img/pic.jpg" alt="" />
                </div>

                <div class="grid gap-8 lg:grid-cols-12">
                    <div class="bg-white space-y-1.5 rounded-xl p-4 dark:bg-slate-900 dark:text-slate-300 lg:col-span-5">
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

                    <div class="bg-white rounded-xl p-4 space-y-2 dark:bg-slate-900 dark:text-slate-300 lg:col-span-7">
                        <h3 class="header text-2xl">
                            Description
                        </h3>
                        <p>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Porro explicabo illum omnis expedita ratione sint laborum laudantium voluptatibus? Molestiae, a.
                        </p>
                    </div>
                </div>

                <dialog class="grid place-content-center text-center fixed backdrop:bg-transparent top-[5%] lg:top-[15%] right-2 left-2 lg:right-[calc(85%/2)] lg:left-[calc(85%/2)] z-50 lg:w-[40%] mb-12 scale-0 confirm-delete bg-transparent">
                    <div class="flex flex-col gap-2.5 w-full p-4 lg:p-8 rounded-xl bg-white dark:bg-slate-900 dark:text-slate-300 lg:p-12 shadow-xl drop-shadow-xl">
                        <div class="mb-2">
                            <span class="before:border relative before:absolute before:-top-[90%] before:-left-[calc(100%-(calc(1.9rem/2)))] before:border-rose-300 before:bg-rose-200 text-rose-400 before:rotate-45 before:rounded-xl before:p-6 before:mb-12">
                                <i class="fr fi-rr-trash text-2xl relative left-[0.3rem]"></i>
                            </span>
                        </div>

                        <h3 class="header text-2xl text-rose-500 dark:text-rose-500 -mb-2">
                            Confirmation
                        </h3>

                        <p class="">
                            Are you sure you want to delete this property? It would be removed from future listings and search results.
                        </p>

                        <button class="bg-rose-500 text-white text-center py-2 px-4 rounded-lg block hover:ring-1 hover:ring-rose-500 ring-offset-2 active:ring-1 active:ring-rose-500 dark:ring-offset-slate-800 w-full" type="submit">
                            Delete
                        </button>

                        <button class="text-sky-500 hover:text-sky-600 focus:text-sky-600 dark:text-sky-600 dark:hover:text-sky-700 cancel-delete" type="button">
                        <i class="fr fi-rr-arrow-small-left"></i>
                            Go back
                        </button>
                    </div>
                </dialog>
    <?php require_once("./includes/Footer.php"); ?>