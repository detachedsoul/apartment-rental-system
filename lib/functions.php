<?php
ob_start();
session_start();

/**
 * Requires a specified page
 * @param string $fileName
 */
function view(string $fileName)
{
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
function displayMessage(string $message, string $class = "", string $tag = "p")
{
    echo "<{$tag} class='{$class}'>{$message}</{$tag}>";
}

/**
 * Checks if a variable is empty and set
 * @param mixed $field
 * @return bool
 */
function is_empty($field): bool
{
    if (!isset($field) || $field === "") {
        return true;
    } else {
        return false;
    }
}
