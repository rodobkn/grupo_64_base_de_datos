<?php

if(isset($_POST['login-submit'])) {

    require 'dbh.inc.php';

    $correousername = $_POST['correousername'];
    $password = $_POST['pwd'];


    if (empty($correousername) || empty($password)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    }
    else {
        $sql = "SELECT * FROM usuarioslogin WHERE username=? OR correo=?;"; 
        $stmt = pg_stmt_init($conn);
        if (!pg_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else {

            pg_stmt_bind_param($stmt, "ss", $correousername, $correousername);
            pg_stmt_execute($stmt);
            $result = pg_stmt_get_result($stmt);
            if ($row = pg_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['upassword']);
                if ($pwdCheck == false) {
                    header("Location: ../index.php?error=wrongpassword");
                    exit();
                }
                else if ($pwdCheck == true) {
                    session_start();
                    $_SESSION['userID'] = $row['uid'];
                    $_SESSION['usernombre'] = $row['unombre'];
                    $_SESSION['userusername'] = $row['username'];
                    $_SESSION['usercorreo'] = $row['correo'];
                    $_SESSION['userdireccion'] = $row['udireccion'];

                    header("Location: ../index.php?login=success");
                    exit();
                } 
                else {
                    header("Location: ../index.php?error=wrongpassword");
                    exit();
                }
            }
            else {
                header("Location: ../index.php?error=nouser");
                exit();
            }
        }
    }

}
else {
    header("Location: ../index.php");
    exit();
}
