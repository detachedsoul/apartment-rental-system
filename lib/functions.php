<?php
    ob_start();
    session_start();

    /**
     * Requires a specified page with optional data for the page
     * @param string $fileName
     * @param array $data
     *
     * @return void
     */
    function view (string $fileName, $data = null) : void {
        $fileFullPath = "./lib/pages/{$fileName}.php";

        if (file_exists($fileFullPath)) {
            require_once($fileFullPath);
        } else {
            header("Location: ./404");
        }
    }

    /**
     * Display a specified message with the specified format
     * @param string $errorMessage
     * @param string $class
     */
    function displayMessage (string $class = "", string $message) {
        echo "<p class='{$class}'>{$message}</p>";
    }