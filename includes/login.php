<?php
  
if(isset($_POST['login-submit'])){

  require 'dbh.php';

  $mailuid = $_POST['user'];
  $password = $_POST['pwd'];

  if(empty($mailuid) || empty($password)){
    header("Location: ../logowanie.php?error=emptyfields");
    exit();
  }
  else{
    $sql = "SELECT * FROM uzytkownik WHERE login=? OR email=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../logowanie.php?error=sqlerror");
      exit();
    }
    else{
      //Wybor miedzy emailem a loginem
      mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if($row = mysqli_fetch_assoc($result)){
        $pwdCheck = password_verify($password, $row['haslo']);
        if($pwdCheck == false){
          header("Location: ../logowanie.php?error=wrongpwd");
          exit();
        }
        else if($pwdCheck == true){
          session_start();
          $_SESSION['userId']=$row['id_uzytkownika'];
          $_SESSION['userUid']=$row['login'];

          header("Location: ../index.php?login=success");
          exit();
        }
        else{
          header("Location: ../logowanie.php?error=wrongpwd");
          exit();
        }
      }
      else{
        header("Location: ../logowanie.php?error=nouser");
        exit();
      }

    }
  }

}
else{
  header("Location: ../index.php");
  exit();
}
