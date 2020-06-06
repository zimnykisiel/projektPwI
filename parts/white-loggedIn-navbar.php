<div class="right-nav">
        
    <?php
    echo '<div class="user white">'.$_SESSION["userUid"].'</div>';
    ?>
    
    <div class="btn-group">
        <button
        type="button"
        class="btn dropdown-toggle"
        data-toggle="dropdown"
        aria-haspopup="true"
        aria-expanded="false"
        >
            <img src="whiteNinja.svg" alt="Ninja" class="ninja">
        </button>
        <div class="dropdown-menu dropdown-menu-right dark-theme-dropdown">     
            <a href="myOffers.php" class="dropdown-item white">Your account</a>
            <form action="includes/logout.php" method="post">
                <button class="dropdown-item white" type="submit" name="logout-submit">Logout</button>
            </form>
        </div>
    </div>
                
</div>