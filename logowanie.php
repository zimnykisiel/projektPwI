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
    <title>Login</title>
  </head>
  <body>
    <div class="container"></div>
    <div class="log-container">
      <div class="log-panel">
        <div class="log-panel-box">
          <h1 class="login-title">Login</h1>

          <form action="includes/login.php" method="POST">
            <p class="login-username">Username</p>
            <div class="login-input-container">
              <input
                class="input"
                type="text"
                name="user"
                placeholder="Username"
              />
              
            </div>
            <?php
                if(isset($_GET['error'])){
                  if($_GET['error'] == "nouser"){
                    echo '<p class="footer-text error">Nie ma takiego użytkownika</p>';
                  }
                }
              ?>

            <p class="login-username">Password</p>
            <input
              class="input login-input-container"
              type="password"
              name="pwd"
              placeholder="Password"
            />

            <?php
              if(isset($_GET['error'])){
                if($_GET['error'] == "emptyfields"){
                  echo '<p class="footer-text" style="color: red; text-align: center;">Uzupełnij wszystkie pola</p>';
                }
                else if($_GET['error'] == "wrongpwd"){
                  echo '<p class="footer-text" style="color: red; text-align: center;">Złe hasło</p>';
                }
              }
            ?>

            <div class="login-btn-container">
              <button
                class="login-btn"
                type="submit"
                name="login-submit"
                onclick="location.href='index.php';"
              >
                <i class="fas fa-chevron-right"></i>
              </button>
            </div>
          </form>
          <div class="login-footer" style="color: #878787;">
           

            <a href="registration.php" class="a-style"
              ><p class="footer-text">Sign in</p></a
            >
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
