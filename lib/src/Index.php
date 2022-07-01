<?php
namespace app\src;

use app\assets\DB;

class Index {

    /**
     * Get recent houses in desc order for the index page
     */
    public function showIndexHouses () {
        $con = DB::getInstance();

        // $houses = $con->select("id, index_img, price, summary, location, status", "properties");

        $houses = $con->select("*", "landlords");

        // return view("index", $houses);
    }

    public function sayHellow(string $configParam) {
        echo $configParam;
    }
}