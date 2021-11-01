<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/admin.css">
</head>
<body>
    <?php
        
        session_start();
        if(!isset($_SESSION['usuario']))
        {
            header('location:index.php');
        }

        echo "<h1 class='titulo'> Bienvenido " . $_SESSION['usuario'] . "</h1>";
    ?>

    <!--- CONEXION A LA BASE DE DATOS -->
    <?php

        $conexion = new PDO('mysql:host=localhost; dbname=zeus_olimpico','root','');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        // Consulta solo para tener el numero de resultados
        
        //paginación 

        $tamaño_paginas=3;
        
        if(isset($_GET['pagina']))
        {
            if($_GET['pagina']==1)
                {
                    header('Location:admin.php');
                }

                else
                {
                    $pagina=$_GET['pagina'];
                }
        }

        else
        {
            $pagina=1;
        }

        $empezar_dese=($pagina-1)* $tamaño_paginas;

        $consulta = " SELECT * FROM USUARIO";
        $resultado=$conexion->prepare($consulta);
        $resultado->execute(array());
        $num_filas=$resultado->rowCount();

        $total_paginas=ceil($num_filas/$tamaño_paginas);

        echo "Numero de registros de la consulta " . $num_filas ."<br>";
        echo "Mostramos " . $tamaño_paginas . " registros por pagina". "<br>";
        echo "Mostrando la pagina " . $pagina . " de " . $total_paginas. "<br>";
        

        $registrados=$conexion->query(" SELECT * FROM usuario LIMIT $empezar_dese,$tamaño_paginas")->fetchALL(PDO::FETCH_OBJ);

    ?>
    

    <p class="sn"><a class="sn" href="cerrarsesion.php">Cerrar sesión</a></p>

    <h1 class="titabla">Usuarios registrados</h1>

    <table class="tabla">

        <tr class="prueba">
            <td>ID</td>
            <td>Nombre</td>
            <td>Apellido</td>
            <td>Correo</td>
            <td>Contraseña</td>
            <td>Perfil</td>
        </tr>

        <?php
            foreach($registrados as $personas):
        ?>

        <tr>
            <td> <?php echo $personas->id?> </td>
            <td> <?php echo $personas->nombre?> </td>
            <td> <?php echo $personas->apellido?> </td>
            <td> <?php echo $personas->correo?> </td>
            <td> <?php echo $personas->contraseña?> </td>
            <td> <?php echo $personas->perfil?> </td>
        
            <td> <a href="borrarADM.php? id=<?php echo $personas->id?>"><input class="boton" type="submit" name="borrar" id="borrar" value="Borrar"></a></td>
            <td> <a href="actualizarADM.php? id=<?php echo $personas->id?> & nombre= <?php echo $personas->nombre?> & apellido= <?php echo $personas->apellido?> & correo=<?php echo $personas->correo?> & contraseña=<?php echo $personas->contraseña?> & perfil=<?php echo $personas->perfil?>"><input class="boton" type="submit" name="actualizar" id="actualizar" value="Actualizar"></a></td>
        
        </tr>

        <?php
            endforeach;
        ?>

            

        <!--- Función de agregar usuario en modo admin (falta hacer que encripte la password)
        <form action="agregar.php" method="post">
            <tr>
                <td></td>
                <td><input class="agregar" type="text" name="nombre" id="nombre"></td>
                <td><input class="agregar" type="text" name="apellido" id="apellido"></td>
                <td><input class="agregar" type="text" name="correo" id="correo"></td>
                <td><input class="agregar" type="password" name="contraseña" id="contraseña"></td>
                <td><input class="agregar" type="text" name="perfil" id="perfil"></td>
                <td><input class="boton" type="submit" value="Agregar"></td>
            </tr>
        </form>
        -->
    </table>

    <!--- Paginación -->
<?php
    
    for($i=1; $i<=$total_paginas; $i++)
    {
        echo "<a href='?pagina=" . $i . "'>" . $i . "</a>  ";
    }
?>
    <!----->

</body>
</html>