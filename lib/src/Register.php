<?php

namespace app\src;

use app\assets\DB;

class Register
{
    private $con;
    private $name;
    private $phoneNumber;
    private $email;
    private $password;

    public function __construct()
    {
        $this->con = DB::getInstance();
    }

    // Sets the name field of the form
    public function setName(): string
    {
        return $this->name = isset($_POST['name']) ? ucwords(trim(strip_tags($_POST['name']))) : "";
    }

    // Sets the phone number field of a form
    public function setPhoneNumber(): string
    {
        return $this->phoneNumber = isset($_POST['phoneNumber']) ? trim(strip_tags($_POST['phoneNumber'])) : "";
    }

    // Sets the email field of a form
    public function setEmail(): string
    {
        return $this->email = isset($_POST['email']) ? strtolower(trim(strip_tags($_POST['email']))) : "";
    }

    // Sets the password field of a form
    public function setPassword(): string
    {
        return $this->password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : "";
    }

    public function registerUser()
    {
        if (isset($_POST['submit'])) {

            // Check if a name was entered and displays the appropriate feedback
            if (is_empty($this->setName())) {
                displayMessage("<span class='font-bold'>Name</span> field is required.", "text-rose-500");

                return;
            }

            // Check if a phone number was entered and displays the appropriate feedback
            if (is_empty($this->setPhoneNumber())) {
                displayMessage("<span class='font-bold'>Phone Number</span> field is required.", "text-rose-500");

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

            // Check if a password was entered and displays the appropriate feedback
            if (is_empty($this->setPassword())) {
                displayMessage("<span class='font-bold'>Password</span> field is required.", "text-rose-500");

                return;
            }

            $params = [
                $this->setName(),
                $this->setPhoneNumber(),
                $this->setEmail(),
                $this->setPassword(),
            ];

            // Params to check if the choosen phone number or email already exists and give appropriate feedback
            $userCheckParams = [
                $this->setPhoneNumber(),
                $this->setEmail(),
            ];
            $checkIfUserExists = $this->con->select("phone, email", "landlords", "WHERE phone = ? OR email = ?", ...$userCheckParams);

            if ($checkIfUserExists->num_rows > 0) {
                $userExists = $checkIfUserExists->fetch_object();

                if ($userExists->phone === $this->setPhoneNumber() && $userExists->email === $this->setEmail()) {
                    displayMessage("<span class='font-bold'>Phone Number and Email</span> already exists.", "text-rose-500");

                    return;
                } else if ($userExists->email === $this->setEmail()) {
                    displayMessage("<span class='font-bold'>Email</span> is already taken. Please use another one.", "text-rose-500");

                    return;
                } else {
                    if ($userExists->phone === $this->setPhoneNumber()) {
                        displayMessage("This <span class='font-bold'>Phone Number</span> already exists.", "text-rose-500");

                        return;
                    }
                }
            }

            $this->con->insert("landlords", ["name", "phone", "email", "password"], ...$params);

            $setUserSession = $this->con->select("name, id", "landlords", "WHERE phone = ? OR email = ?", ...$userCheckParams)->fetch_object();

            $_SESSION['user'] = $setUserSession->name;
            $_SESSION['id'] = $setUserSession->id;
            $_SESSION['loggedUser'] = strtolower($setUserSession->name . $setUserSession->id);

            // Send a welcome mail to the newly registered user
            $receipientMail = $this->setEmail();
            $subject = "Registration Successful";
            $messageBody = wordwrap("Registration was successful. Enjoy the HousingQuest platform from all of us at HousingQuest.", 70);
            $message = "
                <html>
                <head>
                    <title>Registration Successful</title>
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
            $headers .= "From: Wisdom Ojimah ojimahwisdom@gmail.com";

            if (mail($receipientMail, $subject, $message, $headers)) {
                displayMessage("Registration successful. You would be redirected to your dashboard shortly. Please check your mail for a confirmation message. If you can't find the mail please check your spam or trash folder.", "text-green-500");
            } else {
                displayMessage("Registration successful. You would be redirected to your dashboard shortly.", "text-green-500");
            }

            header("Refresh: 3, /admin", true, 301);
        } else {
            displayMessage("Create a free account today");
        }
    }
}
