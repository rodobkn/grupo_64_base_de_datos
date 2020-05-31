<?php   
    require('conexion.php');
    $unombre = $_POST['nombre'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $correo = $_POST['correo'];
    $udireccion = $_POST['direccion'];
    
    $query ="SELECT username FROM usuarioslogin WHERE username='$username';";
    $result = $db_impar -> prepare($query);
    $result -> execute();
    $usuario_linea = $result -> fetchAll();
    
    if(!is_null($usuario_linea[0])){
        header('Location: registro_rechazado.php');
    }
    
    else {
        $consulta_maximo = "SELECT max(uid) FROM usuarioslogin;";
        $result = $db_impar -> prepare($consulta_maximo);
        $result -> execute();
        $uid_maximos = $result -> fetchAll();
        
        foreach ($uid_maximos as $uid_maximo){
          $id_usuario = $uid_maximo[0];
          $id_nuevo = $id_usuario + 1;

          $query = "INSERT INTO usuarioslogin(uid, unombre, username, correo, udireccion, upassword)
          VALUES ($id_nuevo, '$unombre', '$username', '$correo', '$udireccion', '$password');";
          $result = $db_impar -> prepare($query);
          $result -> execute();
          header('Location: registro_exitoso.php');

        }    
    }
?>

