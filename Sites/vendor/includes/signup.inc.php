<?php
if(isset($_POST['signup-submit'])){

    require 'dhb.inc.php';

    $unombre=$_POST['nombre'];
    $username = $_POST['username'];
    $correo = $_POST['correo'];
    $udireccion=$_POST['direccion'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    if(empty($unombre) || empty($username) || empty($correo) ||empty($udireccion) ||empty($password) ||empty($passwordRepeat)) {
        hearder("Location: ../signup.php?error=emptyfields&unombre=".$unombre."&username=".$username."&correo=".$correo."&udireccion=".$udireccion);
        exit();
    }
    else if(!filter_var($correo, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        hearder("Location: ../signup.php?error=invalidcorreousername&udireccion=".$udireccion);
        exit();
    }
    else if(!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        hearder("Location: ../signup.php?error=invalidcorreo&unombre=".$unombre."&username=".$username."&udireccion=".$udireccion);
        exit();
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/", $username))) {
        hearder("Location: ../signup.php?error=invalidusername&unombre=".$unombre."&correo=".$correo."&udireccion=".$udireccion);
        exit();
    }
    else if($password !== $passwordRepeat) {
        hearder("Location: ../signup.php?error=passwordcheck&unombre=".$unombre."&username=".$username."&correo=".$correo."&udireccion=".$udireccion);
        exit();
    }
    else {

        $sql ="SELECT username FROM usuarioslogin WHERE username=?;";
        $stmt = pg_connect($conn);
        if(!pg_send_prepare($stmt, $sql)) {
            hearder("Location: ../signup.php?error=sqlerror");
        exit();
        }
        else {
            pg_send_query_params($stmt, "s", $username);
            pg_send_execute($stmt);
            pg_get_result($stmt);
            $resultCheck = pg_num_rows($stmt);
            if($resultCheck > 0) {
                header("Location: ../signup.php?error=usernameUnavailable&unombre=".$unombre."&correo=".$correo."&udireccion=".$udireccion)
                exit();
            }
            else {
                //Lock tables usuarios write;
                $max = "SELECT MAX(uid) FROM usuarioslogin;"
                $sql = "INSERT INTO usuarioslogin (uid, unombre, username, correo, udireccion, upassword) 
                VALUES ($max+1, ?, ?, ?, ?, ?);";
                $stmt = pg_connect($conn);
                if(!pg_send_prepare($stmt, $sql)) {
                    hearder("Location: ../signup.php?error=sqlerror");
                exit();
                }
                else {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT)

                    pg_send_query_param($stmt, "sssss", $unombre, $username, $correo, $udireccion, $hashedPwd);
                    pg_send_execute($stmt);
                    header("Location: ../signup.php?signup=success");
                    exit();
                }
            }
        }

    }
    pg_send_close($stmt);
    pg_close($conn);
}
else {
    header("Location: ../signup.php");
    exit();
}