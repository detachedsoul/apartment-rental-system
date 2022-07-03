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
                displayMessage("text-rose-500", "<span class='font-bold'>Name</span> field is required.");

                return;
            }

            // Check if a phone number was entered and displays the appropriate feedback
            if (is_empty($this->setPhoneNumber())) {
                displayMessage("text-rose-500", "<span class='font-bold'>Phone Number</span> field is required.");

                return;
            }

            // Check if a email was entered and displays the appropriate feedback
            if (is_empty($this->setEmail())) {
                displayMessage("text-rose-500", "<span class='font-bold'>Email</span> field is required.");

                return;
            }
            else {
                // Checks if the entered email is a valid one and displays the appropriate feedback
                if (!filter_var($this->setEmail(), FILTER_VALIDATE_EMAIL)) {
                    displayMessage("text-rose-500", "Invalid email format. Please use a valid email.");

                    return;
                }
            }

            // Check if a password was entered and displays the appropriate feedback
            if (is_empty($this->setPassword())) {
                displayMessage("text-rose-500", "<span class='font-bold'>Password</span> field is required.");

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
                    displayMessage("text-rose-500", "<span class='font-bold'>Phone Number and Email</span> already exists.");

                    return;
                }
                else if ($userExists->email === $this->setEmail()) {
                    displayMessage("text-rose-500", "<span class='font-bold'>Email</span> is already taken. Please use another one.");

                    return;
                }
                else {
                    if ($userExists->phone === $this->setPhoneNumber()) {
                        displayMessage("text-rose-500", "This <span class='font-bold'>Phone Number</span> already exists.");

                        return;
                    }
                }
            }

            $this->con->insert("landlords", ["name", "phone", "email", "password"], ...$params);

            $setUserSession = $this->con->select("name", "landlords", "WHERE phone = ? OR email = ?", ...$userCheckParams)->fetch_object();

            $_SESSION['user'] = $setUserSession->name;

            displayMessage("text-green-500", "Registration successful. You would be redirected to your dashboard shortly.");

            header("Refresh: 3, /admin", false, 301);
        }
        else {
            displayMessage("", "Create a free account today");
        }
    }
}