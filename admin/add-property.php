<?php $pageTitle = "HousingQuest | Add Property"; ?>
<?php require_once("./includes/Header.php"); ?>

                <a class="text-sky-500 hover:text-sky-600 focus:text-sky-600 dark:text-sky-600 dark:hover:text-sky-700" href="/admin/properties">
                    <i class="fr fi-rr-arrow-small-left"></i>
                    Go back
                </a>

                <div class="rounded-xl p-4 lg:p-8 lg:gap-8 space-y-4 bg-white dark:bg-slate-900 dark:text-slate-100">
                    <h3 class="header text-2xl text-rose-500 dark:text-rose-400">
                        <i class="fr fi-rr-megaphone relative top-1.5"></i>
                        Important Notice!!!
                    </h3>

                    <div class="space-y-2.5">
                        <p>
                            Click on any image below to change the image for that section. Please note that the banner image is the one that appears on the homepage, while others are images for the details page.
                        </p>
                    </div>
                </div>

                <form class="grid gap-8" action="/admin/properties" method="POST">
                    <label class="h-[200px] lg:h-[400px] cursor-pointer rounded-xl relative" for="pic-1">
                        <div class="grid gap-2 place-content-center justify-center text-center bg-violet-100 dark:text-slate-900 h-full rounded-xl p-3">
                            <i class="fr fi-rr-picture"></i>
                            <p>
                                Browse or drop images
                            </p>
                        </div>

                        <span class="sr-only">Choose profile photo</span>
                        <input type="file" class="h-full cursor-pointer opacity-0 absolute top-0 left-0 w-full rounded-xl z-50 image-selector" id="pic-1" name="pic-1">

                        <img class="col-span-12 rounded-xl lg:row-start-1 lg:row-end-5 lg:col-span-6 absolute top-0 left-0 w-full h-full not-sr-only opacity-0" src="" alt="" />
                    </label>

                    <div class="grid gap-4 lg:grid-rows-4 grid-cols-12">

                        <label class="h-[200px] lg:row-start-1 lg:row-end-5 lg:col-span-6 col-span-12 cursor-pointer rounded-xl relative lg:h-full" for="pic-2">
                            <div class="grid gap-2 place-content-center justify-center text-center bg-violet-100 dark:text-slate-900 h-full rounded-xl p-3">
                                <i class="fr fi-rr-picture"></i>
                                <p>
                                    Browse or drop images
                                </p>
                            </div>

                            <span class="sr-only">Choose profile photo</span>
                            <input type="file" class="h-full cursor-pointer opacity-0 absolute top-0 left-0 w-full rounded-xl z-50 image-selector" id="pic-2" name="pic-2">

                            <img class="col-span-12 rounded-xl lg:row-start-1 lg:row-end-5 lg:col-span-6 absolute top-0 left-0 w-full h-full not-sr-only opacity-0" src="" alt="" />
                        </label>

                        <label class="h-[200px] col-span-12 lg:row-span-2 lg:col-span-3 cursor-pointer rounded-xl relative" for="pic-3">
                            <div class="grid gap-2 place-content-center justify-center text-center bg-violet-100 dark:text-slate-900 h-full rounded-xl p-3">
                                <i class="fr fi-rr-picture"></i>
                                <p>
                                    Browse or drop images
                                </p>
                            </div>

                            <span class="sr-only">Choose profile photo</span>
                            <input type="file" class="h-full cursor-pointer opacity-0 absolute top-0 left-0 w-full rounded-xl image-selector
                            " id="pic-3" name="pic-3">

                            <img class="col-span-12 rounded-xl lg:row-start-1 lg:row-end-5 lg:col-span-6 absolute top-0 left-0 w-full h-full not-sr-only opacity-0" src="" alt="" />
                        </label>

                        <label class="h-[200px] col-span-12 lg:row-span-2 lg:col-span-3 cursor-pointer rounded-xl relative" for="pic-4">
                            <div class="grid gap-2 place-content-center justify-center text-center bg-violet-100 dark:text-slate-900 h-full rounded-xl p-3">
                                <i class="fr fi-rr-picture"></i>
                                <p>
                                    Browse or drop images
                                </p>
                            </div>

                            <span class="sr-only">Choose profile photo</span>
                            <input type="file" class="h-full cursor-pointer opacity-0 absolute top-0 left-0 w-full rounded-xl image-selector
                            " id="pic-4" name="pic-4">

                            <img class="col-span-12 rounded-xl lg:row-start-1 lg:row-end-5 lg:col-span-6 absolute top-0 left-0 w-full h-full not-sr-only opacity-0" src="" alt="" />
                        </label>

                        <label class="h-[200px] col-span-12 lg:row-span-2 lg:col-span-3 cursor-pointer rounded-xl relative" for="pic-5">
                            <div class="grid gap-2 place-content-center justify-center text-center bg-violet-100 dark:text-slate-900 h-full rounded-xl p-3">
                                <i class="fr fi-rr-picture"></i>
                                <p>
                                    Browse or drop images
                                </p>
                            </div>

                            <span class="sr-only">Choose profile photo</span>
                            <input type="file" class="h-full cursor-pointer opacity-0 absolute top-0 left-0 w-full rounded-xl image-selector
                            " id="pic-5" name="pic-5">

                            <img class="col-span-12 rounded-xl lg:row-start-1 lg:row-end-5 lg:col-span-6 absolute top-0 left-0 w-full h-full not-sr-only opacity-0" src="" alt="" />
                        </label>

                        <label class="h-[200px] col-span-12 lg:row-span-2 lg:col-span-3 cursor-pointer rounded-xl relative" for="pic-6">
                            <div class="grid gap-2 place-content-center justify-center text-center bg-violet-100 dark:text-slate-900 h-full rounded-xl p-3">
                                <i class="fr fi-rr-picture"></i>
                                <p>
                                    Browse or drop images
                                </p>
                            </div>

                            <span class="sr-only">Choose profile photo</span>
                            <input type="file" class="h-full cursor-pointer opacity-0 absolute top-0 left-0 w-full rounded-xl image-selector
                            " id="pic-6" name="pic-6">

                            <img class="col-span-12 rounded-xl lg:row-start-1 lg:row-end-5 lg:col-span-6 absolute top-0 left-0 w-full h-full not-sr-only opacity-0" src="" alt="" />
                        </label>
                    </div>

                    <div class="grid gap-4 lg:w-1/2" action="/admin/properties" method="POST">
                        <h3 class="header text-xl">
                            Property Details
                        </h3>

                        <div class="grid gap-4 lg:grid-cols-12">
                            <div class="lg:col-span-6">
                                <label class="block mb-1.5 ml-1" for="property-name">
                                    Property Name
                                </label>

                                <input class="rounded-lg input" type="text" placeholder="Property Name" name="property-name" id="property-name" autocomplete="off" />
                            </div>

                            <div class="lg:col-span-6">
                                <label class="block mb-1.5 ml-1" for="location">
                                    Building Location
                                </label>

                                <input class="rounded-lg input" type="text" placeholder="Building Location" name="location" id="location" required autocomplete="off" />
                            </div>

                            <div class="lg:col-span-6">
                                <label class="block mb-1.5 ml-1" for="price">
                                    Price
                                </label>

                                <input class="rounded-lg input" type="text" placeholder="Price" name="price" id="price" required autocomplete="off" />
                            </div>

                            <div class="lg:col-span-6">
                                <label class="block mb-1.5 ml-1" for="building-category">
                                    Building Category
                                </label>

                                <select class="form-select input rounded-lg border-none focus:ring-transparent w-full" name="building-category" id="building-category">
                                    <option class="bg-white dark:bg-transparent" value="For sale">For sale</option>
                                    <option class="bg-white dark:bg-transparent" value="For rent">For rent</option>
                                </select>
                            </div>

                            <div class="lg:col-span-12">
                                <label class="block mb-1.5 ml-1" for="building-description">
                                    Building Description
                                </label>

                                <textarea class="input rounded-lg" name="building-description" id="building-description" rows="4" placeholder="Building Description"></textarea>
                            </div>

                            <button class="bg-sky-500 hover:bg-sky-600 focus:bg-sky-600 py-2 w-auto px-4 text-white rounded-lg lg:col-span-6 dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:bg-sky-700"
                                type="submit">
                                Add Property
                            </button>
                        </div>
                    </div>
                </form>
    <?php require_once("./includes/Footer.php"); ?>