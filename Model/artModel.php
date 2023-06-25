<?php

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