<?php

if(isset($_SESSION['userId'])){
    $id = $_SESSION['userId'];
    require 'connect.php';
    $sql = 'SELECT id_oferty ,nazwa, images, id_uzytkownika FROM oferta';
    $stmt = $db -> query($sql);
    $result = $stmt -> fetchAll();


    foreach($result as $out){
        if($id == $out['id_uzytkownika']){
            ?>
            <form action="includes/delete-offer.php" method = "get">
                <div class="offer-box"">
                    <div class="offer">
                        <a href="offer.php?id=<?php echo $out['id_oferty'];?>" name="offer-submit">
                            <img src="includes/img/<?php echo $out['id_oferty'];?>/gl.png" class="offer-img" alt="<?php echo $out['nazwa'];?>" />
                        </a>
                    </div>
                    <p class="offer-name"><?php echo $out['nazwa'];?></p>
                    
                </div>
                <div style="width: 100%; display: flex; justify-content: center; align-items: center;" >
                    <button  style=
                    "font-size: 30px; border: 1px solid; border-radius: 50%; height: 45px; width: 45px; display: flex; justify-content: center; align-items: center;"
                    type="submit" name="delete-submit" value="<?php echo $out['id_oferty']?>"
                    >
                    X
                    </button>   
                </div>
            </form>
    <?php
        }
        
    }
    }
else{
?>
    <h1 class="filter-title">Brak ofert</h1>;
<?php
  }


?>
