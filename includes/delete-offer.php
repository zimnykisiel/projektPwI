<?php

if(isset($_GET['delete-submit'])){
    require 'connect.php';

    $id = $_GET['delete-submit'];

    
    $sql = 'DELETE FROM oferta WHERE id_oferty = :id_oferty';
    $stmt = $db -> prepare($sql);
    $stmt -> bindValue(':id_oferty', $id, PDO::PARAM_INT);
    $stmt -> execute();

    header('Location: ../myOffers.php?delete=success');
}