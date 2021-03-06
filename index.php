<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinaria Cardona</title>
    <link rel="stylesheet" href="resources/css/style.css" type="text/css">
</head>

<body>
    <header class="header">
        <img id="logoVet" src="resources/css/images/vet logo.jpg" alt="vet-logo">
        <div class="header-texto">
            <h1>Veterinaria Cardona</h1>
        </div>

    </header>
    <div class="login">
        <fieldset>
            <h4>Bienvenido, ingrese sus credenciales:</h4>
            <form onsubmit="return validar()" id="login">
                <div class="campo-input">
                    <input type="text" placeholder="Usuario" id="usuario" name="usuario" required>
                </div>
                <div class="campo-input">
                    <input type="password" placeholder="Password" id="pass" name="pass" required>
                </div>
                <div id="error_message"></div>
                <input type="submit" id="submit" value="Entrar" class="btn-primario">
            </form>
        </fieldset>
    </div>
    <div class="cat-dog">
        <img src="resources/css/images/petscd.jpg" alt="vet-with-pets">
    </div>
    <footer>
        <strong>Copyright &copy; 2020 Veterinaria Cardona. Todos los derechos reservados. </strong><a href="https://twitter.com/mmmarrtha" target="_blank">Diseño Web por Martha Nieto.</a>
    </footer>
    <script src="js/validarLogin.js"></script>
</body>

</html>
