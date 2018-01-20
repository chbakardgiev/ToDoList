<?php
$user = "root";
$pass = "";
$pdo = new PDO('mysql:host=localhost;dbname=todolist', $user, $pass);
$text = $_POST['text'];
$sql="INSERT INTO `list`(`id`,`text`) values(null, :text)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':text', $text); 
$stmt->execute();
header("location:index.php");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

