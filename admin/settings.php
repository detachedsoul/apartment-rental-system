<?php $pageTitle = "Setting"; ?>
<?php require_once("./includes/Header.php"); ?>

                <div class="grid gap-16 lg:gap-8 lg:grid-cols-12 lg:items-center">
                    <div class="lg:sticky lg:top-12 lg:col-span-6 flex flex-col gap-4">
                        <img class="rounded-xl w-full h-[200px] lg:h-auto object-top" src="./assets/img/wisdom.jpg" alt="Wisdom Ojimah" title="Wisdom Ojimah" width="100" height="200">

                        <form action="/admin/settings" method="POST">
                            <label class="block">
                                <span class="sr-only">Choose profile photo</span>
                                <input type="file" class="block w-full text-sm text-slate-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-lg file:border-0
                                file:text-sm file:font-semibold
                                file:bg-violet-50 file:text-violet-700
                                hover:file:bg-violet-400 hover:file:text-violet-50
                                "/>
                            </label>

                            <button class="bg-sky-500 mt-2 hover:bg-sky-600 focus:bg-sky-600 py-2 w-auto px-4 text-white rounded-lg lg:col-span-12 dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:bg-sky-700"
                                    type="submit">
                                    Save Changes
                                </button>
                        </form>
                    </div>

                    <div class="lg:col-span-6">
                        <form method="POST">
                            <div class="text-center mb-6">
                                <h3 class="text-center header text-2xl">
                                    Profile Information
                                </h3>

                                <p>
                                    View and edit your profile information
                                </p>
                            </div>

                            <div class="grid gap-4 lg:grid-cols-12">
                                <div class="lg:col-span-6">
                                    <label class="block mb-1.5 ml-1" for="name">
                                        Full Name
                                    </label>

                                    <input class="rounded-lg input" type="tel" placeholder="Full name" name="name" id="name" required autocomplete="off" value="Wisdom Ojimah" />
                                </div>

                                <div class="lg:col-span-6">
                                    <label class="block mb-1.5 ml-1" for="phone-number">
                                        Phone Number
                                    </label>

                                    <input class="rounded-lg input" type="text" placeholder="Phone Number" name="name" id="phone-number" required autocomplete="off" value="+2348105008304" />
                                </div>

                                <div class="lg:col-span-6">
                                    <label class="block mb-1.5 ml-1" for="email-address">
                                        Email Address
                                    </label>

                                    <input class="rounded-lg input" type="text" placeholder="Email Adress" name="email-address" id="email-address" required autocomplete="off" value="vindicatedwisdom@gmail.com" />
                                </div>

                                <div class="lg:col-span-6">
                                    <label class="block mb-1.5 ml-1" for="change-password">
                                        Change Password
                                    </label>

                                    <input class="rounded-lg input" type="text" placeholder="Change Password" name="change-password" id="change-password" autocomplete="off" />
                                </div>

                                <button class="bg-sky-500 hover:bg-sky-600 focus:bg-sky-600 py-2 w-auto px-4 text-white rounded-lg lg:col-span-12 dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:bg-sky-700"
                                    type="submit">
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
    <?php require_once("./includes/Footer.php"); ?>