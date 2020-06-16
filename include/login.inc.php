<?php

if(isset($_POST['Login_submit'])){

    require'dbh.inc.php';

    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    if (empty($mailuid) || empty($password)){
        header("location: ../index.php?error=emptyfields");
        exit();
    }
    else {
        $sql ="SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysql_stmt_prepare($stmt,$sql)){
            header("location: ../index.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "ss" , $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_result($stmt);
            if ($row = mysqli_stmt_assoc($result)){
                $pwdCheck = password_verify($password, $row['pwdUsers']);
                if($pwdCheck == false){
                    header("location: ../index.php?error=wrongpwd");
                    exit();
                }
                else if ($pwdCheck == true){
                    session_start();
                    $_SESSION[] = $row['idUsers'];
                    $_SESSION[] = $row['uidUsers'];

                    header("location: ../index.php?login=success");
                    exit();
                }
                else{
                    header("location: ../index.php?error=wrongpwd");
                    exit();
                }
            }
            else{
                header("location: ../index.php?error=nouser");
                exit();
            }
        }
    }
}
else{
    header("location: ../index.php");
    exit();
}