<?php $pageTitle = "HousingQuest | Add Property"; ?>
<?php require_once("./includes/Header.php"); ?>
<?php
    use app\src\AddProperty;
    $addProperty = new AddProperty();
?>

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
                        <p>
                            Please note that the summary field is for giving a brief description of the nature of the property.
                        </p>
                    </div>
                </div>

                <form class="grid gap-8" method="POST" enctype="multipart/form-data">
                    <label class="h-[200px] lg:h-[400px] cursor-pointer rounded-xl relative" for="pic-1">
                        <div class="grid gap-2 place-content-center justify-center text-center bg-white shadow-sm dark:shadow-none dark:text-slate-900 dark:bg-violet-100 h-full rounded-xl p-3">
                            <i class="fr fi-rr-picture"></i>
                            <p>
                                Browse or drop images
                            </p>
                        </div>

                        <span class="sr-only">Choose profile photo</span>
                        <input type="file" class="h-full cursor-pointer opacity-0 absolute top-0 left-0 w-full rounded-xl z-50 image-selector" required id="pic-1" name="pic-1" >

                        <img class="col-span-12 rounded-xl lg:row-start-1 lg:row-end-5 lg:col-span-6 absolute top-0 left-0 w-full h-full not-sr-only opacity-0" src="" alt="" />
                    </label>

                    <div class="grid gap-4 lg:grid-rows-4 grid-cols-12">

                        <label class="h-[200px] lg:row-start-1 lg:row-end-5 lg:col-span-6 col-span-12 cursor-pointer rounded-xl relative lg:h-full" for="pic-2">
                            <div class="grid gap-2 place-content-center justify-center text-center bg-white shadow-sm dark:shadow-none dark:text-slate-900 dark:bg-violet-100 h-full rounded-xl p-3">
                                <i class="fr fi-rr-picture"></i>
                                <p>
                                    Browse or drop images
                                </p>
                            </div>

                            <span class="sr-only">Choose profile photo</span>
                            <input type="file" class="h-full cursor-pointer opacity-0 absolute top-0 left-0 w-full rounded-xl z-50 image-selector" id="pic-2" required name="pic-2" >

                            <img class="col-span-12 rounded-xl lg:row-start-1 lg:row-end-5 lg:col-span-6 absolute top-0 left-0 w-full h-full not-sr-only opacity-0" src="" alt="" />
                        </label>

                        <label class="h-[200px] col-span-12 lg:row-span-2 lg:col-span-3 cursor-pointer rounded-xl relative" for="pic-3">
                            <div class="grid gap-2 place-content-center justify-center text-center bg-white shadow-sm dark:shadow-none dark:text-slate-900 dark:bg-violet-100 h-full rounded-xl p-3">
                                <i class="fr fi-rr-picture"></i>
                                <p>
                                    Browse or drop images
                                </p>
                            </div>

                            <span class="sr-only">Choose profile photo</span>
                            <input type="file" class="h-full cursor-pointer opacity-0 absolute top-0 left-0 w-full rounded-xl image-selector
                            " id="pic-3" required name="pic-3" >

                            <img class="col-span-12 rounded-xl lg:row-start-1 lg:row-end-5 lg:col-span-6 absolute top-0 left-0 w-full h-full not-sr-only opacity-0" src="" alt="" />
                        </label>

                        <label class="h-[200px] col-span-12 lg:row-span-2 lg:col-span-3 cursor-pointer rounded-xl relative" for="pic-4">
                            <div class="grid gap-2 place-content-center justify-center text-center bg-white shadow-sm dark:shadow-none dark:text-slate-900 dark:bg-violet-100 h-full rounded-xl p-3">
                                <i class="fr fi-rr-picture"></i>
                                <p>
                                    Browse or drop images
                                </p>
                            </div>

                            <span class="sr-only">Choose profile photo</span>
                            <input type="file" class="h-full cursor-pointer opacity-0 absolute top-0 left-0 w-full rounded-xl image-selector
                            " id="pic-4" required name="pic-4" >

                            <img class="col-span-12 rounded-xl lg:row-start-1 lg:row-end-5 lg:col-span-6 absolute top-0 left-0 w-full h-full not-sr-only opacity-0" src="" alt="" />
                        </label>

                        <label class="h-[200px] col-span-12 lg:row-span-2 lg:col-span-3 cursor-pointer rounded-xl relative" for="pic-5">
                            <div class="grid gap-2 place-content-center justify-center text-center bg-white shadow-sm dark:shadow-none dark:text-slate-900 dark:bg-violet-100 h-full rounded-xl p-3">
                                <i class="fr fi-rr-picture"></i>
                                <p>
                                    Browse or drop images
                                </p>
                            </div>

                            <span class="sr-only">Choose profile photo</span>
                            <input type="file" class="h-full cursor-pointer opacity-0 absolute top-0 left-0 w-full rounded-xl image-selector
                            " id="pic-5" required name="pic-5" >

                            <img class="col-span-12 rounded-xl lg:row-start-1 lg:row-end-5 lg:col-span-6 absolute top-0 left-0 w-full h-full not-sr-only opacity-0" src="" alt="" />
                        </label>

                        <label class="h-[200px] col-span-12 lg:row-span-2 lg:col-span-3 cursor-pointer rounded-xl relative" for="pic-6">
                            <div class="grid gap-2 place-content-center justify-center text-center bg-white shadow-sm dark:shadow-none dark:text-slate-900 dark:bg-violet-100 h-full rounded-xl p-3">
                                <i class="fr fi-rr-picture"></i>
                                <p>
                                    Browse or drop images
                                </p>
                            </div>

                            <span class="sr-only">Choose profile photo</span>
                            <input type="file" class="h-full cursor-pointer opacity-0 absolute top-0 left-0 w-full rounded-xl image-selector
                            " id="pic-6" required name="pic-6" >

                            <img class="col-span-12 rounded-xl lg:row-start-1 lg:row-end-5 lg:col-span-6 absolute top-0 left-0 w-full h-full not-sr-only opacity-0" src="" alt="" />
                        </label>
                    </div>

                    <div class="grid gap-4 lg:w-4/5 lg:mx-auto lg:gap-8 mt-8">
                        <h3 class="header text-xl -mb-4">
                            <?php $addProperty->addNewProperty(); ?>
                        </h3>

                        <div class="grid gap-4 lg:grid-cols-12">
                            <div class="lg:col-span-6">
                                <label class="block mb-1.5 ml-1" for="property-name">
                                    Property Name
                                </label>

                                <input class="rounded-lg input" type="text" placeholder="Property Name" name="property-name" id="property-name" autocomplete="off" required value="<?= $addProperty->setPropertyName() ?>" />
                            </div>

                            <div class="lg:col-span-6">
                                <label class="block mb-1.5 ml-1" for="location">
                                    Property Location
                                </label>

                                <input class="rounded-lg input" type="text" placeholder="Property Location" name="property-location" id="location" required  autocomplete="off" value="<?= $addProperty->setPropertyLocation() ?>" />
                            </div>

                            <div class="lg:col-span-6">
                                <label class="block mb-1.5 ml-1" for="price">
                                    Price
                                </label>

                                <input class="rounded-lg input" type="number" placeholder="Price" name="property-price" id="property-price" required  autocomplete="off" value="<?= $addProperty->setPropertyPrice() ?>" />
                            </div>

                            <div class="lg:col-span-6">
                                <label class="block mb-1.5 ml-1" for="property-category">
                                    Property Category
                                </label>

                                <select class="form-select input rounded-lg border-none focus:ring-transparent w-full" name="property-category" id="property-category">
                                    <option class="bg-white dark:bg-transparent" value="For rent">For Rent</option>
                                    <option class="bg-white dark:bg-transparent" value="For rent">For Sale</option>
                                </select>
                            </div>

                            <div class="lg:col-span-6">
                                <label class="block mb-1.5 ml-1" for="property-summary">
                                    Property Summary
                                </label>

                                <textarea class="input rounded-lg" name="property-summary" id="property-summary" required rows="4" placeholder="Property Summary"><?= $addProperty->setPropertySummary() ?></textarea>
                            </div>

                            <div class="lg:col-span-6">
                                <label class="block mb-1.5 ml-1" for="property-description">
                                    Property Description
                                </label>

                                <textarea class="input rounded-lg" name="property-description" id="property-description" required rows="4" placeholder="Property Description"><?= $addProperty->setPropertyDescription() ?></textarea>
                            </div>

                            <button class="bg-sky-500 hover:bg-sky-600 focus:bg-sky-600 py-2 w-auto px-4 text-white rounded-lg lg:col-span-12 lg:mx-auto dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:bg-sky-700"
                                type="submit" name="add-property">
                                Add Property
                            </button>
                        </div>
                    </div>
                </form>
    <?php require_once("./includes/Footer.php"); ?>