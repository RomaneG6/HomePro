<?php

require_once "Model/artModel.php";

$uri = $_SERVER["REQUEST_URI"];

if ($uri === "/index.php" || $uri === "/") {
    $arts = selectAllArts($pdo);
    require_once "Templates/Arts/accueil.php";
}