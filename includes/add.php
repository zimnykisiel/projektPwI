<?php
session_start();
if(isset($_POST['add-submit'])){

    require 'connect.php';

    $name = $_POST['name'];
    $type = $_POST['type'];
    $condition = $_POST['condition'];
    $id = $_SESSION['userId'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    

    if(empty($name) || empty($type) || empty($condition) || empty($price)){
        header("Location: ../addOffer.php?error=emptyfields");
    }
    else{

        $name = strtolower(str_replace(" ", "", $name));
        $file = $_FILES['file'];

        $fileName = $file['name'];
        $fileType = $file['type'];
        $fileTemp = $file['tmp_name'];
        $fileError = $file['error'];

        $sql = 'INSERT INTO oferta (nazwa, typ, czy_uzywany, id_uzytkownika, cena, opis)
             values(:name, :type, :condition, :id, :price, :description);';
        
        $stmt = $db -> prepare($sql);
        $stmt -> bindValue(':name', $name, PDO::PARAM_STR);
        $stmt -> bindValue(':type', $type, PDO::PARAM_STR);
        $stmt -> bindValue(':condition', $condition, PDO::PARAM_INT);
        $stmt -> bindValue(':id', $id, PDO::PARAM_INT);
        $stmt -> bindValue(':price', $price, PDO::PARAM_INT);
        $stmt -> bindValue(':description', $description, PDO::PARAM_STR);
        $stmt -> execute();
        $lastId = $db -> lastInsertId();
 
        $destination = "img/".$lastId;
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
        $extention = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        mkdir($destination, 0777, true);
        if(!move_uploaded_file($_FILES['file']['tmp_name'], $destination."/gl.".$extention));
        }

        $ilosc_zdjec  = count($_FILES['multi']['name']);
        for($i=0; $i<$ilosc_zdjec; $i++){
          if(is_uploaded_file($_FILES['multi']['tmp_name'][$i])){
            $extention = pathinfo($_FILES['multi']['name'][$i], PATHINFO_EXTENSION);
            if(!move_uploaded_file($_FILES['multi']['tmp_name'][$i], $destination."/".$i.".".$extention));
          }
        }

        header("Location: ../myOffers.php?add=success");
        exit();
        
    }
    

}
else{
    header("Location: ../addOffer.php?");
    exit();
}