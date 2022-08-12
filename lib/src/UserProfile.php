<?php

namespace app\src;

use app\assets\DB;

class UserProfile
{
    private $ownerID;
    private $con;
    private $userImage;

    public function __construct()
    {
        $this->ownerID = $_SESSION['id'];
        $this->con = DB::getInstance();
        $this->userImage = isset($_FILES['profile-pic']) ? $_FILES['profile-pic'] : "";
    }

    public function getUserDetails()
    {
        $userDetails = $this->con->select("*", "landlords", "WHERE id = ?", $this->ownerID);

        return $userDetails;
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
            if (!in_array(pathinfo( $this->userImage["name"], PATHINFO_EXTENSION), $allowedExtensions)) {
                displayMessage("Invalid image extension. Please select a valid image with either a png, jpg, jpeg, gif, jfif, or webp extension.", "text-rose-500");

                return;
            }

            // Rename image
            $imageNewName = str_replace(" ", "-", strtolower(($_SESSION['user'] . '-' . $_SESSION['id']) . '.' . pathinfo($this->userImage["name"], PATHINFO_EXTENSION)));

            // Upload image and update the database
            $uploadDir = "./assets/img/";
            $fullImagePath = $uploadDir . $imageNewName;
            if (move_uploaded_file($this->userImage['tmp_name'], $fullImagePath)) {
                $params = [
                    $imageNewName,
                    $this->ownerID
                ];

                $this->con->update("landlords", "profile_pic = ?", "WHERE id = ?", ...$params);

                displayMessage("Profile picture updated successfully.", "text-emerald-500");
            }


            // while ($a = $this->getUserDetails()->fetch_object()) {
            //     print_r($a);
            // }
        }

    }
}
