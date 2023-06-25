<?php

function selectAllTypes($pdo){
    try{
        $query = "Select * from types";
        $selectAllTypes = $pdo->prepare($query);
        $selectAllTypes->execute();
        $types = $selectAllTypes -> fetchAll();
        return $types;
    }catch(PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}