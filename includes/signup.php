<?php
if(isset($_POST['signup-submit'])){

    require 'dbh.php';


    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat)){
        header("Location: ../registration.php?error=emptyfields&uid=".$username."&mail=".$email);
        exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("Location: ../registration.php?error=invalidmailuid&uid");
        exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../registration.php?error=invalidmail&uid=".$username);
        exit();
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("Location: ../registration.php?error=invaliduid&mail=".$email);
        exit();
    }
    else if($password !== $passwordRepeat){
        header("Location: ../registration.php?error=passwordcheck&uid=".$username."&mail=".$email);
        exit();
    }
    else{
        $sql = "SELECT login FROM uzytkownik where login=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../registration.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if($resultCheck > 0){
                header("Location: ../registration.php?error=usertaken&mail=".$email);
                exit();
            }
            else{
                $sql = "INSERT INTO uzytkownik (email, login, haslo) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../registration.php?error=sqlerror");
                    exit();
                }
                else{

                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT); //sha nie sa bezpieczne, dlatego bcrypt, bo ciagle jest aktualizowany 

                    mysqli_stmt_bind_param($stmt, "sss", $email, $username, $hashedPwd);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../registration.php?signup=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}
else{
    header("Location: ../registration.php?");
    exit();
}