<?php

namespace app\src;

use app\assets\DB;

class ContactForm
{
    private $con;
    private $name;
    private $subject;
    private $email;
    private $message;

    public function __construct()
    {
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

    public function sendContactMail()
    {
        if (isset($_POST['send-message'])) {

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
            $receipientMail = "ojimahwisdom01@gmail.com";
            $subject = $this->setSubject();
            $messageBody = wordwrap($this->setMessage(), 70);
            $message = "
                <html>
                <head>
                    <title>{$this->setSubject()}</title>
                </head>
                <body>
                    <p>
                        {$messageBody}
                    </p>
                </body>
                </html>
            ";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
            $headers .= "From: {$this->setName()} {$this->setEmail()}";

            if (mail($receipientMail, $subject, $message, $headers)) {
                displayMessage("Your message has been sent successfully. Please be assured that we would address the issues raised ASAP!", "text-green-500");
            } else {
                displayMessage("Your message was not sent successfully. Please try again.", "text-rose-500");
            }
        } else {
            displayMessage("Get In Touch With Us", "text-center header text-2xl", "h3");
        }
    }
}
