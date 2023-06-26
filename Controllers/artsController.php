<?php

require_once "Model/artModel.php";

$uri = $_SERVER["REQUEST_URI"];

if ($uri === "/index.php" || $uri === "/") {
    $arts = selectAllArts($pdo);
    require_once "Templates/Arts/accueil.php";
}
elseif ($uri === "/createArt") {
    $options = selectAllOptions($pdo);
    $types = selectAllTypes($pdo);
    require_once "Templates/Arts/createArt.php";
}
elseif ($uri === "/voirArt?artId=" . $_GET['artId']) {
    $art = selectOneArt($pdo);
    require_once "Templates/Arts/voirArt.php";
}