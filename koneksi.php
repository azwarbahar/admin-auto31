<?php
date_default_timezone_set("Asia/Makassar");
session_start();
$conn = mysqli_connect("localhost", "root", "", "auto31_db");
// $conn = mysqli_connect("localhost", "u3737783_uinamfind", "uinamfind", "u3737783_uinamfind_db");


function slugify($text, string $divider = '-')
{
    // replace non letter or digits by divider
    $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, $divider);

    // remove duplicate divider
    $text = preg_replace('~-+~', $divider, $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}
