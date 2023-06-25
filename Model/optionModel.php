<?php 

function selectAllOptions($pdo){
    try{
        $query = "Select * from options";
        $selectAllOptions = $pdo->prepare($query);
        $selectAllOptions->execute();
        $options = $selectAllOptions -> fetchAll();
        return $options;
    }catch(PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}