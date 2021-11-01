<?php

    try
    {
        $nombre=htmlentities(addslashes($_POST['usuario']));
        $contra=htmlentities(addslashes($_POST['contra']));
        $contador=0;

        $noadmin=0;

        $conexion = new PDO('mysql:host=localhost; dbname=zeus_olimpico','root','');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $resultado=$conexion->prepare(' SELECT * FROM usuario WHERE nombre=:nom');
        $resultado->execute(array(':nom'=>$nombre));

        while($registro=$resultado->fetch(PDO::FETCH_ASSOC))
        {
            if(password_verify($contra, $registro['contraseña']) AND $registro['perfil']=='admin')
            {
                $contador++;
            }

            else
            {
                $noadmin++;
            }

        }

        if($contador>0)
        {
            session_start();
            $_SESSION['usuario'] = $_POST['usuario'];
            header('Location:admin.php');
        }

        else if($noadmin>0)
        {
            header('Location:acces.php');
        }

        else
        {
            header('Location:denegate.php');
        }
    }

    catch (Exception $e)
    {
        die('El error es: '. $e->getMessage());
    }
?>