<?php

function createArt($pdo){

    try{
        $query = "Insert into arts (artNom, artPrix, artImg, userId) values (:artNom, :artPrix, :artImg, :userId)";
        $createArt = $pdo->prepare($query);
        $createArt->execute([
            'artNom' => $_POST['artNom'],
            'artPrix' => $_POST['artPrix'],
            'artImg' => $_POST['img'],
            'userId' => $_SESSION['user']->userId
        ]);
    }catch(PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}
function selectAllArts($pdo){
    try{
        $query = "Select * from arts";
        $selectAllArts = $pdo->prepare($query);
        $selectAllArts->execute();
        $arts = $selectAllArts -> fetchAll();
        return $arts;
    }catch(PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}
function selectOneArt($pdo){
    try{
        $query = "Select * from arts where artId = :artId";
        $selectArt = $pdo->prepare($query);
        $selectArt->execute([
            'artId'=> $_GET['artId']
        ]);
        $art = $selectArt -> fetch();
        return $art;
    }catch(PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}
function deleteAllArtsFromUser($pdo){
    try{
        $query = "Delete from arts where userId = :userId";
        $deleteAllArtsFromUserId = $pdo->prepare($query);
        $deleteAllArtsFromUserId->execute([
            'userId' => $_SESSION['user']-> userId
        ]);
    }catch(PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}