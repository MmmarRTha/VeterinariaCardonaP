    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Busqueda de mascotas</title>
        <link rel="stylesheet" href="../resources/css/style.css" type="text/css">
    </head>
    <body>
        <header class="header">
            <img id="logoVet" src="../resources/css/images/vet logo.jpg" alt="vet-logo">
            <div class="header-texto">
                <h1>Veterinaria Cardona</h1>
            </div>
        </header>
        <?php
        require "config.php";
        if (isset($_POST['submit'])) {
            $nuevo_paciente = array(
                "Especie" => $_POST['especie'],
                "Nombre" => $_POST['nombre'],
                "Nacimiento" => $_POST['nacimiento'],
                "Raza" => $_POST['raza'],
                "Sexo" => $_POST['sexo'],
                "Color" => $_POST['color'],
                "Propietario" => $_POST['propietario'],
                "Telefono" => $_POST['telefono'],
                "Observaciones" => $_POST['observaciones'],
            );
            $sql = "INSERT INTO mascota (Especie, Nombre, Nacimiento, Raza, Sexo, Color, Propietario, Telefono, Observaciones)
            values (:Especie, :Nombre, :Nacimiento, :Raza, :Sexo, :Color, :Propietario, :Telefono, :Observaciones)";
            try {
                $statement = $conn->prepare($sql);
                $statement->execute($nuevo_paciente);
            } catch(PDOException $error) {
                echo $error->getMessage();
            }
        }
        ?>
        <?php if(isset($_POST['submit']) && $statement) : ?>
            <div class="mensaje-update">
                <blockquote> <?php echo $_POST['nombre']; ?> SE HA AGREGADO CORRECTAMENTE.</blockquote>
            </div>
        <?php endif; ?>
        <!-- fin conexion php -->
            <h2>Añadir mascotas</h2>
            <form method="post" class="add_pet">
                <div class="campo-input">
                    <label class="uppercase" for="especie">ESPECIE:</label>
                    <input type="text" name="especie" id="especie" require>
                </div>
                <div class="campo-input">
                    <label class="uppercase"  for="nombre">NOMBRE:</label>
                    <input type="text" name="nombre" id="nombre" require>
                </div>
                <div class="campo-input">
                    <label  class="uppercase" for="nacimiento">FECHA DE NACIMIENTO:</label>
                    <input type="date" name="nacimiento" id="nacimiento" require>
                </div>
                <div class="campo-input">
                    <label  class="uppercase" for="raza">RAZA:</label>
                    <input type="text" name="raza" id="raza" require>
                </div>
                <div class="campo-input" >
                    <label class="uppercase"  for="sexo">SEXO:</label>
                    <input type="text" name="sexo" id="sexo" require>
                </div>
                <div class="campo-input">
                    <label class="uppercase" for="color">COLOR:</label>
                    <input type="text" name="color" id="color" require>
                </div>
                <div class="campo-input">
                    <label class="uppercase" for="propietario">NOMBRE DEL PROPIETARIO:</label>
                    <input type="text" name="propietario" id="propietario" require>
                </div>
                <div class="campo-input">
                    <label class="uppercase" for="telefono">TELEFONO:</label>
                    <input type="text" name="telefono" id="telefono" require>
                </div>
                <div class="campo-input">
                    <label class="uppercase" for="observaciones">OBSERVACIONES:</label>
                    <input type="text" name="observaciones" id="observaciones">
                </div>
                <input type="submit" name="submit" value="Anadir" class="btn_save">
            </form>
            <div class="volver-link">
               <a href="read.php">Volver</a> 
            </div>
        <footer>
            <strong>Copyright &copy; 2020 Veterinaria Cardona. Todos los derechos reservados. </strong> <br><a href="https://twitter.com/mmmarrtha" target="_blank">Diseño Web</a> por Martha Nieto.
        </footer>
    </body>
    </html>