<?php

namespace app\src;

use app\assets\DB;

class PropertyDetails
{
    private $propertyID;
    private $propertyName;
    private $con;
    private $name;
    private $subject;
    private $email;
    private $message;

    public function __construct()
    {
        $this->propertyID = $_GET['propertyID'];
        $this->propertyName = $_GET['propertyName'];
        $this->con = DB::getInstance();
    }

    // Sets the name field of the form
    public function setName(): string
    {
        return $this->name = isset($_POST['name']) ? ucwords(trim(strip_tags($_POST['name']))) : "";
    }

    // Sets the email field of a form
    public function setEmail(): string
    {
        return $this->email = isset($_POST['email']) ? strtolower(trim(strip_tags($_POST['email']))) : "";
    }

    // Sets the subject field of a form
    public function setSubject(): string
    {
        return $this->subject = isset($_POST['subject']) ? ucwords(strtolower(trim(strip_tags($_POST['subject'])))) : "";
    }

    // Sets the message content field of a form
    public function setMessage(): string
    {
        return $this->message = isset($_POST['messageContent']) ? ucfirst(trim($_POST['messageContent'])) : "";
    }


    /**
     * Get the details for a particular property
     */
    public function showProperty()
    {

        // Check if the required GET properties are set
        if (is_empty($this->propertyID) || is_empty($this->propertyName)) {
            header("Location: /404", true, 301);
        }

        $getHouse = $this->con->select("id, img_1, img_2, img_3, img_4, img_5, title, price, description, location, type, owner_id", "properties", "WHERE id = ? AND link = ?", ...[$this->propertyID, $this->propertyName]);

        // Check if there is any available apartment
        if ($getHouse->num_rows < 1) {
            header("Location: /404", true, 301);
        }

        while ($house = $getHouse->fetch_object()) : ?>
            <div class="min-h-[80vh] h-[80vh] grid place-content-center text-center dark:bg-details-banner bg-light-details-banner px-4 bg-fixed bg-center bg-cover text-slate-200 p-4 lg:p-8">
                <h1 class="header text-3xl">
                    <?= $house->title ?>
                </h1>
            </div>

            <main class="px-4 py-12 lg:px-[10%] bg-slate-200 dark:bg-slate-900">
                <a class="text-sky-500 hover:text-sky-600 focus:text-sky-600 dark:text-sky-600 dark:hover:text-sky-700" href="/">
                    <i class="fr fi-rr-arrow-small-left"></i>
                    Go back
                </a>

                <div class="grid gap-4 lg:grid-rows-4 grid-cols-12 mt-8 mb-8">
                    <img class="h-[200px] col-span-12 rounded-xl lg:row-start-1 lg:row-end-5 lg:h-[calc(1035px/2)] lg:col-span-6" src="./assets/img/<?= $house->img_1 ?>" alt="<?= $house->title ?>" />

                    <img class="h-[200px] col-span-12 rounded-xl lg:row-span-2 lg:col-span-3 lg:h-[250px]" src="./assets/img/<?= $house->img_2 ?>" alt="<?= $house->title ?>" />

                    <img class="h-[200px] col-span-12 rounded-xl lg:row-span-2 lg:col-span-3 lg:h-[250px]" src="./assets/img/<?= $house->img_3 ?>" alt="<?= $house->title ?>" />

                    <img class="h-[200px] col-span-12 rounded-xl lg:row-span-2 lg:col-span-3 lg:h-[250px]" src="./assets/img/<?= $house->img_4 ?>" alt="<?= $house->title ?>" />

                    <img class="h-[200px] col-span-12 rounded-xl lg:row-span-2 lg:col-span-3 lg:h-[250px]" src="./assets/img/<?= $house->img_5 ?>" alt="<?= $house->title ?>" />
                </div>

                <div class="grid gap-8 lg:grid-cols-12">
                    <div class="lg:col-span-8 space-y-4">
                        <div class="bg-white space-y-1.5 rounded-xl p-4 dark:bg-slate-800 dark:text-slate-300">
                            <span class=<?= $house->type === 'For Rent' ? "text-green-500 dark:text-green-400" : "text-rose-500 dark:text-rose-400" ?>>
                                <i class="fr <?= $house->type === 'For Rent' ? 'fi-rr-recycle' : 'fi-rr-thumbtack' ?>"></i>
                                <?= $house->type ?>
                            </span>
                            <h3 class="header text-3xl">
                                Details of building
                            </h3>
                            <p>
                                <i class="fr fi-rr-map-marker-home"></i>
                                <?= $house->location ?>
                            </p>
                            <span class="text-sky-500 lining-nums font-semibold tracking-widest text-xl inline-block">
                                ₦ <?= number_format($house->price) ?>
                            </span>
                        </div>

                        <div class="bg-white rounded-xl p-4 space-y-2 dark:bg-slate-800 dark:text-slate-300">
                            <h3 class="header text-2xl">
                                Description
                            </h3>
                            <?= $house->description ?>
                        </div>
                    </div>

                    <div class="lg:col-span-4 max-w-full [display:unset]">
                        <div class="sticky top-20">
                            <div class="rounded-t-xl bg-emerald-500 text-white p-4">
                                <h4 class="header text-xl">
                                    Signify Interest
                                </h4>
                                <?php $this->sendRequest() ?>
                            </div>

                            <form class="bg-white grid gap-4 rounded-b-xl p-4 dark:bg-slate-800" method="POST">
                                <label class="flex items-center bg-slate-200 text-slate-900 rounded-lg dark:bg-slate-900 dark:text-slate-400 border-1 border-slate-100" for="name">
                                    <span class="rounded-l-lg pl-4">
                                        <i class="fr fi-rr-user relative top-0.5"></i>
                                    </span>

                                    <input class="rounded-r-lg input pl-2 bg-slate-200" type="text" placeholder="Name" name="name" id="name" required autocomplete="off" value="<?= $this->setName() ?>" />
                                </label>

                                <label class="flex items-center bg-slate-200 text-slate-900 rounded-lg dark:bg-slate-900 dark:text-slate-400 border-1 border-slate-100" for="email">
                                    <span class="rounded-l-lg pl-4">
                                        <i class="fr fi-rr-envelope relative top-0.5"></i>
                                    </span>

                                    <input class="rounded-r-lg input pl-2 bg-slate-200" type="email" placeholder="Email" name="email" id="email" required autocomplete="off" value="<?= $this->setEmail() ?>" />
                                </label>

                                <label class="flex items-center bg-slate-200 text-slate-900 rounded-lg dark:bg-slate-900 dark:text-slate-400 border-1 border-slate-100" for="subject">
                                    <span class="rounded-l-lg pl-4">
                                        <i class="fr fi-rr-edit relative top-0.5"></i>
                                    </span>

                                    <input class="rounded-r-lg input pl-2 bg-slate-200" type="subject" placeholder="Subject" name="subject" id="subject" required autocomplete="off" value="<?= $this->setSubject() ?>" />
                                </label>

                                <label class="bg-slate-200 text-slate-900 rounded-lg border-1 border-slate-100" for="messageContent">
                                    <textarea class="input block rounded-lg" name="messageContent" id="messageContent" rows="4" placeholder="Message Content"><?= $this->setMessage() ?></textarea>
                                </label>

                                <button class="bg-sky-500 hover:bg-sky-600 focus:bg-sky-600 py-2 w-auto px-4 text-white rounded-lg dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:bg-sky-700 hover:ring-1 hover:ring-sky-500 ring-offset-2 active:ring-1 active:ring-sky-500 dark:ring-offset-slate-800" type="submit" name="submit-request">
                                    Submit Request
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
<?php
        endwhile;
    }

