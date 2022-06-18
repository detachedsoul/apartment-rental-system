<?php $pageTitle = "HousingQuest | Edit Property"; ?>
<?php require_once("./includes/Header.php"); ?>

                <a class="text-sky-500 hover:text-sky-600 focus:text-sky-600 dark:text-sky-600 dark:hover:text-sky-700" href="/admin/properties">
                    <i class="fr fi-rr-arrow-small-left"></i>
                    Go back
                </a>

                <div class="grid gap-4 lg:grid-rows-4 grid-cols-12">
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

                <form class="grid gap-4 lg:w-1/2" action="/admin/properties" method="POST">
                    <h3 class="header text-xl">
                        Property Details
                    </h3>

                    <div class="grid gap-4 lg:grid-cols-12">
                        <div class="lg:col-span-6">
                            <label class="block mb-1.5 ml-1" for="property-name">
                                Property Name
                            </label>

                            <input class="rounded-lg input" type="text" placeholder="Property Name" name="property-name" id="property-name" autocomplete="off" value="4 Bedroom Flat" />
                        </div>

                        <div class="lg:col-span-6">
                            <label class="block mb-1.5 ml-1" for="location">
                                Building Location
                            </label>

                            <input class="rounded-lg input" type="text" placeholder="Building Location" name="location" id="location" required autocomplete="off" value="Rivers State University" />
                        </div>

                        <div class="lg:col-span-6">
                            <label class="block mb-1.5 ml-1" for="price">
                                Price
                            </label>

                            <input class="rounded-lg input" type="text" placeholder="Price" name="price" id="price" required autocomplete="off" value="vindicatedwisdom@gmail.com" />
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

                            <textarea class="input rounded-lg" name="building-description" id="building-description" rows="4" placeholder="Building Description">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maiores, suscipit.</textarea>
                        </div>

                        <button class="bg-sky-500 hover:bg-sky-600 focus:bg-sky-600 py-2 w-auto px-4 text-white rounded-lg lg:col-span-6 dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:bg-sky-700"
                            type="submit">
                            Save Changes
                        </button>
                    </div>
                </form>
    <?php require_once("./includes/Footer.php"); ?>