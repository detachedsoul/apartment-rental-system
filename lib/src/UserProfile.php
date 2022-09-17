<?php

namespace app\src;

use app\assets\DB;

class UserProfile
{
    private $ownerID;
    private $con;
    private $userImage;
    private $name;
    private $phoneNumber;
    private $email;
    private $password;

    public function __construct()
    {
        $this->ownerID = $_SESSION['id'];
        $this->con = DB::getInstance();

        $this->userImage = isset($_FILES['profile-pic']) ? $_FILES['profile-pic'] : "";

        $this->name = isset($_POST['name']) ? ucwords(strtolower($_POST['name'])) : $this->getUserDetails()->fetch_object()->name;

        $this->phoneNumber = isset($_POST['phone-number']) ? $_POST['phone-number'] : $this->getUserDetails()->fetch_object()->phone;

        $this->email = isset($_POST['email-address']) ? strtolower($_POST['email-address']) : $this->getUserDetails()->fetch_object()->email;

        $this->password = isset($_POST['change-password']) ? password_hash($_POST['change-password'], PASSWORD_DEFAULT) : null;
    }

    public function getUserDetails()
    {
        $userDetails = $this->con->select("*", "landlords", "WHERE id = ?", $this->ownerID);

        return $userDetails;
    }

    public function getUserEmail()
    {
        return $this->email;
    }

    public function getUserPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function getUserName()
    {
        return $this->name;
    }

    public function getUserPassword()
    {
        return $this->password;
    }

    /**
     * Update user's profile details
     * @return void
     */
    public function updateUserDetails()
    {
        if (isset($_POST['update-details'])) {

            $params = [];

            // Check if a name was entered and adds it to the array
            if (!is_empty($this->getUserName())) {
                array_push($params, $this->getUserName());
            }

            // Check if a phone number was entered and adds to it array
            if (!is_empty($this->getUserPhoneNumber())) {
                array_push($params, $this->getUserPhoneNumber());
            }

            // Check if a email was entered and adds it to the array
            if (!is_empty($this->getUserEmail())) {
                // Checks if the entered email is a valid one and displays the appropriate feedback
                if (!filter_var($this->getUserEmail(), FILTER_VALIDATE_EMAIL)) {
                    displayMessage("Invalid email format. Please use a valid email.", "text-rose-500");

                    return;
                } else {
                    array_push($params, $this->getUserEmail());
                }
            }

            // Params to check if the choosen phone number or email already exists and give appropriate feedback
            $userCheckParams = [
                $this->getUserPhoneNumber(),
                $this->getUserEmail(),
            ];
            $checkIfUserExists = $this->con->select("phone, email", "landlords", "WHERE phone = ? OR email = ?", ...$userCheckParams);

            if ($checkIfUserExists->num_rows > 0) {
                $userExists = $checkIfUserExists->fetch_object();

                if ($userExists->phone === $this->getUserPhoneNumber() && $userExists->email === $this->getUserEmail()) {
                    displayMessage("<span class='font-bold'>Phone Number and Email</span> already exists.", "text-rose-500");

                    return;
                } else if ($userExists->email === $this->getUserEmail()) {
                    displayMessage("<span class='font-bold'>Email</span> is already taken. Please use another one.", "text-rose-500");

                    return;
                } else {
                    if ($userExists->phone === $this->getUserPhoneNumber()) {
                        displayMessage("This <span class='font-bold'>Phone Number</span> already exists.", "text-rose-500");

                        return;
                    }
                }
            }

            // Check if a password was entered and adds it to te array
            if (is_empty($this->getUserPassword())) {
                array_push($params, $this->getUserPassword());
            }

            if (in_array($this->getUserName(), $params)) {
                $this->con->update("landlords", "name = ?", "WHERE id = ?", ...[$this->getUserName(), $this->ownerID]);
            }

            if (in_array($this->getUserPhoneNumber(), $params)) {
                $this->con->update("landlords", "phone = ?", "WHERE id = ?", ...[$this->getUserPhoneNumber(), $this->ownerID]);
            }

            if (in_array($this->getUserEmail(), $params)) {
                $this->con->update("landlords", "email = ?", "WHERE id = ?", ...[$this->getUserEmail(), $this->ownerID]);
            }

            if (in_array($this->getUserPassword(), $params)) {
                $this->con->update("landlords", "password = ?", "WHERE id = ?", ...[$this->getUserPassword(), $this->ownerID]);
            }

            $_SESSION['user'] = $this->getUserName();

            displayMessage("Profile updated successfully.", "text-emerald-500");

            header("Refresh: 3, ../admin/settings", true, 301);
        } else {
            displayMessage("View and edit your profile information");
        }
    }

    /**
     * Updates the user's profile picture
     * @return void
     */
    public function updateUserProfilePicture()
    {
        $allowedExtensions = [
            "png",
            "jpeg",
            "jpg",
            "webp",
            "jfif",
            "gif"
        ];

        if (isset($_POST["change-profile-pic"])) {

            // Check if a new image was selected
            if ($this->getUserDetails()->fetch_object()->profile_pic === strtolower($this->userImage['name'])) {
                displayMessage("No new image was selected.", "text-rose-500");

                return;
            }

            // Check if the file extension is a valid image extension
            if (!in_array(pathinfo($this->userImage["name"], PATHINFO_EXTENSION), $allowedExtensions)) {
                displayMessage("Invalid image extension. Please select a valid image with either a png, jpg, jpeg, gif, jfif, or webp extension.", "text-rose-500");

                return;
            }

            // Rename image
            $imageNewName = str_replace(" ", "-", strtolower(($_SESSION['user'] . '-' . $_SESSION['id']) . '.' . pathinfo($this->userImage["name"], PATHINFO_EXTENSION)));

            // Upload image and update the database accordingly
            $uploadDir = "./assets/img/";
            $fullImagePath = $uploadDir . $imageNewName;
            if (move_uploaded_file($this->userImage['tmp_name'], $fullImagePath)) {
                $params = [
                    $imageNewName,
                    $this->ownerID
                ];

                $this->con->update("landlords", "profile_pic = ?", "WHERE id = ?", ...$params);

                displayMessage("Profile picture updated successfully.", "text-emerald-500");

                header("Refresh: 3, ../admin/settings", true, 301);
            }
        }
    }
}
