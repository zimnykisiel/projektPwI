<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/3ff52bcb70.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>
  </head>
  <body>
    <div class="container"></div>
    <div class="log-container">
      <div class="log-panel">
        <div class="log-panel-box">
          <div class="login-title">Sign in</div>
          <form action="includes/signup.php" method = "post">
            <div class="login-username">E-mail:</div>
            <div class="login-input-container">
              <input class="input" type="text" name="mail" />
            </div>
            <div class="login-username">Username</div>
            <div class="login-input-container">
              <input class="input" type="text" name="uid" />
            </div>
            <div class="login-username">Password</div>
            <div class="login-input-container">
              <input class="input" type="password" name="pwd" />
            </div>
            <div class="login-username">Confirm password</div>
            <div class="login-input-container">
              <input class="input" type="password" name="pwd-repeat" />
            </div>
            <?php
                if(isset($_GET['error'])){
                  if($_GET['error'] == "invalidmailuid"){
                    echo '<p class="footer-text error" style="color: red; text-align: center;">Zła nazwa użytkownika i email</p>';
                  }
                  else if($_GET['error'] == "invalidmail"){
                    echo '<p class="footer-text error" style="color: red; text-align: center;">Zły email</p>';
                  }
                  else if($_GET['error'] == "invaliduid"){
                    echo '<p class="footer-text error" style="color: red; text-align: center;">Zła nazwa użytkownika</p>';
                  }
                  else if($_GET['error'] == "passwordcheck"){
                    echo '<p class="footer-text error" style="color: red; text-align: center;">Hasła się nie zgadzają</p>';
                  }
                  else if($_GET['error'] == "emptyfields"){
                    echo '<p class="footer-text error" style="color: red; text-align: center;">Wypełnij wszystkie pola</p>';
                  }
                  else if($_GET['error'] == "usertaken"){
                    echo '<p class="footer-text error" style="color: red; text-align: center;">Taki użytkownik już istnieje</p>';
                  }
                }
              ?>
            <div class="login-btn-container">
              <button class="login-btn" type="submit" name="signup-submit">
                <i class="fas fa-chevron-right"></i>
              </button>
            </div>
          </form>
          <a
            href="logowanie.php"
            style="display: flex; justify-content: center;"
            class="a-style"
            ><div class="footer-text">Click to login</div></a
          >
        </div>
      </div>
    </div>
    
  </body>
</html>
