<?php

namespace app\src;

use app\assets\DB;

class ForgotPassword
{
    private $con;
    private $phoneEmail;
    private $password;

    public function __construct()
    {
        $this->con = DB::getInstance();
    }

    // Sets the phone number or email field of the form
    public function setPhoneEmail(): string
    {
        return $this->phoneEmail = isset($_POST['phoneEmail']) ? strtolower(trim(strip_tags($_POST['phoneEmail']))) : "";
    }

    public function resetPassword()
    {
        if (isset($_POST['submit'])) {

            // Check if a email or phone number was entered and displays the appropriate feedback
            if (is_empty($this->setPhoneEmail())) {
                displayMessage("text-rose-500", "<span class='font-bold'>Email or Phone Number</span> field is required.");

                return;
            }

            // Params to check if the choosen phone number or email exists and give appropriate feedback
            $userCheckParams = [
                $this->setPhoneEmail(),
                $this->setPhoneEmail(),
            ];
            $checkIfUserExists = $this->con->select("phone, email", "landlords", "WHERE phone = ? OR email = ?", ...$userCheckParams);

            if ($checkIfUserExists->num_rows < 1) {
                displayMessage("Incorrect <span class='font-bold'>Phone Number or Email</span>.", "text-rose-500");

                return;
            } else {
                $newPassword = random_int(10000, 99999);
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                $userCheckParams = [
                    $hashedPassword,
                    $this->setPhoneEmail(),
                    $this->setPhoneEmail(),
                ];

                $this->con->update("landlords", "password = ?", "WHERE phone = ? OR email = ?", ...$userCheckParams);

                $receipientMail = $checkIfUserExists->fetch_object()->email;
                $subject = "Password Reset Successful";
                $message = "
                    <html>
                        <head>
                            <title>Password Reset Successful</title>
                        </head>
                        <body>
                            <p>
                                Your password was currently reset.
                            </p>
                            <p>
                                 Use <b>{$newPassword}</b> to access your portal.
                            </p>
                            <p>
                                You can change this later in the settings section of your portal.
                            </p>
                        </body>
                    </html>
                ";
                $message = wordwrap($message, 70);
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
                $headers .= "From: Wisdom Ojimah ojimahwisdom@gmail.com";

                if (mail($receipientMail, $subject, $message, $headers)) {
                    displayMessage("Password reset successfully. Please check your email for the new password. If you can't find the mail please check your spam or trash folder.", "text-green-500");

                    $this->phoneEmail = "";

                    header("Refresh: 5, /login", false, 301);
                } else {
                    displayMessage("Password reset failed. Please try again.", "text-rose-500");
                }
            }
        } else {
            displayMessage("Reset your password");
        }
    }
}
