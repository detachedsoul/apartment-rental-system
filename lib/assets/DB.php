<?php

namespace app\assets;

use app\assets\Config;
use mysqli_result;

class DB {
    private static $instance   =   null;
    private $con;

    private function __construct() {
        try {
            $this->con = new \mysqli(
                Config::get('mysql/server'),
                Config::get('mysql/host'),
                Config::get('mysql/password'),
                Config::get('mysql/dbName')
            );

            return $this->con;
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }


    /**
     * Get's the ID of the last created or updated row
     * @return int $this->con->insert_id
     */
    public function lastID () {
        return $this->con->insert_id;
    }

    /**
     * Creates a database connection instance
     * @return object self::$instance
     */
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new DB;
        }

        return self::$instance;
    }


    /**
     * Performs an SQL prepared statement
     *
     * @param string $sql
     * @param string $paramType
     * @param mixed ...$paramValues
     *
     * @return void
     */
    public function prepare(
        string $sql,
        string $paramType,
        ...$paramValues
    ) : mysqli_result | bool {
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param($paramType, ...$paramValues);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }


    /**
     * Performs a raw SQL query
     * @param string $sql
     * @return object|bool $stmt
     */
    public function query(string $sql) : object {
        $stmt = $this->con->query($sql);
        return $stmt;
    }


    /**
     * Creates a new resource
     *
     * @param string $table
     * @param array $columns
     * @param mixed ...$paramValues
     *
     * @return void $stmt
     */
    public function insert(
        string $table,
        array $columns,
        ...$paramValues
    ) {
        $placeholders   =   substr(str_repeat('?, ', count($columns)), 0, -2);
        $setColumn      =   implode(", ", $columns);
        $paramType      =   str_repeat("s", count($columns));

        $sql    =   "INSERT INTO `{$table}` ({$setColumn}) VALUES ({$placeholders})";
        $stmt   =   $this->prepare($sql, $paramType, ...$paramValues);

        return $stmt;
    }


    /**
     * Selects a particular resource or all resources
     *
     * @param string $row
     * @param string $table
     * @param string $conditions
     * @param mixed ...$params
     *
     * @return void|object $stmt
     */
    public function select(
        $row,
        string $table,
        string $conditions = null,
        ...$params
    ) {
        $sql = "SELECT {$row} FROM  `{$table}`";

        if ($conditions) {
            $types  =   substr_count($conditions, '?');
            if ($types > 0) {
                $sql    .=  " $conditions";
                $types  =   str_repeat('s', $types);

                $stmt   =   $this->prepare($sql, $types, ...$params);
                return $stmt;
            } else {
                $sql    .=  " $conditions";
                $stmt   = $this->query($sql);
                return $stmt;
            }
        } else {
            $stmt   = $this->query($sql);
            return $stmt;
        }
    }



    /**
     * Updates a resource
     *
     * @param string $table
     * @param string $setColumns
     * @param string $conditions
     * @param mixed ...$paramValues
     *
     * @return void $stmt
     */
    public function update(
        string $table,
        string $setColumns,
        string $conditions,
        ...$paramValues
    ) {
        $conditionsParam    =   substr_count($conditions, '?');
        $columnParam        =   substr_count($setColumns, '?');
        $paramType          =   $conditionsParam + $columnParam;
        $paramType          =   str_repeat('s', $paramType);

        $sql = "UPDATE `{$table}` SET {$setColumns} {$conditions}";

        $stmt = $this->prepare($sql, $paramType, ...$paramValues);
        return $stmt;
    }


    /**
     * Deletes a resource
     *
     * @param string $table
     * @param string $column
     * @param mixed $condition
     *
     * @return void $stmt
     */
    public function delete(
        string $table,
        string $column, $condition
    ) {
        $sql    =   "DELETE FROM `{$table}` WHERE `{$column}` = ?";
        $stmt   =   $this->prepare($sql, 's', $condition);

        return $stmt;
    }
}
