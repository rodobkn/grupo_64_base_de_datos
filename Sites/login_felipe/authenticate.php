<?php
session_start();
// Change this to your connection info.
    require('../includes/conexion.php');

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    
    $query ="SELECT * FROM usuarioslogin WHERE username='$username' AND upassword='$password';";
    $result = $db_impar -> prepare($query);
    $result -> execute();
    $usuario_linea = $result -> fetchAll();

    $query2 = "SELECT * FROM usuariosbaja WHERE username='$username' AND upassword= '$password';";
    $result2 = $db_impar -> prepare($query2);
    $result2 -> execute();
    $usuario_baja = $result2 -> fetchAll();
    

    if(!is_null($usuario_linea[0])){
        if(is_null($usuario_baja[0])){

            $_SESSION['loggedin'] = TRUE;
            $_SESSION['username'] = $username;
            $_SESSION['pass'] = $password;
    
            $_SESSION['uid'] = $usuario_linea[0][0];
            $_SESSION['unombre'] = $usuario_linea[0][1];
            $_SESSION['correo'] = $usuario_linea[0][3];
            $_SESSION['direccion'] = $usuario_linea[0][4];
    
            header('Location: home.php'); 
        }
        else{
            header('Location: aviso_baja_login.php');
        }

    }
    else{
        #echo "USUARIO NO ESTÁ REGISTRADO EN LA BD:".'<br>';
        header('Location: no_existe_home.php');
    }
    ?>