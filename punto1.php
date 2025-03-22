<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    header("Content-Type: application/json");

    $phrase = $_POST["phrase"] ?? "";
    $phrase = preg_replace("/[^a-zA-Z0-9-\s]/", "", $phrase); 
    $words = preg_split("/[\s-]+/", $phrase);
    $acronym = strtoupper(implode("", array_map(fn($word) => $word[0] ?? '', $words)));

    echo json_encode(["acronym" => $acronym]);
    exit;
}
?>
