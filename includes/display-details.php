<?php
if(isset($_SESSION['userId'])){
$user = $_SESSION['userUid'];
require 'connect.php';
$sql = 'SELECT * FROM oferta';
$stmt = $db -> query($sql);
$result = $stmt -> fetchAll();

foreach($result as $out){
    
    if(isset($_GET['id'])){
        if($_GET['id']==$out['id_oferty']){
            
    ?>
            <div class="offer-nav">
                  <h1 class="offer-title-text"><?php echo $out['nazwa']?></h1>
                  <div class="exit-arrow">
                    <a href="index.php"><i class="fas fa-chevron-left"></i></a>
                  </div>
                </div>
                <p class="offer-text">Type: <?php echo $out['typ']?></p>
                <p class="offer-text">Condition:
                 <?php 
                 if($out['czy_uzywany']==1){
                    echo 'Używany';
                 }
                 else{
                     echo 'Nowy';
                 }
                 ?>
                 </p>
                <div class="offer-text" style="padding-top: 60px;">
                  <p>Description:</p>
                </div>
                <p class="offer-text description-text">
                    <?php echo $out['opis']?>
                </p>
                <p class="offer-text">Contact email: 
                <?php
                  $sql1 = 'SELECT email, id_uzytkownika FROM uzytkownik';
                  $stmt1 = $db -> query($sql1);
                  $result1 = $stmt1 -> fetchAll();
                  foreach($result1 as $out1){
                    if($out['id_uzytkownika'] == $out1['id_uzytkownika']){
                      echo $out1['email'];
                    }
                  }
                 ?></p>
                <p class="offer-price"><?php echo $out['cena'] ?>$</p>
    <?php
        }
        
      }
}
}


