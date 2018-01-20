<?php
$id = filter_input(INPUT_GET,'id');
$pdo = new PDO('mysql:host=localhost;dbname=todolist', "root", "");
$pdo->beginTransaction();
        $sql = "DELETE FROM list WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id); 
        $stmt->execute();
        $pdo->commit();
        $stmt = null;
         $pdo = null;
         header("location:index.php");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

