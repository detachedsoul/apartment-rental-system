<?php

namespace app\src;

use app\assets\DB;

class Index
{

    /**
     * Get recent houses in desc order for the index page
     */
    public function showIndexHouses()
    {
        $con = DB::getInstance();

        $houses = $con->select("id, index_img, price, summary, location, type", "properties", "ORDER BY id DESC");

        while ($rows = $houses->fetch_object()) {
            print_r($rows->id);
        }

        // return $houses;
    }
}
