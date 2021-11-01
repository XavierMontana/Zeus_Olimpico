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
        $conexion = new PDO('mysql:host=localhost; dbname=zeus_olimpico','root','');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if(!isset($_POST['actualizar']))
        {
            $id=$_GET['id'];
            $nombre=$_GET['nombre'];
            $apellido=$_GET['apellido'];
            $correo=$_GET['correo'];
            $perfil=$_GET['perfil'];
        }

        else
        {
            $id=$_POST['id'];
            $nombre=$_POST['nombre'];
            $apellido=$_POST['apellido'];
            $correo=$_POST['correo'];
            $perfil=$_POST['perfil'];

            $consulta="UPDATE usuario SET nombre=:nom, apellido=:ape, correo=:cor, perfil=:per WHERE id=:id";
            $resultado=$conexion->prepare($consulta);
            $resultado->execute(array(":id"=>$id, "nom"=>$nombre, "ape"=>$apellido, ":cor"=>$correo, ":per"=>$perfil));
            header('Location:admin.php');
        }
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <table>

            <tr>
                <td></td>
                <td>
                    <label for="id"></label>
                    <input type="hidden" name="id" id="id" value="<?php echo $id?>">
                </td>
            </tr>

            <tr>
                <td>Nombre</td>
                    <td>
                        <label for="nombre"></label>
                        <input type="text" name="nombre" id="nombre" value="<?php echo $nombre?>">
                    </td>
            </tr>

            <tr>
                <td>Apellido</td>
                    <td>
                        <label for="apellido"></label>
                        <input type="text" name="apellido" id="apellido" value="<?php echo $apellido?>">
                    </td>
            </tr>

            <tr>
                <td>Correo</td>
                    <td>
                        <label for="correo"></label>
                        <input type="text" name="correo" id="correo" value="<?php echo $correo?>">
                    </td>
            </tr>

            <tr>
                <td>Perfil</td>
                    <td>
                        <label for="perfil"></label>
                        <input type="text" name="perfil" id="perfil" value="<?php echo $perfil?>">
                    </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="actualizar" id="actualizar" value="Actualizar">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>