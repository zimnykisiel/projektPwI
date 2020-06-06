<div class="right-nav">
        
    <?php
    echo '<div class="user">'.$_SESSION["userUid"].'</div>';
    ?>
    
    <div class="btn-group">
        <button
        type="button"
        class="btn dropdown-toggle"
        data-toggle="dropdown"
        aria-haspopup="true"
        aria-expanded="false"
        >
            <img src="ninja.svg" alt="Ninja" class="ninja">
        </button>
        <div class="dropdown-menu dropdown-menu-right">     
            <a href="myOffers.php" class="dropdown-item">Your account</a>
            <form action="includes/logout.php" method="post">
                <button class="dropdown-item" type="submit" name="logout-submit">Logout</button>
            </form>
        </div>
    </div>
                
</div>