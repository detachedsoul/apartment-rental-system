<?php
namespace app\src;

use app\assets\DB;

class AddProperty
{
    private $con;
    private $bannerImage;
    private $detailsOnePic;
    private $detailsTwoPic;
    private $detailsThreePic;
    private $detailsFourPic;
    private $detailsFivePic;
    private $propertyName;
    private $propertyLocation;
    private $propertyPrice;
    private $propertyCategory;
    private $propertySummary;
    private $propertyDescription;

    public function __construct()
    {
        $this->con = DB::getInstance();
    }

    // Sets the banner image field of the form
    public function setBannerImage(): array
    {
        return $this->bannerImage = isset($_FILES['pic-1']) ? $_FILES['pic-1'] : "";
    }

    // Sets the pic 2 field of a form
    public function setDetailsOnePic(): array
    {
        return $this->detailsOnePic = isset($_FILES['pic-2']) ? $_FILES['pic-2'] : "";
    }

    // Sets the pic 2 field of a form
    public function setDetailsTwoPic(): array
    {
        return $this->detailsTwoPic = isset($_FILES['pic-3']) ? $_FILES['pic-3'] : "";
    }

    // Sets the pic 3 field of a form
    public function setDetailsThreePic(): array
    {
        return $this->detailsThreePic = isset($_FILES['pic-4']) ? $_FILES['pic-4'] : "";
    }

    // Sets the pic 4 field of a form
    public function setDetailsFourPic(): array
    {
        return $this->detailsFourPic = isset($_FILES['pic-5']) ? $_FILES['pic-5'] : "";
    }

    // Sets the pic 5 field of a form
    public function setDetailsFivePic(): array
    {
        return $this->detailsFivePic = isset($_FILES['pic-6']) ? $_FILES['pic-6'] : "";
    }

    // Sets the property name field of a form
    public function setPropertyName(): string
    {
        return $this->propertyName = isset($_POST['property-name']) ? ucwords(strtolower(trim(strip_tags($_POST['property-name'])))) : "";
    }

    // Sets the property location field of a form
    public function setPropertyLocation(): string
    {
        return $this->propertyLocation = isset($_POST['property-location']) ? ucwords(strtolower(trim(strip_tags($_POST['property-location'])))) : "";
    }

    // Sets the property price field of a form
    public function setPropertyPrice(): string
    {
        return $this->propertyPrice = isset($_POST['property-price']) ? strtolower(trim(strip_tags($_POST['property-price']))) : "";
    }

    // Sets the property category field of a form
    public function setPropertyCategory(): string
    {
        return $this->propertyCategory = isset($_POST['property-category']) ? ucwords(strtolower(trim(strip_tags($_POST['property-category'])))) : "";
    }

    // Sets the property summary field of a form
    public function setPropertySummary(): string
    {
        return $this->propertySummary = isset($_POST['property-summary']) ? strtolower(trim(strip_tags($_POST['property-summary']))) : "";
    }

    // Sets the property description field of a form
    public function setPropertyDescription(): string
    {
        return $this->propertyDescription = isset($_POST['property-description']) ? strtolower(trim(strip_tags($_POST['property-description']))) : "";
    }

    /**
     * Adds a new property
     * @return void
     */
    public function addNewProperty()
    {
        if (isset($_POST['add-property'])) {

            $uploadFolder = "../assets/img/";

            // Get all fields and check if they are empty
            $fields = [
                $this->setPropertyName(),
                $this->setPropertyLocation(),
                $this->setPropertyPrice(),
                $this->setPropertyCategory(),
                $this->setPropertySummary(),
                $this->setPropertyDescription(),
            ];

            $params = [];

            foreach ($fields as $field) {
                if (is_empty($field)) {
                    displayMessage("All fields are required.", "text-rose-500");

                    return;
                }
            }

            // Get all images
            $imagesNames = [
                $this->setBannerImage()['name'],
                $this->setDetailsOnePic()['name'],
                $this->setDetailsTwoPic()['name'],
                $this->setDetailsThreePic()['name'],
                $this->setDetailsFourPic()['name'],
                $this->setDetailsFivePic()['name'],
            ];

            // Get the temp name of the images
            $imagesTempNames = [
                $this->setBannerImage()['tmp_name'],
                $this->setDetailsOnePic()['tmp_name'],
                $this->setDetailsTwoPic()['tmp_name'],
                $this->setDetailsThreePic()['tmp_name'],
                $this->setDetailsFourPic()['tmp_name'],
                $this->setDetailsFivePic()['tmp_name'],
            ];

            // Check if all the images have been selected and display an appropriate message
            foreach ($imagesNames as $images) {
                if (is_empty($images)) {
                    displayMessage("All images are required.", "text-rose-500");

                    return;
                }
            }

            // Rename the images, uploads it and then insert the values from the form.
            $propertyName = strtolower(str_replace(' ', '-', $this->setPropertyName()));

            foreach ($imagesNames as $imageName) {
                $imageName = $propertyName . '-' . str_replace(' ', '-', strtolower(str_replace(" ", "-", $_SESSION['user']))) . '-' . $_SESSION['id'] . '-' . strtolower(str_replace(" ", "-", date('l F Y'))) . '-' . mt_rand(00000, 99999) . '.jpg';

                array_push($params, $imageName);
            }

            foreach ($params as $imageName) {
                foreach ($imagesTempNames as $tempName) {
                    $imageFullPath = $uploadFolder . $imageName;
                    move_uploaded_file($tempName, $imageFullPath);
                }
            }

            $propertyFields = [
                ...$fields,
                ...$params,
                $_SESSION['id']
            ];

            $this->con->insert("properties", ["title", "location", "price", "type", "summary", "description", "index_img", "img_1", "img_2", "img_3", "img_4", "img_5", "owner_id"], ...$propertyFields);
        }
        else {
            displayMessage( "Property Details");
        }
    }
}