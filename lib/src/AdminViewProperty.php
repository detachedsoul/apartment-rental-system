<?php

namespace app\src;

use app\assets\DB;

class AdminViewProperty
{
    private $ownerID;
    private $propertyID;
    private $propertyName;
    private $con;

    public function __construct()
    {
        $this->ownerID = $_SESSION['id'];
        $this->propertyID = $_GET['propertyID'];
        $this->propertyName = $_GET['propertyName'];
        $this->con = DB::getInstance();
    }

    public function getpropertyID () {
        return $this->propertyID;
    }

    public function getpropertyName()
    {
        return $this->propertyName;
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

        $getHouse = $this->con->select("id, index_img, img_1, img_2, img_3, img_4, img_5, title, price, description, location, type, owner_id, summary", "properties", "WHERE id = ? AND link = ?", ...[$this->propertyID, $this->propertyName]);

        // Check if there is any available apartment
        if ($getHouse->num_rows < 1) {
            header("Location: /admin/properties", true, 301);
        }

        while ($house = $getHouse->fetch_object()) : ?>
            <img class="h-[200px] rounded-xl lg:h-[400px] w-full" src="../assets/img/<?= $house->index_img ?>" alt="<?= $house->title ?>" />

            <div class="grid gap-4 lg:grid-rows-4 grid-cols-12 -mt-12 mb-8">
                <img class="h-[200px] col-span-12 rounded-xl lg:row-start-1 lg:row-end-5 lg:h-full lg:col-span-6" src="../assets/img/<?= $house->img_1 ?>" alt="<?= $house->title ?>" />

                <img class="h-[200px] col-span-12 rounded-xl lg:row-span-2 lg:col-span-3" src="../assets/img/<?= $house->img_2 ?>" alt="<?= $house->title ?>" />

                <img class="h-[200px] col-span-12 rounded-xl lg:row-span-2 lg:col-span-3" src="../assets/img/<?= $house->img_3 ?>" alt="<?= $house->title ?>" />

                <img class="h-[200px] col-span-12 rounded-xl lg:row-span-2 lg:col-span-3" src="../assets/img/<?= $house->img_4 ?>" alt="<?= $house->title ?>" />

                <img class="h-[200px] col-span-12 rounded-xl lg:row-span-2 lg:col-span-3" src="../assets/img/<?= $house->img_5 ?>" alt="<?= $house->title ?>" />
            </div>

            <div class="grid gap-8 items-start lg:grid-cols-12">
                <div class="bg-white space-y-1.5 rounded-xl p-4 dark:bg-slate-900 dark:text-slate-300 lg:col-span-5">
                    <span class=<?= $house->type === 'For Rent' ? "text-green-500 dark:text-green-400" : "text-rose-500 dark:text-rose-400" ?>>
                        <i class="fr <?= $house->type === 'For Rent' ? 'fi-rr-recycle' : 'fi-rr-thumbtack' ?>"></i>
                        <?= $house->type ?>
                    </span>
                    <h3 class="header text-3xl">
                        <?= $house->title ?>
                    </h3>
                    <p>
                        <i class="fr fi-rr-map-marker-home"></i>
                        <?= $house->location ?>
                    </p>
                    <span class="text-sky-500 lining-nums font-semibold tracking-widest text-xl inline-block">
                        ₦ <?= number_format($house->price) ?>
                    </span>
                </div>

                <div class="bg-white rounded-xl p-4 space-y-2 dark:bg-slate-900 dark:text-slate-300 lg:col-span-7">
                    <h3 class="header text-2xl">
                        Summary
                    </h3>
                    <p>
                        <?= $house->summary ?>
                    </p>
                </div>

                <div class="bg-white rounded-xl p-4 space-y-2 dark:bg-slate-900 dark:text-slate-300 lg:col-span-12">
                    <h3 class="header text-2xl">
                        Description
                    </h3>
                    <p>
                        <?= $house->description ?>
                    </p>
                </div>
            </div>
<?php
        endwhile;
    }

    /**
     * Deletes a particular property
     */
    public function deleteProperty () {
        if (isset($_POST['delete-property'])) {
            $sql = "DELETE FROM properties WHERE id = ? AND link = ? AND owner_id = ?";
            $paramTypes = "sss";
            $values = [
                $this->propertyID,
                $this->propertyName,
                $this->ownerID,
            ];

            $this->con->prepare($sql, $paramTypes, ...$values);

            header("Location: /admin/properties", true, 301);

        }
    }
}
