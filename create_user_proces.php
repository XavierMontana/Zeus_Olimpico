<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        $nombre=htmlentities(addslashes($_POST['nombre']));
        $apellido=htmlentities(addslashes($_POST['apellido']));
        $correo=htmlentities(addslashes($_POST['correo']));
        $contra=htmlentities(addslashes($_POST['contra']));
        $ccontra=htmlentities(addslashes($_POST['ccontra']));

        $ce=password_hash($contra, PASSWORD_DEFAULT, array('cost'=>12));
        $cce=password_hash($ccontra, PASSWORD_DEFAULT, array('cost'=>12));

        try
        {
            $conexion = new PDO('mysql:host=localhost; dbname=zeus_olimpico','root','');
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $consulta = " INSERT INTO usuario (nombre, apellido, correo, contraseña, ccontraseña) VALUES (:nom, :ape, :cor, :con, :ccon)";

            $resultado=$conexion->prepare($consulta);
            $resultado->execute(array(':nom'=>$nombre, ':ape'=>$apellido, ':cor'=>$correo, ':con'=>$ce, ':ccon'=>$cce));

            echo 'Registro realizado exitosamente';
        }

        catch(Exception $e)
        {
            die('El error es: '.$e->getMessage());
        }
    ?>

    <p><a href="index.php">Inicio</a></p>
</body>
</html>