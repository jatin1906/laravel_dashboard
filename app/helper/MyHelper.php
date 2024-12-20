<?php
// This function is get to random number
if (!function_exists('generateRandomString')) {
    function generateRandomString($length = 10)
    {
        return substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, $length);
    }
}

// This function to getUsername
if (!function_exists('getUserName')) {
    function getUserName($name)
    {
        return "Hello " . $name;
    }
}
