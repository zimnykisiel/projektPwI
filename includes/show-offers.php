<?php
require 'connect.php';
$sql = 'SELECT id_oferty ,nazwa, images FROM oferta';
$stmt = $db -> query($sql) -> fetchAll();


foreach($stmt as $out){
    ?>
    <form method="post">
        <div class="offer-box">
            <div class="offer">
                <a href="offer.php?id=<?php echo $out['id_oferty'];?>" name="offer-submit">
                    <img src="includes/img/<?php echo $out['id_oferty'];?>/gl.png" class="offer-img" alt="<?php echo $out['nazwa'];?>" />
                </a>
            </div>
            <p class="offer-name"><?php echo $out['nazwa'];?></p>
        </div>
    </form>
<?php
}

?>