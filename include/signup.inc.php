<?php
// if(isset($_POST['signup_submit'])){

    require 'dbh.inc.php';

    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd_repeat'];



    if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat)){
        header("location: ../sign_up.php?error=emptyfields&uid=".$username."&mail=".$email);
        exit();
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("location: ../sign_up.php?error=invalidmail&uid=".$username);
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("location: ../sign_up.php?error=invalidmail&uid=".$username);
    }
    elseif (!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("location: ../sign_up.php?error=invaliduid&mail=".$email);
    }
    elseif($password !== $passwordRepeat){
        header("location: ../sign_up.php?error=passwordcheckuid=".$username."&mail=".$email);
    }
    else{
        $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location: ../sign_up.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if($resultCheck > 0){
                header("location: ../sign_up.php?error=usertaken&mail=".$email);
                exit();
            }
            else{
                $sql ="INSERT INTO users (uidUsers,emailUsers,pwdUsers) VALUE (?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql)){
                    header("location: ../sign_up.php?error=sqlerror");
                    exit();
                }
                else{

                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $password);
                    mysqli_stmt_execute($stmt);
                    header("location: ../sign_up.php?signup=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else{
   header("location: ../sign_up.php");
   exit();
}
