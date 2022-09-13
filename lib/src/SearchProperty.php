<?php

namespace app\src;

use app\assets\DB;

class SearchProperty {
    private $con;
    public $searchInput;
    public $minPrice;
    public $maxPrice;
    public $propertyType;
    public $propertyLocation;
    public $strictSearch;

    public function __construct() {
        $this->con = DB::getInstance();

        $this->searchInput = (isset($_GET['search-input'])) ? strtolower(strip_tags(trim($_GET['search-input']))) : "";

        $this->minPrice = (isset($_GET['min-price'])) ? strtolower(strip_tags(trim($_GET['min-price']))) : "";

        $this->maxPrice = (isset($_GET['max-price'])) ? strtolower(strip_tags(trim($_GET['max-price']))) : "";

        $this->propertyType = (isset($_GET['property-type'])) ? strtolower(strip_tags(trim($_GET['property-type']))) : "";

        $this->propertyLocation = (isset($_GET['property-location'])) ? strtolower(strip_tags(trim($_GET['property-location']))) : "";

        $this->strictSearch = (isset($_GET['strict-search'])) ? strtolower(strip_tags(trim($_GET['strict-search']))) : "";
    }

    public function searchProperty () {
        $params = [];
        $conditions = "WHERE status = 'available' AND";

        if (is_empty($this->strictSearch)) {
            if (!is_empty($this->searchInput)) {
                $this->searchInput = "%$this->searchInput%";
                $conditions .= " LOWER(title) LIKE LOWER(?) OR";
                array_push($params, $this->searchInput);
            }

            if (!is_empty($this->minPrice)) {
                $this->minPrice = "%$this->minPrice%";
                $conditions .= " LOWER(price) >= ? OR";
                array_push($params, $this->minPrice);
            }

            if (!is_empty($this->maxPrice)) {
                $this->maxPrice = "%$this->maxPrice%";
                $conditions .= " LOWER(price) <= ? OR";
                array_push($params, $this->maxPrice);
            }

            if (!is_empty($this->propertyType)) {
                $this->propertyType = "%$this->propertyType%";
                $conditions .= " LOWER(type) LIKE LOWER(?) OR";
                array_push($params, $this->propertyType);
            }

            if (!is_empty($this->propertyLocation)) {
                $this->propertyLocation = "%$this->propertyLocation%";
                $conditions .= " LOWER(location) LIKE LOWER(?) OR";
                array_push($params, $this->propertyLocation);
            }

            $conditions = substr($conditions, 0, -3);
            $conditions .= " ORDER BY id DESC";

            $searchResult = $this->con->select("id, title, index_img, price, summary, location, type, link", "properties", $conditions, ...$params);
        } else {

            if (!is_empty($this->searchInput)) {
                $this->searchInput = "%$this->searchInput%";
                $conditions .= " LOWER(title) LIKE LOWER(?) AND";
                array_push($params, $this->searchInput);
            }

            if (!is_empty($this->minPrice)) {
                $this->minPrice = "%$this->minPrice%";
                $conditions .= " LOWER(price) >= ? AND";
                array_push($params, $this->minPrice);
            }

            if (!is_empty($this->maxPrice)) {
                $this->maxPrice = "%$this->maxPrice%";
                $conditions .= " LOWER(price) <= ? AND";
                array_push($params, $this->maxPrice);
            }

            if (!is_empty($this->propertyType)) {
                $this->propertyType = "%$this->propertyType%";
                $conditions .= " LOWER(type) LIKE LOWER(?) AND";
                array_push($params, $this->propertyType);
            }

            if (!is_empty($this->propertyLocation)) {
                $this->propertyLocation = "%$this->propertyLocation%";
                $conditions .= " LOWER(location) LIKE LOWER(?) AND";
                array_push($params, $this->propertyLocation);
            }

            $conditions = substr($conditions, 0, -4);
            $conditions .= " ORDER BY id DESC";

            $searchResult = $this->con->select("id, title, index_img, price, summary, location, type, link", "properties", $conditions, ...$params);
        }

        if ($searchResult->num_rows < 1) : ?>
            <p class="text-rose-700 dark:text-rose-500 text-center lg:col-span-12 text-xl lg:text-2xl">
                No apartment matches your search criteria. Try again using different keywords or disable strict search.
            </p>
        <?php
            return;
        endif;

        while ($search = $searchResult->fetch_object()) : ?>
            <article class="lg:col-span-4 space-y-3">
                <div class="relative">
                    <img class="property-listing-image" src="./assets/img/<?= $search->index_img ?>" alt="<?= $search->title ?>" title="<?= $search->title ?>" width="100%" height="200">

                    <i class="fr fi-rr-heart absolute top-2.5 right-4 text-2xl text-rose-500 dark:text-white"></i>
                </div>

                <div class="px-2 space-y-3">
                    <div class="flex items-center flex-wrap gap-x-4 gap-y-1.5 justify-between">
                        <span class=<?= $search->type === 'For Rent' ? "text-green-500 dark:text-green-400" : "text-rose-500 dark:text-rose-400" ?>>
                            <i class="fr <?= $search->type === 'For Rent' ? 'fi-rr-recycle' : 'fi-rr-thumbtack' ?>"></i>
                            <?= $search->type ?>
                        </span>

                        <span class="text-sky-500 lining-nums font-semibold tracking-widest">
                            ₦ <?= number_format($search->price) ?>
                        </span>
                    </div>

                    <div>
                        <h2 class="header">
                            <?= $search->title ?>
                        </h2>

                        <p>
                            <?= $search->summary ?>
                        </p>
                    </div>

                    <address>
                        <i class="fr fi-rr-map-marker-home"></i>
                        <?= $search->location ?>
                    </address>

                    <a class="inline-block rounded-lg py-1.5 px-3 text-white bg-sky-500 hover:bg-sky-600 hover:ring-1 hover:ring-sky-500 ring-offset-2 active:ring-1 active:ring-sky-500 dark:ring-offset-slate-800" href="details?propertyID=<?= $search->id ?>&propertyName=<?= $search->link ?>">
                        View Details
                    </a>
                </div>
            </article>
<?php
        endwhile;
    }
}