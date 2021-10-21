<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Mira el area visible del navegador-->
    <title>Login</title>
    <link rel="stylesheet" href="styles/login.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
    </style>
</head>
<body>
    
    <div>
        <form class="login" action="login_proces.php" method="post">
            
            <div class="Titulo">
                <h1>Bienvenido</h1>
            </div>

            <div class="info">
                <label for="usuario">Usuario</label>
                <input class="name"  type="text" name="usuario" id="usuario">
            </div>

            <div class="info">
                <label for="contra">Contraseña</label>
                <input class="name" type="password" name="contra" id="contra">
            </div>
    
            <input class="buttom" type="submit" value="Acceder"><br>

            <p><a class="enlac" href="create_user_view.php">Crear cuenta</a></p>
            <p><a class="enlac" href="">Olvide mi contraseña</a></p>
        </form>
    </div>
</body>
</html>