    public function sendRequest () {
        $sql = "SELECT email FROM landlords l JOIN properties p WHERE p.id = ? AND p.link = ? AND p.owner_id = l.id";

        $ownerDetails = $this->con->prepare($sql, "ss", ...[$this->propertyID, $this->propertyName])->fetch_object()->email;

        $this->sendRequestMessage($ownerDetails);
    }

    public function sendRequestMessage(string $recepientEmail)
    {
        if (isset($_POST['submit-request'])) {

            // Check if a name was entered and displays the appropriate feedback
            if (is_empty($this->setName())) {
                displayMessage("<span class='font-bold'>Name</span> field is required.", "text-rose-500");

                return;
            }

            // Check if a email was entered and displays the appropriate feedback
            if (is_empty($this->setEmail())) {
                displayMessage("<span class='font-bold'>Email</span> field is required.", "text-rose-500");

                return;
            } else {
                // Checks if the entered email is a valid one and displays the appropriate feedback
                if (!filter_var($this->setEmail(), FILTER_VALIDATE_EMAIL)) {
                    displayMessage("Invalid email format. Please use a valid email.", "text-rose-500");

                    return;
                }
            }

            // Check if a subject was entered and displays the appropriate feedback
            if (is_empty($this->setSubject())) {
                displayMessage("<span class='font-bold'>Subject</span> field is required.", "text-rose-500");

                return;
            }

            // Check if a message content was entered and displays the appropriate feedback
            if (is_empty($this->setMessage())) {
                displayMessage("Please type in your message content.", "text-rose-500");

                return;
            }

            // Send a welcome mail to the newly registered user
            $subject = $this->setSubject();
            $messageBody = wordwrap($this->setMessage(), 70);
            $message = "
                <html>
                <head>
                    <title>{$this->setSubject()}</title>
                </head>
                <body>
                    {$messageBody}
                </body>
                </html>
            ";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
            $headers .= "From: {$this->setName()} {$this->setEmail()}";

            if (mail($recepientEmail, $subject, $message, $headers)) {
                displayMessage("Your message has been sent successfully. You would be contacted by the property owner as soon as possible. Thanks for using HousingQuest!");
            } else {
                displayMessage("Your message was not sent successfully. Please try again.");
            }
        } else {
            displayMessage("Fill out the form below and the owner of the apartment would reach out to you.", "h3");
        }
    }
}
