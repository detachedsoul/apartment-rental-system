<?php $pageTitle = "Contact Us"; ?>
<?php require_once("./includes/Header.php") ?>
<?php

use app\src\ContactForm;

$contactForm = new ContactForm();
?>


<main class="grid place-content-center min-h-screen py-8 px-4 dark:bg-slate-900 dark:text-slate-400">
    <form class="bg-slate-100 py-8 px-4 rounded-xl lg:mx-auto dark:bg-slate-800 lg:w-full lg:max-w-[50%]" method="POST">
        <div class="text-center mx-auto w-[90%] mb-8">

            <?= $contactForm->sendContactMail() ?>

            <p>
                We would love to hear from you
            </p>

        </div>

        <div class="grid gap-y-3 gap-x-4 lg:grid-cols-12">

            <label class="flex items-center bg-white text-slate-900 rounded-lg lg:col-span-6 dark:bg-slate-900 dark:text-slate-400 shadow-sm border-1 border-slate-100" for="name">
                <span class="rounded-l-lg pl-4">
                    <i class="fr fi-rr-user relative top-0.5"></i>
                </span>

                <input class="rounded-r-lg input pl-2 bg-white" type="text" placeholder="Name" name="name" required id="name"  autocomplete="off" value="<?= $contactForm->setName() ?>" />
            </label>

            <label class="flex items-center bg-white text-slate-900 rounded-lg lg:col-span-6 dark:bg-slate-900 dark:text-slate-400 shadow-sm border-1 border-slate-100" for="email">
                <span class="rounded-l-lg pl-4">
                    <i class="fr fi-rr-envelope relative top-0.5"></i>
                </span>

                <input class="rounded-r-lg input pl-2 bg-white" type="email" placeholder="Email" name="email" required id="email" value="<?= $contactForm->setEmail() ?>" autocomplete="off" />
            </label>

            <label class="flex items-center bg-white text-slate-900 rounded-lg lg:col-span-12 dark:bg-slate-900 dark:text-slate-400 shadow-sm border-1 border-slate-100" for="subject">
                <span class="rounded-l-lg pl-4">
                    <i class="fr fi-rr-edit relative top-0.5"></i>
                </span>

                <input class="rounded-r-lg input pl-2 bg-white" type="text" placeholder="Subject" name="subject" required value="<?= $contactForm->setSubject() ?>" id="subject" autocomplete="off" />
            </label>

            <label class="bg-white text-slate-900 rounded-lg lg:col-span-12 shadow-sm border-1 border-slate-100" for="messageContent">
                <textarea class="input block  bg-white text-slate-900 rounded-lg" name="messageContent" id="messageContent" required rows="5" placeholder="Message"><?= $contactForm->setMessage() ?></textarea>
            </label>

        </div>

        <button class="bg-sky-500 hover:bg-sky-600 focus:bg-sky-600 py-1.5 w-auto px-4 text-white rounded-lg lg:col-span-12 mt-4 dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:bg-sky-700" type="submit" name="send-message">
            Send Message
        </button>
    </form>
</main>

<?php require_once("./includes/Footer.php") ?>