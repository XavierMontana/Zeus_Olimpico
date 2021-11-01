<?php
    $conexion = new PDO('mysql:host=localhost; dbname=zeus_olimpico','root','');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id=$_GET['id'];
    $conexion->query("DELETE FROM usuario WHERE id='$id'");
    header('Location:admin.php');
?>