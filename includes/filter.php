<?php
require 'connect.php';
    
    $name = $_POST['name'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $selectOption = $_POST['condition'];

    if(empty($name) && empty($type) && empty($price) && empty($selectOption)){
        include('show-offers.php');
    }  
    else if(!empty($name) && !empty($price)){
        $sql = 'SELECT id_oferty, nazwa, cena, images FROM oferta WHERE nazwa = :nazwa AND cena= :cena'; 
        $stmt = $db -> prepare($sql);
        $stmt -> bindValue(':nazwa', $name, PDO::PARAM_STR);
        $stmt -> bindValue(':cena', $price, PDO::PARAM_INT);
        $stmt -> execute();
        $result = $stmt -> fetchAll();
        foreach($result as $out){
            if(strtolower($out['nazwa']) == strtolower($name) && $out['cena'] == $price){ 
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
        }
    }
    else if(!empty($type) && !empty($price)){
        $sql = 'SELECT nazwa, id_oferty, typ, cena, images FROM oferta WHERE typ = :typ AND cena= :cena'; 
        $stmt = $db -> prepare($sql);
        $stmt -> bindValue(':typ', $type, PDO::PARAM_STR);
        $stmt -> bindValue(':cena', $price, PDO::PARAM_INT);
        $stmt -> execute();
        $result = $stmt -> fetchAll();
        foreach($result as $out){
            if(strtolower($out['typ']) == strtolower($type) && $out['cena'] == $price){ 
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
        }
    }
    else if(!empty($name) && !empty($type)){
        $sql = 'SELECT id_oferty, nazwa, typ, images FROM oferta WHERE nazwa = :nazwa AND typ= :typ'; 
        $stmt = $db -> prepare($sql);
        $stmt -> bindValue(':typ', $type, PDO::PARAM_STR);
        $stmt -> bindValue(':nazwa', $name, PDO::PARAM_STR);
        $stmt -> execute();
        $result = $stmt -> fetchAll();
        foreach($result as $out){
            if(strtolower($out['nazwa']) == strtolower($name) && strtolower($out['typ']) == strtolower($type)){ 
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
        }
    }
    else if(!empty($name) && !empty($selectOption)){
        $sql = 'SELECT id_oferty, nazwa, czy_uzywany, images FROM oferta WHERE nazwa = :nazwa AND czy_uzywany= :czy_uzywany'; 
        $stmt = $db -> prepare($sql);
        $stmt -> bindValue(':nazwa', $name, PDO::PARAM_STR);
        $stmt -> bindValue(':czy_uzywany', $selectOption, PDO::PARAM_STR);
        $stmt -> execute();
        $result = $stmt -> fetchAll();
        foreach($result as $out){
            if(strtolower($out['nazwa']) == strtolower($name) && $out['czy_uzywany']==$selectOption){ 
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
        }
    }
    else if(!empty($price) && !empty($selectOption)){
        $sql = 'SELECT id_oferty, nazwa, cena, czy_uzywany, images FROM oferta WHERE cena = :cena AND czy_uzywany= :czy_uzywany'; 
        $stmt = $db -> prepare($sql);
        $stmt -> bindValue(':cena', $price, PDO::PARAM_INT);
        $stmt -> bindValue(':czy_uzywany', $selectOption, PDO::PARAM_STR);
        $stmt -> execute();
        $result = $stmt -> fetchAll();
        foreach($result as $out){
            if($out['cena']==$price && $out['czy_uzywany']==$selectOption){ 
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
        }
    }
    else if(!empty($type) && !empty($selectOption)){
        $sql = 'SELECT id_oferty, nazwa, typ, czy_uzywany, images FROM oferta WHERE typ = :typ AND czy_uzywany= :czy_uzywany'; 
        $stmt = $db -> prepare($sql);
        $stmt -> bindValue(':typ', $type, PDO::PARAM_STR);
        $stmt -> bindValue(':czy_uzywany', $selectOption, PDO::PARAM_STR);
        $stmt -> execute();
        $result = $stmt -> fetchAll();
        foreach($result as $out){
            if(strtolower($out['typ']) == strtolower($type) && $out['czy_uzywany']==$selectOption){ 
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
        }
    }
    else if(!empty($name) && !empty($type) && !empty($price)){
        $sql = 'SELECT id_oferty, nazwa, typ, cena, images FROM oferta WHERE nazwa = :nazwa AND typ= :typ AND cena= :cena'; 
        $stmt = $db -> prepare($sql);
        $stmt -> bindValue(':nazwa', $name, PDO::PARAM_STR);
        $stmt -> bindValue(':typ', $type, PDO::PARAM_STR);
        $stmt -> bindValue(':cena', $price, PDO::PARAM_INT);
        $stmt -> execute();
        $result = $stmt -> fetchAll();
        foreach($result as $out){
            if(strtolower($out['nazwa']) == strtolower($name) && strtolower($out['typ']) == strtolower($type) && $out['cena'] == $price){ 
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
        }
    }
    else if(!empty($price) && !empty($selectOption) && !empty($name)){
        $sql = 'SELECT id_oferty, nazwa, cena, czy_uzywany, images FROM oferta WHERE cena = :cena AND nazwa= :nazwa AND czy_uzywany= :czy_uzywany'; 
        $stmt = $db -> prepare($sql);
        $stmt -> bindValue(':nazwa', $name, PDO::PARAM_STR);
        $stmt -> bindValue(':czy_uzywany', $selectOption, PDO::PARAM_STR);
        $stmt -> bindValue(':cena', $price, PDO::PARAM_INT);
        $stmt -> execute();
        $result = $stmt -> fetchAll();
        foreach($result as $out){
            if($out['cena']==$price && $out['czy_uzywany']==$selectOption && strtolower($out['nazwa']) == strtolower($name)){ 
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
        }
    }
    else if(!empty($price) && !empty($selectOption) && !empty($type)){
        $sql = 'SELECT id_oferty, nazwa, cena, typ, czy_uzywany, images FROM oferta WHERE cena = :cena AND typ= :typ AND czy_uzywany= :czy_uzywany'; 
        $stmt = $db -> prepare($sql);
        $stmt -> bindValue(':czy_uzywany', $selectOption, PDO::PARAM_STR);
        $stmt -> bindValue(':typ', $type, PDO::PARAM_STR);
        $stmt -> bindValue(':cena', $price, PDO::PARAM_INT);
        $stmt -> execute();
        $result = $stmt -> fetchAll();
        foreach($result as $out){
            if($out['cena']==$price && $out['czy_uzywany']==$selectOption && strtolower($out['typ']) == strtolower($type)){ 
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
        }
    }
    else if(!empty($price) && !empty($selectOption) && !empty($type) && !empty($name)){
        $sql = 'SELECT id_oferty, nazwa, cena, typ, czy_uzywany, images FROM oferta WHERE cena = :cena AND typ= :typ AND czy_uzywany= :czy_uzywany AND nazwa= :nazwa'; 
        $stmt = $db -> prepare($sql);
        $stmt -> bindValue(':nazwa', $name, PDO::PARAM_STR);
        $stmt -> bindValue(':typ', $type, PDO::PARAM_STR);
        $stmt -> bindValue(':czy_uzywany', $selectOption, PDO::PARAM_STR);
        $stmt -> bindValue(':cena', $price, PDO::PARAM_INT);
        $stmt -> execute();
        $result = $stmt -> fetchAll();
        foreach($result as $out){
            if($out['cena']==$price && $out['czy_uzywany']==$selectOption && strtolower($out['typ']) == strtolower($type) && strtolower($out['nazwa']) == strtolower($name)){ 
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
        }
    }   
    else{
        
        $sql = 'SELECT id_oferty, nazwa, typ, czy_uzywany, cena, images FROM oferta WHERE nazwa = :nazwa OR typ= :typ OR cena= :cena OR czy_uzywany= :czy_uzywany'; 
        $stmt = $db -> prepare($sql);
        $stmt -> bindValue(':nazwa', $name, PDO::PARAM_STR);
        $stmt -> bindValue(':typ', $type, PDO::PARAM_STR);
        $stmt -> bindValue(':czy_uzywany', $selectOption, PDO::PARAM_STR);
        $stmt -> bindValue(':cena', $price, PDO::PARAM_INT);
        $stmt -> execute();
        $result = $stmt -> fetchAll();
        
        foreach($result as $out){
            if(strtolower($out['nazwa']) == strtolower($name)){ 
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
            else if(strtolower($out['typ']) == strtolower($type)){
        ?>
                <form method="post">
                    <div class="offer-box">
                        <div class="offer">
                            <a href="offer<?php echo $out['id_oferty'];?>.php" name="offer-submit">
                                <img src="includes/img/<?php echo $out['id_oferty'];?>/gl.png" class="offer-img" alt="<?php echo $out['nazwa'];?>" />
                            </a>
                        </div>
                        <p class="offer-name"><?php echo $out['nazwa'];?></p>
                    </div>
                </form>
        <?php
            }
            else if($out['cena'] == $price){             
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
            else if($out['czy_uzywany'] == $selectOption){  
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
            else if($out['cena'] == $price){  
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
        }


    }
    


        