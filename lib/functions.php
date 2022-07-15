<?php
    ob_start();
    session_start();

    /**
     * Requires a specified page with optional data for the page
     * @param string $fileName
     * @param $data
     */
    function view (string $fileName, $data = null) {
        $fileFullPath = "./lib/pages/{$fileName}.php";

        if (file_exists($fileFullPath)) {
            require_once($fileFullPath);
        } else {
            header("Location: ./404");
        }
    }

    /**
     * Display a specified message with the specified format
     * @param string $message
     * @param string $class
     */
    function displayMessage (string $message, string $class = "") {
        echo "<p class='{$class}'>{$message}</p>";
    }

    /**
     * Checks if a variable is empty and set
     * @param array $fields
     * @return bool
     */
    function is_empty($field): bool {
        if (!isset($field) || $field === "") {
            return true;
        }
        else {
            return false;
        }
    }