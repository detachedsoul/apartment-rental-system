<?php

namespace app\src;

use app\assets\DB;

class Login
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

    // Sets the password field of a form
    public function setPassword(): string
    {
        return $this->password = isset($_POST['password']) ? $_POST['password'] : "";
    }

    public function loginUser()
    {
        if (isset($_POST['submit'])) {

            // Check if a email or phone number was entered and displays the appropriate feedback
            if (is_empty($this->setPhoneEmail())) {
                displayMessage("<span class='font-bold'>Email or Phone Number</span> field is required.", "text-rose-500");

                return;
            }

            // Check if a password was entered and displays the appropriate feedback
            if (is_empty($this->setPassword())) {
                displayMessage("<span class='font-bold'>Password</span> field is required.", "text-rose-500");

                return;
            }

            $params = [
                $this->setPhoneEmail(),
                $this->setPassword(),
            ];

            // Params to check if the choosen phone number or email exists and give appropriate feedback
            $userCheckParams = [
                $this->setPhoneEmail(),
                $this->setPhoneEmail(),
            ];
            $checkIfUserExists = $this->con->select("password", "landlords", "WHERE phone = ? OR email = ?", ...$userCheckParams);

            if ($checkIfUserExists->num_rows < 1) {
                displayMessage("Incorrect <span class='font-bold'>Phone Number or Email</span>.", "text-rose-500");

                return;
            } else {
                $userExists = $checkIfUserExists->fetch_object();

                if (
                    password_verify($this->setPassword(), $userExists->password)
                ) {
                    $setUserSession = $this->con->select("name, id", "landlords", "WHERE phone = ? OR email = ?", ...$userCheckParams)->fetch_object();

                    $_SESSION['user'] = $setUserSession->name;
                    $_SESSION['id'] = $setUserSession->id;
                    $_SESSION['loggedUser'] = strtolower($setUserSession->name . $setUserSession->id);

                    displayMessage("Login successful. You would be redirected to your dashboard shortly.", "text-green-500");

                    header("Refresh: 3, /admin", true, 301);

                    return;
                } else {
                    displayMessage("Incorrect <span class='font-bold'>Password</span>.", "text-rose-500");

                    return;
                }
            }
        } else {
            displayMessage("You need to sign in to access your dashboard");
        }
    }
}
