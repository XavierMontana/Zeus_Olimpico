<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear cuenta</title>
</head>
<body>
    
    <div>
        <form action="create_user_proces.php" method="post">
            <h1>Crear cuenta</h1>

            <label for="nombre">Nombre</label><br>
            <input type="text" name="nombre" id="nombre"><br>

            <label for="apellido">Apellidos</label><br>
            <input type="text" name="apellido" id="apellido"><br>

            <label for="correo">Correo</label><br>
            <input type="email" name="correo" id="correo"><br>

            <label for="contra">Contraseña</label><br>
            <input type="password" name="contra" id="contra"><br>

            <label for="ccontra">Confirmar contraseña</label><br>
            <input type="password" name="ccontra" id="ccontra"><br>

            <input type="submit" value="Crear cuenta">
        </form>
    </div>
</body>
</html>