<?php

    try
    {
        $nombre= $_POST['nombre'];
        $apellido=$_POST['apellido'];
        $correo=$_POST['correo'];
        $contra=$_POST['contra'];
        $ccontra=$_POST['ccontra'];

        $conexion = new PDO('mysql:host=localhost; dbname=zeus_olimpico','root','');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $consulta = " INSERT INTO usuario (nombre, apellido, correo, contraseña, ccontraseña) VALUES (:nom, :ape, :cor, :con, :ccon)";


    }

    catch(Exception $e)
    {
        die('El error es: '.$e->getMessage());
    }
?>