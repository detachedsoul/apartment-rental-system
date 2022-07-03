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
                displayMessage("text-rose-500", "Incorrect <span class='font-bold'>Phone Number or Email</span>.");

                return;
            }
            else {
                $newPassword = random_int(10000, 99999);
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                $userCheckParams = [
                    $hashedPassword,
                    $this->setPhoneEmail(),
                    $this->setPhoneEmail(),
                ];

                $this->con->update("landlords", "password = ?", "WHERE phone = ? OR email = ?", ...$userCheckParams);

                $receipientMail = $checkIfUserExists->fetch_object()->email;
                $subject = "<h1 class='text-green-500 text-xl'>Password Reset Successful</h1>";
                $message = "
                    <!DOCTYPE html>
                    <html>
                    <body>
                        <p>Your password was currently reset. Use {$newPassword} to access your portal.</p>
                    </body>
                    </html>
                ";
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Conten-type: text/html; charset=UTF-8" . "\r\n";
                $headers .= "From: <a class='text-sky-500' href='htpps://housingquest.000webhostapp.com'>HousingQuest.000webhostapp.com</a>";

                if (mail($receipientMail, $subject, $message, $headers)) {
                    displayMessage("text-green-500", "Password reset successfully. Please check your email for the new password. If you can't find the mail please check your span folder.");

                    // header("Refresh: 5, /login", false, 301);
                } else {
                    displayMessage("text-rose-500", "Password reset failed. Please try again.");
                }
            }
        }
        else {
            displayMessage("", "Reset your password");
        }
    }
}