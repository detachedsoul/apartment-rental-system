<?php $pageTitle = "HousingQuest | Settings"; ?>
<?php require_once("./includes/Header.php"); ?>
<?php

use app\src\UserProfile;

$userDetails = new UserProfile();
?>

<div class="rounded-xl p-4 lg:p-8 lg:gap-8 space-y-4 bg-white dark:bg-slate-900 dark:text-slate-100">
    <h3 class="header text-2xl text-rose-500 dark:text-rose-400">
        <i class="fr fi-rr-megaphone relative top-1.5"></i>
        Important Notice!!!
    </h3>

    <p>
        To Change your profile picture, please click on the the image below, choose an image of your choice and then click the <code class="text-sky-500">Save Changes</code> button below it.
    </p>
</div>

<div class="grid gap-16 lg:gap-8 lg:grid-cols-12 lg:items-center">
    <form class="lg:sticky lg:top-12 lg:col-span-6 flex flex-col gap-4" method="POST" enctype="multipart/form-data">
        <label class="h-[200px] lg:h-[400px] object-top cursor-pointer rounded-xl relative" for="profile-pic">
            <div class="grid gap-2 place-content-center justify-center text-center bg-violet-100 dark:text-slate-900 h-full rounded-xl p-3">
                <i class="fr fi-rr-picture"></i>
                <p>
                    Browse or drop images
                </p>
            </div>

            <span class="sr-only">Choose profile photo</span>
            <input type="file" class="h-full cursor-pointer opacity-0 absolute top-0 left-0 w-full rounded-xl z-50 image-selector" id="profile-pic" name="profile-pic">

            <img class="col-span-12 rounded-xl lg:row-start-1 lg:row-end-5 lg:col-span-6 absolute top-0 left-0 w-full h-full" src="../<?= (!file_exists('../admin/assets/$userDetails->getUserDetails()->fetch_object()->profile_pic')) ? 'admin/' : '' ?>assets/img/<?= $userDetails->getUserDetails()->fetch_object()->profile_pic ?>" alt="<?= $userDetails->getUserDetails()->fetch_object()->name; ?>" />
        </label>

        <?php $userDetails->updateUserProfilePicture(); ?>

        <button class="bg-sky-500 hover:bg-sky-600 focus:bg-sky-600 py-2 w-auto px-4 text-white rounded-lg lg:col-span-12 dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:bg-sky-700" type="submit" name="change-profile-pic">
            Save Change
        </button>
    </form>

    <div class="lg:col-span-6">
        <form method="POST">
            <div class="text-center mb-6">
                <h3 class="text-center header text-2xl">
                    Profile Information
                </h3>

                <?php $userDetails->updateUserDetails() ?>
            </div>

            <div class="grid gap-4 lg:grid-cols-12">
                <div class="lg:col-span-6">
                    <label class="block mb-1.5 ml-1" for="name">
                        Full Name
                    </label>

                    <input class="rounded-lg input" type="text" placeholder="Full name" name="name" id="name" autocomplete="off" />
                </div>

                <div class="lg:col-span-6">
                    <label class="block mb-1.5 ml-1" for="phone-number">
                        Phone Number
                    </label>

                    <input class="rounded-lg input" type="tel" placeholder="Phone Number" name="phone-number" id="phone-number" autocomplete="off" />
                </div>

                <div class="lg:col-span-6">
                    <label class="block mb-1.5 ml-1" for="email-address">
                        Email Address
                    </label>

                    <input class="rounded-lg input" type="email" placeholder="Email Adress" name="email-address" id="email-address" autocomplete="off" />
                </div>

                <div class="lg:col-span-6">
                    <label class="block mb-1.5 ml-1" for="change-password">
                        Change Password
                    </label>

                    <input class="rounded-lg input" type="password" placeholder="Change Password" name="change-password" id="change-password" autocomplete="off" />
                </div>

                <button class="bg-sky-500 hover:bg-sky-600 focus:bg-sky-600 py-2 w-auto px-4 text-white rounded-lg lg:col-span-12 dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:bg-sky-700" type="submit" name="update-details">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
<?php require_once("./includes/Footer.php"); ?>